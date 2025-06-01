<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\HomePage;
use App\Livewire\AuthPage;
use App\Livewire\SesiSpkPage;
use App\Livewire\QuestionnairePage;
use App\Livewire\AboutPage;


Route::get('/', HomePage::class)->name('home');
Route::get('/auth', AuthPage::class)->middleware('guest')->name('auth');
Route::get('/about', AboutPage::class)->name('about');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/')->with('status', 'Anda telah logout.');
})->name('logout');

Route::middleware(['auth'])->prefix('spk')->name('spk.')->group(function () {
    Route::get('sessions', SesiSpkPage::class)->name('sessions');
    Route::get('kuesioner', QuestionnairePage::class)->name('kuesioner');
});