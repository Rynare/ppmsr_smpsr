<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function signup()
    {
        return view('pages.auth.signup.signup');
    }
    public function signin()
    {
        $pengumumans = Pengumuman::all()->where('hidden', false);
        return view('pages.auth.signin.signin')->with([
            'pageTitle' => 'Masuk',
            'pengumumans' => $pengumumans,
        ]);
    }

    public function signinValidation(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $credentials['password'] = env('SALT') . $credentials['password'] . env('SALT');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->roles->role == 'admin') {
                return redirect()->intended('/dashboard');
            } else if (auth()->user()->roles->role == 'santri') {
                return redirect()->intended('/myProfile');
            }
        }

        return back()->withErrors([
            'swalToast' => [
                'icon' => 'error',
                'title' => 'Username atau password salah!',
            ]
        ])->withInput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function changeEmail(Request $request)
    {
        $request->validate(['new_email' => 'required|unique:users,email'], ['required' => ':attribute tidak boleh kosong', 'unique' => ':attribute sudah digunakan/tidak tersedia']);
        $user = User::find(auth()->user()->id);

        if ($user->email != $request->old_email) {
            return redirect()->back();
        }

        if ($user->roles->role == 'santri') {
            $santri = Santri::all()->where('email', $request->old_email)->first();

            $user->update(
                ['email' => random_int(88888888, 9999999999) . now() . '@gmail.com']
            );

            $validator = Validator::make($request->all(), ['new_email' => 'unique:santris,email_santri'], ['unique' => ':attribute sudah terdaftar/tidak tersedia']);

            // Check jika validasi gagal
            if ($validator->fails()) {
                $user->update(
                    ['email' => $request->get('old_email')]
                );
                return redirect()->back();
            }

            $santri->update([
                'email_santri' => $request->new_email,
            ]);
        }

        $user->update([
            'email' => $request->new_email
        ]);

        return redirect()->back();
    }
    public function changePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $user->update([
            'password' => bcrypt(env('SALT') . $request->new_password . env('SALT'))
        ]);
        auth()->logout();
        return redirect()->intended('/');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
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

    public function signout()
    {
        Auth::logout();
        return redirect('/');
    }
}
