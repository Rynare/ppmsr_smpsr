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
            color: white;
            background-color: #525252;
        }

        h1 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        .email-info {
            background-color: #E7E7E7;
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
    </style>
</head>

<body>
    <div class="container">
        <h1 style="color: #18ED8A">Surat Penerimaan</h1>
        <p style="color: #fff;">Assalamualaikum Wr.Wb, {{ $nama }}</p>
        <p style="color: #fff;">Selamat! Anda telah diterima menjadi Mahasantri di PPM Syafi`ur Rohman.</p>

        <div class="email-info" style="color: #333">
            <p>Berikut adalah informasi login Anda:</p>
            <p class="bold">Email: {{ $email }}</p>
            <p class="bold">Password: {{ $password }}</p>
        </div>

        <p style="color: #fff;">Harap jaga informasi ini secara rahasia dan jangan bagikan kepada siapapun.</p>
        <p style="color: #fff;">Jika Anda memiliki pertanyaan atau kebutuhan bantuan, jangan ragu untuk menghubungi
            kami.</p>

        <p style="color: #fff;">Alhamdulilahijazakumulohukhoiro dan selamat bergabung!</p>
        <p style="color: #fff;">Hormat kami,</p>
        <p style="color: #fff;">PPM Syafi`ur Rohman</p>
        <p style="color: #fff;">Wassalamualaikum Wr. Wb</p>
    </div>
</body>

</html>
