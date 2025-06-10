<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\VikorService;

class CalculationPage extends Component
{
    public function render()
    {
        $sessionId = request()->query('spk-session') ?? session('spk-session');
        if (!$sessionId) {
            return redirect()->to('/');
        }

        $vikor = new VikorService();
        $result = $vikor->calculate($sessionId, true);
        return view('livewire.calculation', [
            'kriterias' => $result['kriterias'],
            'matriksKeputusan' => collect($result['products'])->mapWithKeys(fn($p) => [$p['name'] => $p['criteria']]),
            'maksimum' => $result['max'],
            'minimum' => $result['min'],
            'matriksNormalisasi' => collect($result['products'])->mapWithKeys(fn($p) => [$p['name'] => $p['normalized']]),
            'matriksTerbobot' => collect($result['products'])->mapWithKeys(fn($p, $i) => [$p['name'] => $result['weighted'][$i]]),
            'nilaiSi' => collect($result['products'])->mapWithKeys(fn($p, $i) => [$p['name'] => $result['Si'][$i]]),
            'nilaiRi' => collect($result['products'])->mapWithKeys(fn($p, $i) => [$p['name'] => $result['Ri'][$i]]),
            'hasil' => collect($result['hasil']),
            'weights' => $result['weights'],
        ])->layout('components.layouts.dss');
    }
}