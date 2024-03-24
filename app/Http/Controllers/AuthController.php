<?php

namespace App\Http\Controllers;

use App\Mail\forgotPasswordSendOtp;
use App\Models\PasswordResetToken;
use App\Models\Pengumuman;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $pengumumans = Pengumuman::all();
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
            $santri = Santri::all()->where('email_santri', $request->old_email)->first();

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

    public function forgotPasswordSendOtp(Request $request)
    {
        $request->validate([
            'email' => 'email|required'
        ], [
            'required' => ':attribute tidak boleh kosong',
            'email' => ':attribute harus berupa email address'
        ]);

        $email = $request->email;
        $user = User::where('email', $email)->first();
        $santri = Santri::where('email_santri', $email)->first();

        if ($user && $santri) {
            $otp = Str::random(6);
            PasswordResetToken::create([
                'email' => $email,
                'token' => $otp,
            ]);

            Mail::to($email)->send(new forgotPasswordSendOtp($email, $otp));
        } else {
            return redirect()->back()->withErrors([
                'swal' => [
                    'title' => 'Error!',
                    'icon' => "error",
                    'text' => 'Email tidak terdaftar'
                ]
            ]);
        }

        return redirect()->back()->withErrors([
            'swal' => [
                'title' => 'Terkirim',
                'icon' => "success",
                'text' => 'Silahkan cek email anda dan ganti kata sandi'
            ]
        ]);
    }
    public function forgotPassword($email, $otp)
    {
        $token = PasswordResetToken::where('email', $email)
            ->where('token', $otp)
            ->first();

        // Lakukan sesuatu jika token ditemukan
        if ($token) {
            return view('pages.auth.forgot-pass.forgot-pass', [
                'email' => $token->email,
                'otp' => $token->token,
            ]);
        } else {
            return redirect()->route('signin')->withErrors([
                'swal' => [
                    'title' => 'Error',
                    'icon' => 'error',
                    'text' => 'Kode OTP tidak ditemukan',
                ]
            ]);
        }
    }
    public function submitForgotPassword(Request $request)
    {
        $rules = [
            'otp' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ];
        $customMessages = [
            'required' => ':attribute tidak boleh kosong',
            'email' => ':attribute harus berupa email'
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('signin')->withErrors([
                'swal' => [
                    'title' => 'Error',
                    'icon' => 'error',
                    'text' => 'Akses dilarang',
                ]
            ]);
        }

        $resetPw = PasswordResetToken::where('email', $request->email)
            ->where('token', $request->otp)
            ->first();


        $user = User::all()->where('email', $resetPw->email)->first();
        $user->update([
            'password' => bcrypt(env('SALT') . $request->password . env('SALT'))
        ]);
        $resetPw->delete();

        return redirect()->route('signin')->withErrors([
            'swal' => [
                'title' => 'Sukses',
                'icon' => 'success',
                'text' => 'Password berhasil diubah',
            ]
        ]);
    }
}
