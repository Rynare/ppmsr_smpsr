@extends('pages.admin.admin')

@section('admin-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Akun Terdaftar</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Akun Terdaftar</li>
            </ol>
            @if (auth()->user()->isRoot)
                <div class="accordion" id="adminAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Jumlah Admin : {{ $jumlah_admin }}
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#adminAccordion">
                            <div class="accordion-body">
                                <div class="w-100 d-flex justify-content-end ">
                                    <button class="btn btn-primary btn-sm mb-2">Tambah Admin</button>
                                </div>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Email/username</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Email/username</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($accs_admin as $acc)
                                            <tr class="text-center">
                                                <td>{{ $acc->email }}</td>
                                                <td>{{ $acc->roles->role }}</td>
                                                <td>
                                                    <a href="/reset-pass/{{ $acc->email }}"
                                                        class="btn btn-danger btn-sm">Reset
                                                        Password</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card mb-4 mt-3">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Jumlah Akun Santri: {{ $jumlah_santri }}
                </div>
                <div class="card-body">
                    <table id="datatablesSimple-santri">
                        <thead>
                            <tr>
                                <th>Email/username</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Email/username</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($accs_santri as $acc)
                                <tr class="text-center">
                                    <td>{{ $acc->email }}</td>
                                    <td>{{ $acc->roles->role }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#changeEmailModal">
                                            Change Email
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Change Email</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', event => {
            // Simple-DataTables
            // https://github.com/fiduswriter/Simple-DataTables/wiki

            const datatablesSimple = document.getElementById('datatablesSimple');
            const datatablesSantri = document.getElementById('datatablesSimple-santri');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
                new simpleDatatables.DataTable(datatablesSantri);
            }
        });
    </script>
@endsection
