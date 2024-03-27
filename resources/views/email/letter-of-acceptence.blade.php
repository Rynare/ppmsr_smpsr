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
            background-color: #3c3c3b;
        }

        h1 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        .email-info {
            background-color: #f9f9f9;
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
        <p>Assalamualaikum Wr.Wb, {{ $nama }}</p>
        <p>Selamat! Anda telah diterima menjadi Mahasantri di PPM Syafi`ur Rohman.</p>

        <div class="email-info">
            <p>Berikut adalah informasi login Anda:</p>
            <p class="bold">Email: {{ $email }}</p>
            <p class="bold">Password: {{ $password }}</p>
        </div>

        <p>Harap jaga informasi ini secara rahasia dan jangan bagikan kepada siapapun.</p>
        <p>Jika Anda memiliki pertanyaan atau kebutuhan bantuan, jangan ragu untuk menghubungi kami.</p>

        <p>Terima kasih dan selamat bergabung!</p>

        <p>Hormat kami,</p>
        <p>PPM Syafi`ur Rohman</p>
        <p>Wassalamualaikum Wr. Wb</p>
    </div>
</body>

</html>
