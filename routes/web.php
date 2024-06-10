<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomepageController::class,'welcome'])->middleware('guest');
Route::get('/about',[AboutController::class,'about'])->middleware('guest');

Route::get('/login',[LoginController::class,'login'])->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate'])->middleware('guest');
Route::get('/logout',[LoginController::class,'logout'])->middleware('auth');

Route::get('/registrasi',[RegistrasiController::class,'registrasi'])->name('register.registrasi')->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class,'store'])->name('register.store')->middleware('guest');

Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard')->middleware('auth');
Route::resource('voting', VotingController::class)->middleware('auth');

Route::get('/profil', [ProfilController::class,'index'])->name('profil.index')->middleware('auth');
Route::get('/profil/{profil}/edit', [ProfilController::class,'edit'])->name('profil.edit')->middleware('auth');
Route::post('/profil/upadte', [ProfilController::class,'update'])->name('profil.update')->middleware('auth');
Route::get('/changepassword',[ProfilController::class,'changePassword'])->middleware('auth');
Route::post('/gantipassword',[ProfilController::class,'gantiPassword'])->middleware('auth');

Route::resource('admin', AdminController::class);
