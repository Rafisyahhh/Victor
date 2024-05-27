@extends('admin.master')
@section('content')
<div class="container">

    <form action="{{ route('lowongan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
            <label>Waktu Kerja(Jam/Hari):</label>
            <input type="number" value="{{ old('waktu_kerja') }}" name="waktu_kerja" class="form-control" placeholder="Masukan Waktu Kerja" />
            @error('waktu_kerja')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Posisi Kerja:</label>
            <input type="text" value="{{ old('nama_posisi') }}" name="nama_posisi" class="form-control" placeholder="Masukan Nama Posisi" />
            @error('nama_posisi')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Ketentuan Kerja:</label>
            <input type="text" value="{{ old('ketentuan_kerja') }}" name="ketentuan_kerja" class="form-control" placeholder="Masukan Ketentuan Kerja" />
            @error('ketentuan_kerja')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="alamat">Pengalaman: </label>
            <select name="pengalaman" class="form-select" id="basicSelect">
                <option>Pilih Pengalaman</option>
                <option value="kurang dari 1 tahun" {{ old('pengalaman') == 'kurang dari 1 tahun' ? 'selected' : '' }}>Kurang dari 1 tahun</option>
                <option value="1-3 tahun" {{ old('pengalaman') == '1-3 tahun' ? 'selected' : '' }}>1-3 tahun</option>
                <option value="3-5 tahun" {{ old('pengalaman') == '3-5 tahun' ? 'selected' : '' }}>3-5 tahun</option>
                <option value="5-10 tahun" {{ old('pengalaman') == '5-10 tahun' ? 'selected' : '' }}>5-10 tahun</option>
                <option value="lebih dari 10 tahun" {{ old('pengalaman') == 'lebih dari 10 tahun' ? 'selected' : '' }}>lebih dari 10 tahun</option>
            </select>
            @error('pengalaman')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="alamat">Jenis Kerja: </label>
            <select name="kerja" class="form-select" id="basicSelect">
                <option>Pilih Jenis Kerja</option>
                <option value="penuh waktu" {{ old('kerja') == 'penuh waktu' ? 'selected' : '' }}>penuh waktu</option>
                <option value="kontrak" {{ old('kerja') == 'kontrak' ? 'selected' : '' }}>kontrak</option>
                <option value="magang" {{ old('kerja') == 'magang' ? 'selected' : '' }}>magang</option>
                <option value="paruh waktu" {{ old('kerja') == 'paruh waktu' ? 'selected' : '' }}>paruh waktu</option>
                <option value="harian" {{ old('kerja') == 'harian' ? 'selected' : '' }}>harian</option>
            </select>
            @error('kerja')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="alamat">Tipe Kerja: </label>
            <select name="tipe" class="form-select" id="basicSelect">
                <option>Pilih Tipe Kerja</option>
                <option value="onsite" {{ old('kerja') == 'onsite' ? 'selected' : '' }}>onsite</option>
                <option value="remote" {{ old('kerja') == 'remote' ? 'selected' : '' }}>remote</option>
            </select>
            @error('tipe')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Persyaratan:</label>
            <textarea type="text" name="persyaratan" class="form-control" placeholder="Masukan Persyaratan Kerja">{{ old('persyaratan') }}</textarea>
            @error('persyaratan')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Jobdesk:</label>
            <textarea type="text" name="jobdesk" class="form-control" placeholder="Masukan Jobdesk Kerja">{{ old('jobdesk') }}</textarea>
            @error('jobdesk')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Proses Wawancara:</label>
            <textarea type="text" name="proses_wawancara" class="form-control" placeholder="Masukan Proses Wawancara">{{ old('proses_wawancara') }}</textarea>
            @error('proses_wawancara')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="d-flex justify-content-end gap-2" style="margin-top: 10px">

                <button type="submit" class="btn btn-primary ml-2">Kirim</button>
                <a href="{{ route('lowongan') }}" type="button" class="btn btn-danger">kembali</a>
            </div>
    </form>
</div>
@endsection