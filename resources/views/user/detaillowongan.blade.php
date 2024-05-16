@extends('user.main')
@section('judul','Detail Lowongan - Victor Work')
@section('content')
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