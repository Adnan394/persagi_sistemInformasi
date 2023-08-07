@extends('layouts.app')

@section('content')
<main id="main">
    <div class="container mt-5">
        <div class="pagetitle">
            <div class="d-flex justify-content-between mx-2">
                <h1>Data Artikel</h1>
                <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah Artikel</a>
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
                    <th scope="col">Gambar</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ Storage::url($d->gambar) }}" alt="" width="50px">
                    </td>
                    <td>{{ $d->judul }}</td>
                    <td>{{ \Carbon\Carbon::parse($d->created_at)->format('D, d M Y') }}</td>
                    <td class="d-flex">
                        <a href="{{ route('artikel.show', $d->slug) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('artikel.edit', $d->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                        <a href="" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection