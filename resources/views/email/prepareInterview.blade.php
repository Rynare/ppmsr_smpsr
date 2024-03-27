<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Penerimaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #000;
            background-color: #f9f9f9;
        }

        h1 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        .email-info {
            background-color: #ffff;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-top: 20px;
        }

        .email-info p {
            margin: 5px 0;
        }

        .bold {
            font-weight: bold;

        }

        .cta-button {
            display: inline-block;
            padding: 5px 5px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="color: #18E">Konfirmasi Pendaftaran</h1>
        <p style="color: #000;">Assalamualaikum Wr.Wb, <br>
            {{ $name }}</p>
        <p style="color: #000;">Terima kasih telah mendaftar di PPM Syafi`ur Rohman.</p>
        <p>Setelah ini anda akan melakukan Tes Wawancara luring di PPM Syafi’ur Rohman</p>

        <div class="email-info" style="color: #000;">
            <p>Sambil menunggu, anda dapat menyiapkan dokumen Tes Wawancara yang wajib dibawa berupa hardfile/print
                dari
                file berikut:</p>
            <ol>
                <li>Kartu Keluarga</li>
                <li>Surat Sambung</li>
                <li>Biodata Calon Mahasantri
                    <a style="color:white;" class="cta-button"
                        href="{{ route('santri.biodata.PDF', ['id' => $santri_id, 'email' => $santri_email]) }}">
                        Download</a>
                </li>
            </ol>
        </div>

        <p style="color: #000;">Untuk tanggal tes akan dihubungi panitia lebih lanjut via WhatsApp</p>
        <p style="color: #000;">Jika ada yang ditanyakan silahkan hubungi Contact Person yang tertera di halaman
            Informasi.</p>
        <p>Hormat kami,</p>
        <p>PPM Syafi`ur Rohman</p>
        <p>Alhamdulilahijazakumulohukhoiro, <br>
            Wassalamualaikum Wr. Wb</p>
    </div>
</body>

</html>
