<?php

namespace App\Http\Controllers\Client;

use App\Events\Realtime;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Tiket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TiketController extends Controller
{
    public function menunggu()
    {
        $tikets = Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'menunggu']
        ])->get();

        return view('client.tiket.menunggu', compact('tikets'));
    }

    public function proses()
    {
        $tikets = Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'proses']
        ])->get();

        return view('client.tiket.proses', compact('tikets'));
    }

    public function selesai()
    {
        $tikets = Tiket::where([
            ['client_id', auth()->user()->id],
            ['status', 'selesai']
        ])->get();

        return view('client.tiket.selesai', compact('tikets'));
    }

    public function konfirmasi_selesai($id)
    {
        Tiket::where('id', $id)->update([
            'status' => 'selesai',
            'tanggal_akhir' => Carbon::now()->format('Y-m-d')
        ]);

        return back()->with('success', 'Berhasil menyelesaikan Tiket.');
    }

    public function create()
    {
        $produks = Produk::where('client_id', auth()->user()->id)->get();
        return view('client.tiket.create', compact('produks'));
    }

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

    public function destroy($id)
    {
        $tiket = Tiket::where('id', $id)->first();
        Storage::disk('local')->delete('public/uploads/' . $tiket->gambar);
        $tiket->delete();

        return back()->with('success', 'Berhasil menghapus Tiket');
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
