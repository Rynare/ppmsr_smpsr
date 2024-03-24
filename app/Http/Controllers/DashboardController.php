<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\Pengumuman;
use App\Models\Santri;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::all()->where('id', '!=', 1);

        $gelombang = Gelombang::all()->where('closed', 0)->first();
        if ($gelombang) {
            $nama_gelombang = $gelombang->nama_gelombang;
            $id_gelombang = $gelombang->id;
            $santri = Santri::where('status_registrasi', 'interview')
                ->orderBy('created_at', 'asc') // Urutkan dari yang terlama
                ->get();;
            $jumlah_santri = $santri->count();
        }

        return view("pages.admin.dashboard.dashboard")->with([
            'pageTitle' => 'Dashboard',
            'pengumumans' => $pengumumans,
            'nama_gelombang' => $nama_gelombang ?? 'Tidak ada gelombang terbuka',
            'id_gelombang' => $id_gelombang ?? false,
            'jumlah_terdaftar' => $jumlah_santri ?? 0,
            'santris' => $santri ?? null,
            'jumlah_interview' => ($santri ?? false) ? $santri->count() : 0,
        ]);
    }
}
