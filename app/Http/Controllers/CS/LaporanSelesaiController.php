<?php

namespace App\Http\Controllers\CS;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanSelesaiController extends Controller
{
    public function index()
    {
        $teknisis = User::where('role', 'teknisi')->get();

        return view('cs.laporan-selesai.index', compact('teknisis'));
    }

    public function show($id)
    {
        $teknisi = User::where('id', $id)->first();
        $tikets = Tiket::where([
            ['teknisi_id', $id],
            ['status', 'selesai']
        ])->get();

        return view('cs.laporan-selesai.show', compact('teknisi', 'tikets'));
    }
}
