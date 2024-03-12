<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/daftar', [SantriController::class, 'create'])->name('santri-daftar');
Route::post('/daftar', [SantriController::class, 'store'])->name('santri-daftar.store');
Route::get('/selesai-daftar', [SantriController::class, 'done'])->name('santri-daftar.done');

Route::get('/', function () {
    if ((auth()->user()->role ?? false) == 'admin' || (auth()->user()->isRoot ?? false) == true || (auth()->user()->isRoot ?? false) == 1) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('signin');
    }
});

Route::middleware('guest')->group(function () {
    Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
    Route::post('/signin', [AuthController::class, 'signinValidation'])->name('signin.submit');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/signup', [AuthController::class, 'create'])->name('signup.create');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/signout', [AuthController::class, 'signout'])->name('signout');
});
