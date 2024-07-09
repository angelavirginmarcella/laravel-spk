<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

use App\Http\Controllers\PustakawanController;

Route::get('pustakawan', [PustakawanController::class, 'index'])->name('pustakawan.index');
Route::get('pustakawan/create', [PustakawanController::class, 'create'])->name('pustakawan.create');
Route::post('pustakawan', [PustakawanController::class, 'store'])->name('pustakawan.store');
Route::get('pustakawan/{id}/edit', [PustakawanController::class, 'edit'])->name('pustakawan.edit');
Route::put('pustakawan/{id}', [PustakawanController::class, 'update'])->name('pustakawan.update');
Route::delete('pustakawan/{id}', [PustakawanController::class, 'destroy'])->name('pustakawan.destroy');
// Tambahan route untuk edit, update, delete jika diperlukan

use App\Http\Controllers\DataAlternatifController;

Route::get('data_alternatif', [DataAlternatifController::class, 'index'])->name('data_alternatif.index');
Route::get('data_alternatif/create', [DataAlternatifController::class, 'create'])->name('data_alternatif.create');
Route::post('data_alternatif', [DataAlternatifController::class, 'store'])->name('data_alternatif.store');
Route::get('data_alternatif/{id}/edit', [DataAlternatifController::class, 'edit'])->name('data_alternatif.edit');
Route::put('data_alternatif/{id}', [DataAlternatifController::class, 'update'])->name('data_alternatif.update');
Route::delete('data_alternatif/{id}', [DataAlternatifController::class, 'destroy'])->name('data_alternatif.destroy');

use App\Http\Controllers\TopsisController;

Route::get('topsis', [TopsisController::class, 'index'])->name('topsis.index');

