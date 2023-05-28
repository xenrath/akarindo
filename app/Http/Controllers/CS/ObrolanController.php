<?php

namespace App\Http\Controllers\CS;

use App\Events\Realtime;
use App\Http\Controllers\Controller;
use App\Models\DetailObrolan;
use App\Models\Obrolan;
use Illuminate\Http\Request;

class ObrolanController extends Controller
{
    public function index()
    {
        $obrolans = Obrolan::where('cs_id', auth()->user()->id)->get();

        return view('cs.obrolan.index', compact('obrolans'));
    }

    public function store(Request $request)
    {
        DetailObrolan::create([
            'obrolan_id' => $request->obrolan_id,
            'pengirim_id' => auth()->user()->id,
            'pesan' => $request->pesan
        ]);

        Realtime::dispatch('message');

        return back();
    }

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
