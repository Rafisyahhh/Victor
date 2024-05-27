<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use App\Models\Notif;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lowongan = Lowongan::all();
        $notif = Notif::orderBy('id', 'desc')->get();
        $not = Notif::where('id_user', auth()->user()->id)->where('status', 'belum')->get()->count();
        return view('user.dashboard', compact('lowongan','notif','not'));
    }
}
