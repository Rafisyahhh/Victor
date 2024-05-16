<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lowongan Pekerjaan - Victor Work</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="background-color:#f0fdf4">
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
                        <a class="nav-link text-light" aria-current="page" href="/home">Beranda</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-light active fw-bold" href="/daftarlowongan">Lowongan Kerja</a>
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
    <img src="{{'image/pro.jpg'}}" class="img-fluid mt-4" alt="...">
    <h1 class="fw-bold text-center text-title text-light">Lowongan Pekerjaan</h1>
    <div class="card-wrapper mt-4" style="display:flex">
        @foreach ($lowongan as $item)
        <div class="card rounded mx-auto" style="width: 18rem;background-color:#dcfce7">
            <img src="{{ asset('image/' . $item->perusahaan->foto) }}" class="card-img-top" alt="{{$item->perusahaan->nama_perusahaan}}">
            <div class="card-body">
                <h5 class="card-title text-center fw-semibold">{{ $item->perusahaan->nama_perusahaan }}</h5>
                <p class="text-dark fs-6 text-center"><i class="bi bi-sticky"></i> Posisi: {{$item->posisi->nama_posisi}}</p>
                <p class="text-dark fs-6 text-center"><i class="bi bi-cash"></i> Gaji: {{$item->gaji}}</p>
                <p class="text-dark fs-6 text-center"><i class="bi bi-geo-alt"></i> Tempat: {{$item->tempat_kerja}}</p>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="/detaillowongan" class="btn btn-light text-light" style="background-color:#4ade80">Lamar Kerja</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>