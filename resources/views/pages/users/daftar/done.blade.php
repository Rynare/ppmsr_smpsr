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
        <div class="m-3" style="margin: 20px; border: 1px solid #ccc; border-radius: 10px; padding: 20px;">
            <div class="row text-center">
                <div class="col-sm-6 col-sm-offset-3">
                    <br><br>
                    <h2 style="color:#0fad00; font-weight: bold"> Sukses Daftar !</h2>
                    <h3>Terima Kasih, telah mendaftar di Pondok Pesantren Mahasiswa Syafi’ur Rohman Jember!</h3>
                    <p style="font-size:20px;color:#5C5C5C;">Halo, {{ $nama_santri }}</p>
                    <p>Kami telah menerima pendaftaran Anda dan kami akan segera memprosesnya. Silakan menunggu kabar
                        selanjutnya melalui email yang telah Anda berikan "<strong>{{ $email_santri }}</strong>".</p>

                    <p>Untuk persiapan interview, anda diharuskan membawa hardfile/print dari data berikut:</p>
                    <div class="d-flex w-100">
                        <ol style="width: fit-content;margin: auto; margin-bottom: 10px; text-align: left;">
                            <li>Biodata Pendaftar</li>
                            <li>Surat Sambung</li>
                            <li>Kartu Keluarga</li>
                        </ol>
                    </div>
                    <strong style="display: block; text-align: center;">
                        Data diatas bisa anda dapatkan dari email yang anda daftarkan pada Form Pendaftaran, Biodata
                        Pendaftar akan dikirimkan di Email.
                    </strong>
                    <p>Jika ada pertanyaan lebih lanjut atau informasi tambahan, jangan ragu untuk menghubungi kami.
                        Alhamdulilahijazakumulohukhoiro, atas partisipasi Anda.</p>

                    <a href="{{ route('signin') }}" class="btn btn-success mt-2"
                        style="display: inline-block; text-decoration: none; background-color: #28a745; color: #fff; padding: 8px 20px; border-radius: 5px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-house-fill p-0 m-0" viewBox="0 0 16 16" style="margin-right: 5px;">
                            <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                        </svg> Kembali ke Halaman Masuk
                    </a>
                    <br><br>
                </div>
            </div>
        </div>

    </div>
@endsection
