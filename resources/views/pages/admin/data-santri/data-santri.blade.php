@extends('pages.admin.admin')

@section('admin-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row gx-0 row-cols-2 ">
                        <label for="" class="mb-2 col-12 ">Pilih Angkatan</label>
                        <div class="col-5">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">
                                    <i class="bi bi-folder2-open"></i>
                                </label>
                                <a href="" id="angkatan-selector"></a>
                                <select class="form-select" id="inputGroupSelect01" onchange="angkatanSelector(this)">
                                    @foreach ($list_angkatan as $angkatan)
                                        <option value="{{ route('admin.data-santri.angkatan', ['angkatan' => $angkatan]) }}"
                                            {{ $angkatan == $selected_angkatan ? 'selected' : '' }}>{{ $angkatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <a class="btn btn-success w-auto ms-auto " style="height: fit-content;"
                            href="{{ route('admin.data-santri.download.angkatan', ['angkatan' => $selected_angkatan]) }}"
                            target="_blank"><i class="bi bi-file-earmark-spreadsheet"></i>&nbsp;Export
                            ({{ $selected_angkatan }})</a>
                        <script>
                            function angkatanSelector(element) {
                                const anchor = document.querySelector('a#angkatan-selector')
                                anchor.href = element.value
                                anchor.click();
                            }
                        </script>
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
                        <tbody>
                            @if (isset($santris))
                                @foreach ($santris as $santri)
                                    <tr>
                                        <td>{{ $santri->nama_santri }}</td>
                                        <td>{{ $santri->email_santri }}</td>
                                        <td>{{ $santri->no_hp_santri }}</td>
                                        <td>{{ $santri->no_hp_ayah }}</td>
                                        <td>{{ $santri->no_hp_ibu }}</td>
                                        <td>{{ $santri->nama_wali }}</td>
                                        <td>

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
@endsection
