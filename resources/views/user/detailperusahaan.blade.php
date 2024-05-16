@extends('user.main')
@section('judul','Detail Perusahaan - Victor Work')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .text {
            font-size: 70px;
            margin-top: 120px;
        }

        .image {
            border-radius: 40px;
            margin-top: 90px;
            margin-left: 30px;
        }

        .card {
            margin: 0.5em;
        }
    </style>
    <div class="container" style="margin-top:75px">
        <div class="row">
            <div class="col-12 col-md-5">
                <img src="{{ asset('image/' . $perusahaan->foto) }}" alt="{{$perusahaan->nama_perusahaan}}" class="image hidden" width="400px">
            </div>
            <div class="col-12 col-md-7">
                <h1 class="fw-bold" style="margin-top:100px">{{ $perusahaan->nama_perusahaan }}</h1>
                <p class="text-dark fs-5"><i class="bi bi-telephone"></i> {{$perusahaan->no_telp}}</p>
                <p class="text-dark fs-5"><i class="bi bi-tag"></i> {{$perusahaan->kategori->nama_kategori}}</p>
                <p class="text-dark fs-5">{{$perusahaan->deskripsi}}</p>
                <a href="/daftarperusahaan" class="btn btn-light text-light" style="background-color:#4ade80;">Kembali</a>
            </div>
        </div>
    </div>
@endsection 