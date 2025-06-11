<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\VikorService;
use App\Models\HasilSpk;
use App\Models\Kriteria;

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

        $vikor = new VikorService();
        $result = $vikor->calculate($sessionId, !HasilSpk::where('id_sesi', $sessionId)->exists());
        
        $this->products = $result['products'];
        $this->topProducts = array_slice($this->products, 0, 5);
        $this->kriterias = Kriteria::orderBy('urutan')->get();
        $this->mainProduct = $this->products[0] ?? null;
    }

    public function render()
    {
        return view('livewire.result-page')->layout('components.layouts.app');
    }
}