<?php

namespace App\Http\Controllers\Teknisi;

use App\Events\Realtime;
use App\Http\Controllers\Controller;
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
        $tikets = Tiket::where([
            ['teknisi_id', auth()->user()->id],
            ['status', 'menunggu']
        ])->with('client')->get();

        return view('teknisi.tiket.menunggu', compact('tikets'));
    }

    public function proses()
    {
        $tikets = Tiket::where([
            ['teknisi_id', auth()->user()->id],
            ['status', 'proses']
        ])->get();

        return view('teknisi.tiket.proses', compact('tikets'));
    }

    public function komentar($id)
    {
        $tiket = Tiket::where('id', $id)->first();
        $komentars = Komentar::where('tiket_id', $tiket->id)->orderByDesc('id')->get();

        Komentar::where([
            ['tiket_id', $id],
            ['pengirim_id', '!=', auth()->user()->id]
        ])->update([
            'status' => false
        ]);

        return view('teknisi.tiket.komentar', compact('tiket', 'komentars'));
    }

    public function buat_komentar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'komentar' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'komentar.required' => 'Komentar harus diisi!',
            'gambar.image' => 'Gambar harus berformat jpeg, jpg, png!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        if ($request->gambar) {
            Storage::disk('local')->delete('public/uploads/' . $request->gambar);
            $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $namagambar = "komentar/" . date('YmdHis') . "." . $gambar;
            $request->gambar->storeAs('public/uploads', $namagambar);
        } else {
            $namagambar = null;
        }

        Komentar::create(array_merge($request->all(), [
            'pengirim_id' => auth()->user()->id,
            'gambar' => $namagambar
        ]));

        return back();
    }
    
    public function selesai()
    {
        $tikets = Tiket::where([
            ['teknisi_id', auth()->user()->id],
            ['status', 'selesai']
        ])->get();

        return view('teknisi.tiket.selesai', compact('tikets'));
    }

    public function konfirmasi_kerjakan($id)
    {
        Tiket::where('id', $id)->update([
            'status' => 'proses',
            'tanggal_pengerjaan' => Carbon::now()->format('Y-m-d')
        ]);

        Realtime::dispatch('message');

        return back()->with('success', 'Berhasil mengkonfirmasi Tiket');
    }

    public function konfirmasi_selesai($id)
    {
        Tiket::where('id', $id)->update([
            'tanggal_akhir' => Carbon::now()->format('Y-m-d'),
            'status' => 'selesai'
        ]);

        Realtime::dispatch('message');

        return back()->with('success', 'Berhasil menyelesaikan Tiket');
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
