@extends('user.main')
@section('judul','Profil - Victor Work')
@section('content')
@section('style')
<link rel="stylesheet" crossorigin href="{{ asset('template/assets/compiled/css/app.css') }}">
<link rel="stylesheet" crossorigin href="{{ asset('template/assets/compiled/css/app-dark.css')}}">
@endsection
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
        margin-top: 30px;
        margin-left: 30px;
    }

    .card {
        margin: 0.5em;
    }
</style>
<div class="container" style="margin-top:100px">
    <div class="card mb-3 mt-4 mx-auto" style="width: 1000px;">
        <div class="row g-0">
            <div class="col-5">
                <img src="{{ asset('image/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" width="300" style="border-radius:40px;padding:20px;">
            </div>
            <div class="col-7" style="margin-top:30px">
                <div class="row">
                    <div class="col-4">
                        <h1 class="fs-4">Username</h1>
                        <h1 class="fs-4">Nama</h1>
                        <h1 class="fs-4">Jenis Kelamin</h1>
                        <h1 class="fs-4">Tanggal Lahir</h1>
                        <h1 class="fs-4">Tempat Lahir</h1>
                        <h1 class="fs-4">No Telp</h1>
                        <h1 class="fs-4">Alamat</h1>
                    </div>
                    <div class="col-8">
                        <h1 class="fs-4">: {{ Auth::user()->name }}</h1>
                        <h1 class="fs-4">: {{ Auth::user()->nama }}</h1>
                        <h1 class="fs-4">: {{ Auth::user()->jenis_kelamin }}</h1>
                        <h1 class="fs-4">: {{ Auth::user()->tgl_lahir }}</h1>
                        <h1 class="fs-4">: {{ Auth::user()->tempat_lahir }}</h1>
                        <h1 class="fs-4">: {{ Auth::user()->no_telp }}</h1>
                        <h1 class="fs-4">: {{ Auth::user()->alamat }}</h1>
                    </div>
                    <div class="d-grid gap-2 mx-auto container" style="width: 100%;padding:20px">
                        <a href="{{route('profil.edit', Auth::user()->id)}}" class="btn btn-light text-light" style="background-color:#4ade80">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection