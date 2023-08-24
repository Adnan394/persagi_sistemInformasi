@extends('layouts.app')

@section('content')
<main id="main">
    <div class="container mt-5">
        <div class="pagetitle">
            <div class="d-flex justify-content-between mx-2">
                <h1>Data Konsultasi Persagi</h1>
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
                    <th scope="col">Nama Pemohon</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Jadwal Konsultasi</th>
                    <th scope="col">Status</th>
                    <th scope='col'>Action</th>
                    <th scope='col'>Whatsapp</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ \App\Models\User::where('id', $d->id_user)->first()->name }}</td>
                        <td>{{ $d->pasien }}</td>
                        <td>{{ $d->no_telepon}}</td>       
                        <td>{{ \Carbon\Carbon::parse($d->created_at)->format('D, d M Y') }}</td>  
                        <td><h6><span class="badge {{ ($d->is_complete == 0) ? 'bg-danger' : 'bg-success' }}">{{ ($d->is_complete == 1) ? 'Selesai' : 'Diproses' }}</span></h6></td>              
                        <td>
                            <div class="d-flex gap-2">
                                <a data-bs-toggle="modal" data-bs-target="#konsultasi{{ $d->id }}" class="btn btn-primary"><i class="bi bi-check2-circle"></i></a>
                                <form action="{{ route('konsultasi.show', $d->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-eye"></i></button>
                                </form>
                                <form action="{{ route('konsultasi.destroy', $d->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </td>
                        <th scope="col">
                        <a target="_blank" href="https://api.whatsapp.com/send?phone={{$d['no_telepon']}}&text= Halo, saya dari Persagi Karawang. Bagaimana kabarmu apakah bisa dimulai hari ini? :)"><img width="20" src="https://img.icons8.com/ios-glyphs/30/000000/whatsapp.png"></a> <strong> {{ $d['pasien'] }} </strong>
                        </th>
                    </tr>
                    {{-- modal Aktifasi  --}}
                    <div class="modal fade" id="konsultasi{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <h4 class="px-5 text-center mb-5"><strong>Dengan ini konsultasi dinyatakan Diproses/Selesai?</strong></h4>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary ms-auto" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('konsultasi.update', $d->id) }}" method="POST">
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