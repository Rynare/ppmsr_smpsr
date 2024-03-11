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
    <div id="content" class="mx-auto">
        <header class="px-4 py-2 position-sticky top-0 bg-white z-3 shadow-sm " style="z-index: 10000;" id="navbar-scrollspy">
            <h1 class="text-center ">Pendaftaran Santri</h1>
            <ul class="nav nav-underline">
                <li class="nav-item">
                    <a class="nav-link text-danger active" aria-current="page" data-section-target="datadiri"
                        href="#form-datadiri">Data Diri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" data-section-target="data-orangtua" href="#form-data-orangtua">Data
                        ortu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" data-section-target="data-khusus" href="#form-data-khusus">Data
                        khusus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger " aria-disabled="true" data-section-target="data-wali"
                        href="#form-data-wali">Data wali</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger " aria-disabled="true" data-section-target="data-imam"
                        href="#form-data-imam">Data imam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger " aria-disabled="true" data-section-target="dokumen"
                        href="#form-dokumen">Dokumen</a>
                </li>
            </ul>
        </header>
        <main class="row row-cols-lg-1 gx-0 px-4 my-3 ">
            <form action="{{ route('santri-daftar.store') }}" method="post" class="row gx-0" data-bs-spy="scroll"
                data-bs-target="#navbar-scrollspy" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
                tabindex="0">
                @include('pages.users.daftar.datadiri')
                @include('pages.users.daftar.data-orangtua')
                @include('pages.users.daftar.data-khusus')
                @include('pages.users.daftar.data-wali')
                @include('pages.users.daftar.data-imam')
                @include('pages.users.daftar.dokumen')
                <button type="submit" class="btn btn-primary mb-4 mt-2">Daftar</button>
            </form>
        </main>
    </div>
@endsection
