<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\VikorService;
use App\Models\HasilSpk;

class ResultPage extends Component
{
    public $products = [];
    public $selectedProduct = null;

    public function mount()
    {
        $sessionId = request()->query('spk-session') ?? session('spk-session');
        if (!$sessionId) {
            return redirect()->to('/');
        }
        $vikor = new VikorService();
        $result = $vikor->calculate($sessionId, !HasilSpk::where('id_sesi', $sessionId)->exists());
        
        $this->products = $result['products'];
        $this->selectedProduct = $this->products[0] ?? null;
    }

    public function render()
    {
        return view('livewire.result-page')->layout('components.layouts.app');
    }
}