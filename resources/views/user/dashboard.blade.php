@extends('user.main')
@section('judul','Home - Victor Work')
@section('content')
<div class="container" style="margin-top:75px">
    <div class="row">
        <div class="col-12 col-md-6">
            <img src="{{'image/it.png'}}" alt="" class="image float-end hidden" width="600px">
        </div>
        <div class="col-12 col-md-6">
            <h1 class="fw-bold text text-center" style="color:#fde047">VICTOR WORK</h1>
            <p class="text-dark fs-5 text-center">Website lowongan kerja untuk peluang karier di Dunia Informatika.</p>
            <a href="/daftarlowongan" class="btn btn-light mt-4 text-light fs-5 mx-auto d-block" style="background-color:#4ade80; ">Cari Kerja <i class="bi bi-arrow-right-circle"></i></a>
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
    <div class="container">
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
</div>
@endsection