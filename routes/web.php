<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataSantriController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SantriController;
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
    Route::get('/signout', [AuthController::class, 'signout'])->name('signout');

    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/dashboard/buka-gelombang', [GelombangController::class, 'store'])->name('admin.buka-gelombang');
        Route::get('/dashboard/tutup-gelombang/{gelombang}', [GelombangController::class, 'close'])->name('admin.tutup-gelombang');

        Route::post('/dashboard/buat-pengumuman', [PengumumanController::class, 'store'])->name('admin.buat-pengumuman');
        Route::post('/dashboard/ubah-pengumuman', [PengumumanController::class, 'update'])->name('admin.ubah-pengumuman');
        Route::post('/dashboard/delete-pengumuman', [PengumumanController::class, 'destroy'])->name('admin.hapus-pengumuman');

        Route::get('/account', [AccountController::class, 'index'])->name('admin.account');
        Route::get('/data-santri', [DataSantriController::class, 'index'])->name('admin.data-santri');
        Route::get('/riwayat-gelombang', [GelombangController::class, 'index'])->name('admin.riwayat-gelombang');
        Route::get('/riwayat-gelombang/delete', [GelombangController::class, 'destroy'])->name('admin.hapus.riwayat-gelombang');
    });
});
