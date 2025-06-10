<?php

namespace App\Services;

use App\Models\Laptop;
use App\Models\Kriteria;
use App\Models\NilaiKriteriaLaptop;
use App\Models\BobotKriteria;
use App\Models\HasilSpk;

class VikorService
{
    /**
     * Hitung VIKOR dan (opsional) simpan ke hasil_spk.
     * @param string $sessionId
     * @param bool $saveToDb
     * @return array hasil ranking dan detail perhitungan
     */
    public function calculate($sessionId, $saveToDb = false)
    {
        $kriterias = Kriteria::orderBy('urutan')->get();
        $kriteriaIds = $kriterias->pluck('id')->toArray();

        $weights = BobotKriteria::where('id_sesi', $sessionId)
            ->orderBy('id_kriteria')
            ->pluck('nilai_bobot')
            ->toArray();

        $kriterias = Kriteria::orderBy('urutan')->get();
        $kriteriaIds = $kriterias->pluck('id')->toArray();

        $laptops = Laptop::all();

        $nilaiKriteria = NilaiKriteriaLaptop::whereIn('id_kriteria', $kriteriaIds)->get();

        $products = [];
        foreach ($laptops as $laptop) {
            $criteria = [];
            foreach ($kriteriaIds as $kid) {
                $criteria[] = $nilaiKriteria
                    ->where('id_laptop', $laptop->id)
                    ->where('id_kriteria', $kid)
                    ->first()
                    ->nilai ?? 0;
            }
            $products[] = [
                'name' => $laptop->nama,
                'image' => $laptop->gambar,
                'criteria' => $criteria,
                'laptop_id' => $laptop->id,
            ];
        }

        $numCriteria = count($weights);
        $numProducts = count($products);
        $max = array_fill(0, $numCriteria, PHP_FLOAT_MIN);
        $min = array_fill(0, $numCriteria, PHP_FLOAT_MAX);

        foreach ($products as $product) {
            foreach ($product['criteria'] as $i => $value) {
                $max[$i] = max($max[$i], $value);
                $min[$i] = min($min[$i], $value);
            }
        }

        // Tentukan cost criteria (misal index 4)
        $costCriteria = [];
        foreach ($kriterias as $i => $kriteria) {
            if ($kriteria->jenis === 'cost') {
                $costCriteria[] = $i;
            }
        }

        // Normalisasi
        $normalized = [];
        foreach ($products as $pIndex => $product) {
            $normalizedCriteria = [];
            foreach ($product['criteria'] as $i => $value) {
                if ($max[$i] == $min[$i]) {
                    $normalizedCriteria[$i] = 0;
                } else {
                    if (in_array($i, $costCriteria)) {
                        $normalizedCriteria[$i] = ($value - $min[$i]) / ($max[$i] - $min[$i]);
                    } else {
                        $normalizedCriteria[$i] = ($max[$i] - $value) / ($max[$i] - $min[$i]);
                    }
                }
            }
            $normalized[$pIndex] = $normalizedCriteria;
            $products[$pIndex]['normalized'] = $normalizedCriteria;
        }

        // Terbobot
        $weighted = [];
        foreach ($normalized as $pIndex => $criteria) {
            foreach ($criteria as $i => $value) {
                $weighted[$pIndex][$i] = $value * ($weights[$i] ?? 0);
            }
        }

        $Si = [];
        $Ri = [];
        foreach ($weighted as $pIndex => $criteria) {
            $Si[$pIndex] = array_sum($criteria);
            $Ri[$pIndex] = max($criteria);
        }

        $Smax = max($Si);
        $Smin = min($Si);
        $Rmax = max($Ri);
        $Rmin = min($Ri);
        $v = 0.5;

        $hasil = [];
        foreach ($products as $i => &$product) {
            $sTerm = ($Smax - $Smin) == 0 ? 0 : ($Si[$i] - $Smin) / ($Smax - $Smin);
            $rTerm = ($Rmax - $Rmin) == 0 ? 0 : ($Ri[$i] - $Rmin) / ($Rmax - $Rmin);
            $qi = $v * $sTerm + (1 - $v) * $rTerm;
            $product['Qi'] = round($qi, 6);

            $hasil[] = [
                'id_laptop' => $product['laptop_id'],
                'nama' => $product['name'],
                'nilai_S' => $Si[$i],
                'nilai_R' => $Ri[$i],
                'nilai_Q' => $product['Qi'],
            ];
        }

        // Simpan ke DB jika diminta dan belum ada
        if ($saveToDb && !HasilSpk::where('id_sesi', $sessionId)->exists()) {
            foreach ($hasil as $i => $row) {
                HasilSpk::create([
                    'id_sesi'   => $sessionId,
                    'id_laptop' => $row['id_laptop'],
                    'nilai_S'   => $row['nilai_S'],
                    'nilai_R'   => $row['nilai_R'],
                    'nilai_Q'   => $row['nilai_Q'],
                ]);
            }
        }

        // Urutkan hasil
        usort($hasil, fn($a, $b) => $a['nilai_Q'] <=> $b['nilai_Q']);
        usort($products, fn($a, $b) => $a['Qi'] <=> $b['Qi']);

        return [
            'products' => $products,
            'hasil' => $hasil,
            'kriterias' => $kriterias,
            'weights' => $weights,
            'max' => $max,
            'min' => $min,
            'normalized' => $normalized,
            'weighted' => $weighted,
            'Si' => $Si,
            'Ri' => $Ri,
        ];
    }
}