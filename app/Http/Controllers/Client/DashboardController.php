<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // menampilkan halaman index client

    public function index()
    {
        $menunggus = Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'menunggu']
        ])->get();

        $proseses = Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'proses']
        ])->get();

        $selesais = Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'selesai']
        ])->get();

        return view('client.dashboard.index', compact('menunggus', 'proseses', 'selesais'));
    }

    // menampilkan halaman nonaktif client

    public function nonaktif()
    {
        return view('client.dashboard.nonaktif');
    }
}
