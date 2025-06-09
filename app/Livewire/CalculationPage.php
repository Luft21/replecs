<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Laptop;
use App\Models\Kriteria;
use App\Models\NilaiKriteriaLaptop;
use App\Models\BobotKriteria;
use App\Models\HasilSpk;
use App\Models\SesiSpk;

class CalculationPage extends Component
{
    public $products = [];
    public $selectedProduct = null;

    public function render()
    {
        $sessionId = request()->query('spk-session') ?? session('spk-session');
        if (!$sessionId) {
            return redirect()->to('/');
        }

        $kriterias = Kriteria::orderBy('urutan')->get();
        $kriteriaIds = $kriterias->pluck('id')->toArray();

        $weights = BobotKriteria::where('id_sesi', $sessionId)
            ->orderBy('id_kriteria')
            ->pluck('nilai_bobot')
            ->toArray();

        $laptops = Laptop::all();
        $nilaiKriteria = NilaiKriteriaLaptop::whereIn('id_kriteria', $kriteriaIds)->get();

        $matriksKeputusan = [];
        $products = [];

        foreach ($laptops as $laptop) {
            $criteria = [];
            foreach ($kriteriaIds as $kid) {
                $nk = $nilaiKriteria->first(fn($item) => $item->id_laptop === $laptop->id && $item->id_kriteria === $kid);
                $criteria[] = $nk ? $nk->nilai : 0;
            }

            $products[] = [
                'name' => $laptop->nama,
                'image' => $laptop->gambar,
                'criteria' => $criteria,
                'laptop_id' => $laptop->id,
            ];
            $matriksKeputusan[$laptop->nama] = $criteria;
        }

        $numCriteria = count($weights);
        $max = array_fill(0, $numCriteria, PHP_FLOAT_MIN);
        $min = array_fill(0, $numCriteria, PHP_FLOAT_MAX);

        foreach ($products as $product) {
            foreach ($product['criteria'] as $i => $value) {
                $max[$i] = max($max[$i], $value);
                $min[$i] = min($min[$i], $value);
            }
        }

        $costCriteria = [4]; // index 4 as cost

        $matriksNormalisasi = [];
        $normalized = [];

        foreach ($products as $pIndex => $product) {
            $normalizedCriteria = [];
            foreach ($product['criteria'] as $i => $value) {
                if ($max[$i] == $min[$i]) {
                    $normalizedCriteria[$i] = 0;
                } else {
                    if (in_array($i, $costCriteria)) {
                        $normalizedCriteria[$i] = ($value - $min[$i]) / ($max[$i] - $min[$i]); // cost
                    } else {
                        $normalizedCriteria[$i] = ($max[$i] - $value) / ($max[$i] - $min[$i]); // benefit
                    }
                }
            }
            $normalized[$pIndex] = $normalizedCriteria;
            $matriksNormalisasi[$product['name']] = $normalizedCriteria;
            $products[$pIndex]['normalized'] = $normalizedCriteria;
        }

        $matriksTerbobot = [];
        $weighted = [];

        foreach ($normalized as $pIndex => $criteria) {
            foreach ($criteria as $i => $value) {
                $weighted[$pIndex][$i] = $value * $weights[$i];
            }
            $matriksTerbobot[$products[$pIndex]['name']] = $weighted[$pIndex];
        }

        $Si = [];
        $Ri = [];
        $nilaiSi = [];
        $nilaiRi = [];

        foreach ($weighted as $pIndex => $criteria) {
            $Si[$pIndex] = array_sum($criteria);
            $Ri[$pIndex] = max($criteria);
            $nilaiSi[$products[$pIndex]['name']] = $Si[$pIndex];
            $nilaiRi[$products[$pIndex]['name']] = $Ri[$pIndex];
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
                'nilai_Q' => $product['Qi'],
            ];

            HasilSpk::updateOrCreate(
                ['id_sesi' => $sessionId, 'id_laptop' => $product['laptop_id']],
                ['nilai_S' => $Si[$i], 'nilai_R' => $Ri[$i], 'nilai_Q' => $product['Qi']]
            );
        }

        usort($hasil, fn($a, $b) => $a['nilai_Q'] <=> $b['nilai_Q']);

        foreach ($hasil as $i => &$item) {
            $item['ranking'] = $i + 1;
            $item['laptop'] = Laptop::find($item['id_laptop']);
        }

        return view('livewire.calculation', [
            'kriterias' => $kriterias,
            'matriksKeputusan' => $matriksKeputusan,
            'maksimum' => $max,
            'minimum' => $min,
            'matriksNormalisasi' => $matriksNormalisasi,
            'matriksTerbobot' => $matriksTerbobot,
            'nilaiSi' => $nilaiSi,
            'nilaiRi' => $nilaiRi,
            'hasil' => collect($hasil),
            'weights' => $weights, 
        ])->layout('components.layouts.app');
    }
}
