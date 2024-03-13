@extends('pages.main')
@section('html-start')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('assets2/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    @include('components.bootstrap.bs-icon')
@endsection
@section('html-end')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
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
                    {{-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li> --}}
                    {{-- <li>
                        <hr class="dropdown-divider" />
                    </li> --}}
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
                                'name' => 'Data Admin',
                                'request' => 'data-admin*',
                                'icon' => 'bi bi-shield-check',
                                'route' => route('admin.data-admin'),
                            ],
                            [
                                'name' => 'Data Santri',
                                'request' => 'data-santri*',
                                'icon' => 'bi bi-person-lines-fill',
                                'route' => route('admin.data-santri'),
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
