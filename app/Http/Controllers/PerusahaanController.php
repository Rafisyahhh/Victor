<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Kategori;
use Illuminate\Support\Str;
use App\Http\Requests\StorePerusahaanRequest;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perusahaan = Perusahaan::all();
        return view('admin.perusahaan.index', compact('perusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.perusahaan.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerusahaanRequest $request)
    {
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $ekstensi = $foto->getClientOriginalExtension();
            $namaFoto = Str::random(10) . '.' . $ekstensi;
            $foto->move(public_path('image'), $namaFoto);
        } else {
            $namaFoto = null;
        }
        $perusahaan = Perusahaan::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'id_kategori' => $request->nama_kategori,
            'no_telp' => $request->no_telp,
            'deskripsi' => $request->deskripsi,
            'foto' => $namaFoto,
        ]);
        return redirect()->route("perusahaan")->with("success", "Berhasil Menamabah Data");
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
        $perusahaan = Perusahaan::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.perusahaan.edit', compact('perusahaan', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_perusahaan' => 'required|unique:perusahaans,nama_perusahaan,'. $id . ',id',
                'nama_kategori' => 'required',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg',
                'no_telp' => 'required|numeric|unique:perusahaans,no_telp,'. $id . ',id',
                'deskripsi' => 'required',
            ],
            [
                'nama_perusahaan.required' => 'perusahaan harus diisi',
                'nama_perusahaan.unique' => 'Perusahaan sudah ada',
                'nama_kategori.required' => 'Kategori harus diisi',
                'foto.image' => 'File harus berupa gambar',
                'foto.mimes' => 'Format file gambar harus jpeg, png, atau jpg',
                'no_telp.required' => 'Form tidak boleh kosong',
                'no_telp.digits_between' => 'No Telp harus 10-12 angka',
                'no_telp.unique' => 'No Telp sudah digunakan',
                'deskripsi.required' => 'Deskripsi harus diisi',
            ]
        );
        $perusahaan = Perusahaan::findOrFail($id);
        if ($request->hasFile('foto')) {
            //hapus foto sebelumnya
            if ($perusahaan->foto !== null && file_exists(public_path('image/') . $perusahaan->foto)) {
                unlink(public_path('image/') . $perusahaan->foto);
            }
            $foto = $request->file('foto');
            $ekstensi = $foto->getClientOriginalExtension();
            $namaFoto = Str::random(10) . '.' . $ekstensi;
            $foto->move(public_path('image'), $namaFoto);
        } else {
            $namaFoto = $perusahaan->foto;
        }
        
        $perusahaan = Perusahaan::where('id', $id)->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'id_kategori' => $request->nama_kategori,
            'no_telp' => $request->no_telp,
            'deskripsi' => $request->deskripsi,
            'foto' => $namaFoto,
        ]);
        return redirect()->route('perusahaan')->with('success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        if ($perusahaan->lowongan()->count() > 0) {
            return redirect()->back()->with('error', 'Gagal menghapus, data ini masih digunakan ditabel lain');
        }
        if ($perusahaan->foto !== null && file_exists(public_path('image/') . $perusahaan->foto)) {
            unlink(public_path('image/') . $perusahaan->foto);
        }
        $perusahaan ->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    public function indexUser()
    {
        $perusahaan = Perusahaan::all();
        return view('user.perusahaan', compact('perusahaan'));
    }
    public function indexDetail($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        // dd($perusahaan);
        return view('user.detailperusahaan', compact('perusahaan'));
    }
}
