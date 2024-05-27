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
        border: none;
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-img {
        border-radius: 20px 0 0 20px;
    }

    .card-body {
        padding: 30px;
    }

    .btn-edit {
        background-color: #4ade80;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 16px;
        transition: background-color 0.3s;
    }
</style>
<div class="container" style="margin-top:100px">
    <h1 class="fw-bold mt-4" style="color:#4ade80;margin-left:70px">Profil</h1>
    <div class="card mb-3 mt-3 mx-auto" style="width: 1000px;">
        <div class="row g-0">
            <div class="col-4">
                <img src="{{ asset('image/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="img-fluid card-img" style="object-fit: cover; height: 100%; width: 100%; border-radius: 20px;">
            </div>
            <div class="col-1"></div>
            <div class="col-7" style="margin-top:30px">
                <h1 class="fs-3"><strong>{{ Auth::user()->nama }}</strong></h1>
                <h1 class="fs-3">{{ Auth::user()->name }}</h1>
                <div class="row mt-3">
                    <div class="col-6">
                        <h1 class="fs-5 text-secondary"><strong>Jenis Kelamin</strong></h1>
                        <h1 class="fs-4">{{ Auth::user()->jenis_kelamin }}</h1>
                        <h1 class="fs-5 text-secondary"><strong>No Telp</strong></h1>
                        <h1 class="fs-4">{{ Auth::user()->no_telp }}</h1>
                        <h1 class="fs-5 text-secondary"><strong>Alamat</strong></h1>
                        <h1 class="fs-4">{{ Auth::user()->alamat }}</h1>
                    </div>
                    <div class="col-6">
                        <h1 class="fs-5 text-secondary"><strong>Tanggal Lahir</strong></h1>
                        <h1 class="fs-4">{{ \Carbon\Carbon::parse(Auth::user()->tgl_lahir)->format('d F Y') }}</h1>
                        <h1 class="fs-5 text-secondary"><strong>Tempat Lahir</strong></h1>
                        <h1 class="fs-4">{{ Auth::user()->tempat_lahir }}</h1>
                    </div>
                    <div class="d-grid gap-2 mx-auto container" style="width: 100%;padding:20px">
                        <a href="{{route('profil.edit', Auth::user()->id)}}" class="btn btn-light text-light btn-edit" style="background-color:#4ade80">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h1 class="fw-bold mt-4" style="color:#4ade80;margin-left:70px">Pengalaman</h1>
            @if(Auth::user()->id_pengalaman)
            <p class="fs-4" style="margin-left:70px;word-wrap: break-word; word-break: break-all; white-space: pre-wrap;">{{ Auth::user()->pengalaman->pengalaman }}</p>
            @endif
            @if(Auth::user()->id_pengalaman == null)
            <button type="button" class="btn btn-light text-light btn-edit" style="background-color:#4ade80;margin-left:70px" data-bs-toggle="modal" data-bs-target="#tambahModalplm">Tambah Pengalaman</button>
            @else
            <button type="button" class="btn btn-light text-light btn-edit" style="background-color:#4ade80;margin-left:70px" data-bs-toggle="modal" data-bs-target="#editModalplm{{Auth::user()->id}}">Edit Pengalaman</button>
            @endif
            <h1 class="fw-bold mt-4" style="color:#4ade80;margin-left:70px;">Pendidikan</h1>
            @if(Auth::user()->id_pendidikan)
            <p class="fs-4" style="margin-left:70px;word-wrap: break-word; word-break: break-all; white-space: pre-wrap;">{{ Auth::user()->pendidikan->pendidikan }}</p>
            @endif
            @if(Auth::user()->id_pendidikan == null)
            <button type="button" class="btn btn-light text-light btn-edit" style="background-color:#4ade80;margin-left:70px" data-bs-toggle="modal" data-bs-target="#tambahModalpdd">Tambah Pendidikan</button>
            @else
            <button type="button" class="btn btn-light text-light btn-edit" style="background-color:#4ade80;margin-left:70px" data-bs-toggle="modal" data-bs-target="#editModalpdd{{Auth::user()->id}}">Edit Pendidikan</button>
            @endif
            <h1 class="fw-bold mt-4" style="color:#4ade80;margin-left:70px">Keahlian</h1>
            @if(Auth::user()->id_keahlian)
            <p class="fs-4" style="margin-left:70px;word-wrap: break-word; word-break: break-all; white-space: pre-wrap;">{{ Auth::user()->keahlian->keahlian }}</p>
            @endif
            @if(Auth::user()->id_keahlian == null)
            <button type="button" class="btn btn-light text-light btn-edit" style="background-color:#4ade80;margin-left:70px" data-bs-toggle="modal" data-bs-target="#tambahModalkhl">Tambah Keahlian</button>
            @else
            <button type="button" class="btn btn-light text-light btn-edit" style="background-color:#4ade80;margin-left:70px" data-bs-toggle="modal" data-bs-target="#editModalkhl{{Auth::user()->id}}">Edit Keahlian</button>
            @endif
        </div>
        <div class="col-6">
            <h1 class="fw-bold mt-4" style="color:#4ade80;margin-left:70px">CV</h1>
            @if(Auth::user()->id_cv)
            <iframe src="{{ asset('file/'. Auth::user()->cv->cv)}}" width="100%" height="600px"></iframe>
            @endif
            @if(Auth::user()->id_cv == null)
            <button type="button" class="btn btn-light text-light btn-edit" style="background-color:#4ade80;margin-left:70px" data-bs-toggle="modal" data-bs-target="#tambahModalcv">Tambah CV</button>
            @else
            <button type="button" class="btn btn-light text-light btn-edit" style="background-color:#4ade80; width:100%" data-bs-toggle="modal" data-bs-target="#editModalcv{{Auth::user()->id}}">Edit CV</button>
            @endif
        </div>
    </div>
</div>
<!-- modal tambah Pengalaman-->
<div class="modal fade" id="tambahModalplm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pengalaman</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('createpengalaman',Auth::user()->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <label class="form-label fw-bold">Pengalaman Kerja</label>
                    <textarea type="text" name="pengalaman" class="form-control" id="nama" placeholder="Masukan Pengalaman Kerja anda">{{ old('pengalaman') }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-light text-light" style="background-color:#4ade80">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal edit pengalaman-->
<div class="modal fade" id="editModalplm{{Auth::user()->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengalaman</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/updatepengalaman{{Auth::user()->id_pengalaman}}" method="post">
                @csrf
                <div class="modal-body">
                    <label class="form-label fw-bold">Pengalaman Kerja</label>
                    <textarea type="text" name="pengalaman" class="form-control" id="nama" placeholder="Masukan Pengalaman Kerja anda">@if(Auth::user()->id_pengalaman){{ Auth::user()->pengalaman->pengalaman }}@endif</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-light text-light" style="background-color:#4ade80">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal tambah Pendidikan-->
<div class="modal fade" id="tambahModalpdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pendidikan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('creatependidikan',Auth::user()->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <label class="form-label fw-bold">Riwayat Pendidikan</label>
                    <textarea type="text" name="pendidikan" class="form-control" id="nama" placeholder="Masukan Pengalaman Kerja anda">{{ old('pendidikan') }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-light text-light" style="background-color:#4ade80">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal edit pendidikan-->
<div class="modal fade" id="editModalpdd{{Auth::user()->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Riwayat Pendidikan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/updatependidikan{{Auth::user()->id_pendidikan}}" method="post">
                @csrf
                <div class="modal-body">
                    <label class="form-label fw-bold">Riwayat Pendidikan</label>
                    <textarea type="text" name="pendidikan" class="form-control" id="nama" placeholder="Masukan Pengalaman Kerja anda">@if(Auth::user()->id_pendidikan){{ Auth::user()->pendidikan->pendidikan }}@endif</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-light text-light" style="background-color:#4ade80">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal tambah keahlian-->
<div class="modal fade" id="tambahModalkhl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Keahlian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('createkeahlian',Auth::user()->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <label class="form-label fw-bold">Keahlian Kerja</label>
                    <textarea type="text" name="keahlian" class="form-control" id="nama" placeholder="Masukan Keahlian Kerja anda">{{ old('keahlian') }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-light text-light" style="background-color:#4ade80">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal edit keahlian-->
<div class="modal fade" id="editModalkhl{{Auth::user()->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Keahlian Kerja</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/updatekeahlian{{Auth::user()->id_keahlian}}" method="post">
                @csrf
                <div class="modal-body">
                    <label class="form-label fw-bold">Keahlian Kerja</label>
                    <textarea type="text" name="keahlian" class="form-control" id="nama" placeholder="Masukan Pengalaman Kerja anda">@if(Auth::user()->id_keahlian){{ Auth::user()->keahlian->keahlian }}@endif</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-light text-light" style="background-color:#4ade80">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal tambah cv-->
<div class="modal fade" id="tambahModalcv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah CV</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('createcv',Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label class="form-label fw-bold">CV</label>
                    <input type="file" name="cv" class="form-control" id="nama" placeholder="Masukan CV Anda">
                    <p class="text-warning fs-6">*File harus berupa pdf</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-light text-light" style="background-color:#4ade80">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal edit cv-->
<div class="modal fade" id="editModalcv{{Auth::user()->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit CV</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/updatecv{{Auth::user()->id_cv}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                <label class="form-label fw-bold">CV</label>
                    <input type="file" name="cv" class="form-control" id="nama" placeholder="Masukan CV Anda">
                    <p class="text-warning fs-6">*File harus berupa pdf</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-light text-light" style="background-color:#4ade80">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection