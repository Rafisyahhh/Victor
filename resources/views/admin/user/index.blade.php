<!-- resources/views/users/index.blade.php -->

@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">


            <p class="fw-bold fs-5">Daftar Pengguna</p>
            <a href="{{ route('user.create') }}" class="btn btn-primary ">Tambah Pengguna</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped text-center  mb-0">

                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($user as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning mr-2 "><i class="fa fa-pen"></i></a>
                            <form action="{{ route('user.destroy', $user->id) }}" class="form-delete" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger " onclick="showConfirmation(this.parentNode)" type="button"><i
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
