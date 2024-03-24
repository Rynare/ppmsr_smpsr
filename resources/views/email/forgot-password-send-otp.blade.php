<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Untuk mengganti password silahkan klik link dibawah ini.</p>
    <br>
    <a href="{{ route('forgot-password', ['email' => $email, 'otp' => $otp]) }}">Lupa password</a>
</body>

</html>
