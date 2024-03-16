<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accs_admin = User::whereHas('roles', function ($query) {
            $query->where('role', 'admin');
        })->where('isRoot', '!=', true)->get();

        $accs_santri = User::whereHas('roles', function ($query) {
            $query->where('role', 'santri');
        })->get();


        return view('pages.admin.data-admin.data-admin')->with([
            'pageTitle' => 'Daftar Akun',
            'accs_admin' => $accs_admin,
            'accs_santri' => $accs_santri,
            'jumlah_admin' => $accs_admin->count(),
            'jumlah_santri' => $accs_santri->count(),
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
