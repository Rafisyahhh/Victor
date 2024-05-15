@extends('admin.master')
@section('content')
<div class="container">

    <form action="{{ route('perusahaan.update', $perusahaan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Foto:</label>
            <input type="file" name="foto" class="form-control" placeholder="Masukan Foto"/>
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
            <input type="text" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi" value="{{ $perusahaan->deskripsi}}" />
            @error('deskripsi')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex justify-content-end gap-2" style="margin-top: 10px">

            <button type="submit" class="btn btn-primary ml-2">Kirim</button>
            <a href="{{ route('kategori') }}" type="button" class="btn btn-danger">kembali</a>
        </div>
    </form>
</div>
@endsection