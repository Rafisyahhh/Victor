
@extends('admin.master')
@section('content')
   <div class="container">
    
       <form action="{{ route('posisi.update', $posisi->id) }}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PUT')
           <div class="form-group">
               <label>Posisi:</label>
               <input type="text" name="nama_posisi" class="form-control" placeholder="Masukan Nama posisi" value="{{ $posisi->nama_posisi }}" />
               @error('nama_posisi')
               <span class="text-danger">{{ $message }}</span>
           @enderror
           </div>
           <div class="d-flex justify-content-end gap-2" style="margin-top: 10px">
       
               <button type="submit" class="btn btn-primary ml-2" >Kirim</button>
               <a href="{{ route('posisi') }}" type="button" class="btn btn-danger">kembali</a>
           </div>
       </form>
</div> 
@endsection

