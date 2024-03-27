<?php

namespace App\Http\Controllers;

use App\Exports\SantriDiterimaExport;
use App\Mail\prepareInterview;
use App\Mail\SantriDiterima;
use App\Models\Gelombang;
use App\Models\Role;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\TemplateProcessor;

class SantriController extends Controller
{
    public function create(Request $request)
    {
        $gelombang = Gelombang::all()->where('deleted', 0)->first();
        if (!$gelombang) {
            return redirect()->back()->withErrors([
                'swal' => ['title' => 'Pendaftaran sedang ditutup!', 'icon' => 'error']
            ]);
        }


        if ($request->hasCookie('id_santri')) {
            $id_santri = $request->cookie('id_santri');
            $santri = Santri::find($id_santri);
            if (!$santri) {
                $cookie = Cookie::forget('id_santri');
                return response()->view('pages.users.daftar.daftar', [
                    'pageTitle' => 'Pendaftaran - SMPSR PPM Syafiur Rohman'
                ])->withCookie($cookie);;
            }
            return view('pages.users.daftar.done')->with([
                'pageTitle' => 'Sukses Daftar - SMPSR PPM Syafiur Rohman',
                'nama_santri' => $santri->nama_santri,
                'email_santri' => $santri->email_santri,
            ]);
        } else {
            return view('pages.users.daftar.daftar')->with([
                'pageTitle' => 'Pendaftaran - SMPSR PPM Syafiur Rohman'
            ]);
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_santri' => 'required|string|max:100|regex:/^[a-zA-Z.`\s]+$/',
            'tahun_masuk_ppm' => 'required|integer|digits:4|min:2000|max:2100',
            'anak_ke' => ['required', 'integer', 'min:1', 'max:20', function ($attribute, $value, $fail) use ($request) {
                $jumlah_saudara = $request->input('jumlah_saudara');
                if ($value > $jumlah_saudara) {
                    $fail("Input $attribute harus lebih kecil dari jumlah saudara.");
                }
            }],
            'jumlah_saudara' => 'required|integer|min:1|max:20',
            'no_hp_santri' => 'required|digits_between:10,12',
            'email_santri' => 'required|email|unique:santris|max:255',
            'alamat_santri' => 'required|string',
            'tempat_lahir_santri' => 'required|string|max:100',
            'tanggal_lahir_santri' => 'required|date',
            'kode_pos' => 'required|integer|digits:5',
            'bahasa_asing' => 'required|string',
            'facebook' => 'nullable|string',
            'fakultas' => 'nullable|string|max:100',
            'gelar_saat_lulus' => 'nullable|string|max:20',
            'golongan_darah' => 'required|in:a,b,ab,o',
            'instagram' => 'nullable|string',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'jumlah_hafalan' => 'nullable|integer|min:1|max:30',
            'keahlian' => 'nullable|string|max:255',
            'pendidikan' => 'required|in:d3,d4,s1',
            'prestasi' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'status_mubaligh' => 'required|in:sudah,belum',
            'universitas' => 'nullable|string',
            'status_rumah' => 'required|in:milik sendiri,milik orangtua,sewa/kontrak,lainnya',

            // Validasi Data Ayah
            'nama_ayah' => 'required|string|max:100|regex:/^[a-zA-Z.`\s]+$/',
            'status_ayah' => 'required|in:masih hidup,sudah meninggal',
            'tempat_lahir_ayah' => 'required|string|max:50',
            'tanggal_lahir_ayah' => 'required|date',
            'pendidikan_ayah' => 'required|in:sd,sltp,slta/sederajat,d1,d2,d3,sarjana/d4,s2,s3',
            'pekerjaan_ayah' => 'nullable|string',
            'penghasilan_ayah' => 'nullable|integer|min:100000',
            'no_hp_ayah' => 'nullable|digits_between:10,12',

            // Validasi Data Ibu
            'nama_ibu' => 'required|string|max:100|regex:/^[a-zA-Z.`\s]+$/',
            'status_ibu' => 'required|in:masih hidup,sudah meninggal',
            'tempat_lahir_ibu' => 'required|string|max:100',
            'tanggal_lahir_ibu' => 'required|date',
            'pendidikan_ibu' => 'required|in:sd,sltp,slta/sederajat,d1,d2,d3,sarjana/d4,s2,s3',
            'pekerjaan_ibu' => 'nullable|string',
            'penghasilan_ibu' => 'nullable|integer|min:100000',
            'no_hp_ibu' => 'nullable|digits_between:10,12',

            // Validasi Data Wali/Pembiaya Sekolah
            'nama_wali' => 'required|string|max:100|regex:/^[a-zA-Z.`\s]+$/',
            'alamat_wali' => 'required|string',
            'no_hp_wali' => 'required|digits_between:10,12',
            'pekerjaan_wali' => 'required|string',
            'tanggal_lahir_wali' => 'required|date',
            'tempat_lahir_wali' => 'required|string|max:100',
            'alamat_orang_tua' => 'required|string',

            // Validasi Data Imam
            'nama_imam_kelompok' => 'required|string|max:100|regex:/^[a-zA-Z.`\s]+$/',
            'no_hp_imam' => 'required|digits_between:10,12',
            'asal_kelompok_imam' => 'required|string',
            'alamat_imam' => 'required|string',

            // Validasi Data Sambung
            'asal_daerah_sambung' => 'required|string|max:50',
            'asal_desa_sambung' => 'required|string|max:50',
            'asal_kelompok_sambung' => 'required|string|max:100',

            // Validasi Data Khusus
            'kabupaten' => 'required|string',
            'kartu_keluarga' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'pas_foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'surat_sambung' => 'required|file|mimes:pdf|max:5120'
        ];

        // Optional custom messages
        $customMessages = [
            'required' => ':attribute harus diisi.',
            'email' => ':attribute harus berupa email yang valid.',
            'unique' => ':attribute sudah digunakan.',
            'in' => ':attribute tidak valid.',
            'integer' => ':attribute harus berupa angka.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'max' => ':attribute tidak boleh lebih dari :max karakter.',
            'min' => ':attribute harus minimal :min karakter.',
            'digits' => ':attribute harus berupa :digits digit.',
            'digits_between' => ':attribute harus memiliki panjang antara :min dan :max digit.',
            'string' => ':attribute harus berupa teks.',
            'mimes' => ':attribute harus berupa file dengan tipe: :values.',
            'image' => ':attribute harus berupa file gambar.',
            'file' => ':attribute harus berupa file.',
        ];


        // Gunakan validator
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check jika validasi gagal
        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            $errors = [
                'swal' => [
                    'icon' => 'error',
                    'title' => 'Error',
                    'text' => $errors,
                ]
            ];
            return redirect()->back()->withErrors($errors);
        }

        // Upload Kartu Keluarga
        if ($request->hasFile('kartu_keluarga')) {
            $kartu_keluarga = $request->file('kartu_keluarga');
            $kartu_keluarga_name = $this->generateUniqueFileName($kartu_keluarga);
            $kartu_keluarga->move(public_path('storage/santri/'), $kartu_keluarga_name);
        } else {
            $kartu_keluarga_name = null;
        }

        // Upload KTP
        if ($request->hasFile('ktp')) {
            $ktp = $request->file('ktp');
            $ktp_name = $this->generateUniqueFileName($ktp);
            $ktp->move(public_path('storage/santri/'), $ktp_name);
        } else {
            $ktp_name = null;
        }

        // Upload Pas Foto
        if ($request->hasFile('pas_foto')) {
            $pas_foto = $request->file('pas_foto');
            $pas_foto_name = $this->generateUniqueFileName($pas_foto);
            $pas_foto->move(public_path('storage/santri'), $pas_foto_name);
        } else {
            $pas_foto_name = null;
        }

        // Upload Surat Sambung
        if ($request->hasFile('surat_sambung')) {
            $surat_sambung = $request->file('surat_sambung');
            $surat_sambung_name = $this->generateUniqueFileName($surat_sambung);
            $surat_sambung->move(public_path('storage/santri'), $surat_sambung_name);
        } else {
            $surat_sambung_name = null;
        }

        $datas = $request->all();

        $angkatan = Gelombang::all()->where('deleted', 0)->first();
        $tahun_angkatan = $angkatan->angkatan;
        $nama_gelombang = $angkatan->nama_gelombang;

        $datas['kartu_keluarga'] = $kartu_keluarga_name;
        $datas['ktp'] = $ktp_name;
        $datas['pas_foto'] = $pas_foto_name;
        $datas['surat_sambung'] = $surat_sambung_name;
        $datas['no_hp_santri'] = 62 . $request->no_hp_santri;
        $datas['no_hp_ayah'] = 62 . $request->no_hp_ayah;
        $datas['no_hp_ibu'] = 62 . $request->no_hp_ibu;
        $datas['no_hp_wali'] = 62 . $request->no_hp_wali;
        $datas['no_hp_imam'] = 62 . $request->no_hp_imam;
        $datas['angkatan'] = $tahun_angkatan;
        $datas['gelombang'] = $nama_gelombang;

        $santri = Santri::create($datas);

        $santri_id = $santri->id;

        // menit x jam x hari = 1 minggu
        $time = 60 * 24 * 7;

        $cookie = Cookie::make('id_santri', $santri_id, $time);

        Mail::to($santri->email_santri)->send(new prepareInterview($santri_id));

        // Redirect dengan pesan sukses
        return redirect()->back()->withCookie($cookie);
    }
    private function generateUniqueFileName($file)
    {
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = pathinfo($originalName, PATHINFO_FILENAME);
        $filename = Str::slug($filename) . '_' . uniqid() . '.' . $extension;
        return $filename;
    }

    public function acceptSantri(Santri $santri)
    {
        $santri->update(['status_registrasi' => 'diterima']);
        $role = Role::all()->where('role', 'santri')->first();


        $user = User::create([
            'name' => $santri->nama_santri,
            'email' => $santri->email_santri,
            'password' => bcrypt(env('SALT') . $santri->email_santri . env('SALT')),
            'role' => $role->id,
        ]);

        Mail::to($user->email)->send(new SantriDiterima($user->name, $user->email, $user->email));
        return redirect()->back();
    }

    public function rejectSantri(Santri $santri)
    {
        $santri->update([
            'status_registrasi' => 'ditolak'
        ]);
        return redirect()->back();
    }

    public function generatePDF($id, $email)
    {
        $santri = Santri::find($id);
        if ($santri->email_santri != $email) {
            return redirect('/');
        }
        // return view('pages.users.profile.pdf')->with(['santri' => $santri]);

        $pdf = PDF::loadView('pages.users.profile.pdf', ['santri' => $santri, 'pageTitle' => 'PDF'])->setPaper('a4', 'portrait');

        return $pdf->download($santri->nama_santri . '.pdf');
        // return $pdf->stream();
    }


    public function myProfile()
    {
        $email = auth()->user()->email;
        $santri = Santri::all()->where('email_santri', $email)->first();
        $status = $santri->status_registrasi;

        if ($status == 'diterima') {
            return view('pages.users.profile.profile', [
                'pageTitle' => 'Profil - SMPSR PPM Syafiur Rohman',
                "santri" => $santri,
            ]);
        } elseif ($status == 'pending') {
            return view('pages.users.profile.profile', [
                'pageTitle' => 'Status Wawancara - SMPSR PPM Syafiur Rohman',
                'status' => $status,
            ]);
        }
    }

    public function listSantriDiterima()
    {
        $gelombang = Gelombang::all()->where('closed', 0)->first();
        $santri = Santri::all()->where('angkatan', $gelombang->angkatan)->where('status_registrasi', 'diterima');
        return view('pages.list-santri-diterima', ['santris' => $santri, 'pageTitle' => 'Daftar santri diterima']);
    }

    public function downloadSantri()
    {
        $gelombang = Gelombang::all()->where('closed', 0)->first();
        if (!$gelombang) {
            return redirect()->back();
        }
        $santri_diterima = Santri::all()->where('status_registrasi', 'diterima')->where('gelombang', $gelombang->nama_gelombang)->count();
        if ($santri_diterima >= 1) {
            $uniq_gelombang = 'angkatan_' . $gelombang->angkatan . '_' . $gelombang->nama_gelombang;
            return Excel::download(new SantriDiterimaExport(), 'santri_diterima_' . $uniq_gelombang . '.xlsx');
        } else {
            return redirect()->back();
        }
    }
}
