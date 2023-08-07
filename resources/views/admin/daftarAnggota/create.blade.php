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
                    <h1>Tambah Anggota</h1>
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
                    <form action="{{ route('daftarAnggota.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="#picture" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="picture" name="gambar" required>
                        </div>
                        <div class="my-3">
                            <label for="#nama" class="form-label">Nama</label>
                            <select name="nama" class="form-control" required="required">
                            @foreach ($user as $u)
                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="#tempat-lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat-lahir" name="tempat_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="#tanggal-lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal-lahir" name="tanggal_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="#agama" class="form-label">Agama</label>
                            <input type="text" class="form-control" id="agama" name="agama" required>
                        </div>
                        <div class="mb-3">
                            <label for="#nik" class="form-label">NIK</label>
                            <input type="number" class="form-control" id="nik" name="nik" required>
                        </div>
                        <div class="mb-3">
                            <label for="#pendidikan-terakhir" class="form-label">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" id="pendidikan-terakhir" name="pendidikan_terakhir"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="#no-kta" class="form-label">No KTA</label>
                            <input type="text" class="form-control" id="no-kta" name="no_kta" required>
                        </div>
                        <div class="mb-3">
                            <label for="#no-str" class="form-label">No STR</label>
                            <input type="text" class="form-control" id="no-str" name="no_str" required>
                        </div>
                        <div class="mb-3">
                            <label for="#tempat-kerja-1" class="form-label">Tempat Kerja 1</label>
                            <input type="text" class="form-control" id="tempat-kerja-1" name="tempat_kerja_1" required>
                        </div>
                        <div class="mb-3">
                            <label for="#alamat-tempat-kerja-1" class="form-label">Alamat Tempat Kerja 1</label>
                            <input type="text" class="form-control" id="alamat-tempat-kerja-1"
                                name="alamat_tempat_kerja_1" required>
                        </div>
                        <div class="mb-3">
                            <label for="#tempat-kerja-2" class="form-label">Tempat Kerja 2</label>
                            <input type="text" class="form-control" id="tempat-kerja-2" name="tempat_kerja_2" required>
                        </div>
                        <div class="mb-3">
                            <label for="#alamat-tempat-kerja-2" class="form-label">Alamat Tempat Kerja 2</label>
                            <input type="text" class="form-control" id="alamat-tempat-kerja-2"
                                name="alamat_tempat_kerja_2" required>
                        </div>
                        <div class="mb-3">
                            <label for="#alamat-tinggal" class="form-label">Alamat Tempat Tinggal</label>
                            <input type="text" class="form-control" id="alamat-tinggal" rows="3"
                                name="alamat_tinggal" required></input>
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
