<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GelombangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'pages.admin.riwayat-gelombang.riwayat-gelombang',
            [
                'pageTitle' => "Riwayat Gelombang - SMPSR PPM Syafiur Rohman",
                "gelombangs" => Gelombang::all(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nama_gelombang" => "required|string",
            "angkatan" => "required|integer",
        ], [
            "required" => ":attribute harus diisi",
            "string" => ":attribute harus berupa teks",
            "integer" => ":attribute harus berisi angka",
        ]);

        $gelombang_aktif = Gelombang::all()->where("closed", 0)->first();

        // return $request->all();
        try {
            Gelombang::create($request->all());
            if ($gelombang_aktif) {
                $gelombang_aktif->update(['closed' => 1, 'closed_at' => Carbon::now()]);
            }
        } catch (\Throwable $th) {
            return redirect()->back();
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Gelombang $gelombang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function close(Gelombang $gelombang)
    {
        $gelombang->update(['closed' => 1, 'closed_at' => Carbon::now()]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gelombang $gelombang)
    {
        $gelombang->delete();
    }
}
