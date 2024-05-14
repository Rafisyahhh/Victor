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
        $kategori = Kategori::all();
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
<<<<<<< Updated upstream

=======
      
>>>>>>> Stashed changes
        $kategori = kategori::create($request->all());
        $input['nama_kategori'] = $request->nama_kategori;

<<<<<<< Updated upstream
        return redirect()->route("admin.kategori.index")->with("success", "Berhasil Menamabah Data");
=======
        return redirect()->route("kategori")->with("success","Berhasil Menamabah Data");
>>>>>>> Stashed changes
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
    public function destroy($id)
    {
        try {
            // dd($id);

            $extra = kategori::findOrFail($id);
            $extra->delete();
            return redirect()->route('kategori')->with('success', 'Berhasil Menghapus Data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'gagal menghapus ');
        }
    }
}
