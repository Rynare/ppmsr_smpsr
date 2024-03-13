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
            $table->string('nama_santri')->length(100);
            $table->integer('tahun_masuk_ppm')->length(4);
            $table->integer('anak_ke')->length(2);
            $table->integer('jumlah_saudara')->length(2);
            $table->bigInteger('no_hp_santri')->length(14);
            $table->string('email_santri')->length(255)->unique();
            $table->text('alamat_santri');
            $table->string('tempat_lahir_santri')->length(100);
            $table->date('tanggal_lahir_santri');
            $table->integer('kode_pos')->length(5);
            $table->string('bahasa_asing');
            $table->string('facebook');
            $table->string('fakultas')->length(100);
            $table->string('gelar_saat_lulus')->length(20);
            $table->enum('golongan_darah', ['a', 'b', 'ab', 'o']);
            $table->string('instagram');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->integer('jumlah_hafalan')->length(2);
            $table->string('keahlian')->length(255);
            $table->enum('pendidikan', ['d3', 'd4', 's1']);
            $table->string('prestasi');
            $table->string('riwayat_penyakit');
            $table->enum('status_mubaligh', ['sudah', 'belum']);
            $table->string('universitas');
            $table->enum('status_rumah', ['milik sendiri', 'milik orangtua', 'sewa/kontrak', 'lainnya']);

            // data ayah
            $table->string('nama_ayah')->length(100);
            $table->enum('status_ayah', ['masih hidup', 'sudah meninggal']);
            $table->string('tempat_lahir_ayah')->length(50);
            $table->date('tanggal_lahir_ayah');
            $table->enum('pendidikan_ayah', ['sd', 'sltp', 'slta/sederajat', 'd1', 'd2', 'd3', 'sarjana/d4', 's2', 's3']);
            $table->string('pekerjaan_ayah')->nullable();
            $table->bigInteger('penghasilan_ayah')->length(14)->nullable();
            $table->bigInteger('no_hp_ayah')->length(14)->nullable();

            // data ibu
            $table->string('nama_ibu')->length(100);
            $table->enum('status_ibu', ['masih hidup', 'sudah meninggal']);
            $table->string('tempat_lahir_ibu')->length(100);
            $table->date('tanggal_lahir_ibu');
            $table->enum('pendidikan_ibu', ['sd', 'sltp', 'slta/sederajat', 'd1', 'd2', 'd3', 'sarjana/d4', 's2', 's3']);
            $table->string('pekerjaan_ibu')->nullable();
            $table->bigInteger('penghasilan_ibu')->length(14)->nullable();
            $table->bigInteger('no_hp_ibu')->length(14)->nullable();

            // data wali / pembiaya sekolah
            $table->string('nama_wali')->length(100);
            $table->text('alamat_wali');
            $table->bigInteger('no_hp_wali')->length(14);
            $table->string('pekerjaan_wali');
            $table->date('tanggal_lahir_wali');
            $table->string('tempat_lahir_wali')->length(100);
            $table->string('alamat_orang_tua');

            // data imam
            $table->string('nama_imam_kelompok');
            $table->bigInteger('no_hp_imam')->length(14);
            $table->string('asal_kelompok_imam');
            $table->text('alamat_imam');

            //data sambung
            $table->string('asal_daerah_sambung')->length(50);
            $table->string('asal_desa_sambung')->length(50);
            $table->string('asal_kelompok_sambung')->length(100);

            // data khusus
            $table->string('kabupaten');
            $table->string('kartu_keluarga');
            $table->string('ktp');
            $table->string('surat_sambung');
            $table->string('pas_foto');
            $table->string('angkatan');
            $table->enum('status_registrasi', ['pending', 'diterima', 'ditolak'])->default('pending');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('santris');
    }
};
