@extends('layouts.app')
@section('content')
    <main id="main">
        <div class="container">
            <div class="pagetitle">
                <div class="d-flex justify-content-between mx-2">
                    <h1>Preview Event</h1>
                    <a href="{{ route('daftarAnggota.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <nav class="ms-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">{{ Request::segment(2) }}</li>
                        <li class="breadcrumb-item">{{ $data->slug }}</li>
                    </ol>
                </nav>
            </div>
           <x-profile :id="$data->user_id"/>
        </div>
    </main>
@endsection
