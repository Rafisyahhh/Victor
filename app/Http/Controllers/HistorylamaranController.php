<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lamaran;
use App\Models\Notif;
use Carbon\Carbon;

class HistorylamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lamaran = lamaran::orderBy('id', 'desc')->get();
        $notif = Notif::orderBy('id', 'desc')->get();
        $not = Notif::where('id_user', auth()->user()->id)->where('status', 'belum')->get()->count();
        return view('user.historylamaran', compact('lamaran','notif','not'));
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
