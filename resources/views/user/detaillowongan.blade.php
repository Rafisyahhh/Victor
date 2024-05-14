<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Victor Work - Lowongan</title>
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
                <img src="{{'image/victor.png'}}" alt="" width="200px" style="border-radius:20px;">
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
                        <a class="nav-link text-light" href="/lowongan">Lowongan Kerja</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-light" href="/perusahaan">Daftar Perusahaan</a>
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
    <div class="container" style="margin-top:75px">
        <div class="row">
            <div class="col-12 col-md-5">
                <img src="{{asset('image/humma.jpg')}}" alt="" class="image hidden" width="400px" style="border-radius:20px;border-width: 5px;border-color:#4ade80">
            </div>
            <div class="col-12 col-md-7">
                <h1 class="fw-bold" style="margin-top:100px">PT Hummatech Indonesia</h1>
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <p class="text-dark fs-6"><i class="bi bi-sticky"></i> Posisi</p>
                            <p class="text-dark fs-6"><i class="bi bi-cash"></i> Gaji</p>
                            <p class="text-dark fs-6"><i class="bi bi-person-workspace"></i> Ketentuan Kerja</p>
                            <p class="text-dark fs-6"><i class="bi bi-geo-alt"></i> Tempat Kerja</p>
                            <p class="text-dark fs-6"><i class="bi bi-alarm"></i> Waktu Kerja</p>
                        </div>
                        <div class="col-8">
                            <p class="text-dark fs-6">: Web Development</p>
                            <p class="text-dark fs-6">: 1.000.000</p>
                            <p class="text-dark fs-6">: Onsite</p>
                            <p class="text-dark fs-6">: Malang</p>
                            <p class="text-dark fs-6">: 8 Jam</p>
                        </div>
                    </div>
                </div>
                <a href="/perusahaan" class="btn btn-light text-light" style="background-color:#4ade80;">Lamar Kerja</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>