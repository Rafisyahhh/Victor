@extends('admin.master')
@section('content')
<div class="container">

    <form action="{{ route('perusahaan.update', $perusahaan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Foto:</label>
            @if ($perusahaan->foto)
            <div class="mb-2">
                <img id="previewImg{{$perusahaan->id}}" src="{{ asset('image/' . $perusahaan->foto) }}" alt="{{ $perusahaan->nama_perusahaan}}" width="100" class="img-thumbnail">
            </div>
            @else
            <div class="mb-2">
                <img id="previewImg{{$perusahaan->id}}" src="" alt="{{ $perusahaan->nama}}" width="100" class="img-thumbnail d-none">
            </div>
            @endif
            <input type="file" name="foto" class="form-control" placeholder="Masukan Foto" accept="image/*" onchange="previewImage(this, '{{$perusahaan->id}}')" />
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
            @error('nama_perusahaan')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Nama Perusahaan:</label>
            <input type="text" name="nama_perusahaan" class="form-control" placeholder="Masukan Perusahaan" value="{{ $perusahaan->nama_perusahaan }}" />
            @error('nama_perusahaan')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="alamat">Kategori Perusahaan: </label>
            <select name="nama_kategori" class="form-select" id="basicSelect">
                <option>Pilih Kategori</option>
                @foreach ($kategori as $k)
                <option value="{{ $k->id }}" {{ $k->id == $perusahaan->id_kategori ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}
                </option>
                @endforeach
            </select>
            @error('kategori_perusahaan')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>No telp:</label>
            <input type="number" name="no_telp" class="form-control" placeholder="Masukan No Telp" value="{{ $perusahaan->no_telp }}" />
            @error('no_telp')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Deskripsi:</label>
            <textarea type="text" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi">{{ $perusahaan->deskripsi}}</textarea>
            @error('deskripsi')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex justify-content-end gap-2" style="margin-top: 10px">

            <button type="submit" class="btn btn-primary ml-2">Kirim</button>
            <a href="{{ route('perusahaan') }}" type="button" class="btn btn-danger">kembali</a>
        </div>
    </form>
</div>
@endsection