<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $request->validate([
            'old-email' => 'required',
            'email' => 'required'
        ], [
            'required' => ':attribute tidak boleh kosong'
        ]);
        $old_email = $request->get('old-email');
        $user = User::all()->where('email', $old_email)->first();
        $santri = Santri::all()->where('email_santri', $old_email)->first();
        if ($user->id != 1) {
            $user->update(
                ['email' => random_int(88888888, 9999999999) . now() . '@gmail.com']
            );

            $validator = Validator::make($request->all(), ['email' => 'unique:users,email'], ['unique' => ':attribute sudah terdaftar/tidak tersedia']);

            // Check jika validasi gagal
            if ($validator->fails()) {
                $user->update(
                    ['email' => $request->get('old-email')]
                );
                return redirect()->back();
            }

            $user->update([
                'email' => $request->email,
                'password' => bcrypt(env('SALT') . $request->email . env('SALT'))
            ]);
            $santri->update([
                'email_santri' => $request->email,
            ]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id != 1) {
            $user->delete();
        }
        return redirect()->back();
    }
}
