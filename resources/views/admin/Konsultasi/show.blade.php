@extends('layouts.app')

@section('content')
    <main id="main">
        <div class="container">
            <div class="pagetitle">
                <div class="d-flex justify-content-between mx-2">
                    <h1>Detail Permohonan Konsultasi</h1>
                    <a href="{{ route('konsultasi.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <nav class="ms-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">{{ Request::segment(2) }}</li>
                    </ol>
                </nav>
            </div>
            <div class="card p-5">
                <h3>Detail Permohonan Konsultasi</h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <p><strong>Nama Pemohon</strong></p>
                            <p><strong>Nama Pasien</strong></p>
                            <p><strong>No Telepon</strong></p>
                            <p><strong>Berat Badan</strong></p>
                            <p><strong>Tinggi Badan</strong></p>
                            <p><strong>Tanggal Lahir</strong></p>
                            <p><strong>Jadwal Konsultasi</strong></p>
                            <p><strong>Keluhan</strong></p>
                            <p><strong>Tanggal Upload</strong></p>
                        </div>
                        <div class="col">
                            <p>{{ \App\Models\User::where('id', $data->id_user)->first()->name }}</p>
                            <p>{{ $data->pasien }}</p>
                            <p>{{ $data->no_telepon }}</p>
                            <p>{{ $data->berat_badan }}</p>
                            <p>{{ $data->tinggi_badan }}</p>
                            <p>{{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('D, d M Y') }}</p>
                            <p>{{ \Carbon\Carbon::parse($data->jadwal_konsultasi)->format('D, d M Y') }}</p>
                            <p>{{ $data->keluhan }}</p>
                            <p>{{ \Carbon\Carbon::parse($data->created_at)->format('D, d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection