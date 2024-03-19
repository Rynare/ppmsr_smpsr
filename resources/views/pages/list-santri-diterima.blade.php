@extends('pages.main')
@section('html-start')
    @include('components.bootstrap.bs-basic')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Load DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- Load DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
@endsection
@section('custom')
    <h1>Daftar Santri Diterima</h1>
    <div class="mx-2 mx-md-3 rounded-2 bg-body-secondary p-3">
        <table id="table-santri" class="pt-3">
            <thead>
                <tr>
                    <th class="text-center ">No</th>
                    <th>Nama</th>
                    <th>Universitas/Politeknik</th>
                    <th>Fakultas/Jurusan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($santris as $santri)
                    <tr>
                        <td class="text-center ">{{ $loop->iteration }}</td>
                        <td class="ps-3">{{ $santri->nama_santri }}</td>
                        <td class="ps-3">{{ $santri->universitas }}</td>
                        <td class="ps-3">{{ $santri->fakultas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        @push('DOM_Loaded')
            $('#table-santri').DataTable();
        @endpush
    </script>
@endsection
