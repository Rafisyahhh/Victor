<?php

namespace App\Http\Controllers;

use App\Models\lamaran;
use App\Models\lowongan;
use Illuminate\Support\Str;
use App\Http\Requests\StorelamaranRequest;
use App\Http\Requests\UpdatelamaranRequest;

class LamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lamaran = lamaran::orderBy('id', 'desc')->get();
        return view('admin.lamaran.index', compact('lamaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelamaranRequest $request)
    {
        $lamaran = Lamaran::create([
            'id_lowongan' => $request->id_lowongan,
            'id_user' => $request->id_user,
            'id_cv' => $request->id_cv,
            'id_pengalaman' => $request->id_pengalaman,
            'id_pendidikan' => $request->id_pendidikan,
            'id_keahlian' => $request->id_keahlian,
        ]);
        return redirect()->route("dashboard")->with("success", "Berhasil Melamar Kerja, Silahkan Tunggu Konfirmasi Admin"); 
    }
}