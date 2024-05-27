@extends('user.main')
@section('judul','Lamar Kerja - Victor Work')
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
<div class="container" style="margin-top: 100px;">
    <div class="card mt-4">
        <div class="card-header" style="background-color:#4ade80">
            <h4 class="text-light fw-bold">Lamar Kerja di {{$lowongan->perusahaan->nama_perusahaan}}</h4>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{ route('lamaran.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label class="form-label fw-bold">CV</label>
                    <img src="" id="foto-preview" style="display: none; margin-bottom: 10px; max-width: 200px;" alt="Preview Foto">
                    <input type="file" name="cv" class="form-control" id="nama" placeholder="Masukan CV anda">
                    <p class="text-warning fs-6">*File harus berupa Gambar jpg/jpeg/png</p>
                    <script>
                        const inputFoto = document.querySelector('input[name="cv"]');
                        const previewFoto = document.querySelector('#foto-preview');
                        inputFoto.addEventListener('change', function() {
                            const file = this.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    previewFoto.src = e.target.result;
                                    previewFoto.style.display = 'block';
                                }
                                reader.readAsDataURL(file);
                            } else {
                                previewFoto.src = "";
                                previewFoto.style.display = 'none';
                            }
                        });
                    </script>
                    <label class="form-label fw-bold">Pengalaman Kerja</label>
                    <textarea type="text" name="pengalaman_kerja" class="form-control" id="nama" placeholder="Masukan Pengalaman Kerja Anda">{{ old('pengalaman_kerja') }}</textarea>
                    <label class="form-label fw-bold">Keahlian</label>
                    <textarea type="text" name="keahlian_kerja" class="form-control" id="nama" placeholder="Masukan Keahlian Anda">{{ old('keahlian_kerja') }}</textarea>
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id_lowongan" value="{{ $lowongan->id }}">
                    <button class="btn btn-light mb-4 mt-4 float-end text-light fw-bold" style="background-color: #4ade80;" type="submit">Simpan</button>
                </form> 
            </div>
        </div>
    </div>
</div>
@endsection