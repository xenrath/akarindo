<?php

namespace App\Http\Controllers\CS;

use App\Events\Realtime;
use App\Http\Controllers\Controller;
use App\Models\DetailObrolan;
use App\Models\Obrolan;
use Illuminate\Http\Request;

class ObrolanController extends Controller
{
    // menampilkan halaman index obrolan 

    public function index()
    {
        $obrolans = Obrolan::where('cs_id', auth()->user()->id)->get();

        return view('cs.obrolan.index', compact('obrolans'));
    }

    // proses tambah data obrolan

    public function store(Request $request)
    {
        if (!($request->pesan || $request->gambar)) {
            return back()->with('error', 'Pesan atau Gambar belum diisi!');
        }

        if ($request->gambar) {
            $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $namagambar = "obrolan/" . date('YmdHis') . "." . $gambar;
            $request->gambar->storeAs('public/uploads', $namagambar);
        } else {
            $namagambar = null;
        }
        
        DetailObrolan::create([
            'obrolan_id' => $request->obrolan_id,
            'pengirim_id' => auth()->user()->id,
            'pesan' => $request->pesan,
            'gambar' => $namagambar,
        ]);

        Realtime::dispatch('message');

        return back();
    }

    // menampilkan halaman detail obrolan

    public function show($id)
    {
        $obrolan = Obrolan::where('id', $id)->first();

        DetailObrolan::where([
            ['obrolan_id', $obrolan->id],
            ['pengirim_id', '!=', auth()->user()->id]
        ])->update([
            'is_read' => true
        ]);

        return view('cs.obrolan.show', compact('obrolan'));
    }
}
