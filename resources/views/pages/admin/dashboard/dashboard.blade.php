@extends('pages.admin.admin')
@section('admin-content')
    @include('pages.admin.dashboard.modal-container')
    <main>
        <div class="container-fluid px-4">
            @include('pages.admin.dashboard.pengumuman')
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center ">
                        <table style="width: fit-content">
                            <tbody>
                                <tr>
                                    <td><strong>Gelombang</strong></td>
                                    <td class="ps-3 ">: {{ Str::upper($nama_gelombang) }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Jumlah Terdaftar</strong></td>
                                    <td class="ps-3 ">: {{ $jumlah_terdaftar }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="">
                            <button type="button" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal"
                                data-bs-target="#new-gelombang" style="width: fit-content; height: fit-content;">
                                Buka gelombang
                            </button>
                            @if ($id_gelombang)
                                <a class="btn btn-danger  btn-sm me-3"
                                    href="{{ route('admin.tutup-gelombang', ['gelombang' => $id_gelombang]) }}"
                                    style="width: fit-content; height: fit-content;"
                                    onclick="return confirm('Ingin menutup gelombang saat ini?')">
                                    Tutup gelombang
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>No.HP Santri</th>
                                <th>No.HP Ayah</th>
                                <th>No.HP Ibu</th>
                                <th>Penanggung biaya</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>No.HP Santri</th>
                                <th>No.HP Ayah</th>
                                <th>No.HP Ibu</th>
                                <th>Wali</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
