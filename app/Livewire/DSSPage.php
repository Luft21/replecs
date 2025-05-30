<?php

namespace App\Livewire;

use Livewire\Component;

class DSSPage extends Component
{
    public function render()
    {
        return view('livewire.dss')->layout('components.layouts.dss');;
    }
}