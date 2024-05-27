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
                <option value="{{ $p->id }}" {{ $p->id == $lowongan->id_perusahaan ? 'selected' : '' }}>
                    {{ $p->nama_perusahaan }}
                </option>
                @endforeach
            </select>
            @error('nama_perusahaan')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Gaji:</label>
            <input type="number" value="{{ $lowongan->gaji }}" name="gaji" class="form-control" placeholder="Masukan Gaji" />
            @error('gaji')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Tempat Kerja:</label>
            <input type="text" value="{{ $lowongan->tempat_kerja }}" name="tempat_kerja" class="form-control" placeholder="Masukan Tempat Kerja" />
            @error('tempat_kerja')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Waktu Kerja(Jam):</label>
            <input type="number" value="{{ $lowongan->waktu_kerja }}" name="waktu_kerja" class="form-control" placeholder="Masukan Waktu Kerja" />
            @error('waktu_kerja')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Posisi Kerja:</label>
            <input type="text" value="{{ $lowongan->nama_posisi }}" name="nama_posisi" class="form-control" placeholder="Masukan Nama Posisi" />
            @error('nama_posisi')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Ketentuan Kerja:</label>
            <input type="text" value="{{ $lowongan->ketentuan_kerja }}" name="ketentuan_kerja" class="form-control" placeholder="Masukan Ketentuan Kerja" />
            @error('ketentuan_kerja')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="alamat">Pengalaman: </label>
            <select name="pengalaman" class="form-select" id="basicSelect">
                <option>Pilih Pengalaman</option>
                <option value="kurang dari 1 tahun" @if($lowongan-> pengalaman == 'kurang dari 1 tahun') selected @endif>Kurang dari 1 tahun</option>
                <option value="1-3 tahun" @if($lowongan-> pengalaman == '1-3 tahun') selected @endif  >1-3 tahun</option>
                <option value="3-5 tahun" @if($lowongan-> pengalaman == '3-5 tahun') selected @endif  >3-5 tahun</option>
                <option value="5-10 tahun" @if($lowongan-> pengalaman == '5-10 tahun') selected @endif  >5-10 tahun</option>
                <option value="lebih dari 10 tahun" @if($lowongan-> pengalaman == 'lebih dari 10 tahun') selected @endif  >lebih dari 10 tahun</option>
            </select>
            @error('pengalaman')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="alamat">Jenis Kerja: </label>
            <select name="kerja" class="form-select" id="basicSelect">
                <option>Pilih Jenis Kerja</option>
                <option value="penuh waktu" @if($lowongan-> kerja == 'penuh waktu') selected @endif >penuh waktu</option>
                <option value="kontrak" @if($lowongan-> kerja == 'kontrak') selected @endif >kontrak</option>
                <option value="magang" @if($lowongan-> kerja == 'magang') selected @endif >magang</option>
                <option value="paruh waktu" @if($lowongan-> kerja == 'paruh waktu') selected @endif >paruh waktu</option>
                <option value="harian" @if($lowongan-> kerja == 'harian') selected @endif >harian</option>
            </select>
            @error('kerja')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="alamat">Tipe Kerja: </label>
            <select name="tipe" class="form-select" id="basicSelect">
                <option>Pilih Tipe Kerja</option>
                <option value="onsite" @if($lowongan-> tipe == 'onsite') selected @endif>onsite</option>
                <option value="remote" @if($lowongan-> tipe == 'remote') selected @endif>remote</option>
            </select>
            @error('tipe')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Persyaratan:</label>
            <textarea type="text" name="persyaratan" class="form-control" placeholder="Masukan Persyaratan Kerja">{{ $lowongan->persyaratan }}</textarea>
            @error('persyaratan')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Jobdesk:</label>
            <textarea type="text" name="jobdesk" class="form-control" placeholder="Masukan Jobdesk Kerja">{{ $lowongan->jobdesk }}</textarea>
            @error('jobdesk')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Proses Wawancara:</label>
            <textarea type="text" name="proses_wawancara" class="form-control" placeholder="Masukan Proses Wawancara">{{ $lowongan->proses_wawancara }}</textarea>
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