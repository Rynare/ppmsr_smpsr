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
                    <h4 class="text-center mb-3 ">Biodata Santri</h4>
                    <div class="d-flex ">
                        <div profile-type="head" class="d-flex my-2 flex-column">
                            <div style="width:180px ;height:240px;"
                                class="d-flex align-items-center overflow-hidden justify-content-center bg-secondary rounded-2 ms-4">
                                <img src="" alt="pas_foto"
                                    onerror="this.src = '{{ asset('assets/santri-default-picture.png') }}'"
                                    style="width:100%">
                            </div>
                            <div class="d-flex flex-column row-gap-2 ms-3 mt-3">
                                <ol>
                                    <li><a href="" style="text-transform:capitalize;" id="kartu_keluarga">kartu
                                            keluarga</a></li>
                                    <li><a href="" style="text-transform:capitalize;" id="ktp">ktp</a></li>
                                    <li><a href="" style="text-transform:capitalize;" id="surat_sambung">surat
                                            sambung</a></li>
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
                                    <td style="text-transform:capitalize;">nama santri</td>
                                    <td id="nama_santri" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">jenis kelamin</td>
                                    <td id="jenis_kelamin" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">tempat lahir santri</td>
                                    <td id="tempat_lahir_santri" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">tanggal lahir santri</td>
                                    <td id="tanggal_lahir_santri" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">jumlah saudara</td>
                                    <td id="jumlah_saudara" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">anak ke</td>
                                    <td id="anak_ke" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">universitas</td>
                                    <td id="universitas" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">pendidikan</td>
                                    <td id="pendidikan" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">fakultas</td>
                                    <td id="fakultas" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">gelar saat lulus</td>
                                    <td id="gelar_saat_lulus" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">tahun masuk ppm</td>
                                    <td id="tahun_masuk_ppm" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">kabupaten</td>
                                    <td id="kabupaten" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">status rumah</td>
                                    <td id="status_rumah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">golongan darah</td>
                                    <td id="golongan_darah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">riwayat penyakit</td>
                                    <td id="riwayat_penyakit" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">no hp santri</td>
                                    <td id="no_hp_santri" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">email santri</td>
                                    <td id="email_santri" class=""></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">alamat santri</td>
                                    <td id="alamat_santri" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">kode pos</td>
                                    <td id="kode_pos" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">nama ayah</td>
                                    <td id="nama_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">tempat lahir ayah</td>
                                    <td id="tempat_lahir_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">tanggal lahir ayah</td>
                                    <td id="tanggal_lahir_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">status ayah</td>
                                    <td id="status_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">pendidikan ayah</td>
                                    <td id="pendidikan_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">pekerjaan ayah</td>
                                    <td id="pekerjaan_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">penghasilan ayah</td>
                                    <td id="penghasilan_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">no hp ayah</td>
                                    <td id="no_hp_ayah" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">nama ibu</td>
                                    <td id="nama_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">status ibu</td>
                                    <td id="status_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">tempat lahir ibu</td>
                                    <td id="tempat_lahir_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">tanggal lahir ibu</td>
                                    <td id="tanggal_lahir_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">no hp ibu</td>
                                    <td id="no_hp_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">pendidikan ibu</td>
                                    <td id="pendidikan_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">pekerjaan ibu</td>
                                    <td id="pekerjaan_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">penghasilan ibu</td>
                                    <td id="penghasilan_ibu" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">alamat orang tua</td>
                                    <td id="alamat_orang_tua" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">asal kelompok sambung</td>
                                    <td id="asal_kelompok_sambung" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">asal desa sambung</td>
                                    <td id="asal_desa_sambung" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">asal daerah sambung</td>
                                    <td id="asal_daerah_sambung" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">jumlah hafalan</td>
                                    <td id="jumlah_hafalan" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">status mubaligh</td>
                                    <td id="status_mubaligh" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">keahlian</td>
                                    <td id="keahlian" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">prestasi</td>
                                    <td id="prestasi" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">bahasa asing</td>
                                    <td id="bahasa_asing" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">facebook</td>
                                    <td id="facebook" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">instagram</td>
                                    <td id="instagram" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">nama wali</td>
                                    <td id="nama_wali" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">tempat lahir wali</td>
                                    <td id="tempat_lahir_wali" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">tanggal lahir wali</td>
                                    <td id="tanggal_lahir_wali" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">pekerjaan wali</td>
                                    <td id="pekerjaan_wali" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">alamat wali</td>
                                    <td id="alamat_wali" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">no hp wali</td>
                                    <td id="no_hp_wali" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">nama imam kelompok</td>
                                    <td id="nama_imam_kelompok" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">no hp imam</td>
                                    <td id="no_hp_imam" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">asal kelompok imam</td>
                                    <td id="asal_kelompok_imam" class="text-capitalize "></td>
                                </tr>
                                <tr>
                                    <td style="text-transform:capitalize;">alamat imam</td>
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
