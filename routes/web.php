<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\DSSPage;

Route::get('/', HomePage::class);

Route::get('/dss', DSSPage::class);