<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class SantriController extends Controller
{
    public function create()
    {
        return view('pages.users.daftar.daftar')->with([
            'pageTitle' => 'Form Pendaftaran'
        ]);
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
            'email_santri' => 'required|email|unique:nama_tabel|unique:email_santri|max:255',
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
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Upload Kartu Keluarga
        if ($request->hasFile('kartu_keluarga')) {
            $kartu_keluarga = $request->file('kartu_keluarga');
            $kartu_keluarga_name = time() . '_' . $kartu_keluarga->getClientOriginalName();
            $kartu_keluarga->move(public_path('storage/santri/'), $kartu_keluarga_name);
        } else {
            $kartu_keluarga_name = null;
        }

        // Upload KTP
        if ($request->hasFile('ktp')) {
            $ktp = $request->file('ktp');
            $ktp_name = time() . '_' . $ktp->getClientOriginalName();
            $ktp->move(public_path('storage/santri/'), $ktp_name);
        } else {
            $ktp_name = null;
        }

        // Upload Pas Foto
        if ($request->hasFile('pas_foto')) {
            $pas_foto = $request->file('pas_foto');
            $pas_foto_name = time() . '_' . $pas_foto->getClientOriginalName();
            $pas_foto->move(public_path('storage/santri'), $pas_foto_name);
        } else {
            $pas_foto_name = null;
        }

        // Upload Surat Sambung
        if ($request->hasFile('surat_sambung')) {
            $surat_sambung = $request->file('surat_sambung');
            $surat_sambung_name = time() . '_' . $surat_sambung->getClientOriginalName();
            $surat_sambung->move(public_path('storage/santri'), $surat_sambung_name);
        } else {
            $surat_sambung_name = null;
        }

        $request['kartu_keluarga'] = $kartu_keluarga_name;
        $request['ktp'] = $ktp_name;
        $request['pas_foto'] = $pas_foto_name;
        $request['no_hp_santri'] = 62 . $request->no_hp_santri;
        $request['no_hp_ayah'] = 62 . $request->no_hp_ayah;
        $request['no_hp_ibu'] = 62 . $request->no_hp_ibu;
        $request['no_hp_wali'] = 62 . $request->no_hp_wali;
        $request['no_hp_imam'] = 62 . $request->no_hp_imam;

        $santri = new Santri($request->all());
        $santri->save();

        $santri_id = $santri->id;

        Cookie::make('id_santri', $santri_id);

        // Redirect dengan pesan sukses
        return redirect()->route('santri-daftar.done')
            ->with('success', 'Santri berhasil ditambahkan.');
    }

    public function done(Request $request)
    {
        $id_santri = $request->cookie('id_santri');
        $santri = Santri::find($id_santri);
        return view('pages.users.daftar.done')->with([
            'pageTitle' => 'Selesai',
            'nama_santri' => $santri->nama_santri,
            'email_santri' => $santri->email_santri,
        ]);
    }
}
