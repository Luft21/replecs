<?php
namespace App\Livewire;

use Livewire\Component;

class DssSlider extends Component
{
    public $value1 = 3;
    public $value2 = 3;
    public $value3 = 3;
    public $value4 = 3;
    public $value5 = 3;
    public $value6 = 3;

    public function render()
    {
        return view('livewire.dss-slider');
    }
}
