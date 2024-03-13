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
                    <form action="{{ route('') }}">
                        <div class="form-group">
                            <label for="" class="mb-2">Pilih Angkatan</label>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">
                                    <i class="bi bi-folder2-open"></i>
                                </label>
                                <select class="form-select" id="inputGroupSelect01">
                                    <option value=""><a href="https://youtube.com">Youtube</a></option>
                                </select>
                            </div>
                            <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
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
