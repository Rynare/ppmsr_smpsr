<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();

            // data santri
            $table->string('nama_santri', 255);
            $table->integer('tahun_masuk_ppm', 4);
            $table->integer('anak_ke', 2);
            $table->integer('jumlah_saudara', 2);
            $table->bigInteger('no_hp_santri', 12);
            $table->string('email_santri', 255)->unique();
            $table->text('alamat_santri');
            $table->string('tempat_lahir_santri', 100);
            $table->date('tanggal_lahir_santri');
            $table->integer('kode_pos', 5);
            $table->string('bahasa_asing');
            $table->string('facebook');
            $table->string('fakultas', 100);
            $table->string('gelar_saat_lulus', 20);
            $table->enum('golongan_darah', ['a', 'b', 'ab', 'o']);
            $table->string('instagram');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->number('jumlah_hafalan', 2);
            $table->string('keahlian', 255);
            $table->enum('pendidikan', ['d3,d4,s1']);
            $table->string('prestasi');
            $table->string('riwayat_penyakit');
            $table->enum('status_mubaligh', ['sudah', 'belum']);
            $table->string('universitas');
            $table->enum('status_rumah', ['milik sendiri', 'milik orangtua', 'sewa/kontrak', 'lainnya']);

            // data ayah
            $table->string('nama_ayah', 255);
            $table->enum('status_ayah', ['masih hidup', 'sudah meninggal']);
            $table->string('tempat_lahir_ayah', 100);
            $table->date('tanggal_lahir_ayah');
            $table->enum('pendidikan_ayah', ['SD', 'SLTP', 'SLTA/Sederajat', 'D1', 'D2', 'D3', 'Sarjana/D4', 'S2', 'S3']);
            $table->string('pekerjaan_ayah')->nullable();
            $table->bigInteger('penghasilan_ayah', 12)->nullable();
            $table->bigInteger('no_hp_ayah', 12)->nullable();

            // data ibu
            $table->string('nama_ibu', 255);
            $table->enum('status_ibu', ['masih hidup', 'sudah meninggal']);
            $table->string('tempat_lahir_ibu', 100);
            $table->date('tanggal_lahir_ibu');
            $table->enum('pendidikan_ibu', ['SD', 'SLTP', 'SLTA/Sederajat', 'D1', 'D2', 'D3', 'Sarjana/D4', 'S2', 'S3']);
            $table->string('pekerjaan_ibu')->nullable();
            $table->bigInteger('penghasilan_ibu', 12)->nullable();
            $table->bigInteger('no_hp_ibu', 12)->nullable();

            // data wali / pembiaya sekolah
            $table->string('nama_wali', 255);
            $table->text('alamat_wali');
            $table->bigInteger('no_hp_wali', 12);
            $table->string('pekerjaan_wali');
            $table->date('tanggal_lahir_wali');
            $table->string('tempat_lahir_wali', 100);
            $table->string('alamat_orang_tua');

            // data imam
            $table->string('nama_imam_kelompok');
            $table->bigInteger('no_hp_imam', 12);
            $table->string('asal_kelompok_imam');
            $table->text('alamat_imam');

            //data sambung
            $table->string('asal_daerah_sambung', 100);
            $table->string('asal_desa_sambung', 100);
            $table->string('asal_kelompok_sambung', 255);

            // data khusus
            $table->string('kabupaten');
            $table->string('kartu_keluarga');
            $table->string('ktp');
            $table->string('surat_sambung');
            $table->string('pas_foto');
            $table->enum('status_registrasi', ['pending', 'diterima', 'ditolak'])->default('pending');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('santris');
    }
};
