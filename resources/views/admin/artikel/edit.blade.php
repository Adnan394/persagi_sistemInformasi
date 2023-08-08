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
                <h1>Edit Artikel</h1>
                <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Kembali</a>
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
                <form action="{{ route('artikel.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="my-3">
                        <label for="#title" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control" id="title" name="judul" value="{{ $data->judul }}">
                    </div>
                    <div class="mb-3">
                        <label for="#meta-judul" class="form-label">Meta Judul</label>
                        <input type="text" class="form-control" id="meta-judul" name="meta_judul" value="{{ $data->meta_judul }}">
                    </div>
                    <div class="mb-3">
                        <label for="#meta-deskripsi" class="form-label">Meta Deskripsi</label>
                        <input type="text" class="form-control" id="meta-deskripsi" name="meta_deskripsi" value="{{ $data->meta_deskripsi }}">
                    </div>
                    <div class="mb-3">
                        <label for="#meta-deskripsi" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="meta-deskripsi" name="gambar">
                    </div>
                    <div class="mb-3">
                        <label for="#content" class="form-label">Konten</label>
                        <textarea class="form-control" id="content" rows="3" name="konten">{{ $data->konten }}</textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection