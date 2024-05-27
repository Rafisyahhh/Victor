@extends('admin.master')
@section('content')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">


            <p class="fw-bold fs-5">Data Pelamar</p>
        </div>

        <div class="table-responsive">
            <table class="table table-striped text-center  mb-0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>CV</th>
                        <th>Nama</th>
                        <th>No Telp Pelamar</th>
                        <th>Nama Perusahaan</th>
                        <th>Posisi</th>
                        <th>No Telp Perusahaan</th>
                        <th>Pengalaman Kerja</th>
                        <th>Keahlian Kerja</th>
                        <th>Riwayat Pendidikan</th>
                        <th>Status</th>
                        <th>Alasan diterima/tolak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lamaran as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cvModal{{$item->id}}">
                                Lihat CV
                            </button></td>
                        <td>{{ $item->user->nama }}</td>
                        <td>{{ $item->user->no_telp }}</td>
                        <td>{{ $item->lowongan->perusahaan->nama_perusahaan }}</td>
                        <td>{{ $item->lowongan->nama_posisi }}</td>
                        <td>{{ $item->lowongan->perusahaan->no_telp }}</td>
                        <td>{{ $item->pengalaman->pengalaman }}</td>
                        <td>{{ $item->keahlian->keahlian }}</td>
                        <td>{{ $item->pendidikan->pendidikan }}</td>
                        <td class="d-flex  gap-2 justify-content-center">
                            @if ($item->status != 'pending')
                            @if ($item->status == 'accept')
                            <span class="text-success">Diterima</span>
                            @elseif ($item->status == 'reject')
                            <span class="text-danger">Ditolak</span>
                            @endif
                            @else
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tolakModal{{$item->id}}">Tolak</button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#terimaModal{{$item->id}}">Terima</button>
                            @endif
                        </td>
                        <td>{{ $item->message }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>
<!-- modal cv -->
@foreach ($lamaran as $item)
<div class="modal fade" id="cvModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">CV</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <iframe src="{{ asset('file/'. $item->cv->cv)}}" width="100%" height="600px"></iframe>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- modal terima -->
@foreach ($lamaran as $item)
<div class="modal fade" id="terimaModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Terima pelamar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('lamaran.terima', $item->id) }}" method="POST">
                    @csrf
                    <label>Alasan diterima:</label>
                    <textarea type="text" name="message" class="form-control" placeholder="Masukan alasan anda menerima pelamar ini">{{ old('message') }}</textarea>
                    @error('message')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="hidden" name="id_lamaran" value="{{ $item->id }}">
                    <input type="hidden" name="id_user" value="{{ $item->id_user }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
                <button type="submit" class="btn btn-primary">Terima</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- modal tolak -->
@foreach ($lamaran as $item)
<div class="modal fade" id="tolakModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tolak pelamar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('lamaran.tolak', $item->id) }}" method="POST">
                    @csrf
                    <label>Alasan ditolak:</label>
                    <textarea type="text" name="message" class="form-control" placeholder="Masukan alasan anda menolak pelamar ini">{{ old('message') }}</textarea>
                    @error('message')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="hidden" name="id_lamaran" value="{{ $item->id }}">
                    <input type="hidden" name="id_user" value="{{ $item->user->id }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
                <button type="submit" class="btn btn-primary">Terima</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<script type="text/javascript">
    function terima(id) {
        Swal.fire({
            title: "Apakah kamu yakin ingin menerima pelamar ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Iya aku yakin!"
        }).then((i) => {
            if (i.isConfirmed) {
                window.location.href = `/terima${id}`;
            }
        })
    };
</script>
<script type="text/javascript">
    function tolak(id) {
        Swal.fire({
            title: "Apakah kamu yakin ingin menolak pelamar ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Iya aku yakin!"
        }).then((i) => {
            if (i.isConfirmed) {
                window.location.href = `/tolak${id}`;
            }
        })
    };
</script>
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
@endsection