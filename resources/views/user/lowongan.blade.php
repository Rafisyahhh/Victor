<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lowongan Pekerjaan - Victor Work</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
                        <a class="nav-link text-light active fw-bold" href="/lowongan">Lowongan Kerja</a>
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
        <div class="card rounded mx-auto" style="width: 18rem;background-color:#dcfce7">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center fw-semibold">Card title</h5>
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="#" class="btn btn-light text-light" style="background-color:#4ade80">Lamar Kerja</a>
                </div>
            </div>
        </div>
        <div class="card rounded mx-auto" style="width: 18rem;background-color:#dcfce7">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center fw-semibold">Card title</h5>
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="#" class="btn btn-light text-light" style="background-color:#4ade80">Lamar Kerja</a>
                </div>
            </div>
        </div>
        <div class="card rounded mx-auto" style="width: 18rem;background-color:#dcfce7">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center fw-semibold">Card title</h5>
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="/detaillowongan" class="btn btn-light text-light" style="background-color:#4ade80">Lamar Kerja</a>
                </div>
            </div>
        </div>
        <div class="card rounded mx-auto" style="width: 18rem;background-color:#dcfce7">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center fw-semibold">Card title</h5>
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="#" class="btn btn-light text-light" style="background-color:#4ade80">Lamar Kerja</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>