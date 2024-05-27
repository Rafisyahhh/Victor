@extends('user.main')
@section('judul','Detail Lowongan - Victor Work')
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
</style>
<div class="card mb-3 mx-auto" style="width: 1000px;margin-top: 100px">
    <div class="row g-0">
        <div class="col-5">
            <img src="{{asset('image/' . $lowongan->perusahaan->foto)}}" alt="{{$lowongan->perusahaan->nama_perusahaan}}" class="img-fluid card-img mx-auto d-block" style="object-fit: cover; height: 300px; width: 300px; border-radius: 20px; margin-top:50px">
        </div>
        <div class="col-1"></div>
        <div class="col-6" style="margin-bottom:30px">
            <h2 class="fw-bold" style="margin-top:30px">{{$lowongan->perusahaan->nama_perusahaan}}</h2>
            <div class="row">
                <div class="col-4">
                    <p class="text-dark fs-6"><i class="bi bi-sticky"></i> Posisi</p>
                    <p class="text-dark fs-6"><i class="bi bi-cash"></i> Gaji</p>
                    <p class="text-dark fs-6"><i class="bi bi-person-workspace"></i> Ketentuan Kerja</p>
                    <p class="text-dark fs-6"><i class="bi bi-cast"></i> Tipe Kerja</p>
                    <p class="text-dark fs-6"><i class="bi bi-activity"></i> Pengalaman</p>
                    <p class="text-dark fs-6"><i class="bi bi-geo-alt"></i> Tempat Kerja</p>
                    <p class="text-dark fs-6"><i class="bi bi-alarm"></i> Waktu Kerja</p>
                </div>
                <div class="col-8">
                    <p class="text-dark fs-6">: {{$lowongan->nama_posisi}}</p>
                    <p class="text-dark fs-6">: {{'Rp ' . number_format($lowongan->gaji,2,',','.')}}</p>
                    <p class="text-dark fs-6">: {{$lowongan->ketentuan_kerja}}</p>
                    <p class="text-dark fs-6">: {{$lowongan->kerja}}-{{$lowongan->tipe}}</p>
                    <p class="text-dark fs-6">: {{$lowongan->pengalaman}}</p>
                    <p class="text-dark fs-6">: {{$lowongan->tempat_kerja}}</p>
                    <p class="text-dark fs-6">: {{$lowongan->waktu_kerja}} Jam/Hari</p>
                </div>
            </div>
            @if(Auth::user()->nama == null)
            <a href="{{ route('profil.create', Auth::user()->id) }}" class="btn btn-light text-light" style="background-color:#4ade80;">Lamar Cepat</a>
            @elseif (Auth::user()->id_pendidikan == null || Auth::user()->id_pengalaman == null || Auth::user()->id_cv == null || Auth::user()->id_keahlian == null)
            <a href="{{ route('profil') }}" class="btn btn-light text-light" style="background-color:#4ade80;">Lamar Cepat</a>
            @else
            <form action="{{ route('lamaran.store') }}" method="post">
                @csrf
                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                <input type="hidden" name="id_pendidikan" value="{{ Auth::user()->id_pendidikan }}">
                <input type="hidden" name="id_pengalaman" value="{{ Auth::user()->id_pengalaman }}">
                <input type="hidden" name="id_cv" value="{{ Auth::user()->id_cv }}">
                <input type="hidden" name="id_keahlian" value="{{ Auth::user()->id_keahlian }}">
                <input type="hidden" name="id_lowongan" value="{{ $lowongan->id }}">
                <button class="btn btn-light text-light" style="background-color:#4ade80;" onclick="showConfirmation(this.parentNode)" type="button">Lamar Cepat</button>
            </form>
            @endif
            <a href="/daftarlowongan" class="btn btn-danger text-light">Kembali</a>
        </div>
    </div>
</div>
<div class="container">
    <hr>
    <h1 class="fw-bold mt-4" style="color:#4ade80;margin-left:70px">Syarat dan ketentuan</h1>
    <p class="fs-5" style="margin-left:70px;word-wrap: break-word; word-break: break-word; white-space: pre-wrap;">{{ $lowongan->persyaratan }}</p>
    <hr>
    <h1 class="fw-bold mt-4" style="color:#4ade80;margin-left:70px">Jobdesk</h1>
    <p class="fs-5" style="margin-left:70px;word-wrap: break-word; word-break: break-all; white-space: pre-wrap;">{{ $lowongan->jobdesk }}</p>
    <hr>
    <h1 class="fw-bold mt-4" style="color:#4ade80;margin-left:70px">Proses Wawancara</h1>
    <p class="fs-5" style="margin-left:70px;word-wrap: break-word; word-break: break-all; white-space: pre-wrap;">{{ $lowongan->proses_wawancara }}</p>
    <hr>
</div>
<script>
    function showConfirmation(form) {
        Swal.fire({
            title: 'Yakin ingin melamar?',
            text: "Tindakan ini tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, saya yakin!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
@endsection