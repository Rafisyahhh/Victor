@extends('admin.master')
@section('content')
<div class="container">

    <form action="{{ route('lowongan.update', $lowongan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="alamat">Nama Perusahaan: </label>
            <select name="nama_perusahaan" class="form-select" id="basicSelect">
                <option>Pilih Perusahaan</option>
                @foreach ($perusahaan as $p)
                <option value="{{ $p->id }}" {{ old('nama_perusahaan') == $p->id ? 'selected' : '' }}>
                    {{ $p->nama_perusahaan }}
                </option>
                @endforeach
            </select>
            @error('nama_perusahaan')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Gaji:</label>
            <input type="number" value="{{ old('gaji') }}" name="gaji" class="form-control" placeholder="Masukan Gaji" />
            @error('gaji')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Tempat Kerja:</label>
            <input type="text" value="{{ old('tempat_kerja') }}" name="tempat_kerja" class="form-control" placeholder="Masukan Tempat Kerja" />
            @error('tempat_kerja')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Waktu Kerja(Jam):</label>
            <input type="number" value="{{ old('waktu_kerja') }}" name="waktu_kerja" class="form-control" placeholder="Masukan Waktu Kerja" />
            @error('waktu_kerja')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="alamat">Posisi: </label>
            <select name="nama_posisi" class="form-select" id="basicSelect">
                <option>Pilih Posisi</option>
                @foreach ($posisi as $o)
                <option value="{{ $o->id }}" {{ old('nama_posisi') == $o->id ? 'selected' : '' }}>
                    {{ $o->nama_posisi }}
                </option>
                @endforeach
            </select>
            @error('nama_posisi')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Ketentuan Kerja:</label>
            <input type="text" value="{{ old('ketentuan_kerja') }}" name="ketentuan_kerja" class="form-control" placeholder="Masukan Ketentuan Kerja" />
            @error('ketentuan_kerja')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="d-flex justify-content-end gap-2" style="margin-top: 10px">

                <button type="submit" class="btn btn-primary ml-2">Kirim</button>
                <a href="{{ route('lowongan') }}" type="button" class="btn btn-danger">kembali</a>
            </div>
    </form>
</div>
@endsection