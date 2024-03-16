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
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Jumlah Admin : {{ $jumlah_admin }}
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapsed collapse" aria-labelledby="headingOne"
                            data-bs-parent="#adminAccordion">
                            <div class="accordion-body">
                                <div class="w-100 d-flex justify-content-end ">
                                    <button class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#tambah-admin">Tambah Admin</button>
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
                                                    <a href={{ route('admin.hapus-akun', ['user' => $acc->id]) }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus akun ini sebagai admin?')">Hapus</a>
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
                                <th>Nama</th>
                                <th>Email/username</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Email/username</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($accs_santri as $acc)
                                <tr class="text-center">
                                    <td>{{ $acc->name }}</td>
                                    <td>{{ $acc->email }}</td>
                                    <td>{{ $acc->roles->role }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#changeEmailModal" value="{{ $acc->email }}"
                                            onclick="document.querySelector('#changeEmailModal [name=old-email]').value = this.value">
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
    <!-- Buat Modal -->
    <div class="modal fade" id="tambah-admin" tabindex="-1" aria-labelledby="tambah-adminLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambah-adminLabel">Tambahkan Admin Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.buat-akun-admin') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="name@example.com"
                                name="email">
                            <label for="email">Email address</label>
                        </div>
                        <span class="text-danger ">Password akan sama dengan email.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="changeEmailModal" tabindex="-1" aria-labelledby="changeEmailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="changeEmailModalLabel">Change Email</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.akun-santri.change-email') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="name@example.com"
                                name="email">
                            <label for="email">Email address</label>
                        </div>
                        <span class="text-danger ">Password akan direset juga dan nilainya akan sama dengan email.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="old-email" value="">Ubah</button>
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
