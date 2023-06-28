<?php

namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // menampilkan halaman index tiket

    public function index()
    {
        $menunggus = Tiket::where([
            ['teknisi_id', auth()->user()->id],
            ['status', 'menunggu']
        ])->get();

        $proseses = Tiket::where([
            ['teknisi_id', auth()->user()->id],
            ['status', 'proses']
        ])->get();
        
        $selesais = Tiket::where([
            ['teknisi_id', auth()->user()->id],
            ['status', 'selesai']
        ])->get();

        return view('teknisi.dashboard.index', compact('menunggus', 'proseses', 'selesais'));
    }
}
