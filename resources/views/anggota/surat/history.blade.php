@extends('layouts.app')
@section('content')
    <main id="main">
        <div class="container">
            <div class="pagetitle">
                <div class="d-flex justify-content-between mx-2">
                    <h1>History Surat</h1>
                    <select class="form-select w-25" aria-label="Default select example" id="select" required>
                        <option selected>Pilih Jenis Surat</option>
                        <option value="1">Surat Rekomendasi</option>
                        <option value="2">Surat re STR</option>
                        <option value="3">Surat Kredensial</option>
                    </select>
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
            <div class="d-none" id="rekomendasi">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Surat</th>
                            <th scope="col">User</th>
                            <th scope="col">Periode SIK</th>
                            <th scope="col">Status</th>
                            <th scope="col">File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekomendasi as $d)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th scope="row">Rekomendasi</th>
                            <td>{{ \App\Models\User::where('id', $d->user_id)->first()->name }}</td>
                            
                            <td>{{ $d->periode_sik }}</td>
                            <td><h6><span class="badge {{ ($d->is_complete == 0) ? 'bg-danger' : 'bg-success' }}">{{ ($d->is_complete == 0) ? 'File Belum dibuat' : 'Selesai' }}</span></h6></td>
                            <td>
                                @if ($d->is_complete == 1)
                                <a target="_blank" href="/storage/{{ $d->surat_jadi }}">Download</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-none" id="str">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Surat</th>
                            <th scope="col">User</th>
                            <th scope="col">Status</th>
                            <th scope="col">File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($str as $d)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th scope="row">re STR</th>
                            <td>{{ \App\Models\User::where('id', $d->user_id)->first()->name }}</td>
                            <td><h6><span class="badge {{ ($d->is_complete == 0) ? 'bg-danger' : 'bg-success' }}">{{ ($d->is_complete == 0) ? 'File Belum dibuat' : 'Selesai' }}</span></h6></td>
                            <td>
                                @if ($d->is_complete == 1)
                                <a target="_blank" href="/storage/{{ $d->surat_jadi }}">Download</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-none" id="kredensial">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Surat</th>
                            <th scope="col">User</th>
                            <th scope="col">Status</th>
                            <th scope="col">File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kredensial as $d)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th scope="row">Kredensial</th>
                            <td>{{ \App\Models\User::where('id', $d->user_id)->first()->name }}</td>
                            <td><h6><span class="badge {{ ($d->is_complete == 0) ? 'bg-danger' : 'bg-success' }}">{{ ($d->is_complete == 0) ? 'File Belum dibuat' : 'Selesai' }}</span></h6></td>
                            <td>
                                @if ($d->is_complete == 1)
                                <a target="_blank" href="/storage/{{ $d->surat_jadi }}">Download</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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

</script>
@endsection