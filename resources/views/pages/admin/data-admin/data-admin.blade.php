@extends('pages.admin.admin')

@section('admin-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Admin</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Admin</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Admin: {{ $jumlah_admin }}
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Email/username</th>
                                <th>Role</th>
                                @if (auth()->user()->isRoot)
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Email/username</th>
                                <th>Role</th>
                                @if (auth()->user()->isRoot)
                                    <th>Action</th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($accs as $acc)
                                <tr class="text-center">
                                    <td>{{ $acc->email }}</td>
                                    <td>{{ $acc->roles->role }}</td>
                                    @if (auth()->user()->isRoot)
                                        <td>
                                            <a href="/reset-pass/{{ $acc->email }}" class="btn btn-danger btn-sm">Reset
                                                Password</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
