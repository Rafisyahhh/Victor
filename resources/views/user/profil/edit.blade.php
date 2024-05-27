@extends('user.main')
@section('judul','Edit Profil - Victor Work')
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
<nav class="navbar navbar-expand-lg fixed-top" style="background-color:#4ade80;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{'image/vic.png'}}" alt="" width="200px" style="border-radius:20px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link text-light" aria-current="page" href="home">Beranda</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-light" href="/daftarlowongan">Lowongan Kerja</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-light" href="/daftarperusahaan">Daftar Perusahaan</a>
                </li>
            </ul>
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="">Profil</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 100px;">
    <div class="card mt-4">
        <div class="card-header" style="background-color:#4ade80">
            <h4 class="text-light fw-bold">Edit data diri</h4>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{ route('profil.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if (Auth::user()->avatar)
                    <div class="mb-2">
                        <img id="previewImg{{Auth::user()->id}}" src="{{ asset('image/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->nama}}" class="mx-auto d-block" style=" margin-bottom: 10px; max-width: 200px; border-radius:100%">
                    </div>
                    @else
                    <div class="mb-2">
                        <img id="previewImg{{Auth::user()->id}}" src="" alt="{{ Auth::user()->nama}}" class="mx-auto d-block" style=" margin-bottom: 10px; max-width: 200px; border-radius:100%">
                    </div>
                    @endif
                    <label class="col-sm-2 col-form-label fw-bold">Avatar</label>
                    <input type="file" name="avatar" class="form-control" id="nama" placeholder="Masukan Avatar" accept="image/*" onchange="previewImage(this, '{{Auth::user()->id}}')">
                    <script>
                        function previewImage(input, id) {
                            // console.log(id);
                            var previewImg = document.getElementById(`previewImg${id}`);
                            var previewImgBox = document.getElementById(`previewImg${id}`);
                            var file = input.files[0];
                            if (file) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    previewImg.src = e.target.result;
                                    previewImgBox.style.display = 'block';
                                }
                                reader.readAsDataURL(file);
                            } else {
                                previewImg.src = "";
                                previewImgBox.style.display = 'none';
                            }
                        }
                    </script>
                    <label class="col-sm-2 col-form-label fw-bold">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ Auth::user()->nama }}" placeholder="Masukan Nama Peserta Didik">
                    <label class="col-sm-2 col-form-label fw-bold">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="perempuan" @if(Auth::user()-> jenis_kelamin == 'perempuan') selected @endif>Perempuan</option>
                        <option value="laki-laki" @if(Auth::user()-> jenis_kelamin == 'laki-laki') selected @endif>Laki laki</option>
                    </select>
                    <label class="col-sm-2 col-form-label fw-bold">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" id="nama" value="{{ Auth::user()->tgl_lahir }}" placeholder="Masukan Tanggal Lahir">
                    <label class="col-sm-2 col-form-label fw-bold">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="nama" value="{{ Auth::user()->tempat_lahir }}" placeholder="Masukan Tempat Lahir">
                    <label class="col-sm-2 col-form-label fw-bold">No telp</label>
                    <input type="text" name="no_telp" class="form-control" id="nama" value="{{ Auth::user()->no_telp }}" placeholder="Masukan No Telp">
                    <label class="col-sm-2 col-form-label fw-bold">Alamat</label>
                    <textarea type="text" name="alamat" class="form-control" id="nama" placeholder="Masukan Alamat">{{ Auth::user()->alamat }}</textarea>
                    <a href="{{route('profil')}}" class="btn btn-danger mb-4 mt-4 float-end text-light fw-bold" type="submit">Kembali</a>
                    <button class="btn btn-light mb-4 mt-4 float-end text-light fw-bold" style="background-color: #4ade80;" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection