@extends('pages.admin.admin')
@section('admin-content')
    <main>
        <div class="container-fluid px-4 mt-4 ">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesGelombang">
                        <thead>
                            <tr>
                                <th>Angkatan</th>
                                <th>Nama</th>
                                <th>Dibuat</th>
                                <th>Ditutup</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Angkatan</th>
                                <th>Nama</th>
                                <th>Dibuat</th>
                                <th>Ditutup</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($gelombangs as $gelombang)
                                <tr>
                                    <td>{{ $gelombang->angkatan }}</td>
                                    <td>{{ $gelombang->nama_gelombang }}</td>
                                    <td>{{ $gelombang->created_at }}</td>
                                    <td>{{ $gelombang->closed_at ?? 'Belum ditutup' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script>
        window.addEventListener('DOMContentLoaded', event => {
            // Simple-DataTables
            // https://github.com/fiduswriter/Simple-DataTables/wiki
            const datatablesGelombang = document.getElementById('datatablesGelombang');
            if (datatablesGelombang) {
                new simpleDatatables.DataTable(datatablesGelombang);
            }
        });
    </script>
@endsection
