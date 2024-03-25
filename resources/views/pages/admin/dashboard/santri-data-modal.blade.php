<div class="modal modal-lg  fade" id="santri-details" tabindex="-1" aria-labelledby="santri-detailsLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Gelombang: <span
                        id="gelombang"></span> (<span id="angkatan"></span>)</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="profile">
                    <h4 class="text-center mb-3 "> <i class="bi bi-person-circle"></i>
                        Biodata Santri</h4>
                    <div class="d-flex ">
                        <div profile-type="head" class="d-flex my-2 flex-column">
                            <div style="width:180px ;height:240px;"
                                class="d-flex align-items-center overflow-hidden justify-content-center bg-secondary rounded-2 ms-4">
                                <img src="" alt="pas_foto"
                                    onerror="this.src = '{{ asset('assets/santri-default-picture.png') }}'"
                                    style="width:100%">
                            </div>
                            <div class="d-flex flex-column row-gap-2 mt-3">
                                <ol>
                                    <a class="btn btn-warning mb-2 pt-0 pb-0" href=""
                                        style="text-transform:capitalize;" id="kartu_keluarga"><i
                                            class="bi bi-file-earmark-text"></i> Kartu
                                        Keluarga </a>
                                    <a class="btn btn-success mb-2 pt-0 pb-0" href=""
                                        style="text-transform:capitalize;" id="ktp"><i
                                            class="bi bi-person-vcard"></i> KTP</a>
                                    <a class="btn btn-info pt-0 pb-0" href="" style="text-transform:capitalize;"
                                        id="surat_sambung"><i class="bi bi-file-post"></i> Surat
                                        Sambung</a>
                                </ol>

                            </div>
                        </div>
                        <style>
                            .profile table :is(tr, td) {
                                height: 2em;
                            }

                            .profile table td:nth-child(1) {
                                font-weight: bold;
                            }

                            .profile table td:nth-child(2)::before {
                                content: ':';
                                margin-right: 4px;
                            }
                        </style>

                        <div class="flex-grow-1 ms-5">
                            <table class="" style="width: 100%;">
                                <tr>
                                    <td style="text-transform:capitalize;">Nama Santri</td>
                                    <td id="nama_santri" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Jenis Kelamin</td>
                                    <td id="jenis_kelamin" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Tempat Lahir</td>
                                    <td id="tempat_lahir_santri" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Tanggal Lahir</td>
                                    <td id="tanggal_lahir_santri" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Jumlah Saudara</td>
                                    <td id="jumlah_saudara" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Anak ke</td>
                                    <td id="anak_ke" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Perguruan Tinggi</td>
                                    <td id="universitas" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Pendidikan</td>
                                    <td id="pendidikan" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Fakultas/Jurusan</td>
                                    <td id="fakultas" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Gelar saat Lulus</td>
                                    <td id="gelar_saat_lulus" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Tahun Masuk PPM</td>
                                    <td id="tahun_masuk_ppm" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Kabupaten</td>
                                    <td id="kabupaten" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Status Kepemilikan Rumah
                                    <td>
                                    <td id="status_rumah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Golongan Darah</td>
                                    <td id="golongan_darah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Riwayat Penyakit</td>
                                    <td id="riwayat_penyakit" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">No HP</td>
                                    <td id="no_hp_santri" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Email</td>
                                    <td id="email_santri" class=""></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Alamat Lengkap</td>
                                    <td id="alamat_santri" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Kode Pos</td>
                                    <td id="kode_pos" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Nama Ayah</td>
                                    <td id="nama_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Tempat Lahir Ayah</td>
                                    <td id="tempat_lahir_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Tanggal Lahir Ayah</td>
                                    <td id="tanggal_lahir_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Status Ayah</td>
                                    <td id="status_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Pendidikan Ayah</td>
                                    <td id="pendidikan_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Pekerjaan Ayah</td>
                                    <td id="pekerjaan_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Penghasilan Ayah</td>
                                    <td id="penghasilan_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">No HP Ayah</td>
                                    <td id="no_hp_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Nama Ibu</td>
                                    <td id="nama_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Status Ibu</td>
                                    <td id="status_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Tempat Lahir Ibu</td>
                                    <td id="tempat_lahir_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Tanggal Lahir Ibu</td>
                                    <td id="tanggal_lahir_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">No HP Ibu</td>
                                    <td id="no_hp_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Pendidikan Ibu</td>
                                    <td id="pendidikan_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Pekerjaan Ibu</td>
                                    <td id="pekerjaan_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Penghasilan Ibu</td>
                                    <td id="penghasilan_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Alamat Orang Tua</td>
                                    <td id="alamat_orang_tua" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Asal Kelompok Sambung</td>
                                    <td id="asal_kelompok_sambung" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Asal Desa Sambung</td>
                                    <td id="asal_desa_sambung" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Asal Daerah Sambung</td>
                                    <td id="asal_daerah_sambung" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Jumlah Hafalan</td>
                                    <td id="jumlah_hafalan" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Status Mubaligh</td>
                                    <td id="status_mubaligh" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Keahlian</td>
                                    <td id="keahlian" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Prestasi</td>
                                    <td id="prestasi" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Bahasa Asing</td>
                                    <td id="bahasa_asing" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Facebook</td>
                                    <td id="facebook" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Instagram</td>
                                    <td id="instagram" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Nama Wali</td>
                                    <td id="nama_wali" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Tempat Lahir Wali</td>
                                    <td id="tempat_lahir_wali" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Tanggal Lahir Wali</td>
                                    <td id="tanggal_lahir_wali" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Pekerjaan Wali</td>
                                    <td id="pekerjaan_wali" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Alamat Wali</td>
                                    <td id="alamat_wali" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">No HP Wali</td>
                                    <td id="no_hp_wali" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Nama Imam Kelompok</td>
                                    <td id="nama_imam_kelompok" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">No HP Imam</td>
                                    <td id="no_hp_imam" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Asal Kelompok</td>
                                    <td id="asal_kelompok_imam" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">Alamat Imam Kelompok</td>
                                    <td id="alamat_imam" class="text-capitalize "></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script></script>
