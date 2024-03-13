<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use Illuminate\Http\Request;

class GelombangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        Gelombang::create($request->all());
        return back()->with("success", "");
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
    public function update(Request $request, Gelombang $gelombang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gelombang $gelombang)
    {
        //
    }
}
