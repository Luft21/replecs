<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Laptop;
use App\Models\Kriteria;
use App\Models\NilaiKriteriaLaptop;

class AlternatifPage extends Component
{
    public function render()
    {
        $kriterias = Kriteria::orderBy('urutan')->get();
        $laptops = Laptop::paginate(6);
        $nilaiKriteria = NilaiKriteriaLaptop::all()->groupBy('id_laptop');

        return view('livewire.alternatif', [
            'kriterias' => $kriterias,
            'laptops' => $laptops,
            'nilaiKriteria' => $nilaiKriteria,
        ])->layout('components.layouts.app');
    }
}