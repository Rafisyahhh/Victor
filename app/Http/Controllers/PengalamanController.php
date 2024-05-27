<?php

namespace App\Http\Controllers;

use App\Models\Pengalaman;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePengalamanRequest;
use App\Http\Requests\UpdatePengalamanRequest;

class PengalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengalamanRequest $request, $id)
    {
        $pengalaman = Pengalaman::create([
            'pengalaman' => $request->pengalaman,
        ]);
        $user = User::findOrFail($id);
        $user->id_pengalaman = $pengalaman->id;
        $user->save();
        return redirect()->route("profil")->with("success", "Berhasil Menambah Pengalaman");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengalaman $pengalaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengalaman $pengalaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengalamanRequest $request, Pengalaman $pengalaman)
    {
        $pengalaman->update([
            'pengalaman' => $request->pengalaman,
        ]);          
    
        return redirect()->route("profil")->with("success", "Berhasil Memperbarui Pengalaman");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengalaman $pengalaman)
    {
        //
    }
}
