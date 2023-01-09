<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Tiket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $menunggu = Tiket::where('status', 'menunggu')->get();
        $diproses = Tiket::where('status', 'proses')->get();
        $selesai = Tiket::where('status', 'selesai')->get();

        return view('admin.tiket.index', compact('menunggu', 'diproses', 'selesai'));
    }

    public function create()
    {
        $users = User::get();
        $produks = Produk::where('user_id', auth()->user()->id)->get();

        return view('back.tiket.create', compact('users', 'produks'));
    }

    public function store(Request $request)
    {
        $now = Carbon::now()->format('d-m-Y');

        Tiket::create(array_merge($request->all(), [
            'kode' => $this->generateCode(),
            'user_id' => auth()->user()->id,
            'status' => 'Menunggu',
            'tanggal_awal' => $now
        ]));

        if (auth()->user()->isAdmin()) {
            return redirect('tiket')->with('status', 'Berhasil menambahkan tiket');
        } else {
            return redirect('dashboard')->with('status', 'Berhasil menambahkan tiket');
        }
    }

    public function show($id)
    {
        $tiket = Tiket::where('id', $id)->first();
        return view('back.tiket.show', compact('tiket'));
    }

    public function edit($id)
    {
        $tiket = Tiket::where('id', $id)->first();
        return view('back.tiket.edit', compact('tiket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tiket' => 'required'
        ], [
            'tiket.required' => 'tiket tidak boleh kosong!'
        ]);

        Tiket::where('id', $id)->update([
            'tiket' => $request->tiket
        ]);

        return redirect('tiket')->with('status', 'Berhasil mengubah tiket');
    }

    public function destroy($id)
    {
        $tiket = Tiket::find($id);
        $tiket->delete();
        return redirect('tiket')->with('status', 'Berhasil menghapus tiket');
    }

    public function generateCode()
    {
        $now = Carbon::now();
        $tikets = Tiket::where('tanggal_awal', $now->format('d-m-Y'))->get();
        if (count($tikets) > 0) {
            $count = count($tikets) + 1;
            $num = sprintf("%04s", $count);
        } else {
            $num = "0001";
        }

        $result = $now->format('ymd') . $num;
        return $result;
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'status' => 'required'
        ], [
            'status.required' => 'Pilih status tiket!'
        ]);

        $kode = $request->kode;
        $status = $request->status;

        Tiket::where('kode', $kode)->update([
            'status' => $status
        ]);

        return redirect('tiket')->with('status', 'Berhasil memperbarui status pengaduan');
    }

    public function statusDiproses($id) {
        Tiket::where('id', $id)->update([
            'status' => 'Diproses'
        ]);

        return redirect('tiket')->with('status', 'Berhasil memproses tiket');
    }

    public function statusSelesai($id) {
        $now = Carbon::now()->format('d-m-Y');
        
        Tiket::where('id', $id)->update([
            'status' => 'Selesai',
            'tanggal_akhir' => $now
        ]);

        return redirect('tiket')->with('status', 'Berhasil menyelesaikan tiket');
    }
}
