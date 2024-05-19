@extends('admin.master')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">


            <p class="fw-bold fs-5">Data Lowongan</p>
            <a href="{{ route('lowongan.create') }}" class="btn btn-primary ">Tambah Lowongan</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped text-center  mb-0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Perusahaan</th>
                        <th>Kategori Perusahaan</th>
                        <th>No Telp</th>
                        <th>Gaji</th>
                        <th>Tempat Kerja</th>
                        <th>Waktu Kerja</th>
                        <th>Posisi Kerja</th>
                        <th>Ketentuan Kerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lowongan as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{ asset('image/' . $item->perusahaan->foto) }}" alt="{{ $item->perusahaan->nama_perusahaan}}" width="100"></td>
                        <td>{{ $item->perusahaan->nama_perusahaan }}</td>
                        <td>{{ $item->perusahaan->kategori->nama_kategori }}</td>
                        <td>{{ $item->perusahaan->no_telp }}</td>
                        <td>{{'Rp ' . number_format($item->gaji,2,',','.')}}</td>
                        <td>{{ $item->tempat_kerja }}</td>
                        <td>{{ $item->waktu_kerja }} Jam</td>
                        <td>{{ $item->nama_posisi }}</td>
                        <td>{{ $item->ketentuan_kerja }}</td>
                        <td class="d-flex  gap-2 justify-content-center">
                            <a href="{{ route('lowongan.edit', $item->id) }}" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <form action="{{ route('lowongan.destroy', $item->id) }}" class="form-delete" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="showConfirmation(this.parentNode)" type="button"><i
                                class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>
<script>
    function showConfirmation(form) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Tindakan ini tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus saja!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
@endsection