@extends('admin.master')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">


            <p class="fw-bold fs-5">Data kategori</p>
            <a href="{{ route('kategori.create') }}"  class="btn btn-primary ">Tambah kategori</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped text-center  mb-0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($kategori as $kategori )
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td class="d-flex  gap-2 justify-content-center"><a
                        href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning"><i
                            class="fa fa-pen"></i></a>
                    <form action="{{ route('kategori.destroy', $kategori->id) }}" class="form-delete" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="showConfirmation(this.parentNode)" type="button"><i
                            class="fa fa-trash"></i></button>
                    </form>
                </tr>
                @endforeach
               </tbody>
            </table>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            // Mengirim formulir yang berada di dalam elemen form yang di-klik
            form.submit();
        }
    });
}

</script>
@endsection