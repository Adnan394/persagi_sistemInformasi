@extends('layouts.app')

@section('content')
    <main id="main">
        <div class="container">
            <div class="pagetitle">
                <div class="d-flex justify-content-between mx-2">
                    <h1>Data Surat</h1>
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
                        <li class="breadcrumb-item">{{ Request::segment(2) }}</li>
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
                            <th scope="col">Action</th>
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
                                <div class="d-flex gap-2">
                                    <a data-bs-toggle="modal" data-bs-target="#uploadrekomendasi{{ $d->id }}" class="btn btn-primary"><i class="bi bi-upload"></i></a>
                                    <form action="{{ route('dataSurat.show', $d->id) }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="jenis_surat" value="rekomendasi">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-eye"></i></button>
                                    </form>
                                    <form action="{{ route('dataSurat.destroy', $d->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="jenis_surat" value="rekomendasi">
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
    
                        {{-- modal upload  --}}
                        <div class="modal fade" id="uploadrekomendasi{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <h4 class="px-5 text-center mb-5"><strong>Kirimkan Surat Permohonan!</strong></h4>
                                    <form action="{{ route('dataSurat.update', $d->id) }}" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="jenis_surat" value="rekomendasi">
                                        <div class="mb-3">
                                            <label for="#title" class="form-label">Upload Surat</label>
                                            <input type="file" class="form-control" name="surat_jadi" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary ms-auto" data-bs-dismiss="modal">Batal</button>
                                  <button class="btn btn-primary" type="submit">Lanjutkan</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-none" id="str">
                <table class="table datatable" >
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Surat</th>
                            <th scope="col">User</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
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
                                <div class="d-flex gap-2">
                                    <a data-bs-toggle="modal" data-bs-target="#uploadStr{{ $d->id }}" class="btn btn-primary"><i class="bi bi-upload"></i></a>
                                    <form action="{{ route('dataSurat.show', $d->id) }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="jenis_surat" value="str">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-eye"></i></button>
                                    </form>
                                    <form action="{{ route('dataSurat.destroy', $d->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="jenis_surat" value="str">
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
    
                        {{-- modal upload  --}}
                        <div class="modal fade" id="uploadStr{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <h4 class="px-5 text-center mb-5"><strong>Kirimkan Surat Permohonan!</strong></h4>
                                    <form action="{{ route('dataSurat.update', $d->id) }}" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="jenis_surat" value="str">
                                        <div class="mb-3">
                                            <label for="#title" class="form-label">Upload Surat</label>
                                            <input type="file" class="form-control" name="surat_jadi" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary ms-auto" data-bs-dismiss="modal">Batal</button>
                                  <button class="btn btn-primary" type="submit">Lanjutkan</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-none" id="kredensial">
                <table class="table datatable" >
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Surat</th>
                            <th scope="col">User</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
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
                                <div class="d-flex gap-2">
                                    <a data-bs-toggle="modal" data-bs-target="#uploadKredensial{{ $d->id }}" class="btn btn-primary"><i class="bi bi-upload"></i></a>
                                    <form action="{{ route('dataSurat.show', $d->id) }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="jenis_surat" value="kredensial">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-eye"></i></button>
                                    </form>
                                    <form action="{{ route('dataSurat.destroy', $d->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="jenis_surat" value="kredensial">
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
    
                        {{-- modal upload  --}}
                        <div class="modal fade" id="uploadKredensial{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <h4 class="px-5 text-center mb-5"><strong>Kirimkan Surat Permohonan!</strong></h4>
                                    <form action="{{ route('dataSurat.update', $d->id) }}" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="jenis_surat" value="kredensial">
                                        <div class="mb-3">
                                            <label for="#title" class="form-label">Upload Surat</label>
                                            <input type="file" class="form-control" name="surat_jadi" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary ms-auto" data-bs-dismiss="modal">Batal</button>
                                  <button class="btn btn-primary" type="submit">Lanjutkan</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
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