<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SantriByAngkatanExport;
use App\Mail\prepareInterview;
use Illuminate\Support\Facades\Mail;

class DataSantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $angkatan = Santri::select('angkatan')->groupBy('angkatan')->orderBy('angkatan', 'desc')->pluck('angkatan');
        $santri = Santri::all()->where('angkatan', $angkatan[0] ?? null);
        return view("pages.admin.data-santri.data-santri")->with([
            'pageTitle' => 'Data Santri - SMPSR PPM Syafiur Rohman',
            'santris' => $santri,
            'list_angkatan' => $angkatan,
            'selected_angkatan' => $angkatan[0] ?? null,
        ]);
    }
    public function indexAngkatan($angkatan)
    {
        $angkatans = Santri::select('angkatan')->groupBy('angkatan')->orderBy('angkatan', 'desc')->pluck('angkatan');
        $santri = Santri::all()->where('angkatan', $angkatan);
        return view("pages.admin.data-santri.data-santri")->with([
            'pageTitle' => 'Data Santri - SMPSR PPM Syafiur Rohman',
            'santris' => $santri,
            'list_angkatan' => $angkatans,
            'selected_angkatan' => $angkatan,
        ]);
    }
    public function downloadExcelAngkatan($angkatan)
    {
        return Excel::download(new SantriByAngkatanExport($angkatan), 'santri_angkatan_' . $angkatan . '.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Santri $santri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Santri $santri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Santri $santri)
    {
        //
    }

    public function search($angkatan)
    {
    }
}
