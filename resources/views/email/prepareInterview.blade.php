<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Email</title>
</head>

<body>
    <p>Assalamualaikum Wr.Wb, {{ $name }},</p>
    <p>Terima kasih telah mendaftar di PPM Syafi`ur rahman.</p>
    <p>Untuk persiapan interview kamu wajib menyiapkan hardfile/print dari file berikut:</p>
    <ol>
        <li>Kartu keluarga</li>
        <li>Surat sambung</li>
        <li>Biodata calon santri (
            <a href="{{ route('santri.biodata.PDF', ['id' => $santri_id, 'email' => $santri_email]) }}">Download</a>)
        </li>

    </ol>
    <br>
    <p>Terima kasih</p>
</body>

</html>
