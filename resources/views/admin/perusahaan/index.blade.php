@extends('admin.master')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">


            <p class="fw-bold fs-5">Data Perusahaan</p>
            <a href="{{ route('perusahaan.create') }}" class="btn btn-primary ">Tambah Perusahaan</a>
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
                        <th>Deskripsi</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perusahaan as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{ asset('image/' . $item->foto) }}" alt="{{ $item->nama}}" width="100"></td>
                        <td>{{ $item->nama_perusahaan }}</td>
                        <td>{{ $item->kategori->nama_kategori }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td class="d-flex  gap-2 justify-content-center">
                            <a href="{{ route('perusahaan.edit', $item->id) }}" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <form action="{{ route('perusahaan.destroy', $item->id) }}" class="form-delete" method="post">
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