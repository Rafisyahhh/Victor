<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DatadiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role','user')->get();
        return view('admin.datadiri.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        
        $user = User::findOrFail($id);
        return view('admin.datadiri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        if ($request->hasFile('avatar')) {
            $foto = $request->file('avatar');
            $ekstensi = $foto->getClientOriginalExtension();
            $namaFoto = Str::random(10) . '.' . $ekstensi;
            $foto->move(public_path('image'), $namaFoto);
        } else {
            $namaFoto = null;
        }
        $user = User::findOrFail($id);
        $user->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'avatar' => $namaFoto,
        ]);

        return redirect()->route('profil')->with('success', 'Data diri berhasil dibuat.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
