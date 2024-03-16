<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class DataSantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $angkatan = Santri::select('angkatan')->groupBy('angkatan')->orderBy('angkatan', 'desc')->pluck('angkatan');
        $santri = Santri::all()->where('angkatan', $angkatan[0]);
        return view("pages.admin.data-santri.data-santri")->with([
            'pageTitle' => 'Data Santri',
            'santris' => $santri,
            'list_angkatan' => $angkatan,
            'selected_angkatan' => $angkatan[0],
        ]);
    }
    public function indexAngkatan($angkatan)
    {
        $angkatans = Santri::select('angkatan')->groupBy('angkatan')->orderBy('angkatan', 'desc')->pluck('angkatan');
        $santri = Santri::all()->where('angkatan', $angkatan);
        return view("pages.admin.data-santri.data-santri")->with([
            'pageTitle' => 'Data Santri',
            'santris' => $santri,
            'list_angkatan' => $angkatans,
            'selected_angkatan' => $angkatan,
        ]);
    }
    public function downloadExcelAngkatan($angkatan)
    {
        $angkatans = Santri::select('angkatan')->groupBy('angkatan')->orderBy('angkatan', 'desc')->pluck('angkatan');
        $santri = Santri::all()->where('angkatan', $angkatan);
        return view("pages.admin.data-santri.data-santri")->with([
            'pageTitle' => 'Data Santri',
            'santris' => $santri,
            'list_angkatan' => $angkatans,
            'selected_angkatan' => $angkatan,
        ]);
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
