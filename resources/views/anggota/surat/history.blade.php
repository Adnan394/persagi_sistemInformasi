@extends('layouts.app')
@section('content')
    <main id="main">
        <div class="container">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Periode SIK</th>
                        <th scope="col">Status</th>
                        <th scope="col">File</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
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
    </main>
@endsection