<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StorekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::orderBy('id', 'desc')->get();
        return view("admin.kategori.index", compact("kategori"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.kategori.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorekategoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorekategoriRequest $request)
    {
        $kategori = kategori::create($request->all());
        $input['nama_kategori'] = $request->nama_kategori;
        return redirect()->route("kategori")->with("success","Berhasil Menamabah Data");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::findOrFail($id);
        return view("admin.kategori.edit", compact("kategori"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekategoriRequest  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekategoriRequest $request,$id)
    {
        $kategori = kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->route('kategori')->with('success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
   
        public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        if ($kategori->perusahaan()->count() > 0) {
            return redirect()->back()->with('error', 'Gagal menghapus, data ini masih digunakan ditabel lain');
        }
        $kategori->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}

