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
    <div class="container" style="margin-top:100px">
        <div class="card mb-3 mt-4 mx-auto" style="width: 800px;background-color:#dcfce7;">
            <div class="row g-0">
                <div class="col">
                    <div class="container">
                        <form action="/tambah" method="post">
                            @csrf
                            <div class="row mb-3 mt-4 ms-3 me-3">
                                <label class="col-sm-2 col-form-label fw-bold">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Peserta Didik">
                                </div>
                            </div>
                            <div class="row mb-3 ms-3 me-3">
                                <label class="col-sm-2 col-form-label fw-bold">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Laki-Laki">
                                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Perempuan">
                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary mb-4 float-end text-light fw-bold" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>