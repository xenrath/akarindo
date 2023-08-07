<?php

namespace App\Http\Controllers\CS;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanMenungguController extends Controller
{
    public function index()
    {
        $teknisis = User::where('role', 'teknisi')->get();

        return view('cs.laporan-menunggu.index', compact('teknisis'));
    }

    public function show($id)
    {
        $teknisi = User::where('id', $id)->first();
        $tikets = Tiket::where([
            ['teknisi_id', $id],
            ['status', 'menunggu']
        ])->get();

        return view('cs.laporan-menunggu.show', compact('teknisi', 'tikets'));
    }
}
