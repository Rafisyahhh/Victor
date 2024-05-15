@extends('admin.master')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">


            <p class="fw-bold fs-5">Data Posisi</p>
            <a href="{{ route('posisi.create') }}" class="btn btn-primary ">Tambah Posisi</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped text-center  mb-0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Posisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posisi as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama_posisi }}</td>
                        <td class="d-flex  gap-2 justify-content-center">
                            <a href="{{ route('posisi.edit', $item->id) }}" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <form action="{{ route('posisi.destroy', $item->id) }}" class="form-delete" method="post">
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