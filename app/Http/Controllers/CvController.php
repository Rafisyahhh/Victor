<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCvRequest;
use App\Http\Requests\UpdateCvRequest;

class CvController extends Controller
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
    public function store(StoreCvRequest $request, $id)
    {
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $ekstensi = $cv->getClientOriginalExtension();
            $namacv = Str::random(10) . '.' . $ekstensi;
            $cv->move(public_path('file'), $namacv);
        } else {
            $namacv = null;
        }
        $cv = Cv::create([
            'cv' => $namacv,
        ]);
        $user = User::findOrFail($id);
        $user->id_cv = $cv->id;
        $user->save();
        return redirect()->route("profil")->with("success", "Berhasil Menambah CV");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cv $cv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cv $cv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCvRequest $request, Cv $cv)
    {
        // Periksa apakah ada file baru yang diunggah
        if ($request->hasFile('cv')) {
            // Hapus file CV lama jika ada
            if ($cv->cv !== null && file_exists(public_path('file/') . $cv->cv)) {
                unlink(public_path('file/') . $cv->cv);
            }

            // Ambil file baru dari permintaan
            $newCv = $request->file('cv');

            // Dapatkan ekstensi file baru
            $extension = $newCv->getClientOriginalExtension();

            // Buat nama baru untuk file dengan string acak dan ekstensi file
            $newFileName = Str::random(10) . '.' . $extension;

            // Pindahkan file baru ke direktori tujuan
            $newCv->move(public_path('file'), $newFileName);

            // Simpan nama file baru ke dalam model CV
            $cv->cv = $newFileName;
        }

        // Simpan perubahan pada model CV
        $cv->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route("profil")->with("success", "Berhasil Memperbarui CV");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cv $cv)
    {
        //
    }
}
