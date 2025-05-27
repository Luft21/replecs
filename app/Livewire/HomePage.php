<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HomePage extends Component
{
    public function render()
    {
        if (Auth::check()) {
            return view('livewire.home-page')->layout('components.layouts.app');
        } else {
            return view('livewire.home-page')->layout('components.layouts.guest.app');
        }
    }
}