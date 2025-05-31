<?php

namespace App\Livewire;

use App\Models\SesiSpk;
use Livewire\Component;
use Livewire\WithPagination;

class SesiSpkPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $sesiSpks = SesiSpk::with('user')
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);

        return view('livewire.session-page', [
            'sesiSpks' => $sesiSpks,
        ])->layout('components.layouts.app');
    }
}