<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AboutPage extends Component
{
    public function render()
    {
        return view('livewire.about-page')->layout('components.layouts.app');
    }
}