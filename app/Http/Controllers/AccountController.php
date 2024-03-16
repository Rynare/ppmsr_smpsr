<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
     * createNewAdmin a newly created resource in storage.
     */
    public function createNewAdmin(Request $request)
    {
        $request->validate(
            ['email' => 'unique:users,email'],
            ['unique' => ':attribute sudah digunakan']
        );
        $role_admin = Role::all()->where('role', 'admin')->first()->id;
        User::create([
            'name' => 'admin',
            'email' => $request->email,
            'password' => bcrypt(env('SALT') . $request->email . env('SALT')),
            'role' => $role_admin,
        ]);
        return redirect()->back();
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
    public function update(Request $request)
    {
        $old_email = $request->get('old-email');
        $user = User::all()->where('email', $old_email)->first();
        $user->update([
            'email' => $request->email,
            'password' => bcrypt(env('SALT') . $request->email . env('SALT'))
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
