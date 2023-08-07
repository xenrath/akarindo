<?php

namespace App\Http\Controllers\CS;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // menampilkan halaman index cs

    public function index()
    {
        $menunggus = Tiket::where('status', 'menunggu')->get();
        $proseses = Tiket::where('status', 'proses')->get();
        $selesais = Tiket::where('status', 'selesai')->get();

        return view('cs.dashboard.index', compact('menunggus', 'proseses', 'selesais'));
    }
}
