<?php

namespace App\Exports;

use App\Models\Santri;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SantriByAngkatanExport implements FromView
{

    protected $angkatan;

    public function __construct($angkatan)
    {
        $this->angkatan = $angkatan;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $header = array_keys(Santri::first()->getAttributes());
        $santri = Santri::where('angkatan', $this->angkatan)->get();
        return view('pages.admin.data-santri.export-angkatan', [
            'header' => $header,
            'santris' => $santri,
        ]);
    }
}
