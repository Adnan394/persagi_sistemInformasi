@extends('layouts.app')

@section('content')
<main id="main">
    <div class="container mt-5">
        <div class="pagetitle">
            <div class="d-flex justify-content-between mx-2">
                <h1>Data Konsultasi Persagi</h1>
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
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pemohon</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">No Telepon</th>
                    <th scope='col'>Action</th>
                    <th scope='col'>Whatsapp</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->pasien }}</td>
                        <td>{{ $d->no_telepon}}</td>
                        <td>{{ $d->pesan }}</td>                        
                        <td>{{  \Carbon\Carbon::parse($d->created_at)->format('D, d M Y') }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection