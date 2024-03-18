@extends('pages.main')
@section('html-start')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('assets2/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    @include('components.bootstrap.bs-icon')
    @include('components.bootstrap.bs-basic')
    @include('components.bootstrap.bs-popper')
@endsection
@section('html-end')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script> --}}
    <script src="{{ asset('assets2/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets2/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets2/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets2/js/datatables-simple-demo.js') }}"></script>
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
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
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
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    @php
                        $navs = [
                            [
                                'heading' => 'Menu',
                                'name' => 'Dashboard',
                                'request' => 'dashboard*',
                                'icon' => 'bi bi-speedometer',
                                'route' => route('admin.dashboard'),
                            ],
                            [
                                'name' => 'Akun Terdaftar',
                                'request' => 'account*',
                                'icon' => 'bi bi-shield-check',
                                'route' => route('admin.account'),
                            ],
                            [
                                'name' => 'Data Santri',
                                'request' => 'data-santri*',
                                'icon' => 'bi bi-person-lines-fill',
                                'route' => route('admin.data-santri'),
                            ],
                            [
                                'name' => 'Riwayat Gelombang',
                                'request' => 'riwayat-gelombang*',
                                'icon' => 'bi bi-hourglass-bottom',
                                'route' => route('admin.riwayat-gelombang'),
                            ],
                        ];
                    @endphp
                    @foreach ($navs as $nav)
                        <div class="nav">
                            @if (isset($nav['heading']))
                                <div class="sb-sidenav-menu-heading">{{ $nav['heading'] }}</div>
                            @endif
                            <a class="nav-link {{ Request::is($nav['request']) ? 'active' : '' }}"
                                href="{{ $nav['route'] }}">
                                <div class="sb-nav-link-icon d-flex align-items-center justify-content-center p-0 m-0">
                                    <i class="{{ $nav['icon'] ?? '' }}" style="font-size: 18px;"></i>
                                </div>
                                <div class="ms-2">{{ ucfirst($nav['name']) }}</div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ auth()->user()->email }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            @yield('admin-content')
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
