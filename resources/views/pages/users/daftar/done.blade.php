@extends('pages.main')
@section('html-start')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
@endsection
@section('custom')
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6 col-sm-offset-3">
                <br><br>
                <h2 style="color:#0fad00">Success</h2>
                <h3>Halo, {{ $nama_santri }}</h3>
                <p style="font-size:20px;color:#5C5C5C;">Thank you for verifying your Mobile No.We have sent you an email
                    "{{ $email_santri }}" with your details
                    Please go to your above email now and login.</p>
                <a href="" class="btn btn-success"> OK </a>
                <br><br>
            </div>

        </div>
    </div>
@endsection
