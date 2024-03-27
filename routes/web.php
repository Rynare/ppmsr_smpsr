<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataSantriController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SantriController;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/daftar', [SantriController::class, 'create'])->name('santri-daftar');
Route::post('/daftar', [SantriController::class, 'store'])->name('santri-daftar.store');
Route::get('/santri-diterima', [SantriController::class, 'listSantriDiterima'])->name('santri.list-diterima');
Route::get('/biodata/download/{id}/{email}', [SantriController::class, 'generatePDF'])->name('santri.biodata.PDF');

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
    Route::post('/forgot-password-send-otp', [AuthController::class, 'forgotPasswordSendOtp'])->name('forgot-password.send-otp');
    Route::get('/forgot-password/{email}/{otp}', [AuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('/forgot-password/{email}/{otp}', [AuthController::class, 'submitForgotPassword'])->name('forgot-password.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/signout', [AuthController::class, 'signout'])->name('signout');
    Route::post('/user/change-email', [AuthController::class, 'changeEmail'])->name('user.change-email');
    Route::post('/user/change-password', [AuthController::class, 'changePassword'])->name('user.change-password');

    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/dashboard/buka-gelombang', [GelombangController::class, 'store'])->name('admin.buka-gelombang');
        Route::get('/dashboard/tutup-gelombang/{gelombang}', [GelombangController::class, 'close'])->name('admin.tutup-gelombang');
        Route::get('/dashboard/terima-santri/{santri}', [SantriController::class, 'acceptSantri'])->name('admin.terima-santri');
        Route::get('/dashboard/tolak-santri/{santri}', [SantriController::class, 'rejectSantri'])->name('admin.tolak-santri');
        Route::get('/dashboard/download-santri', [SantriController::class, 'downloadSantri'])->name('admin.download-santri-diterima.excel');
        Route::get('/dashboard/publikasi-santri-siterima', function () {
            $pengumuman = Pengumuman::find(1);
            $pengumuman->update(['hidden' => false]);
            return redirect()->back();
        })->name('admin.publikasi-santri-diterima');
        Route::get('/dashboard/unpublikasi-santri-siterima', function () {
            $pengumuman = Pengumuman::find(1);
            $pengumuman->update(['hidden' => true]);
            return redirect()->back();
        })->name('admin.unpublikasi-santri-diterima');

        Route::post('/dashboard/buat-pengumuman', [PengumumanController::class, 'store'])->name('admin.buat-pengumuman');
        Route::post('/dashboard/ubah-pengumuman', [PengumumanController::class, 'update'])->name('admin.ubah-pengumuman');
        Route::get('/dashboard/delete-pengumuman/{pengumuman}', [PengumumanController::class, 'destroy'])->name('admin.hapus-pengumuman');

        Route::get('/account', [AccountController::class, 'index'])->name('admin.account');
        Route::post('/account/buat-akun-admin', [AccountController::class, 'createNewAdmin'])->name('admin.buat-akun-admin');
        Route::post('/account/akun-santri-change-email', [AccountController::class, 'update'])->name('admin.akun-santri.change-email');
        Route::get('/account/hapus-akun/{user}', [AccountController::class, 'destroy'])->name('admin.hapus-akun');

        Route::get('/data-santri', [DataSantriController::class, 'index'])->name('admin.data-santri');
        Route::get('/data-santri/hapus/{santri}', [DataSantriController::class, 'destroy'])->name('admin.data-santri.hapus');
        Route::get('/data-santri/angkatan/{angkatan}', [DataSantriController::class, 'indexAngkatan'])->name('admin.data-santri.angkatan');
        Route::get('/data-santri/download/{angkatan}', [DataSantriController::class, 'downloadExcelAngkatan'])->name('admin.data-santri.download.angkatan');
        Route::get('/riwayat-gelombang', [GelombangController::class, 'index'])->name('admin.riwayat-gelombang');
        Route::get('/riwayat-gelombang/delete', [GelombangController::class, 'destroy'])->name('admin.hapus.riwayat-gelombang');
    });

    Route::middleware('role:santri')->group(function () {
        Route::get('/myProfile', [SantriController::class, 'myProfile'])->name('santri.profile');
    });
});
