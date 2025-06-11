<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Laptop;

class HomePage extends Component
{
    public function render()
    {
        $images = Laptop::inRandomOrder()->limit(5)->pluck('gambar', 'nama')->toArray();
        if (Auth::check()) {
            return view('livewire.home-page', [
                'laptopImages' => $images,
            ])->layout('components.layouts.app');
        } else {
            return view('livewire.home-page', [
                'laptopImages' => $images,
            ])->layout('components.layouts.guest.app');
        }
    }
}