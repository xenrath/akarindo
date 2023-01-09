<?php

namespace App\Http\Controllers\CS;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Tiket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TiketController extends Controller
{
    public function menunggu()
    {
        $tikets = Tiket::where('status', 'Menunggu')->with('client')->get();
        $teknisis = User::where('role', 'teknisi')->get();

        return view('cs.tiket.menunggu', compact('tikets', 'teknisis'));
    }

    public function jawab(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jawaban' => 'required'
        ], [
            'jawaban.required' => 'Jawaban tidak boleh kosong!'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error[0]);
        }

        Tiket::where('id', $id)->update([
            'jawaban' => $request->jawaban,
            'status' => 'proses'
        ]);

        return back()->with('success', 'Berhasil mengirimkan jawaban');
    }

    public function alihkan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'teknisi_id' => 'required'
        ], [
            'teknisi_id.required' => 'Teknisi harus dipilih!'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error[0]);
        }

        Tiket::where('id', $id)->update([
            'teknisi_id' => $request->teknisi_id,
        ]);

        return back()->with('success', 'Berhasil mengalihkan ke teknisi');
    }

    public function proses()
    {
        $tikets = Tiket::where('status', 'proses')->get();

        return view('cs.tiket.proses', compact('tikets'));
    }

    public function konfirmasi($id)
    {
        Tiket::where('id', $id)->update([
            'tanggal_akhir' => Carbon::now()->format('d-m-Y'),
            'status' => 'selesai',
        ]);

        return back()->with('success', 'Berhasil menyelesaikan Pengaduan');
    }

    public function selesai()
    {
        $tikets = Tiket::where('status', 'selesai')->get();

        return view('cs.tiket.selesai', compact('tikets'));
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
}
