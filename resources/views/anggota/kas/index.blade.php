@extends('layouts.app')
@section('content')
<main id="main">
        <div class="container">
            <div class="pagetitle">
                <div class="d-flex justify-content-between mx-2">
                    <h1>Data Kas</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#setor">Setor Kas</button>
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
            <?php $year = range(2000, \Carbon\Carbon::now()->format('Y')); ?>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Periode</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ \App\Models\User::where('id', $d->user_id)->first()->name }}</td>
                        <td>{{ $d->periode }}</td>
                        <td>{{ $d->jumlah }}</td>
                        <td><h6><span class="badge {{ ($d->is_acc == 0) ? 'bg-danger' : 'bg-success' }}">{{ ($d->is_acc == 0) ? 'Diproses' : 'Diterima' }}</span></h6></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- modal setor Kas --}}
        <div class="modal fade" id="setor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Setor Kas</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('kas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Periode Kas (Tahun)</label>
                        <select class="form-select" aria-label="Default select example" name="periode">
                            <option selected>Pilih Periode Setoran</option>
                            @foreach ($year as $y)
                            <option value="{{ $y }}">{{ $y }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jumlah Setor</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="jumlah">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Uplaod Bukti Transfer</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="bukti_tf">
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
              </div>
            </div>
          </div>
    </main>
@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#year").datepicker({
                format: "yyyy",
                viewMode: "years", 
                minViewMode: "years",
                autoclose:true
            });   
        });
    </script>
@endsection
