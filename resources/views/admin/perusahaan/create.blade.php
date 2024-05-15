@extends('admin.master')
@section('content')
<div class="container">

    <form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Foto:</label>
            <input type="file" value="{{ old('foto') }}" name="foto" class="form-control" placeholder="Masukan Foto" />
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
            <input type="text" value="{{ old('deskripsi') }}" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi" />
            @error('deskripsi')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="d-flex justify-content-end gap-2" style="margin-top: 10px">

                <button type="submit" class="btn btn-primary ml-2">Kirim</button>
                <a href="{{ route('posisi') }}" type="button" class="btn btn-danger">kembali</a>
            </div>
    </form>
</div>
@endsection