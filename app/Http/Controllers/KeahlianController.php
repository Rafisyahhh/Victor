<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\User;
use App\Http\Requests\StoreKeahlianRequest;
use App\Http\Requests\UpdateKeahlianRequest;

class KeahlianController extends Controller
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
    public function store(StoreKeahlianRequest $request,$id)
    {
        $keahlian = Keahlian::create([
            'keahlian' => $request->keahlian,
        ]);
        $user = User::findOrFail($id);
        $user->id_keahlian = $keahlian->id;
        $user->save();
        return redirect()->route("profil")->with("success", "Berhasil Menambah Keahlian");
    }

    /**
     * Display the specified resource.
     */
    public function show(Keahlian $keahlian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keahlian $keahlian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeahlianRequest $request, Keahlian $keahlian)
    {
        $keahlian->update([
            'keahlian' => $request->keahlian,
        ]);          
    
        return redirect()->route("profil")->with("success", "Berhasil Memperbarui Keahlian");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keahlian $keahlian)
    {
        //
    }
}
