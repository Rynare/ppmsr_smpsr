@extends('pages.main')
@section('html-start')
    @include('components.bootstrap.bs-basic')
@endsection
@section('custom')
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="{{ asset('storage/santri/' . $santri->pas_foto) }}" alt="Avatar"
                                    class="img-fluid my-5" width="155" height="230" />
                                <h5 class="text-capitalize ">{{ $santri->nama_santri }}&nbsp;({{ $santri->jenis_kelamin }})
                                </h5>
                                <p><strong>Angkatan</strong> - {{ $santri->angkatan }}</p>
                                <p><strong>Tahun Masuk PPM</strong> - {{ $santri->tahun_masuk_ppm }}</p>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    @include('pages.users.profile.biodata')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
