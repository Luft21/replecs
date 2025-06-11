<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\VikorService;
use App\Models\HasilSpk;
use App\Models\Kriteria;
use App\Models\Laptop;
use App\Models\NilaiKriteriaLaptop;

class ResultPage extends Component
{
    public $products = [];
    public $topProducts = [];
    public $mainProduct = null;
    public $kriterias = [];

    public function mount()
{
    $sessionId = request()->query('spk-session') ?? session('spk-session');

    if (!$sessionId) {
        return redirect()->to('/');
    }

    if (HasilSpk::where('id_sesi', $sessionId)->exists()) {
        $hasil = HasilSpk::where('id_sesi', $sessionId)
            ->orderBy('nilai_Q')
            ->get();

        $products = [];
        foreach ($hasil as $row) {
            $laptop = Laptop::find($row->id_laptop);
            if ($laptop) {
                $nilaiKriteria = NilaiKriteriaLaptop::where('id_laptop', $laptop->id)
                    ->orderBy('id_kriteria')
                    ->pluck('nilai')
                    ->toArray();
                $products[] = [
                    'name' => $laptop->nama,
                    'image' => $laptop->gambar,
                    'criteria' => $nilaiKriteria,
                    'laptop_id' => $laptop->id,
                    'Qi' => $row->nilai_Q,
                ];
            }
        }
        $this->products = $products;
        $this->topProducts = array_slice($products, 0, 5);
        $this->kriterias = Kriteria::orderBy('urutan')->get();
        $this->mainProduct = $products[0] ?? null;
    } else {
        $vikor = new VikorService();
        $result = $vikor->calculate($sessionId, true);
        $this->products = $result['products'];
        $this->topProducts = array_slice($this->products, 0, 5);
        $this->kriterias = $result['kriterias'];
        $this->mainProduct = $this->products[0] ?? null;
    }
}

    public function render()
    {
        return view('livewire.result-page')->layout('components.layouts.app');
    }
}