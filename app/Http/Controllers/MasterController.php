<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $h = Lowongan::where('id_perusahaan','1')->count();
        $t = Lowongan::where('id_perusahaan','2')->count();
        $e = Lowongan::where('id_perusahaan','3')->count();
        $l = Lowongan::all()->count();
        $u = User::where('role','user')->count();
        $p = Perusahaan::all()->count();
        return view('admin.dash', compact('h', 't', 'e','l','u','p'));
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
    public function store(Request $request)
    {
        //
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
