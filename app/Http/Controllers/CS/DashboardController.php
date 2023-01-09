<?php

namespace App\Http\Controllers\CS;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menunggus = Tiket::where('status', 'Menunggu')->get();
        $proseses = Tiket::where('status', 'Diproses')->get();
        $selesais = Tiket::where('status', 'Selesai')->get();

        return view('cs.dashboard.index', compact('menunggus', 'proseses', 'selesais'));
    }
}
