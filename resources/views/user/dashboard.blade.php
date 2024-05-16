<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Victor Work - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="background-color:#f0fdf4">
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
                        <a class="nav-link active text-light fw-bold" aria-current="page" href="#">Beranda</a>
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
                    <a class="dropdown-item" href="/profil">Profil</a>
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
    <div class="container" style="margin-top:75px">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="{{'image/it.png'}}" alt="" class="image float-end hidden" width="600px">
            </div>
            <div class="col-12 col-md-6">
                <h1 class="fw-bold text text-center" style="color:#fde047">VICTOR WORK</h1>
                <p class="text-dark fs-5 text-center">Website lowongan kerja untuk peluang karier di Dunia Informatika.</p>
                <a href="/lowongan" class="btn btn-light mt-4 text-light fs-5" style="background-color:#4ade80;justify-content: center;  align-items: center; ">Cari Kerja <i class="bi bi-arrow-right-circle"></i></a>
            </div>
        </div>
    </div>
    <div class="py-2" style="background-color:#ecfdf5">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h1 class="fs-2" style="color:#4ade80">Mengapa harus Victor Work?</h1>
                    <p class="mt-3" style="font-size:17px">Di <span class="fw-bold" style="color:#fde047">VICTOR WORK</span>, kami memahami bahwa dunia IT terus berubah dan membutuhkan pemikiran inovatif. Bergabunglah dengan kami dan temukan lingkungan kerja yang mendorong kreativitas, kolaborasi, dan eksperimen, di mana ide-ide baru dihargai dan diimplementasikan.Inovasi, perkembangan, dan tantangan teknologi informasi menanti Anda di <span class="fw-bold" style="color:#fde047">VICTOR WORK</span>. Kami adalah tempat bagi para pencari kerja yang bersemangat untuk menjelajahi dunia IT dan menemukan peluang karier yang sesuai dengan bakat dan minat mereka.Dari pengembangan perangkat lunak hingga keamanan jaringan, dari analisis data hingga pengembangan web, kami menyediakan beragam posisi IT dari berbagai industri dan tingkat pengalaman. Temukan pekerjaan yang memicu minat Anda dan sesuai dengan kemampuan teknis Anda.</p>
                </div>
                <div class="col-4">
                    <img src="{{'image/it2.png'}}" alt="" class="ms-3 float-end hidden" width="400px">
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <h1 class="fs-2 text-center" style="color:#4ade80">Lowongan Pekerjaan</h1>
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
    </div>
    <div class="py-2" style="background-color:#ecfdf5">
        <div class="container mt-4">
            <div class="row">
                <div class="col-4">
                    <img src="{{'image/3d.png'}}" alt="" width="300px" class="">
                </div>
                <div class="col-8 float-end">
                    <h1 class="fs-2" style="color:#fde047">Punya Lowongan Kerja Seputar IT dan Ingin ditampilkan diweb ini?</h1>
                    <h1 class="fs-3" style="color:#fde047">Hubungi Admin dibawah ini</h1>
                    <button class="btn btn-light fs-5 text-light" style="background-color:#4ade80">Hubungi Admin</button>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark mt-4" style="background-color:#94a3b8">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="#">2024 &copy; Victor Work</a>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>