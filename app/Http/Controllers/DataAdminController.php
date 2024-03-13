<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accs = User::all()->load('roles');
        $accs_admin = User::all()->where('role', 'admin');
        $accs_santri = User::all()->where('role', 'santri');

        return view('pages.admin.data-admin.data-admin')->with([
            'pageTitle' => 'Data Admin',
            'accs' => $accs,
            'jumlah_admin' => $accs_admin->count(),
            'jumlah_Santri' => $accs_santri->count(),
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
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}