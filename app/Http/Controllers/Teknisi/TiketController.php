<?php

namespace App\Http\Controllers\Teknisi;

use App\Events\Realtime;
use App\Http\Controllers\Controller;
use App\Models\DetailObrolan;
use App\Models\Komentar;
use App\Models\Obrolan;
use App\Models\Produk;
use App\Models\Tiket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TiketController extends Controller
{
    public function menunggu()
    {
        Tiket::where([
            ['teknisi_id', auth()->user()->id],
            ['status', 'menunggu']
        ])->update([
            'is_read_teknisi' => true
        ]);

        $tikets = Tiket::where([
            ['teknisi_id', auth()->user()->id],
            ['status', 'menunggu']
        ])->with('client')->get();

        return view('teknisi.tiket.menunggu', compact('tikets'));
    }

    public function konfirmasi_kerjakan($id)
    {
        Tiket::where('id', $id)->update([
            'tanggal_pengerjaan' => Carbon::now()->format('Y-m-d'),
            'status' => 'proses',
            'is_read_cs' => false,
            'is_read_teknisi' => false,
            'is_read_client' => false
        ]);

        Realtime::dispatch('message');

        return back()->with('success', 'Berhasil mengkonfirmasi Tiket');
    }

    public function proses()
    {
        Tiket::where([
            ['teknisi_id', auth()->user()->id],
            ['status', 'proses']
        ])->update([
            'is_read_teknisi' => true
        ]);

        $tikets = Tiket::where([
            ['teknisi_id', auth()->user()->id],
            ['status', 'proses']
        ])->get();

        return view('teknisi.tiket.proses', compact('tikets'));
    }

    public function obrolan($id)
    {
        $tiket = Tiket::where('id', $id)->first();

        if ($tiket->status != 'proses') {
            return redirect('teknisi/tiket/proses');
        }

        $obrolan = Obrolan::where('tiket_id', $id)->first();

        DetailObrolan::where([
            ['obrolan_id', $id],
            ['pengirim_id', '!=', auth()->user()->id]
        ])->update([
            'is_read' => true
        ]);

        return view('teknisi.tiket.obrolan', compact('tiket', 'obrolan'));
    }

    public function buat_obrolan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pesan' => 'required',
        ], [
            'pesan.required' => 'Pesan tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        $tiket_id = $request->tiket_id;
        $pesan = $request->pesan;

        if ($this->cek_obrolan($tiket_id)) {
            $obrolan = $this->cek_obrolan($tiket_id);
        } else {
            $obrolan = Obrolan::create([
                'tiket_id' => $tiket_id,
            ]);
        }

        DetailObrolan::create([
            'obrolan_id' => $obrolan->id,
            'pengirim_id' => auth()->user()->id,
            'pesan' => $pesan
        ]);

        Realtime::dispatch('message');

        return back();
    }

    public function cek_obrolan($tiket_id)
    {
        $obrolan = Obrolan::where('tiket_id', $tiket_id)->first();

        return $obrolan;
    }

    public function konfirmasi_selesai(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bukti' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'bukti.required' => 'Bukti harus diisi!',
            'bukti.image' => 'Foto harus berformat jpeg, jpg, png!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        $tiket_id = $request->tiket_id;

        $bukti = str_replace(' ', '', $request->bukti->getClientOriginalName());
        $namabukti = "tiket/" . date('YmdHis') . "." . $bukti;
        $request->bukti->storeAs('public/uploads', $namabukti);

        Tiket::where('id', $tiket_id)->update([
            'bukti' => $namabukti,
            'tanggal_akhir' => Carbon::now()->format('Y-m-d'),
            'status' => 'selesai',
            'is_read_cs' => false,
            'is_read_teknisi' => false,
            'is_read_client' => false
        ]);

        Realtime::dispatch('message');

        return redirect('teknisi/tiket/proses')->with('success', 'Berhasil menyelesaikan Tiket');
    }

    public function selesai()
    {
        Tiket::where([
            ['teknisi_id', auth()->user()->id],
            ['status', 'selesai']
        ])->update([
            'is_read_teknisi' => true
        ]);

        $tikets = Tiket::where([
            ['teknisi_id', auth()->user()->id],
            ['status', 'selesai']
        ])->get();

        return view('teknisi.tiket.selesai', compact('tikets'));
    }

    public function generateCode()
    {
        $now = Carbon::now();
        $tikets = Tiket::where('tanggal_awal', $now->format('Y-m-d'))->get();
        if (count($tikets) > 0) {
            $count = count($tikets) + 1;
            $num = sprintf("%04s", $count);
        } else {
            $num = "0001";
        }

        $result = $now->format('ymd') . $num;
        return $result;
    }
}
