<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\HomePage;
use App\Livewire\AuthPage;
use App\Livewire\DSSPage;

Route::get('/', HomePage::class)->name('home');

Route::get('/dss', function () {
    return view('dss');
})->middleware('auth');

Route::get('/auth', AuthPage::class)->middleware('guest')->name('auth');
Route::get('/login', fn () => redirect()->route('auth'))->name('login');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/')->with('status', 'Anda telah logout.');
})->name('logout');

Route::get('/dss', DSSPage::class);
