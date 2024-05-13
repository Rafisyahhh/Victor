<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar - Victor Work</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #bbf7d0;
        }

        .card {
            border: none;
            border-radius: 20px;
        }
    </style>
    <div class="container">
        <div class="card mb-3 col-md-8 mx-auto mt-5 shadow-lg" style="background-color:#f0fdf4">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="card-body">
                        <h6 class="card-title mt-2">Selamat Datang Di</h6>
                        <h5 class="card-title fw-bold fs-3" style="color:#fde047">Victor Work</h5>
                        <p>Silahkan daftar di bawah ini</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username <i class="bi bi-person-fill"></i></label>
                                <input type="text" class="form-control rounded-pill @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Email <i class="bi bi-envelope-fill"></i></label>
                                <input type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Password <i class="bi bi-lock-fill"></i></label>
                                <input type="password" class="form-control rounded-pill  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="exampleInputPassword1">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Re-Password <i class="bi bi-repeat"></i></label>
                                <input type="password" name="password_confirmation" class="form-control rounded-pill" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-light mb-4 rounded-pill form-control" style="background-color:#4ade80">Daftar</button>
                            <div class="text-center">
                                <p class="fs-6">
                                    Sudah punya akun?
                                    @if (Route::has('login'))
                                    <a class="text-primary fw-bold" href="{{ route('login') }}">Masuk disini</a>
                                    @endif
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{'image/Sign in.png'}}" class="img-fluid rounded-end-5  d-md-block" style="margin-top: 90px;" alt="...">
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>