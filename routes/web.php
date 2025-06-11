<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\HomePage;
use App\Livewire\AuthPage;
use App\Livewire\SesiSpkPage;
use App\Livewire\QuestionnairePage;
use App\Livewire\AboutPage;
use App\Livewire\ProfilePage;
use App\Livewire\ResultPage;
use App\Livewire\CalculationPage;
use App\Livewire\EditProfilePage;
use App\Livewire\HistoryPage;
use App\Livewire\AlternatifPage;
use App\Models\SesiSpk;
use App\Models\HasilSpk;

Route::get('/', HomePage::class)->name('home');
Route::get('/auth', AuthPage::class)->middleware('guest')->name('auth');
Route::get('/login', fn () => redirect()->route('auth'))->name('login');
Route::get('/about', AboutPage::class)->name('about');
Route::get('/alternatif', AlternatifPage::class)->name('alternatif');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/')->with('status', 'Anda telah logout.');
})->name('logout');

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('profile', ProfilePage::class)->name('profile');
    Route::get('editprofile', EditProfilePage::class)->name('editprofile');
    Route::get('history', HistoryPage::class)->name('history');
});

Route::middleware(['auth'])->prefix('spk')->name('spk.')->group(function () {
    Route::get('sessions', SesiSpkPage::class)->name('sessions');
    Route::get('alternatif', SesiSpkPage::class)->name('alternatif');
    Route::get('kuesioner', QuestionnairePage::class)->name('kuesioner');
    Route::get('result', ResultPage::class)->name('result');
    Route::get('calculation', CalculationPage::class)->name('calculation');
    Route::get('fix-rankings', function () {
        $sessions = SesiSpk::all();
        $updatedCount = 0;
        foreach ($sessions as $session) {
            HasilSpk::updateRankingForSession($session->id);
            $updatedCount++;
        }
    })->name('fix-rankings');
});