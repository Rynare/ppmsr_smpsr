@extends('pages.main')
@section('html-start')
    @include('components.bootstrap.bs-basic')
    @include('components.bootstrap.bs-icon')
@endsection
@section('custom')
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 h-75 py-2" href="{{ route('admin.dashboard') }}"
            style="
        width: 225px;
        filter: invert();
        background-repeat: no-repeat;
        background-position: center;
        background-image: url({{ asset('assets/smpsr-logo.svg') }});
        "></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                            data-bs-target="#user.change-emailModal">Ganti email</button>
                    </li>
                    @push('modal-container')
                        <div class="modal fade" id="user.change-emailModal" tabindex="-1"
                            aria-labelledby="user.change-emailModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="user.change-emailModalLabel">Ganti Email</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('user.change-email') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-floating mb-3">
                                                <input required type="email" name='old_email' class="form-control"
                                                    id="user.old-email" placeholder="name@example.com">
                                                <label for="user.old-email">Email lama</label>
                                            </div>
                                            <div class="form-floating">
                                                <input required type="email" name="new_email" class="form-control"
                                                    id="user.new_email" placeholder="Password">
                                                <label for="user.new_email">Email baru</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endpush
                    <li>
                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                            data-bs-target="#user.change-passwordModal">Ganti password</button>
                    </li>
                    @push('modal-container')
                        <div class="modal fade" id="user.change-passwordModal" tabindex="-1"
                            aria-labelledby="user.change-passwordModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="user.change-passwordModalLabel">Ganti Password</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('user.change-password') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-floating mb-3">
                                                <input required type="text" class="form-control" id="user.newPassword"
                                                    placeholder="name@example.com">
                                                <label for="user.newPassword">Password baru</label>
                                            </div>
                                            <div class="form-floating">
                                                <input required type="text" name='new_password' class="form-control"
                                                    id="user.newPasswordConfirm" placeholder="Password"
                                                    aria-describedby="passwordConfirmFeedback">
                                                <label for="user.newPasswordConfirm">Konfirmasi password baru</label>
                                                <div id="passwordConfirmFeedback" class="invalid-feedback">
                                                    Pastikan password sama!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endpush
                    <script>
                        function runPasswordMatchValidationEvent() {
                            const newPass = document.getElementById('user.newPassword');
                            const newPassConfirm = document.getElementById('user.newPasswordConfirm');

                            ['input', 'change', 'keydown', 'keyup', 'keypress'].forEach(actionType => {
                                newPass.addEventListener(actionType, () => {
                                    if (newPassConfirm.value !== newPass.value) {
                                        newPassConfirm.classList.remove('is-valid');
                                        newPassConfirm.classList.add('is-invalid');
                                        newPassConfirm.setCustomValidity('Password tidak cocok')
                                    } else {
                                        newPassConfirm.classList.remove('is-invalid');
                                        newPassConfirm.classList.add('is-valid');
                                        newPassConfirm.setCustomValidity('')
                                    }
                                });

                                newPassConfirm.addEventListener(actionType, () => {
                                    if (newPassConfirm.value !== newPass.value) {
                                        newPassConfirm.classList.remove('is-valid');
                                        newPassConfirm.classList.add('is-invalid');
                                        newPassConfirm.setCustomValidity('Password tidak cocok')
                                    } else {
                                        newPassConfirm.classList.remove('is-invalid');
                                        newPassConfirm.classList.add('is-valid');
                                        newPassConfirm.setCustomValidity('')
                                    }
                                });
                            });
                        }

                        @push('DOM_Loaded')
                            runPasswordMatchValidationEvent()
                        @endpush
                    </script>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('signout') }}"
                            onclick="return confirm('Yakin ingin keluar?')">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="{{ asset('storage/santri/' . $santri->pas_foto) }}" alt="Avatar"
                                    class="img-fluid my-5" width="155" height="230" />
                                <h5 class="text-capitalize ">{{ $santri->nama_santri }}&nbsp;({{ $santri->jenis_kelamin }})
                                </h5>
                                <p><strong>Angkatan</strong> - {{ $santri->angkatan }}</p>
                                <p><strong>Tahun Masuk PPM</strong> - {{ $santri->tahun_masuk_ppm }}</p>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    @include('pages.users.profile.biodata')
                                    @include('pages.users.profile.data-orangtua')
                                    @include('pages.users.profile.data-wali')
                                    @include('pages.users.profile.data-imam')
                                    @include('pages.users.profile.data-khusus')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
