<!-- resources/views/datadiris/index.blade.php -->

@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">


            <p class="fw-bold fs-5">Daftar Data Diri</p>
            <a href="{{ route('user.create') }}" class="btn btn-primary ">Tambah Data Diri</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped text-center  mb-0">

                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jenis kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                    <th>No Telpon</th>
                    <th>Alamat</th>
                    </tr>
                <tbody>
                @foreach($user as $datadiri)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $datadiri->nama }}</td>
                        <td>{{ $datadiri->jenis_kelamin}}</td>
                        <td>{{ $datadiri->tgl_lahir }}</td>
                        <td> {{ $datadiri-> tempat_lahir}}</td>
                        <td> {{ $datadiri->no_telp }}</td>
                        <td> {{ $datadiri->alama }}</td>
                        
                        <td>
                            <a href="{{ route('datadiri.edit', $datadiri->id) }}" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <form action="{{ route('datadiri.destroy', $datadiri->id) }}" class="form-delete" method="post">
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
