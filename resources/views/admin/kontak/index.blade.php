@extends('layouts.app')

@section('content')
<main id="main">
    <div class="container mt-5">
        <div class="pagetitle">
            <div class="d-flex justify-content-between mx-2">
                <h1>Data Feedback Persagi</h1>
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
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pesan</th>
                    <th scope='col'>Tanggal Aspirasi</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->judul }}</td>
                        <td>{{ $d->pesan }}</td>                        
                        <td>{{  \Carbon\Carbon::parse($d->created_at)->format('D, d M Y') }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection