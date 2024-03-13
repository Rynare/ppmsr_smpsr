@extends('pages.main')
@section('html-start')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        body {
            min-height: 100vh;
        }
    </style>
    <!------ Include the above in your HEAD tag ---------->
@endsection
@section('custom')
    <div class="container-fluid" style="height:100%">
        <div class="row text-center">
            <div class="col-sm-6 col-sm-offset-3">
                <br><br>
                <h2 style="color:#0fad00">Success</h2>
                <h3>Terima kasih telah mendaftar di Pondok Pesantren Mahasiswa Syafi’ur
                    Rohman Jember!</h3>
                <p style="font-size:20px;color:#5C5C5C;">Halo, {{ $nama_santri }}</p>
                <p>Kami telah menerima pendaftaran Anda dan kami akan segera memprosesnya. Silakan menunggu kabar
                    selanjutnya melalui email yang telah Anda berikan "<strong>{{ $email_santri }}</strong>".</p>
                <p>Jika ada pertanyaan lebih lanjut atau informasi tambahan, jangan ragu untuk menghubungi kami.
                    Terima kasih lagi atas partisipasi Anda.</p>
                <a href="{{ route('signin') }}" class="btn btn-success"> OK </a>
                <br><br>
            </div>

        </div>
    </div>
@endsection
