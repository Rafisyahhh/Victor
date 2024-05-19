@extends('user.main')
@section('judul','Perusahaan - Victor Work')
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
            left: 300px;
            top: 208px;

        }
    </style>
    <img src="{{'image/pro.jpg'}}" class="img-fluid mt-4" alt="...">
    <h1 class="fw-bold text-center text-title text-light">Daftar Perusahaan</h1>
    <div class="container">
    @foreach ($perusahaan as $item)
        <div class="card mb-3 mt-4" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-2">
                    <img src="{{ asset('image/' . $item->foto) }}" alt="{{ $item->nama}}" width="150" style="border-radius:40px;padding:20px">
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item->nama_perusahaan }}</h5>
                        <p class="card-text">{{$item->deskripsi}}</p>
                        <a href="{{ route('detailperusahaan', ['id' => $item->id]) }}" class="btn btn-light fs-6 text-light btn-sm" style="background-color:#4ade80">Lihat Perusahaan</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>