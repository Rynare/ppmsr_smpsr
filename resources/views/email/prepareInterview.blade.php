<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[Pendaftaran] Email SMPSR PPM Syafi’ur Rohman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        ol {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
            padding-left: 20px;
        }

        ol li {
            margin-bottom: 5px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
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
        <h4>Assalamualaikum Wr.Wb, <br>
            {{ $name }},</h4>
        <p>Terima kasih telah mendaftar di PPM Syafi`ur Rohman.</p>
        <p>Untuk persiapan Wawancara kamu wajib menyiapkan hardfile/print dari file berikut:</p>
        <ol>
            <li>Kartu Keluarga</li>
            <li>Surat Sambung</li>
            <li>Biodata Calon Mahasantri
                <a style="color:white;" class="cta-button"
                    href="{{ route('santri.biodata.PDF', ['id' => $santri_id, 'email' => $santri_email]) }}">Download</a>
            </li>
        </ol>
        <br>
        <h4>Alhamdulilahijazakumulohukhoiro, <br>
            Wassalamualaikum Wr. Wb</h4>
    </div>
</body>

</html>
