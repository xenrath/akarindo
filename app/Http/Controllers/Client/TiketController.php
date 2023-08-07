<?php

namespace App\Http\Controllers\Client;

use App\Events\Realtime;
use App\Http\Controllers\Controller;
use App\Models\DetailObrolan;
use App\Models\Komentar;
use App\Models\Obrolan;
use App\Models\Produk;
use App\Models\Tiket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TiketController extends Controller
{
    // menampilkan halaman tiket menunggu 

    public function menunggu()
    {
        Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'menunggu']
        ])->update([
            'is_read_client' => true
        ]);

        $tikets = Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'menunggu']
        ])->get();

        return view('client.tiket.menunggu', compact('tikets'));
    }

    // menampilkan halaman tiket proses

    public function proses()
    {
        Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'proses']
        ])->update([
            'is_read_client' => true
        ]);

        $tikets = Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'proses']
        ])->get();

        return view('client.tiket.proses', compact('tikets'));
    }

    // menampilkan halaman obrolan tiket proses

    public function obrolan($id)
    {
        $tiket = Tiket::where('id', $id)->first();

        if ($tiket->status != 'proses') {
            return redirect('client/tiket/proses');
        }

        $obrolan = Obrolan::where('tiket_id', $id)->first();

        DetailObrolan::where([
            ['obrolan_id', $id],
            ['pengirim_id', '!=', auth()->user()->id]
        ])->update([
            'is_read' => true
        ]);

        return view('client.tiket.obrolan', compact('tiket', 'obrolan'));
    }

    // proses tambah data obrolan

    public function buat_obrolan(Request $request)
    {
        if (!($request->pesan || $request->gambar)) {
            return back()->with('error', 'Pesan atau Gambar belum diisi!');
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
            'pesan' => $pesan,
            'gambar' => $namagambar

        ]);

        Realtime::dispatch('message');

        return back();
    }

    // proses cek obrolan

    public function cek_obrolan($tiket_id)
    {
        $obrolan = Obrolan::where('tiket_id', $tiket_id)->first();

        return $obrolan;
    }

    // proses konfirmasi selesai 

    public function konfirmasi_selesai($id)
    {
        Tiket::where('id', $id)->update([
            'tanggal_akhir' => Carbon::now()->format('Y-m-d'),
            'status' => 'selesai',
            'is_read_cs' => false,
            'is_read_teknisi' => false,
            'is_read_client' => false
        ]);

        Realtime::dispatch('message');

        return back()->with('success', 'Berhasil menyelesaikan Tiket');
    }

    // menampilkan halaman tiket selesai

    public function selesai()
    {
        Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'selesai']
        ])->update([
            'is_read_client' => true
        ]);

        $tikets = Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'selesai']
        ])->get();

        return view('client.tiket.selesai', compact('tikets'));
    }

    // menampilkan halaman tambah tiket

    public function create()
    {
        $produks = Produk::where('client_id', auth()->user()->id)->get();
        return view('client.tiket.create', compact('produks'));
    }

    // proses tambah data tiket

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'produk_id' => 'required',
            'pengaduan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'produk_id.required' => 'Produk harus dipilih!',
            'pengaduan.required' => 'Pengaduan harus diisi!',
            'foto.image' => 'Foto harus berformat jpeg, jpg, png!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        $now = Carbon::now()->format('Y-m-d');

        if ($request->gambar) {
            $nama = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $namagambar = 'tiket/' . date('mYdHs') . random_int(1, 10) . '_' . $nama;
            $request->gambar->storeAs('public/uploads', $namagambar);
        } else {
            $namagambar = null;
        }

        Tiket::create(array_merge($request->all(), [
            'kode' => $this->generateCode(),
            'client_id' => auth()->user()->id,
            'gambar' => $namagambar,
            'status' => 'menunggu',
            'tanggal_awal' => $now
        ]));

        Realtime::dispatch('message');

        return back()->with('success', 'Berhasil membuat Tiket.');
    }

    // proses hapus data tiket

    public function destroy($id)
    {
        $tiket = Tiket::where('id', $id)->first();
        Storage::disk('local')->delete('public/uploads/' . $tiket->gambar);
        $tiket->delete();

        return back()->with('success', 'Berhasil menghapus Tiket');
    }

    // generate kode tiket

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
