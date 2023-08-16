@extends('layouts.app')

@section('content')
<main id="main">
    <div class="container">
        <div class="pagetitle">
            <div class="d-flex justify-content-between mx-2">
                <h1>Permohonan Surat</h1>
            </div>
            <nav class="ms-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">{{ Request::segment(1) }}</li>
                </ol>
            </nav>
        </div>
        <select class="form-select" aria-label="Default select example" id="select" required>
            <option selected>Pilih Jenis Surat</option>
            <option value="1">Surat Rekomendasi</option>
            <option value="2">Surat re STR</option>
            <option value="3">Surat Kredensial</option>
        </select>

          <div class="results">

          </div>

          <section id="rekomendasi" class="d-none">
            <div class="card my-3 p-5">
                <h3>Surat Permohonan Rekomendasi</h3>
                <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="jenis_surat" value="rekomendasi">
                <div class="mb-3">
                    <label for="#title" class="form-label">Upload Fotokopi KTP</label>
                    <input type="file" class="form-control" name="fc_ktp" required>
                </div>
                <div class="mb-3">
                    <label for="#title" class="form-label">Upload Fotokopi Ijazah</label>
                    <input type="file" class="form-control" name="fc_ijazah" required>
                </div>
                <div class="mb-3">
                    <label for="#title" class="form-label">Upload Fotokopi STR yang masih berlaku</label>
                    <input type="file" class="form-control" name="fc_str" required>
                </div>
                <div class="mb-3">
                    <label for="#title" class="form-label">Upload Pasfoto</label>
                    <input type="file" class="form-control" name="pasfoto" required>
                </div>
                <div class="mb-3">
                    <label for="#title" class="form-label">Periode SIK</label>
                    <select class="form-select" aria-label="Default select example" name="periode_sik" id="select_sik" required>
                        <option selected>periode SIK</option>
                        <option value="1">SIK pertama</option>
                        <option value="2">SIK kedua</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="form_sik" id="form_sik"></div>
                </div>
                <button class="btn btn-primary" type="submit">Kirim</button>
                </form>
            </div>
          </section>
          <section id="str" class="d-none">
            <div class="card my-3 p-5">
                <h3>Surat Permohonan re STR</h3>
                <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="jenis_surat" value="str">
                <div class="mb-3">
                    <label for="#title" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="#title" class="form-label">No KTA</label>
                            <input type="number" class="form-control" name="no_kta" required>
                        </div>
                        <div class="col">
                            <label for="#title" class="form-label">Upload KTA</label>
                            <input type="file" class="form-control" name="upload_kta" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="#title" class="form-label">No STR</label>
                            <input type="number" class="form-control" name="no_str" required>
                        </div>
                        <div class="col">
                            <label for="#title" class="form-label">Upload STR</label>
                            <input type="file" class="form-control" name="upload_str" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="#title" class="form-label">Tanggal Berakhir</label>
                    <input type="date" class="form-control" name="tanggal_berakhir" required>
                </div>
                <div class="mb-3">
                    <label for="#title" class="form-label">Instansi</label>
                    <input type="text" class="form-control" name="instansi" required>
                </div>
                <div class="mb-3">
                    <label for="#title" class="form-label">No Telp</label>
                    <input type="number" class="form-control" name="no_telp" required>
                </div>
                
                <button class="btn btn-primary" type="submit">Kirim</button>
                </form>
            </div>
          </section>
          <section id="kredensial" class="d-none">
            <div class="card my-3 p-5">
                <h3>Surat Permohonan Kredensial</h3>
                <form action="{{ route('surat.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jenis_surat" value="kredensial">
                    <div class="mb-3">
                        <label for="#title" class="form-label">Upload Surat</label>
                        <input type="file" class="form-control" name="surat_kredensial" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
          </section>
    </div>
</main>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $("#select").on("change", function() {
        if(this.value == 1) {
            $("#str").addClass('d-none');
            $("#kredensial").addClass('d-none');
            $("#rekomendasi").removeClass('d-none');
            $("#rekomendasi").addClass('d-block');
        }
        if(this.value == 2) {
            $("#rekomendasi").addClass('d-none');
            $("#kredensial").addClass('d-none');
            $("#str").removeClass('d-none');
            $("#str").addClass('d-block');
        }
        if(this.value == 3) {
            $("#str").addClass('d-none');
            $("#rekomendasi").addClass('d-none');
            $("#kredensial").removeClass('d-none');
            $("#kredensial").addClass('d-block');
        }
    });

    $("#select_sik").on("change", function() {
        if(this.value == 1) {
            $("#form_sik").html(`
                <div class="mb-3">
                    <label for="#title" class="form-label">Upload SK Bekerja</label>
                    <input type="file" class="form-control" name="sk_bekerja" required>
                </div>
                <div class="mb-3">
                    <label for="#title" class="form-label">Upload Biaya Administrasi</label>
                    <input type="file" class="form-control" name="biaya_administrasi" required>
                </div>
            `);
        }
        if(this.value == 2) {
            $("#form_sik").html(`
                <div class="mb-3">
                    <label for="#title" class="form-label">Upload Kontrak Kerja (memuat uraian & jam kerja)</label>
                    <input type="file" class="form-control" name="kontrak_kerja" required>
                </div>
                <div class="mb-3">
                    <label for="#title" class="form-label">Upload Biaya Administrasi</label>
                    <input type="file" class="form-control" name="biaya_administrasi" required>
                </div>
            `);
        }
    });
</script>
@endsection