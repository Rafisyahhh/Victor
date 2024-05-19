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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        
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
        $user = User::findOrFail($id);
        return view('admin.datadiri.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar')) {
            //hapus avatar sebelumnya
            if ($user->avatar !== null && file_exists(public_path('image/') . $user->avatar)) {
                unlink(public_path('image/') . $user->avatar);
            }
            $foto = $request->file('avatar');
            $ekstensi = $foto->getClientOriginalExtension();
            $namaFoto = Str::random(10) . '.' . $ekstensi;
            $foto->move(public_path('image'), $namaFoto);
        } else {
            $namaFoto = $user->avatar;
        }
        $user->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'avatar'=> $namaFoto
        ]);

        return redirect()->route('datadiri')->with('success', 'Data diri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->nama = null;
        $user->jenis_kelamin = null;
        $user->tgl_lahir = null;
        $user->tempat_lahir = null;
        $user->no_telp = null;
        $user->alamat = null;
        $user->avatar = null;
        $user->save();

        return redirect()->route('datadiri')->with('success', 'Data diri berhasil dihapus.');
    }
}
