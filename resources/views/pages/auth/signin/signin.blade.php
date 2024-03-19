@extends('pages.main')
@section('html-start')
    @include('components.bootstrap.bs-basic')
    @include('components.bootstrap.bs-icon')
    @include('pages.auth.signin.css')
    @include('components.sweetalert.swal-cdn')
@endsection
@section('html-end')
    @include('components.sweetalert.swalConfig')
@endsection
@section('custom')
    <main class="container-fluid" style="min-height:100vh;">
        <aside class="z-3 position-fixed" style="">
            <div class="d-flex w-100 h-100">
                <div class="bg-dark-subtle flex-grow-1 d-flex flex-column rounded-3 overflow-y-auto"
                    id="aside-content-container">
                    <header
                        class="text-center py-3 position-sticky top-0 bg-body-secondary rounded-top-3 position-sticky top-0 ">
                        <h2>Informasi</h2>
                    </header>
                    <div class="aside-content mx-3 py-2 flex-grow-1" id="pengumuman-container">
                        @foreach ($pengumumans as $pengumuman)
                            <div class="card mb-2 ">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $pengumuman->judul }}</h5>
                                    <p class="card-text">{{ $pengumuman->isi }}</p>
                                    @if ($pengumuman->link)
                                        @if ($pengumuman->hidden == 1)
                                            <div class="w-100 d-flex justify-content-end "><a href="#"
                                                    class="btn btn-secondary btn-sm">Belum dibuka</a>
                                            </div>
                                        @else
                                            <div class="w-100 d-flex justify-content-end "><a target="_blank"
                                                    href="{{ $pengumuman->id == 1 ? route('santri.list-diterima') : $pengumuman->link }}"
                                                    class="btn {{ $pengumuman->id == 1 ? 'btn-primary' : ' btn-outline-success' }} btn-sm">{{ $pengumuman->id == 1 ? 'Lihat' : 'Unduh Dokumen' }}</a>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="rounded-end-3 bg-primary text-white d-flex align-items-center justify-content-center d-md-none "
                    style="width: 50px;height: 36px" onclick="document.querySelector('aside').classList.toggle('active')">
                    <i class="bi bi-info-lg"></i>
                </div>
            </div>
        </aside>
        <div class="container row align-items-center mx-auto" style="min-height:100vh;" id="content-container">
            <div id="content" class="mx-auto row">
                <form method="POST" action="{{ route('signin.submit') }}" id="login-form"
                    class="mx-auto ms-md-auto me-md-0">
                    @csrf
                    <p class="h6 mb-2 fw-bold text-center" style="color: #760712">Selamat Datang!</p>
                    <div class="text-center mb-4 w-100 "
                        style="height: 60px;
                    background-position: center;
                    background-repeat: no-repeat;
                    display: block;
                    margin: 0 auto;
                    background-image: url({{ asset('assets/smpsr-logo.svg') }});
                    ">
                    </div>
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                            id="floatingInputEmail" name="email" placeholder="name@example.com"
                            value="{{ old('email') ?? '' }}" required>
                        @if ($errors->first('email'))
                            <div class="invalid-feedback" id="floatingInputEmail">{{ $errors->first('email') }}</div>
                        @endif
                        <label for="floatingInputEmail">Email address</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}"
                            id="floatingPassword" name="password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                        <span toggle="#floatingPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        @if ($errors->first('password'))
                            <div class="invalid-feedback" id="floatingPassword">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="form-check mt-2 mb-3">
                        <a class="btn m-0 btn-link text-end w-100 px-0" data-bs-toggle="modal"
                            data-bs-target="#forgot-password">
                            Lupa kata sandi
                        </a>
                    </div>
                    @push('modal-container')
                        <div class="modal fade" id="forgot-password" tabindex="-1" aria-labelledby="forgot-passwordLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="forgot-passwordLabel">Lupa kata sandi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('forgot-password.send-otp') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com" name="email">
                                                <label for="floatingInput">Email address</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endpush
                    <button class="w-100 btn " style="background: #760712; color: white" type="submit"
                        id="login-form-button">Masuk</button>
                    <div class="mt-3 mb-4 d-flex gap-2 flex-column flex-md-row align-items-center justify-content-center">
                        <span class="">Ingin daftar menjadi santri?</span>
                        <a href="{{ route('santri-daftar') }}">KLIK disini!!!</a>
                    </div>
                    <p class="mb-3 text-muted">2024 © ICT PPM Syafiur Rohman</p>
                </form>
            </div>
        </div>
    </main>
@endsection
