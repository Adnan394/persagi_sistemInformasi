@extends('layouts.app')

@section('content')
    <main id="main">
        <div class="container">
            <div class="pagetitle">
                <div class="d-flex justify-content-between mx-2">
                    <h1>Detail Permohonan Surat</h1>
                    <a href="{{ route('dataSurat.index') }}" class="btn btn-secondary">Kembali</a>
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
            @if ($jenis_surat == 'rekomendasi')
            <div class="card p-5">
                <h3>Detail Permohonan Surat</h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <p><strong>Nama</strong></p>
                            <p><strong>Periode SIK</strong></p>
                            <p><strong>FC KTP</strong></p>
                            <p><strong>FC Ijazah</strong></p>
                            <p><strong>FC STR Lama</strong></p>
                            <p><strong>Pasfoto</strong></p>
                            <p><strong>SK Bekerja</strong></p>
                            <p><strong>Biaya Administrasi</strong></p>
                        </div>
                        <div class="col">
                            <p>{{ \App\Models\User::where('id', $rekomendasi->user_id)->first()->name }}</p>
                            <p>{{ $rekomendasi->periode_sik }}</p>
                            <p>
                                <a target="_blank" href="/storage/{{ $rekomendasi->fc_ktp }}">Lihat upload FC KTP</a>
                            </p>
                            <p>
                                <a target="_blank" href="/storage/{{ $rekomendasi->fc_ijazah }}">Lihat upload FC Ijazah</a>
                            </p>
                            <p>
                                <a target="_blank" href="/storage/{{ $rekomendasi->fc_str_lama }}">Lihat upload STR Lama</a>
                            </p>
                            <p>
                                <a target="_blank" href="/storage/{{ $rekomendasi->pasfoto }}">Lihat upload Pasfoto</a>
                            </p>
                            <p>
                                <a target="_blank" href="/storage/{{ $rekomendasi->sk_bekerja }}">Lihat upload SK Bekerja</a>
                            </p>
                            <p>
                                <a target="_blank" href="/storage/{{ $rekomendasi->biaya_administrasi }}">Lihat upload Biaya Administrasi</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($jenis_surat == 'str')
            <div class="card p-5">
                <h3>Detail Permohonan Surat</h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <p><strong>Nama</strong></p>
                            <p><strong>No KTA</strong></p>
                            <p><strong>Upload KTA</strong></p>
                            <p><strong>No STR</strong></p>
                            <p><strong>Upload STR</strong></p>
                            <p><strong>Tanggal Berakhir</strong></p>
                            <p><strong>Instansi</strong></p>
                            <p><strong>No Telp</strong></p>
                        </div>
                        <div class="col">
                            <p>{{ \App\Models\User::where('id', $str->user_id)->first()->name }}</p>
                            <p>{{ $str->no_kta }}</p>
                            <p>
                                <a target="_blank" href="/storage/{{ $str->upload_kta }}">Lihat upload No KTA</a>
                            </p>
                            <p>{{ $str->no_str }}</p>
                            <p>
                                <a target="_blank" href="/storage/{{ $str->upload_str }}">Lihat upload No STR</a>
                            </p>
                            <p>{{ $str->taggal_berakhir }}</p>
                            <p>{{ $str->instansi }}</p>
                            <p>{{ $str->no_telp }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </main>
@endsection