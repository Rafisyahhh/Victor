<?php

namespace App\Http\Controllers;

use App\Models\daftarpelamar;
use App\Models\Notif;
use App\Http\Requests\StoredaftarpelamarRequest;
use App\Http\Requests\UpdatedaftarpelamarRequest;
use App\Models\lamaran;

class DaftarpelamarController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function terima(lamaran $daftarpelamar,UpdatedaftarpelamarRequest $request)
    {
        $daftarpelamar->update([
            'status' => 'accept',
            'message'=> $request->message,
        ]);
        $notif = Notif::create([
            'message' => $request->message,
            'id_lamaran' => $request->id_lamaran,
            'id_user' => $request->id_user,
            'status' => 'belum',
        ]);
        return redirect()->route('lamaran')->with('success', 'Pelamar ini telah diterima');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function tolak(lamaran $daftarpelamar,UpdatedaftarpelamarRequest $request)
    {
        $daftarpelamar->update([
            'status' => 'reject',
            'message'=> $request->message
        ]);
        $notif = Notif::create([
            'message' => $request->message,
            'id_lamaran' => $request->id_lamaran,
            'id_user' => $request->id_user,
            'status' => 'belum',
        ]);
        return redirect()->route('lamaran')->with('error', 'Pelamar ini telah ditolak');
    }
}
