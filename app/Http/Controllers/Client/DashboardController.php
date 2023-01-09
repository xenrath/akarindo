<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menunggu = Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'Menunggu']
        ])->get();

        $diproses = Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'Diproses']
        ])->get();

        $selesai = Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'Selesai']
        ])->get();

        return view('client.dashboard.index', compact('menunggu', 'diproses', 'selesai'));
    }
}
