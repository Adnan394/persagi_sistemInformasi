<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <title>Persagi Karawang</title>
        <meta content="" name="description" />
        <meta content="" name="keywords" />

        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon" />
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect" />
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet"
        />

        <!-- Vendor CSS Files -->
        <link
            href="{{  asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{  asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{  asset('assets/vendor/boxicons/css/boxicons.min.css')}}"
            rel="stylesheet"
        />
        <link href="{{  asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet" />
        <link href="{{  asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet" />
        <link href="{{  asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet" />
        <link
            href="{{  asset('assets/vendor/simple-datatables/style.css')}}"
            rel="stylesheet"
        />

        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    </head>

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="" alt="" />
                    <span class="d-none d-lg-block">Persagi Karawang</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div>
            <!-- End Logo -->

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">
                    <li class="nav-item d-block d-lg-none">
                    </li>


                    <li class="nav-item dropdown pe-3">
                        <a
                            class="nav-link nav-profile d-flex align-items-center pe-0"
                            href="#"
                            data-bs-toggle="dropdown"
                        >
                        @if (Auth::user()->role_id == 1)
                        <img
                            src="{{ asset('assets/img/defaultpp.jpeg') }}"
                            alt="Profile"
                            class="rounded-circle"
                        />
                        @else
                            @if (\App\Models\daftarAnggota::where('user_id', Auth::user()->id)->first())
                                <img
                                    src="{{ Storage::url(Auth::user()->daftar_anggotas->gambar) }}"
                                    alt="Profile"
                                    class="rounded-circle"
                                />  
                            @else
                                <img
                                src="{{ asset('assets/img/defaultpp.jpeg') }}"
                                alt="Profile"
                                class="rounded-circle"
                                />
                            @endif
                        @endif
                            <span class="d-none d-md-block dropdown-toggle ps-2"
                                >{{ Auth::user()->name }}</span
                            > </a
                        ><!-- End Profile Iamge Icon -->

                        <ul
                            class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile"
                        >
                            <li class="dropdown-header">
                                <h6>{{ Auth::user()->name }}</h6>
                                <span>{{ Auth::user()->username }}</span>
                            </li>
                            <li> 
                                <hr class="dropdown-divider" />
                            </li>

                            <li>
                                <a
                                    class="dropdown-item d-flex align-items-center"
                                    href="{{ route('logout') }}"
                                >
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </li>
                        </ul>
                        <!-- End Profile Dropdown Items -->
                    </li>
                    <!-- End Profile Nav -->
                </ul>
            </nav>
            <!-- End Icons Navigation -->
        </header>
        <!-- End Header -->

        {{-- main  --}}
        @yield('content')
        {{-- end main  --}}

        <!-- ======= Sidebar ======= -->
        @if (Auth::user()->role_id == 1)
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a
                        class="nav-link collapsed"
                        data-bs-target="#components-nav"
                        data-bs-toggle="collapse"
                        href="#"
                    >
                        <i class="bi bi-menu-button-wide"></i
                        ><span>Data Konsultasi</span
                        ><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul
                        id="components-nav"
                        class="nav-content collapse"
                        data-bs-parent="#sidebar-nav"
                    >
                        <li>
                            <a href="{{ route('konsultasi.index') }}">
                                <i class="bi bi-circle"></i><span>Data Konsultan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Components Nav -->

                <li class="nav-item">
                    <a
                        class="nav-link collapsed"
                        data-bs-target="#forms-nav"
                        data-bs-toggle="collapse"
                        href="#"
                    >
                        <i class="bi bi-journal-text"></i><span>Data Persagi</span
                        ><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul
                        id="forms-nav"
                        class="nav-content collapse"
                        data-bs-parent="#sidebar-nav"
                    >
                        <li>
                            <a href="{{ route('akunAnggota.index') }}">
                                <i class="bi bi-circle"></i
                                ><span>Akun Anggota</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('daftarAnggota.index') }}">
                                <i class="bi bi-circle"></i
                                ><span>Data Anggota Persagi</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dataSurat.index') }}">
                                <i class="bi bi-circle"></i
                                ><span>Permintaan Surat</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dataKas.index') }}">
                                <i class="bi bi-circle"></i
                                ><span>Data Kas Anggota</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Forms Nav -->

                <li class="nav-item">
                    <a
                        class="nav-link collapsed"
                        data-bs-target="#tables-nav"
                        data-bs-toggle="collapse"
                        href="#"
                    >
                        <i class="bi bi-layout-text-window-reverse"></i
                        ><span>Web Profile</span
                        ><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul
                        id="tables-nav"
                        class="nav-content collapse"
                        data-bs-parent="#sidebar-nav"
                    >
                        <li>
                            <a href="{{ route('event.index') }}">
                                <i class="bi bi-circle"></i
                                ><span>Data Event</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('artikel.index') }}">
                                <i class="bi bi-circle"></i
                                ><span>Data Artikel</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('kontak.index') }}">
                                <i class="bi bi-circle"></i
                                ><span>Data Feedback</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Tables Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('logout') }}">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Logout</span>
                    </a>
                </li>
                <!-- End Login Page Nav -->
            </ul>
        </aside> 
        @elseif (Auth::user()->role_id == 2)
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->


                <li class="nav-item">
                    <a
                        class="nav-link collapsed"
                        data-bs-target="#forms-nav"
                        data-bs-toggle="collapse"
                        href="#"
                    >
                        <i class="bi bi-journal-text"></i><span>Data Persagi</span
                        ><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul
                        id="forms-nav"
                        class="nav-content collapse"
                        data-bs-parent="#sidebar-nav"
                    >
                        <li>
                            <a href="{{ route('surat.index') }}">
                                <i class="bi bi-circle"></i
                                ><span>Permintaan Surat</span>
                            </a>
                        </li>
                        <li>
                            <a href="/historySurat">
                                <i class="bi bi-circle"></i
                                ><span>History Surat</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('kas.index') }}">
                                <i class="bi bi-circle"></i
                                ><span>Kas Anggota</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Forms Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('logout') }}">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Logout</span>
                    </a>
                </li>
                <!-- End Login Page Nav -->
            </ul>
        </aside>    
        @endif

        <!-- End Sidebar-->

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="copyright">
                &copy; Copyright <strong><span>Persagi Karawang</span></strong
                >. All Rights Reserved
            </div>
        </footer>
        <!-- End Footer -->

        <a
            href="#"
            class="back-to-top d-flex align-items-center justify-content-center"
            ><i class="bi bi-arrow-up-short"></i
        ></a>

                

        <!-- Vendor JS Files -->
        <script src="{{  asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{  asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{  asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
        <script src="{{  asset('assets/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{  asset('assets/vendor/quill/quill.min.js')}}"></script>
        <script src="{{  asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
        <script src="{{  asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{  asset('assets/vendor/php-email-form/validate.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        @yield('js')
    </body>
</html>