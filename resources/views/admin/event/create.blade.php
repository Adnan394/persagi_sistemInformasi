@extends('layouts.app')
@section('js')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea',
    });
</script>
@endsection
@section('content')
<main id="main">
    <div class="container">
        <div class="pagetitle">
            <div class="d-flex justify-content-between mx-2">
                <h1>Tambah Event</h1>
                <a href="{{ route('event.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <nav class="ms-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">{{ Request::segment(2) }}</li>
                    <li class="breadcrumb-item">{{ Request::segment(3) }}</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3">
                        <label for="#title" class="form-label">Judul Event</label>
                        <input type="text" class="form-control" id="title" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="#picture" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="picture" name="gambar" required>
                    </div>
                    <div class="mb-3">
                        <label for="#description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" rows="3" name="deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="#date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="date" rows="3" name="tanggal"></input>
                    </div>
                    <div class="mb-3">
                        <label for="#time" class="form-label">Waktu</label>
                        <input type="time" class="form-control" id="time" rows="3" name="jam"></input>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection