<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menunggus = Tiket::where('status', 'menunggu')->get();
        $proseses = Tiket::where('status', 'proses')->get();
        $selesais = Tiket::where('status', 'selesai')->get();

        return view('admin.dashboard.index', compact('menunggus', 'proseses', 'selesais'));
    }
}
