<?php

namespace App\Livewire;

use Livewire\Component;

class ResultPage extends Component
{
    public $products = [];
    public $selectedProduct = null;

    public function mount()
    {
        $weights = session('weights');

        if (!$weights || count($weights) !== 6) {
            return redirect()->to('/');
        }

        // Sample products with raw criteria values
        $this->products = [
            [
                'name' => 'ROG Flow Z13',
                'image' => 'rog-flow.png',
                'criteria' => [3, 2, 3, 1, 2, 2],
            ],
            [
                'name' => 'ASUS TUF',
                'image' => 'asus-tuf.png',
                'criteria' => [2, 2, 2, 3, 3, 3],
            ],
            [
                'name' => 'Acer Nitro',
                'image' => 'acer-nitro.png',
                'criteria' => [1, 4, 3, 2, 2, 2],
            ],
            [
                'name' => 'HP Omen',
                'image' => 'hp-omen.png',
                'criteria' => [4, 3, 2, 1, 1, 1],
            ],
            [
                'name' => 'Lenovo Legion',
                'image' => 'lenovo-legion.png',
                'criteria' => [3, 3, 2, 2, 2, 2],
            ],
        ];

        $numCriteria = count($weights);
        $numProducts = count($this->products);

        $max = array_fill(0, $numCriteria, PHP_FLOAT_MIN);
        $min = array_fill(0, $numCriteria, PHP_FLOAT_MAX);

        // Step 1: Find max and min for normalization
        foreach ($this->products as $product) {
            foreach ($product['criteria'] as $i => $value) {
                $max[$i] = max($max[$i], $value);
                $min[$i] = min($min[$i], $value);
            }
        }

        // Benefit criteria except index 4 (which is cost)
        $costCriteria = [4];

        // Step 2: Normalize criteria
        $normalized = [];
        foreach ($this->products as $pIndex => $product) {
            $normalizedCriteria = [];
            foreach ($product['criteria'] as $i => $value) {
                if ($max[$i] == $min[$i]) {
                    $normalizedCriteria[$i] = 0; // avoid division by zero if all values same
                } else {
                    if (in_array($i, $costCriteria)) {
                        $normalizedCriteria[$i] = ($value - $min[$i]) / ($max[$i] - $min[$i]); // cost
                    } else {
                        $normalizedCriteria[$i] = ($max[$i] - $value) / ($max[$i] - $min[$i]); // benefit
                    }
                }
            }
            $normalized[$pIndex] = $normalizedCriteria;
            $this->products[$pIndex]['normalized'] = $normalizedCriteria;
        }

        // Step 3: Weighted normalized matrix
        $weighted = [];
        foreach ($normalized as $pIndex => $criteria) {
            foreach ($criteria as $i => $value) {
                $weighted[$pIndex][$i] = $value * $weights[$i];
            }
        }

        // Step 4: Calculate Si and Ri
        $Si = [];
        $Ri = [];
        foreach ($weighted as $pIndex => $criteria) {
            $Si[$pIndex] = array_sum($criteria);
            $Ri[$pIndex] = max($criteria);
        }

        $Smax = max($Si);
        $Smin = min($Si);
        $Rmax = max($Ri);
        $Rmin = min($Ri);
        $v = 0.5;

        // Step 5: Calculate Qi with safe division
        foreach ($this->products as $i => &$product) {
            $sTerm = ($Smax - $Smin) == 0 ? 0 : ($Si[$i] - $Smin) / ($Smax - $Smin);
            $rTerm = ($Rmax - $Rmin) == 0 ? 0 : ($Ri[$i] - $Rmin) / ($Rmax - $Rmin);
            $qi = $v * $sTerm + (1 - $v) * $rTerm;
            $product['Qi'] = round($qi, 6);
        }

        // Step 6: Sort products by Qi (ascending)
        usort($this->products, fn($a, $b) => $a['Qi'] <=> $b['Qi']);

        // Default selected product is top-ranked
        $this->selectedProduct = $this->products[0];
    }

    public function selectProduct($index)
    {
        if (isset($this->products[$index])) {
            $this->selectedProduct = $this->products[$index];
        }
    }

    public function render()
    {
        return view('livewire.result-page')->layout('components.layouts.app');
    }
}