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
                            <button onclick="hapus('{{$item-> id}}')" class="btn btn-danger fw-bold"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>
<script type="text/javascript">
    function hapus(id) {
        Swal.fire({
            title: "Apakah kamu yakin ingin menghapus data ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Iya aku yakin!"
        }).then((i) => {
            if (i.isConfirmed) {
                window.location.href = "{{ route('posisi.destroy', $item->id) }}";
            }
        })
    };
</script>
@endsection