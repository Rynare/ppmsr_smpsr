<?php

namespace App\Exports;

use App\Models\Santri;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SantriDiterimaExport implements FromView
{

    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $santri = Santri::where('status_registrasi', 'diterima')->get();
        return view('pages.admin.dashboard.unduh-santri-diterima', [
            'santris' => $santri,
        ]);
    }
}
