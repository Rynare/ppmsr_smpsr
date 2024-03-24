<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style type="text/css">
        body {
            font-family: 'Times New Roman';
            font-size: 12pt
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            margin: 0pt
        }

        li,
        table {
            margin-top: 0pt;
            margin-bottom: 0pt
        }

        h1 {
            margin-top: 24pt;
            margin-bottom: 6pt;
            page-break-inside: avoid;
            page-break-after: avoid;
            font-family: 'Times New Roman';
            font-size: 24pt;
            font-weight: bold;
            color: #000000
        }

        h2 {
            margin-top: 18pt;
            margin-bottom: 4pt;
            page-break-inside: avoid;
            page-break-after: avoid;
            font-family: 'Times New Roman';
            font-size: 18pt;
            font-weight: bold;
            color: #000000
        }

        h3 {
            margin-top: 14pt;
            margin-bottom: 4pt;
            page-break-inside: avoid;
            page-break-after: avoid;
            font-family: 'Times New Roman';
            font-size: 14pt;
            font-weight: bold;
            color: #000000
        }

        h4 {
            margin-top: 12pt;
            margin-bottom: 2pt;
            page-break-inside: avoid;
            page-break-after: avoid;
            font-family: 'Times New Roman';
            font-size: 12pt;
            font-weight: bold;
            font-style: normal;
            color: #000000
        }

        h5 {
            margin-top: 11pt;
            margin-bottom: 2pt;
            page-break-inside: avoid;
            page-break-after: avoid;
            font-family: 'Times New Roman';
            font-size: 11pt;
            font-weight: bold;
            color: #000000
        }

        h6 {
            margin-top: 10pt;
            margin-bottom: 2pt;
            page-break-inside: avoid;
            page-break-after: avoid;
            font-family: 'Times New Roman';
            font-size: 10pt;
            font-weight: bold;
            font-style: normal;
            color: #000000
        }

        .Footer {
            font-size: 12pt
        }

        .Header {
            font-size: 12pt
        }

        .Subtitle {
            margin-top: 18pt;
            margin-bottom: 4pt;
            page-break-inside: avoid;
            page-break-after: avoid;
            font-family: Georgia;
            font-size: 24pt;
            font-style: italic;
            color: #666666
        }

        .Title {
            margin-top: 24pt;
            margin-bottom: 6pt;
            page-break-inside: avoid;
            page-break-after: avoid;
            font-size: 36pt;
            font-weight: bold
        }

        .a {}

        .a0 {}
    </style>
</head>

<body>
    <div>
        <div style="-aw-headerfooter-type:header-primary; clear:both">
            <p style="font-size:20pt"><span style="height:0pt; display:block; position:absolute; z-index:-65538"><img
                        src="assets/images/PPM-logo.jpeg" width="88" height="75" alt=""
                        style="margin-left:6.3pt; -aw-left-pos:6.3pt; -aw-rel-hpos:column; -aw-rel-vpos:paragraph; -aw-top-pos:0pt; -aw-wrap-type:none; position:absolute" /></span><span
                    style="width:61.95pt; font-family:Rockwell; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:61.95pt">&#xa0;</span><span
                    style="width:45.47pt; font-family:Rockwell; display:inline-block; -aw-tabstop-align:center; -aw-tabstop-pos:263.45pt">&#xa0;</span><span
                    style="font-family:Rockwell">PONDOK PESANTREN MAHASISWA</span></p>
            <p style="text-align:center; font-size:20pt"><span style="font-family:Rockwell">SYAFI`UR ROHMAN
                    JEMBER</span></p>
            <p style="text-align:center"><span style="font-family:Rockwell">Jl. Brantas XXV no. 258 Kec. Sumbersari
                    Jember</span></p>
            <div style="height: 2px;width:100%; border-bottom: 5px double black; margin-bottom: 10px;"></div>
            <p style="text-align:center; line-height:115%"><span
                    style="height:0pt; text-align:left; display:block; position:absolute; z-index:0"><img
                        src="{{ 'storage/santri/' . $santri->pas_foto }}" width="155" height="230" alt=""
                        style="margin-top:2.62pt; margin-left:402.62pt; -aw-left-pos:403pt; -aw-rel-hpos:column; -aw-rel-vpos:paragraph; -aw-top-pos:3pt; -aw-wrap-type:none; position:absolute" /></span><span
                    style="font-weight:bold; text-decoration:underline;">FORMULIR PENDAFTARAN SANTRI
                    BARU</span></p>
            <ol type="I" style="margin:0pt; padding-left:0pt">
                <li style="margin-left:30pt; text-align:justify; line-height:150%; padding-left:24pt">
                    <span style="height:0pt; text-align:left; display:block; position:absolute; z-index:1">
                    </span>
                    <span style="font-weight:bold">Identitas Diri</span>
                </li>
                <div style="height: 2px;width:76.4%; border-bottom: 5px solid black"></div>
            </ol>
            <style>
                tr,
                td {
                    text-transform: capitalize;
                    line-height: 12.3px;
                }
            </style>
            @php
                use Carbon\Carbon;
                setlocale(LC_TIME, 'id_ID');
            @endphp
            <table style="background-color: transparent;margin-top: 2px;width: 76.35%;">
                <tbody>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Nama
                            Lengkap</td>
                        <td>: {{ $santri->nama_santri }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Tempat
                            Tanggal/Lahir</td>
                        <td>:
                            {{ $santri->tempat_lahir_santri }},&nbsp;{{ \Carbon\Carbon::parse($santri->tanggal_lahir_santri)->isoFormat('D MMMM YYYY') }}
                        </td>
                    </tr>

                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Asal Kota
                        </td>
                        <td>: {{ $santri->kabupaten }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Alamat rumah
                        </td>
                        <td>: {{ $santri->alamat_santri }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Jenis Kelamin
                        </td>
                        <td>: {{ $santri->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Jumlah
                            saudara kandung
                        </td>
                        <td>: {{ $santri->jumlah_saudara }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Anak ke-
                        </td>
                        <td>: {{ $santri->anak_ke }}</td>
                    </tr>
                    <tr>
                        <td><span
                                style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Universitas/Politeknik
                        </td>
                        <td>: {{ $santri->universitas }}</td>
                    </tr>
                    <tr>
                        <td><span
                                style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Jurusan/Fakultas
                        </td>
                        <td>: {{ $santri->fakultas }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Angkatan
                        </td>
                        <td>: {{ $santri->angkatan }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Tahun masuk
                            PPM
                        </td>
                        <td>: {{ $santri->tahun_masuk_ppm }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>No. Telp
                        </td>
                        <td>: {{ $santri->no_hp_santri }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Golongan
                            darah</td>
                        <td>: {{ $santri->golongan_darah }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Penyakit yang
                            pernah diderita</td>
                        <td>: {{ $santri->riwayat_penyakit }}</td>
                    </tr>
                </tbody>
            </table>
            <ol start="2" type="I" style="margin:0pt; padding-left:0pt">
                <li style="margin-left:30pt; text-align:justify; line-height:150%; padding-left:24pt">
                    <span style="height:0pt; text-align:left; display:block; position:absolute; z-index:1">
                    </span>
                    <span style="font-weight:bold">Identitas Ayah /Ibu Kandung</span>
                </li>
                <div style="height: 2px;width:100%; border-bottom: 5px solid black"></div>
            </ol>
            <table style="background-color: transparent;margin-top: 2px;width: 76.35%;">
                <tbody>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Nama</td>
                        <td>: {{ $santri->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Tempat
                            Tanggal/Lahir</td>
                        <td>:
                            {{ $santri->tempat_lahir_ayah }},&nbsp;{{ \Carbon\Carbon::parse($santri->tanggal_lahir_ayah)->isoFormat('D MMMM YYYY') }}
                        </td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Pekerjaan
                        </td>
                        <td>: {{ $santri->pekerjaan_ayah }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Alamat
                        </td>
                        <td>: {{ $santri->alamat_orang_tua }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>No. Telp
                        </td>
                        <td>: {{ $santri->no_hp_ayah }}</td>
                    </tr>
                </tbody>
            </table>

            <ol start="3" type="I" style="margin:0pt; padding-left:0pt">
                <li style="margin-left:30pt; text-align:justify; line-height:150%; padding-left:24pt">
                    <span style="height:0pt; text-align:left; display:block; position:absolute; z-index:1">
                    </span>
                    <span style="font-weight:bold">Identitas Wali Santri</span>
                </li>
                <div style="height: 2px;width:100%; border-bottom: 5px solid black"></div>
            </ol>
            <table style="background-color: transparent;margin-top: 2px;width: 76.35%;">
                <tbody>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Nama</td>
                        <td>: {{ $santri->nama_wali }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Tempat
                            Tanggal/Lahir</td>
                        <td>:
                            {{ $santri->tempat_lahir_wali }},&nbsp;{{ \Carbon\Carbon::parse($santri->tanggal_lahir_wali)->isoFormat('D MMMM YYYY') }}
                        </td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Pekerjaan
                        </td>
                        <td>: {{ $santri->pekerjaan_wali }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Alamat
                        </td>
                        <td>: {{ $santri->alamat_wali }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>No. Telp
                        </td>
                        <td>: {{ $santri->no_hp_wali }}</td>
                    </tr>
                </tbody>
            </table>
            <ol start="4" type="I" style="margin:0pt; padding-left:0pt">
                <li style="margin-left:30pt; text-align:justify; line-height:150%; padding-left:24pt">
                    <span style="height:0pt; text-align:left; display:block; position:absolute; z-index:1">
                    </span>
                    <span style="font-weight:bold">Identitas Imam Kelompok</span>
                </li>
                <div style="height: 2px;width:100%; border-bottom: 5px solid black"></div>
            </ol>
            <table style="background-color: transparent;margin-top: 2px;width: 76.35%;">
                <tbody>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Nama</td>
                        <td>: {{ $santri->nama_imam_kelompok }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>No. Telp
                        </td>
                        <td>: {{ $santri->no_hp_imam }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Kelompok</td>
                        <td>: {{ $santri->asal_kelompok_imam }}</td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 18px;margin-right: 10px;margin-left: 7px">&bull;</span>Alamat
                        </td>
                        <td>: {{ $santri->alamat_imam }}</td>
                    </tr>
                </tbody>
            </table>
            <p style="text-align:right; line-height:115%"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="text-align:right; line-height:115%"><span>Jember,…………………….2024</span></p>
            <p style="text-align:center; line-height:115%"><span>Mengetahui,</span></p>
            <table cellspacing="0" cellpadding="0" class="a0" style="width:509.4pt; border-collapse:collapse">
                <tr>
                    <td style="width:243.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="text-align:center; line-height:115%; font-size:12pt"><span>Orang Tua/Wali</span></p>
                    </td>
                    <td style="width:243.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="text-align:center; line-height:115%; font-size:12pt"><span>Santri Baru</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:243.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="line-height:115%; font-size:12pt"><span style="-aw-import:ignore">&#xa0;</span></p>
                        <p style="text-align:center; line-height:115%; font-size:12pt"><span
                                style="-aw-import:ignore">&#xa0;</span></p>
                        <p style="text-align:center; line-height:115%; font-size:12pt"><span
                                style="-aw-import:ignore">&#xa0;</span></p>
                        <p style="text-align:center; line-height:115%; font-size:12pt">
                            <span>(…………………………………………….……)</span>
                        </p>
                    </td>
                    <td style="width:243.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="line-height:115%; font-size:12pt"><span style="-aw-import:ignore">&#xa0;</span></p>
                        <p style="text-align:center; line-height:115%; font-size:12pt"><span
                                style="-aw-import:ignore">&#xa0;</span></p>
                        <p style="text-align:center; line-height:115%; font-size:12pt"><span
                                style="-aw-import:ignore">&#xa0;</span></p>
                        <p style="text-align:center; line-height:115%; font-size:12pt">
                            <span>(…………………………………………….……)</span>
                        </p>
                    </td>
                </tr>
            </table>
            <p style="line-height:115%"><span>Lampiran: Surat sambung, foto copy KTP</span></p>
            <p><span style="-aw-import:ignore">&#xa0;</span></p>
            <p><span style="font-weight:bold; font-style:italic">*) Bila ada</span></p>
            <p><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="line-height:115%"><span style="-aw-import:ignore">&#xa0;</span></p>
            <div style="-aw-headerfooter-type:footer-primary; clear:both">
                <p style="text-align:right"><span style="-aw-import:ignore">&#xa0;</span></p>
            </div>
        </div>
    </div>
</body>

</html>
