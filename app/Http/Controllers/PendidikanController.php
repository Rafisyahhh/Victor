<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use App\Models\User;
use App\Http\Requests\StorePendidikanRequest;
use App\Http\Requests\UpdatePendidikanRequest;

class PendidikanController extends Controller
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
    public function store(StorePendidikanRequest $request, $id)
    {
        $pendidikan = Pendidikan::create([
            'pendidikan' => $request->pendidikan,
        ]);
        $user = User::findOrFail($id);
        $user->id_pendidikan = $pendidikan->id;
        $user->save();
        return redirect()->route("profil")->with("success", "Berhasil Menambah Riwayat Pendidikan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePendidikanRequest $request, Pendidikan $pendidikan)
    {
        $pendidikan->update([
            'pendidikan' => $request->pendidikan,
        ]);          
    
        return redirect()->route("profil")->with("success", "Berhasil Memperbarui Riwayat Pendidikan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendidikan $pendidikan)
    {
        //
    }
}
