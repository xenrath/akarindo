<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // if (Auth::user()->isAdmin()) {
        //     $menunggu = Complaint::where('status', 'Menunggu')->get();
        //     $diproses = Complaint::where('status', 'Diproses')->get();
        //     $selesai = Complaint::where('status', 'Selesai')->get();

        //     return view('back.dashboard.index', compact('menunggu', 'diproses', 'selesai'));
        // } else {
        //     $menunggu = Complaint::where([
        //         ['user_id', auth()->user()->id],
        //         ['status', 'Menunggu']
        //     ])->get();

        //     $diproses = Complaint::where([
        //         ['user_id', auth()->user()->id],
        //         ['status', 'Diproses']
        //     ])->get();

        //     $selesai = Complaint::where([
        //         ['user_id', auth()->user()->id],
        //         ['status', 'Selesai']
        //     ])->get();

        //     return view('back.dashboard.index', compact('menunggu', 'diproses', 'selesai'));
        // }
    }
}
