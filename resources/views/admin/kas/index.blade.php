@extends('layouts.app')
@section('content')
    <main id="main">
        <div class="container">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Periode</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">bukti_tf</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ \App\Models\User::where('id', $d->user_id)->first()->name }}</td>
                        <td>{{ $d->periode }}</td>
                        <td>{{ $d->jumlah }}</td>
                        <td><a href="/storage/{{ $d->bukti_tf }}" target="_blank"><img src="{{ Storage::url($d->bukti_tf) }}" alt="" width="30px"></a></td>
                        <td><h6><span class="badge {{ ($d->is_acc == 0) ? 'bg-danger' : 'bg-success' }}">{{ ($d->is_acc == 0) ? 'Diproses' : 'Diterima' }}</span></h6></td>
                        <td>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#acc{{ $d->id }}"><i class="bi bi-check2-circle"></i></button>
                        </td>
                    </tr>

                    <div class="modal fade" id="acc{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <h4 class="px-5 text-center mb-5"><strong>Konfirmasi {{ \App\Models\User::where('id', $d->user_id)->first()->name }} telah melunasi Kas Periode {{ $d->periode }}?</strong></h4>
                              {{-- <img src="{{ asset('assets/img/Check.png') }}" alt="" width="150px" class="d-block m-auto mb-5"> --}}
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary ms-auto" data-bs-dismiss="modal">Batal</button>
                              <form action="{{ route('dataKas.update', $d->id) }}" method="POST">
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