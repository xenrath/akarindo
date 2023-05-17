<?php

namespace App\Http\Controllers\CS;

use App\Events\Realtime;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Tiket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;

class TiketController extends Controller
{
    public function menunggu()
    {
        Tiket::where('status', 'menunggu')->update([
            'is_read_cs' => true
        ]);

        $tikets = Tiket::where('status', 'menunggu')->with('client')->get();

        return view('cs.tiket.menunggu', compact('tikets'));
    }

    public function proses()
    {
        Tiket::where('status', 'proses')->update([
            'is_read_cs' => true
        ]);

        $tikets = Tiket::where('status', 'proses')->get();

        return view('cs.tiket.proses', compact('tikets'));
    }

    public function selesai()
    {
        Tiket::where('status', 'selesai')->update([
            'is_read_cs' => true
        ]);

        $tikets = Tiket::where('status', 'selesai')->get();

        return view('cs.tiket.selesai', compact('tikets'));
    }

    public function konfirmasi_jawab(Request $request, $id)
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
            'status' => 'proses',
            'is_read_cs' => false,
            'is_read_client' => false
        ]);

        Realtime::dispatch('message');

        return back()->with('success', 'Berhasil mengirimkan Jawaban');
    }

    public function konfirmasi_alihkan(Request $request, $id)
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

        Realtime::dispatch('message');

        return back()->with('success', 'Berhasil mengalihkan ke Teknisi');
    }

    public function konfirmasi_selesai($id)
    {
        Tiket::where('id', $id)->update([
            'tanggal_akhir' => Carbon::now()->format('d-m-Y'),
            'status' => 'selesai',
            'is_read_cs' => false,
            'is_read_client' => false
        ]);

        Realtime::dispatch('message');

        return back()->with('success', 'Berhasil menyelesaikan Tiket');
    }

    public function teknisi($id)
    {
        $tiket = Tiket::where('id', $id)->first();
        $teknisis = User::where('layanan_id', $tiket->produk->sublayanan->layanan_id)->withCount('tiket_teknisis')->orderBy('tiket_teknisis_count')->get();

        $data = array();

        foreach ($teknisis as $teknisi) {
            $tikets = Tiket::where('teknisi_id', $teknisi->id)->get();

            $jumlah = 0;
            foreach ($tikets as $tiket) {
                $jumlah += $tiket->produk->sublayanan->layanan->level->lama;
            }

            $class = new stdClass();

            $class->id = $teknisi->id;
            $class->nama = $teknisi->nama;
            $class->jumlah = $jumlah;

            array_push($data, $class);
        }

        return json_encode($data);
    }
}
