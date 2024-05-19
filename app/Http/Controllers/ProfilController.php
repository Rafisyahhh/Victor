<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.profil.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $user = User::findOrFail($id);
        return view('user.profil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required|string',
                'jenis_kelamin' => 'required',
                'avatar' => 'required',
                'tgl_lahir' => 'required|date|before_or_equal:today',
                'tempat_lahir' => 'required|string',
                'no_telp' => 'required|numeric|digits_between:10,12|unique:users,no_telp,' . $id . ',id',
                'alamat' => 'required|string',
            ],
            [
                'nama.required' => 'Form tidak boleh kosong',
                'jenis_kelamin.required' => 'Form tidak boleh kosong',
                'avatar.required' => 'Form tidak boleh kosong',
                'tgl_lahir.required' => 'Form tidak boleh kosong',
                'tgl_lahir.before_or_equal' => 'Tanggal tidak boleh kurang dari hari ini',
                'tempat_lahir.required' => 'Form tidak boleh kosong',
                'no_telp.required' => 'Form tidak boleh kosong',
                'no_telp.digits_between' => 'No Telp harus 10-12 angka',
                'no_telp.unique' => 'No Telp sudah digunakan',
                'alamat.required' => 'Form tidak boleh kosong',
            ]
        );

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
        $user = User::findOrFail($id);
        return view('user.profil.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required|string',
                'jenis_kelamin' => 'required',
                'avatar' => 'nullable',
                'tgl_lahir' => 'required|date|before_or_equal:today',
                'tempat_lahir' => 'required|string',
                'no_telp' => 'required|numeric|digits_between:10,12|unique:users,no_telp,' . $id . ',id',
                'alamat' => 'required|string',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
                'avatar.required' => 'Avatar tidak boleh kosong',
                'tgl_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
                'tgl_lahir.before_or_equal' => 'Tanggal tidak boleh kurang dari hari ini',
                'tempat_lahir.required' => 'Tempat Lahit tidak boleh kosong',
                'no_telp.required' => 'No Telp tidak boleh kosong',
                'no_telp.digits_between' => 'No Telp harus 10-12 angka',
                'no_telp.unique' => 'No Telp sudah digunakan',
                'alamat.required' => 'Alamat tidak boleh kosong',
            ]
        );
        $user = User::findOrFail($id);
        $namaFoto = null;
        if ($request->hasFile('avatar')) {
            //hapus foto sebelumnya
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
            'avatar' => $namaFoto,
        ]);

        return redirect()->route('profil')->with('success', 'Data diri berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
