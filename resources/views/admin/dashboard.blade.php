@extends('layouts/app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="filter">

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">
                                    Anggota Lama <span>| Jumlah</span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    >
                                        <i class="bi bi-person-lines-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ \App\Models\daftarAnggota::where('status', 1)->count() }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="filter">

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">
                                    Anggota Baru <span>| Jumlah</span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    >
                                        <i class="bi bi-person-lines-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ \App\Models\daftarAnggota::where('status', 0)->count() }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="filter">

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">
                                    Total Semua Anggota
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    >
                                        <i class="bi bi-person-lines-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ \App\Models\daftarAnggota::all()->count() }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="filter">

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">
                                    Konsultan Masuk 
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    >
                                        <i
                                            class="bi bi-clipboard2-pulse"
                                        ></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ \App\Models\Konsultasi::where('is_complete', null)->count() }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="filter">

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">
                                    Sudah Berkonsultasi
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    >
                                        <i
                                            class="bi bi-clipboard2-pulse"
                                        ></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ \App\Models\Konsultasi::where('is_complete', 1)->count() }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="filter">

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">
                                    Total Semua Konsultan
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    >
                                        <i
                                            class="bi bi-clipboard2-pulse"
                                        ></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ App\Models\Konsultasi::all()->count() }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- data artikel --}}
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="filter">

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">
                                    Total Semua Artikel
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    >
                                        <i
                                            class="bi bi-globe"
                                        ></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ \App\Models\artikel::all()->count() }}</h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="filter">

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">
                                    Total Semua Event
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    >
                                        <i
                                            class="bi bi-calendar-event"
                                        ></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ \App\Models\event::all()->count() }}</h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Revenue Card -->
                </div>
            </div>
            <!-- End Left side columns -->

            <!-- Right side columns -->

            <!-- End Right side columns -->
        </div>
    </section>
</main>
@endsection