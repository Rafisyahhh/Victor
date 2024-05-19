<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Posisi;
use App\Models\Perusahaan;
use Illuminate\Support\Str;
use App\Http\Requests\StoreLowonganRequest;
use App\Http\Requests\UpdateLowonganRequest;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lowongan = Lowongan::all();
        return view('admin.lowongan.index', compact('lowongan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perusahaan = Perusahaan::all();
        return view('admin.lowongan.create', compact('perusahaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLowonganRequest $request)
    {
        $lowongan = Lowongan::create([
            'id_perusahaan' => $request->nama_perusahaan,
            'gaji' => $request->gaji,
            'tempat_kerja' => $request->tempat_kerja,
            'waktu_kerja' => $request->waktu_kerja,
            'nama_posisi' => $request->nama_posisi,
            'ketentuan_kerja' => $request->ketentuan_kerja,
        ]);
        return redirect()->route("lowongan")->with("success", "Berhasil Menambah Data");
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
        $lowongan = Lowongan::findOrFail($id);
        $perusahaan = Perusahaan::all();
        return view('admin.lowongan.edit', compact('lowongan', 'perusahaan'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLowonganRequest $request, Lowongan $lowongan)
    {
        $lowongan->update($request->all());
        return redirect()->route('lowongan')->with('success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lowongan=lowongan::where('id','=',$id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
    public function indexUser()
    {
        $lowongan = Lowongan::all();
        return view('user.lowongan', compact('lowongan'));
    }
    public function indexDetail($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return view('user.detaillowongan', compact('lowongan'));
    }
}
