<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @yield('style')
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
                        <a class="nav-link text-light {{ (\Request::route()->getName() == 'dashboard') ? 'active fw-bold' : '' }}" aria-current="page" href="/home">Beranda</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-light {{ (\Request::route()->getName() == 'daftarlowongan') ? 'active fw-bold' : '' }}" href="/daftarlowongan">Lowongan Kerja</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-light {{ (\Request::route()->getName() == 'daftarperusahaan') ? 'active fw-bold' : '' }}" href="/daftarperusahaan">Daftar Perusahaan</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-light {{ (\Request::route()->getName() == 'historylamaran') ? 'active fw-bold' : '' }}" href="/historylamaran">History Lamaran</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle fs-6 btn-sm text-light me-2 rounded-pill" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#4ade80">
                                @if ($not > 0)
                                <img src="{{'image/notif2.png'}}" alt="" width="20px" style="border-radius:20px;margin-top:7px">
                                @else
                                <img src="{{'image/notif1.png'}}" alt="" width="20px" style="border-radius:20px;margin-top:7px">
                                @endif
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($notif as $n)
                                @if ($n->status == 'belum')
                                @if ($n->id_user == Auth::user()->id)
                                <li><a class="dropdown-item" style="word-wrap: break-word; white-space: pre-wrap; min-width: 200px;" href="{{ route('notif', $n->id) }}">{{ $n->message }}</a></li>
                                @endif
                                @endif
                                @endforeach

                            </ul>
                        </div>
                    </li>
                </ul>
                @if (Auth::user()->role == 'admin')
                <a href="/dash" class="btn btn-light fs-6 btn-sm text-light me-2 rounded-pill" style="background-color:#86efac">Admin</a>
                @endif

                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ Auth::user()->nama ? route('profil') : route('profil.create', Auth::user()->id) }}">Profil</a>
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
    @yield('content')
    <div class="pt-5 mt-4" style="background-color:#4ade80">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <img src="{{'image/vic.png'}}" alt="" width="600px" style="border-radius:20px;">
                </div>
                <div class="col-6">
                    <p class="fs-4 fw-bold text-light">VICTOR WORK</p>
                    <div class="fs-5 text-light">
                        Kontrakan Los Santos, Perum Gpa, Ngijo, Kec. Karang Ploso, Kabupaten Malang, Jawa Timur 65152 <br>
                        email : victorwork@gmail.com
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#4ade80">
        <a class="navbar-brand mx-auto mt-3" href="#">2024 &copy; Victor Work</a>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @foreach ($errors->all() as $message)
    <script>
        Swal.fire({
            title: "{{$message}}",
            icon: "error"
        });
    </script>
    @endforeach
    @if(session('success'))
    @php($message = session('success'))
    @if(is_string($message))
    <script>
        Swal.fire({
            title: "{{$message}}",
            icon: "success"
        });
    </script>
    @elseif(is_array($message))
    @foreach ($message as $msg)
    <script>
        Swal.fire({
            title: "{{$msg}}",
            icon: "success"
        });
    </script>
    @endforeach
    @endif
    @endif
    @if(session('error'))
    @php($message = session('error'))
    @if(is_string($message))
    <script>
        Swal.fire({
            title: "{{$message}}",
            icon: "error"
        });
    </script>
    @elseif(is_array($message))
    @foreach ($message as $msg)
    <script>
        Swal.fire({
            title: "{{$msg}}",
            icon: "error"
        });
    </script>
    @endforeach
    @endif
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>