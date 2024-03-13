@extends('pages.admin.admin')
@section('admin-content')
    <!-- Modal -->
    <div class="modal fade" id="new-gelombang" tabindex="-1" aria-labelledby="new-gelombangLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="new-gelombangLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        for="gelombang-reset-btn"></button>
                </div>
                <form action="{{ route('admin.buka-gelombang') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p class="text-danger text-center ">Membuat gelombang baru akan menghapus gelombang yang lama.</p>
                        <div class="mb-3">
                            <label for="nama_gelombang" class="form-label">Nama gelombang:</label>
                            <input type="text" class="form-control" id="nama_gelombang"
                                placeholder="ex: Gelombang 1 tahun 2024 " name="nama_gelombang" required>
                        </div>
                        <div class="mb-3">
                            <label for="angkatan" class="form-label">Tahun Angkatan</label>
                            <input type="number" class="form-control" id="angkatan" placeholder="ex: 2024" required
                                name="angkatan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="gelombang-reset-btn" class="btn btn-secondary" data-bs-dismiss="modal"
                            type="reset">Close</button>
                        <button class="btn btn-primary" type="submit"
                            onclick="return confirm('Yakin, ingin membuka gelombang?')">Buka</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <button type="button" class="btn btn-primary ms-auto my-3 me-3 " data-bs-toggle="modal"
                data-bs-target="#new-gelombang" style="width: fit-content">
                Buka gelombang
            </button>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar santri gelombang: 0
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
