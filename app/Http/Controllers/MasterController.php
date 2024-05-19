<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lowonganPerusahaan = Lowongan::groupBy('id_perusahaan')
            ->selectRaw('id_perusahaan, count(*) as jumlah_lowongan')
            ->get();
        $l = Lowongan::all()->count();
        $u = User::where('role', 'user')->count();
        $p = Perusahaan::all()->count();
        $pp = Perusahaan::all();
        return view('admin.dash', compact('lowonganPerusahaan', 'l', 'u', 'p', 'pp'));
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
