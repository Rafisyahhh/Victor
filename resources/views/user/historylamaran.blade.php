@extends('user.main')
@section('judul','History Lamaran - Victor Work')
@section('content')
<h1 class="fw-bold text-center text-title" style="margin-top: 100px;color:#4ade80">History Lamaran</h1>
<div class="container mt-4">
    <div class="table-responsive" style="border-radius: 20px">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelamar</th>
                    <th>Perusahaan</th>
                    <th>Tanggal Melamar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lamaran as $item)
                @if ($item->id_user == Auth::user()->id)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>
                        <h5 class="fw-bold">{{ $item->user->nama }}</h5>
                        <p>{{ $item->user->no_telp }}</p>
                    </td>
                    <td>
                        <h5 class="fw-bold">{{ $item->lowongan->perusahaan->nama_perusahaan }}</h5>
                        <p>{{ $item->lowongan->nama_posisi }}</p>
                        <p>{{ $item->lowongan->perusahaan->no_telp }}</p>
                    </td>
                    <td>{{$item->created_at->locale('id')->isoFormat('dddd, DD MMMM YYYY')}}</td>
                    <td>
                        @if ($item->status == 'accept')
                        <h5 class="fw-bold" style="color:#4ade80">Diterima</h5>
                        @elseif ($item->status == 'reject')
                        <h5 class="fw-bold text-danger">Ditolak</h5>
                        @elseif ($item->status == 'pending')
                        <h5 class="fw-bold text-primary">Menunggu Konfirmasi</h5>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                            <i class="bi bi-search"></i>
                        </button>
                    </td>
                </tr> 
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@foreach ($lamaran as $item)
<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Lamaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th colspan="2">Pelamar</th>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $item->user->nama }}</td>
                        </tr>
                        <tr>
                            <td>No Telp Pelamar</td>
                            <td>: {{ $item->user->no_telp }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">Perusahaan</th>
                        </tr>
                        <tr>
                            <td>Nama Perusahaan</td>
                            <td>: {{ $item->lowongan->perusahaan->nama_perusahaan }}</td>
                        </tr>
                        <tr>
                            <td>No Telp Perusahaan</td>
                            <td>: {{ $item->lowongan->perusahaan->no_telp }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">Lowongan</th>
                        </tr>
                        <tr>
                            <td>Posisi Kerja</td>
                            <td>: {{ $item->lowongan->nama_posisi }}</td>
                        </tr>
                        <tr>
                            <td>Gaji</td>
                            <td>: {{ $item->lowongan->gaji }}</td>
                        </tr>
                        <tr>
                            <td>Jobdesk</td>
                            <td style="white-space: pre-wrap">{{ $item->lowongan->jobdesk }}</td>
                        </tr>
                        <tr>
                            <td>Persyaratan</td>
                            <td style="white-space: pre-wrap">{{ $item->lowongan->persyaratan }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">Status Lamaran</th>
                        </tr>
                        <tr>
                            <td>Alasan Diterima/Ditolak</td>
                            <td>: {{ $item->message }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                @if ($item->status == 'accept')
                                Anda telah <span class="text-success">Diterima</span> kerja di Perusahaan {{$item->lowongan->perusahaan->nama_perusahaan}} sebagai {{$item->lowongan->nama_posisi}}, Untuk info lebih lanjut bisa menghubungi No Telp Perusahaan yang ada di atas
                                @elseif ($item->status == 'reject')
                                Anda <span class="text-danger">Ditolak</span> kerja di Perusahaan {{$item->lowongan->perusahaan->nama_perusahaan}} sebagai {{$item->lowongan->nama_posisi}},Anda bisa melamar lagi di Lowongan Pekerjaan yang lain
                                @elseif ($item->status == 'pending')
                                Anda bisa <span class="text-primary">Menunggu Konfirmasi</span> dari admin apakah lamaran anda diterima atau tidak
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection