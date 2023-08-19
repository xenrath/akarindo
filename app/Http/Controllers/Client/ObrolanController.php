<?php

namespace App\Http\Controllers\Client;

use App\Events\Realtime;
use App\Http\Controllers\Controller;
use App\Models\Chatbot;
use App\Models\DetailChatbot;
use App\Models\DetailObrolan;
use App\Models\Obrolan;
use App\Models\SubChatbot;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ObrolanController extends Controller
{
    public function index()
    {
        $jam = Carbon::now()->format('H:i');

        if ($jam >= '08:00' && $jam <= '16:00') {
            $is_jam = true;
        } else {
            $is_jam = false;
        }

        return view('client.obrolan.index', compact('is_jam'));
    }

    // menampilkan halaman tambah obrolan

    public function create()
    {
        $cs = User::where('role', 'cs')->first();
        $obrolan = Obrolan::where([
            ['cs_id', $cs->id],
            ['client_id', auth()->user()->id]
        ])->first();

        if ($obrolan) {
            DetailObrolan::where([
                ['obrolan_id', $obrolan->id],
                ['pengirim_id', '!=', auth()->user()->id]
            ])->update([
                'is_read' => true
            ]);
        }

        return view('client.obrolan.create', compact('obrolan'));
    }

    // proses tambah data obrolan

    public function store(Request $request)
    {
        if (!($request->pesan || $request->gambar)) {
            return back()->with('error', 'Pesan atau Gambar belum diisi!');
        }

        if ($this->cek_obrolan()) {
            $obrolan = $this->cek_obrolan();
        } else {
            $cs = User::where('role', 'cs')->first();

            $obrolan = Obrolan::create([
                'cs_id' => $cs->id,
                'client_id' => auth()->user()->id
            ]);
        }

        if ($request->gambar) {
            $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $namagambar = "obrolan/" . date('YmdHis') . "." . $gambar;
            $request->gambar->storeAs('public/uploads', $namagambar);
        } else {
            $namagambar = null;
        }

        DetailObrolan::create([
            'obrolan_id' => $obrolan->id,
            'pengirim_id' => auth()->user()->id,
            'pesan' => $request->pesan,
            'gambar' => $namagambar
        ]);

        Realtime::dispatch('message');

        return back();
    }

    // proses cek obrolan 

    public function cek_obrolan()
    {
        $cs = User::where('role', 'cs')->first();

        $obrolan = Obrolan::where([
            ['cs_id', $cs->id],
            ['client_id', auth()->user()->id]
        ])->first();

        return $obrolan;
    }

    public function chatbot()
    {
        $chatbots = Chatbot::all();

        return view('client.obrolan.chatbot', compact('chatbots'));
    }

    public function sub_chatbot($id)
    {
        $subchatbots = SubChatbot::where('chatbot_id', $id)->get();

        return $subchatbots;
    }

    public function jawaban($id)
    {
        $sub_chatbot = SubChatbot::where('id', $id)->first();

        return $sub_chatbot;
    }
}
