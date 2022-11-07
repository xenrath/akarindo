<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Tiket;
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
        if (auth()->user()->role_id == 1) {
            $menunggu = Tiket::where('status', 'Menunggu')->get();
            $diproses = Tiket::where('status', 'Diproses')->get();
            $selesai = Tiket::where('status', 'Selesai')->get();

            return view('back.dashboard.index', compact('menunggu', 'diproses', 'selesai'));
        } else {
            $menunggu = Tiket::where([
                ['user_id', auth()->user()->id],
                ['status', 'Menunggu']
            ])->get();

            $diproses = Tiket::where([
                ['user_id', auth()->user()->id],
                ['status', 'Diproses']
            ])->get();

            $selesai = Tiket::where([
                ['user_id', auth()->user()->id],
                ['status', 'Selesai']
            ])->get();

            return view('back.dashboard.index', compact('menunggu', 'diproses', 'selesai'));
        }
    }
}
