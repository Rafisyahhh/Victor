
@extends('admin.master')
@section('content')
   <div class="container">
    
       <form action="{{ route('kategori.store') }}" method="POST">
           @csrf
           <div class="form-group">
               <label>kategori:</label>
               <input type="text"  value="{{ old('nama_kategori') }}" name="nama_kategori" class="form-control" placeholder="Masukan kategori"  />
               @error('nama_kategori')
               <span class="text-danger">{{ $message }}</span>
           @enderror
       
           <div class="d-flex justify-content-end gap-2"  style="margin-top: 10px">
       
               <button type="submit" class="btn btn-primary ml-2" >Kirim</button>
               <a href="{{ route('kategori') }}" type="button" class="btn btn-danger">kembali</a>
           </div>
       </form>
</div> 
@endsection

