@extends('admin.master')
@section('content')
<div class="container">

    <form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Foto:</label>
            <img src="" id="foto-preview" style="display: none; margin-bottom: 10px; max-width: 100px;" alt="Preview Foto">
            <input type="file" value="{{ old('foto') }}" name="foto" class="form-control" placeholder="Masukan Foto" />
            <script>
                const inputFoto = document.querySelector('input[name="foto"]');
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
            @error('foto')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Nama Perusahaan:</label>
            <input type="text" value="{{ old('nama_perusahaan') }}" name="nama_perusahaan" class="form-control" placeholder="Masukan Nama Perusahaan" />
            @error('nama_perusahaan')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="alamat">Kategori Perusahaan: </label>
            <select name="nama_kategori" class="form-select" id="basicSelect">
                <option>Pilih Kategori</option>
                @foreach ($kategori as $k)
                <option value="{{ $k->id }}" {{ old('nama_kategori') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}
                </option>
                @endforeach
            </select>
            @error('nama_kategori')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>No Telp:</label>
            <input type="number" value="{{ old('no_telp') }}" name="no_telp" class="form-control" placeholder="Masukan No Telp" />
            @error('no_telp')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Deskripsi:</label>
            <textarea type="text" value="{{ old('deskripsi') }}" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi"></textarea>
            @error('deskripsi')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="d-flex justify-content-end gap-2" style="margin-top: 10px">

                <button type="submit" class="btn btn-primary ml-2">Kirim</button>
                <a href="{{ route('perusahaan') }}" type="button" class="btn btn-danger">kembali</a>
            </div>
    </form>
</div>
@endsection