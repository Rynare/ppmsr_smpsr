<?php

use App\Http\Controllers\SantriController;
use App\Http\Controllers\StorageController;
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

Route::get('/registrasi', [SantriController::class, 'create'])->name('santri-registrasi');
Route::post('/registrasi', [SantriController::class, 'store'])->name('santri-registrasi.store');
