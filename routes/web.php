<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\KandidatController;

// Route::middleware(['auth', 'redirect.role'])->group(function () {
Route::get('/', function () {
    return view('e-voting');
})->name('users');
Route::get('/dashboard', function () {
    return view('admindashboard');
})->name('dashboard');
// });

Route::controller(AuthController::class)->group(function () {
    Route::get('register',  'register')->name('register');
    Route::post('register', 'registersave')->name('register.save');
    Route::get('login',   'login')->name('login');
    Route::post('login',  'loginaction')->name('login.action');
    Route::post('logout', 'logout')->name('logout');
});

Route::resource('kandidat', KandidatController::class);
Route::get('/dashboard', [VotingController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [VotingController::class, 'data'])->name('dashboard');

// Route::middleware(['auth'])->group(function () {
Route::get('/vote', [VoteController::class, 'index'])->name('vote.index');
Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
Route::get('/hasilvote', [VoteController::class, 'data'])->name('hasil.vote');
Route::get('/hasilvote', [VoteController::class, 'results'])->name('hasil.vote');

    
// });