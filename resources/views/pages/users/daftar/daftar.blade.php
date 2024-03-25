@extends('pages.main')
@section('html-start')
    @include('components.bootstrap.bs-basic')
    @include('components.bootstrap.bs-icon')
    @include('components.sweetalert.swal-cdn')
    @include('pages.users.daftar.css-main')
@endsection
@section('html-end')
    @include('components.sweetalert.swalConfig')
    @include('pages.users.daftar.js-main')
@endsection
@section('custom')
    <style>
        :root {
            ---gform-bg-color: #760712;
        }
    </style>
    <div id="content" class="mx-auto m-3" style="border-radius: 5px">
        <h1 class="text-center p-3" style="color: #760712">Pendaftaran Santri</h1>
        <header class="px-4 py-2 position-sticky top-0 bg-white z-3 shadow-sm " style="z-index: 10000;" id="navbar-scrollspy">
            <ul class="nav nav-underline row-gap-0 align-items-center justify-content-center">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" data-section-target="datadiri" style="color: #760712"
                        href="#form-datadiri">Data Diri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-section-target="data-orangtua" href="#form-data-orangtua"
                        style="color: #760712">Data
                        Orang Tua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-section-target="data-khusus" href="#form-data-khusus"
                        style="color: #760712">Data
                        Khusus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " aria-disabled="true" data-section-target="data-wali" href="#form-data-wali"
                        style="color: #760712">Data Wali</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " aria-disabled="true" data-section-target="data-imam" href="#form-data-imam"
                        style="color: #760712">Data Imam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " aria-disabled="true" data-section-target="dokumen" href="#form-dokumen"
                        style="color: #760712">Dokumen</a>
                </li>
            </ul>
        </header>
        <main class="row row-lg-1 gx-0 px-4 my-3 col-12 ">
            <div class="col-12">
                <form action="{{ route('santri-daftar.store') }}" method="post" class="row gx-0" data-bs-spy="scroll"
                    data-bs-target="#navbar-scrollspy" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
                    tabindex="0" enctype="multipart/form-data">
                    @csrf
                    @include('pages.users.daftar.datadiri')
                    @include('pages.users.daftar.data-orangtua')
                    @include('pages.users.daftar.data-khusus')
                    @include('pages.users.daftar.data-wali')
                    @include('pages.users.daftar.data-imam')
                    @include('pages.users.daftar.dokumen')
                    <button type="submit" class="btn mb-4 mt-2"
                        style="background-color:#760712; color: white">Daftar</button>
                </form>
            </div>
        </main>
    </div>
@endsection
