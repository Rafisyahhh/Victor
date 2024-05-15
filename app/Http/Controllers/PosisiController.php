<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posisi;
use App\Http\Requests\StorePosisiRequest;
use App\Http\Requests\UpdatePosisiRequest;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posisi = Posisi::orderBy('id', 'desc')->get();
        return view('admin.posisi.index', compact('posisi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.posisi.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePosisiRequest $request)
    {
        $posisi = Posisi::create([
            'nama_posisi' => $request->nama_posisi,
        ]);

        return redirect()->route("posisi")->with("success", "Berhasil Menamabah Data");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posisi = Posisi::find($id);
        return view("admin.posisi.edit", compact("posisi"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePosisiRequest $request, string $id)
    {
        $posisi = Posisi::findOrFail($id);
    
        // Jika nama_posisi yang baru sama dengan nama_posisi yang sudah ada,
        // maka tidak perlu melakukan update.
        if ($posisi->nama_posisi !== $request->nama_posisi) {
            $request->validate([
                'nama_posisi' => 'required|unique:posisis,nama_posisi',
            ]);
    
            $posisi->update([
                'nama_posisi' => $request->nama_posisi,
            ]);
    
            return redirect()->route('posisi')->with('success', 'Berhasil Mengubah Data');
        }else {
            // Jika nama_posisi yang baru sama dengan nama_posisi yang sudah ada,
            // maka tidak perlu melakukan update, langsung redirect.
            return redirect()->route('posisi')->with('info', 'Tidak ada perubahan pada data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posisi=Posisi::where('id','=',$id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
