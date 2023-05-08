<?php

namespace App\Http\Controllers\Teknisi;

use App\Events\Realtime;
use App\Http\Controllers\Controller;
use App\Models\DetailObrolan;
use App\Models\Obrolan;
use App\Models\User;
use Illuminate\Http\Request;

class ObrolanController extends Controller
{
    public function create()
    {
        $cs = User::where('role', 'cs')->first();
        $obrolan = Obrolan::where([
            ['cs_id', $cs->id],
            ['client_id', auth()->user()->id]
        ])->first();

        return view('client.obrolan.create', compact('obrolan'));
    }

    public function store(Request $request)
    {
        if ($this->cek_obrolan()) {
            $obrolan = $this->cek_obrolan();
        } else {
            $cs = User::where('role', 'cs')->first();

            $obrolan = Obrolan::create([
                'cs_id' => $cs->id,
                'client_id' => auth()->user()->id
            ]);
        }

        DetailObrolan::create([
            'obrolan_id' => $obrolan->id,
            'pengirim_id' => auth()->user()->id,
            'pesan' => $request->pesan
        ]);

        Realtime::dispatch('message');

        return back();
    }

    public function cek_obrolan()
    {
        $cs = User::where('role', 'cs')->first();

        $obrolan = Obrolan::where([
            ['cs_id', $cs->id],
            ['client_id', auth()->user()->id]
        ])->first();

        return $obrolan;
    }
}
