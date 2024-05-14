
@extends('admin.master')
@section('content')
   <div class="container">
    
       <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PUT')
           <div class="form-group">
               <label>kategori:</label>
               <input type="text" name="nama_kategori" class="form-control" placeholder="Masukan kategori" value="{{ $kategori->nama_kategori }}" />
               @error('nama_kategori')
               <span class="text-danger">{{ $message }}</span>
           @enderror
           </div>
           <div class="d-flex justify-content-end gap-2" style="margin-top: 10px">
       
               <button type="submit" class="btn btn-primary ml-2" >Kirim</button>
               <a href="{{ route('kategori') }}" type="button" class="btn btn-danger">kembali</a>
           </div>
       </form>
</div> 
@endsection

