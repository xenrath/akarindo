<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
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
            $menunggu = Complaint::where('status', 'Menunggu')->get();
            $diproses = Complaint::where('status', 'Diproses')->get();
            $selesai = Complaint::where('status', 'Selesai')->get();

            return view('back.dashboard.index', compact('menunggu', 'diproses', 'selesai'));
        } else {
            $menunggu = Complaint::where([
                ['user_id', auth()->user()->id],
                ['status', 'Menunggu']
            ])->get();

            $diproses = Complaint::where([
                ['user_id', auth()->user()->id],
                ['status', 'Diproses']
            ])->get();

            $selesai = Complaint::where([
                ['user_id', auth()->user()->id],
                ['status', 'Selesai']
            ])->get();

            return view('back.dashboard.index', compact('menunggu', 'diproses', 'selesai'));
        }
    }
}
