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
                    @foreach ($kategori as $item)
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>
@endsection



