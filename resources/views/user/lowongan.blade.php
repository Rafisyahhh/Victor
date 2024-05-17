@extends('user.main')
@section('judul','Lowongan Pekerjaan - Victor Work')
@section('content')
<style>
    .navbar {
        z-index: 1;
    }

    .img-fluid {
        filter: blur(4px);
    }

    .text-title {
        position: absolute;
        font-size: 80px;
        left: 250px;
        top: 208px;

    }

    .card {
        margin: 10px;
    }
</style>
<img src="{{'image/pro.jpg'}}" class="img-fluid mt-4" alt="...">
<h1 class="fw-bold text-center text-title text-light">Lowongan Pekerjaan</h1>
<div class="container">
    <div class="row">
        @foreach ($lowongan as $item)
        <div class="col-3">
            <div class="card rounded mx-auto" style="width: 18rem;background-color:#dcfce7">
                <img src="{{ asset('image/' . $item->perusahaan->foto) }}" class="card-img-top" alt="{{$item->perusahaan->nama_perusahaan}}">
                <div class="card-body">
                    <h5 class="card-title text-center fw-semibold" style="display:flex">{{ $item->perusahaan->nama_perusahaan }}</h5>
                    <p class="text-dark fs-6 text-center"><i class="bi bi-sticky"></i> Posisi: {{$item->posisi->nama_posisi}}</p>
                    <p class="text-dark fs-6 text-center"><i class="bi bi-cash"></i> Gaji: {{'Rp ' . number_format($item->gaji,2,',','.')}}</p>
                    <p class="text-dark fs-6 text-center"><i class="bi bi-geo-alt"></i> Tempat: {{$item->tempat_kerja}}</p>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="{{ route('detaillowongan', ['id' => $item->id]) }}" class="btn btn-light text-light" style="background-color:#4ade80">Lamar Kerja</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>