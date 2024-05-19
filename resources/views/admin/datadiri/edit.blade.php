@extends('admin.master')
@section('content')
<div class="container">

    <form action="{{ route('datadiri.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if ($user->avatar)
        <div class="mb-2">
            <img id="previewImg{{$user->id}}" src="{{ asset('image/' . $user->avatar) }}" alt="{{ $user->nama}}" width="100" class="img-thumbnail">
        </div>
        @else
        <div class="mb-2">
            <img id="previewImg{{$user->id}}" src="" alt="{{ $user->nama}}" width="100" class="img-thumbnail d-none">
        </div>
        @endif
        <label class="form-label fw-bold">Avatar</label>
        <input type="file" name="avatar" class="form-control" id="nama" placeholder="Masukan Avatar" accept="image/*" onchange="previewImage(this, '{{$user->id}}')">
        <script>
            function previewImage(input, id) {
                // console.log(id);
                var previewImg = document.getElementById(`previewImg${id}`);
                var previewImgBox = document.getElementById(`previewImg${id}`);
                var file = input.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        previewImgBox.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    previewImg.src = "";
                    previewImgBox.style.display = 'none';
                }
            }
        </script>
        <label class="form-label fw-bold">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" id="nama" placeholder="Masukan Nama Peserta Didik">
        <label class="form-label fw-bold">Jenis Kelamin</label>
        <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
            <option selected>Pilih Jenis Kelamin</option>
            <option value="perempuan" @if($user-> jenis_kelamin == 'perempuan') selected @endif>Perempuan</option>
            <option value="laki-laki" @if($user-> jenis_kelamin == 'laki-laki') selected @endif>Laki laki</option>
        </select>
        <label class="form-label fw-bold">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control" value="{{ $user->tgl_lahir }}" id="nama" placeholder="Masukan Tanggal Lahir">
        <label class="form-label fw-bold">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" value="{{ $user->tempat_lahir }}" id="nama" placeholder="Masukan Tempat Lahir">
        <label class="form-label fw-bold">No telp</label>
        <input type="number" name="no_telp" class="form-control" value="{{ $user->no_telp }}" id="nama" placeholder="Masukan No Telp">
        <label class="form-label fw-bold">Alamat</label>
        <textarea type="text" name="alamat" class="form-control" id="nama" placeholder="Masukan Alamat">{{$user->alamat}}</textarea>
        <div class="d-flex justify-content-end gap-2" style="margin-top: 10px">
            <button type="submit" class="btn btn-primary ml-2">Kirim</button>
            <a href="{{ route('perusahaan') }}" type="button" class="btn btn-danger">kembali</a>
        </div>
    </form>
</div>
@endsection