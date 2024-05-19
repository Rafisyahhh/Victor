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
<div class="container mt-3">
    <div class="row">
        @foreach ($lowongan as $item)
        <div class="col-3 d-flex justify-content-center">
            <div class="card" style="width: 100%">
                <div class="card-content">
                    <img class="mx-auto d-block" style="padding: 10px;" width="150" src="{{ asset('image/' . $item->perusahaan->foto) }}" alt="Card image cap" />
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold">{{ $item->perusahaan->nama_perusahaan }}</h6>
                        <p style="font-size:15px">Posisi: {{$item->nama_posisi}}</p>
                        <p style="font-size:15px">Gaji: {{'Rp ' . number_format($item->gaji,2,',','.')}}</p>
                        <p style="font-size:15px">Tempat: {{$item->tempat_kerja}}</p>
                        <div class="d-grid gap-2 mx-auto container" style="width: 100%;padding:20px">
                            <a href="{{ route('detaillowongan', ['id' => $item->id]) }}" class="btn btn-light text-light" style="background-color:#4ade80">Lamar Kerja</a>
                        </div>
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