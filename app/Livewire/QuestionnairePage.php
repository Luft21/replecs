<?php

namespace App\Livewire;

use App\Models\SesiSpk;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionnairePage extends Component
{
    public $value1 = 3;
    public $value2 = 3;
    public $value3 = 3;
    public $value4 = 3;
    public $value5 = 3;
    public $value6 = 3;

    public function render()
    {
        return view('livewire.questionnaire')->layout('components.layouts.dss');
    }
}