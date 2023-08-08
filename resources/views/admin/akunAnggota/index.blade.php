@extends('layouts.app')

@section('content')
<main id="main">
    <div class="container mt-5">
        <div class="pagetitle">
            <div class="d-flex justify-content-between mx-2">
                <h1>Data Artikel</h1>
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
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->username }}</td>
                    <td>{{ $d->email }}</td>
                    <td><h6><span class="badge {{ ($d->is_active == 0) ? 'bg-danger' : 'bg-success' }}">{{ ($d->is_active == 0) ? 'Belum Aktif' : 'Aktif' }}</span></h6></td>
                    <td>
                        <div class="d-flex gap-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aktifasi{{ $d->id }}" {{ ($d->is_active == 0) ? '' : 'disabled' }}><i class="bi bi-check2-circle"></i></button>
                        <form action="{{ route('daftarAnggota.destroy', $d->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                        </form>
                    </div>
                    </td>
                </tr>
                {{-- modal Aktifasi  --}}
                <div class="modal fade" id="aktifasi{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <h4 class="px-5 text-center mb-5"><strong>Apakah Akan mengaktifkaan Akun ini?</strong></h4>
                          {{-- <img src="{{ asset('assets/img/Check.png') }}" alt="" width="150px" class="d-block m-auto mb-5"> --}}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary ms-auto" data-bs-dismiss="modal">Batal</button>
                          <form action="{{ route('akunAnggota.update', $d->id) }}" method="POST">
                            @method('PUT')
                            @csrf
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
</main>
@endsection