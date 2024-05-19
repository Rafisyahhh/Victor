@extends('admin.master')
@section('judul','Tambah Profil - Victor Work')
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
            margin-top: 30px;
            margin-left: 30px;
        }

        .card {
            margin: 0.5em;
        }
    </style>
    <div class="container" style="margin-top: 100px;">
        <div class="card mt-4">
            <div class="card-header" style="background-color:#4ade80">
                <h4 class="text-light fw-bold">Tambah Data Diri</h4>
            </div>
            <div class="card body">
                <div class="container">
                    <form action="{{ route('profil.store',Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label class="form-label fw-bold">Avatar</label>
                        <input type="file" name="avatar" class="form-control" id="nama" placeholder="Masukan Avatar">
                        <label class="form-label fw-bold">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" id="nama" placeholder="Masukan Nama Peserta Didik">
                        <label class="form-label fw-bold">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="perempuan">Perempuan</option>
                            <option value="laki-laki">Laki laki</option>
                        </select>
                        <label class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir') }}"  id="nama" placeholder="Masukan Tanggal Lahir">
                        <label class="form-label fw-bold">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" id="nama" placeholder="Masukan Tempat Lahir">
                        <label class="form-label fw-bold">No telp</label>
                        <input type="number" name="no_telp" class="form-control" value="{{ old('no_telp') }}" id="nama" placeholder="Masukan No Telp">
                        <label class="form-label fw-bold">Alamat</label>
                        <textarea type="text" name="alamat" class="form-control" id="nama" placeholder="Masukan Alamat">{{ old('alamat') }}</textarea>
                        <button class="btn btn-light mb-4 mt-4 float-end text-light fw-bold" style="background-color: #4ade80;" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection