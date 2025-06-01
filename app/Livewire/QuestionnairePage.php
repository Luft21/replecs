<?php

namespace App\Livewire;

use Livewire\Component;

class QuestionnairePage extends Component
{
    public $value1 = 3;
    public $value2 = 3;
    public $value3 = 3;
    public $value4 = 3;
    public $value5 = 3;
    public $value6 = 3;

    public function submit()
    {
        $weights = [
            $this->value1 / 5,
            $this->value2 / 5,
            $this->value3 / 5,
            $this->value4 / 5,
            $this->value5 / 5,
            $this->value6 / 5,
        ];

        session()->put('weights', $weights);

        return redirect()->to('/spk/result');
    }

    public function render()
    {
        return view('livewire.questionnaire')->layout('components.layouts.dss');
    }
}
