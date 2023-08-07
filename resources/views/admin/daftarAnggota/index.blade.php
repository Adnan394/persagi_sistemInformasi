@extends('layouts.app')

@section('content')
<main id="main">
    <div class="container mt-5">
        <div class="pagetitle">
            <div class="d-flex justify-content-between mx-2">
                <h1>Data Anggota Persagi Karawang</h1>
                <a href="{{ route('daftarAnggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
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
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <img src="{{ Storage::url($d->gambar) }}" alt="" width="80px">
                        </td>
                        <td>{{ $d->nama }}</td>
                        
                        <td class="d-flex">
                            <a href="" class="btn btn-primary">View</a>
                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection