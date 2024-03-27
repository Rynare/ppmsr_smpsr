@extends('pages.admin.admin')
@section('admin-content')
    @include('pages.admin.dashboard.modal-container')
    <main class="">
        <div class="container-fluid px-4">
            @include('pages.admin.dashboard.pengumuman')
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <table style="width: fit-content">
                            <tbody>
                                <tr>
                                    <td><strong>Gelombang</strong></td>
                                    {{-- <td class="ps-3 ">: {{ Str::upper($nama_gelombang) }}</td> --}}
                                    <td class="ps-3 ">: {{ $nama_gelombang }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Jumlah Terdaftar</strong></td>
                                    <td class="ps-3 ">: {{ $jumlah_terdaftar }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Belum Interview</strong></td>
                                    <td class="ps-3 ">: {{ $jumlah_interview }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Status Pengumuman <br>Santri Diterima</p>
                                    </td>
                                    <td class="ps-3">
                                        <div
                                            class=" d-flex justify-content-center column-gap-2 align-items-center my-auto ">
                                            <span>:</span>
                                            <a class="btn btn-info  btn-sm me-0"
                                                href="{{ route('admin.publikasi-santri-diterima') }}"
                                                style="width: fit-content; height: fit-content;">
                                                <i class="bi bi-cloud-upload"></i> Publikasi
                                            </a>
                                            <a class="btn btn-danger  btn-sm me-0"
                                                href="{{ route('admin.unpublikasi-santri-diterima') }}"
                                                style="width: fit-content; height: fit-content;">
                                                <i class="bi bi-cloud-download"></i> Sembunyikan
                                            </a>
                                            <a href="" class="btn btn-success btn-sm me-0"><i
                                                    class="bi bi-file-earmark-spreadsheet"
                                                    style="text-decoration: none"></i>Unduh</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-3 ms-auto mb-2">
                            <button type="button" class="btn btn-primary btn-sm me-3 mb-3" data-bs-toggle="modal"
                                data-bs-target="#new-gelombang" style="width: fit-content; height: fit-content;">
                                <i class="bi bi-door-open"></i> Buka Gelombang
                            </button>
                            @if ($id_gelombang)
                                <a class="btn btn-danger  btn-sm me-0 mb-3"
                                    href="{{ route('admin.tutup-gelombang', ['gelombang' => $id_gelombang]) }}"
                                    style="width: fit-content; height: fit-content;"
                                    onclick="return confirm('Ingin menutup gelombang saat ini?')"> <i
                                        class="bi bi-door-closed"></i>
                                    Tutup Gelombang
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No.HP Santri</th>
                                <th>Perguruan Tinggi</th>
                                <th>Program Studi</th>
                                <th>Nama Imam</th>
                                <th>No.HP Imam</th>
                                <th>Angkatan</th>
                                <th>
                                    <div class="text-center">Aksi</div>
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>No.HP Santri</th>
                                <th>Perguruan Tinggi</th>
                                <th>Program Studi</th>
                                <th>Nama Imam</th>
                                <th>No.HP Imam</th>
                                <th>Angkatan</th>
                                <th>
                                    <div class="text-center">Aksi</div>
                                </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($santris)
                                @foreach ($santris as $santri)
                                    <tr>
                                        <td>{{ $santri->nama_santri }}</td>
                                        <td>{{ $santri->no_hp_santri }}</td>
                                        <td>{{ $santri->universitas }}</td>
                                        <td></td>
                                        <td>{{ $santri->nama_imam_kelompok }}</td>
                                        <td>{{ $santri->no_hp_imam }}</td>
                                        <td>{{ $santri->angkatan }}</td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center  gap-2 w-100">
                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#santri-details" data-json="{{ json_encode($santri) }}"
                                                    onclick="setupSantriModal(this)"><i
                                                        class="bi bi-person-vcard"></i></button>
                                                <a class="btn btn-sm btn-success "
                                                    href="{{ route('admin.terima-santri', ['santri' => $santri->id]) }}"><i
                                                        class="bi bi-check-square"></i></a>
                                                <a class="btn btn-sm btn-danger "
                                                    href="{{ route('admin.tolak-santri', ['santri' => $santri->id]) }}"><i
                                                        class="bi bi-x-square"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script>
        function setupSantriModal(element) {
            const modal = document.querySelector(element.getAttribute('data-bs-target'));
            const profile = modal.querySelector('.profile')

            const table = modal.querySelector('table')
            const data = JSON.parse(element.getAttribute('data-json'))
            const secondaryProfile = table.querySelectorAll('[id]')

            profile.querySelector('img').src = '{{ asset('storage/santri') }}' + `/${data.pas_foto}`
            modal.querySelector('.modal-header #gelombang').innerText = data.gelombang
            modal.querySelector('.modal-header #angkatan').innerText = data.angkatan

            const links = profile.querySelectorAll('[profile-type=head] a')

            links.forEach(elem => {
                elem.href = '{{ asset('storage/santri') }}' + `/${data[elem.id]}`
            })

            secondaryProfile.forEach(elem => {
                elem.innerText = data[elem.id]
            });
        }
    </script>
@endsection
