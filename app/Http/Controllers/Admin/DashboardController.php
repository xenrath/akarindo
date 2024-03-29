<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Tiket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // function untuk menampilkan halaman index

    public function index(Request $request)
    {
        $menunggus = Tiket::where('status', 'menunggu')->get();
        $proseses = Tiket::where('status', 'proses')->get();
        $selesais = Tiket::where('status', 'selesai')->get();

        $layanans = Layanan::get();
        $labels = array();
        $data = array();

        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        // membuat perulangan data tiket berdasarkan layanan dan request

        foreach ($layanans as $layanan) {
            if ($tanggal_awal != "" && $tanggal_akhir != "") {
                $tikets = Tiket::where('status', 'selesai')
                    ->whereDate('tanggal_awal', '>=', $tanggal_awal)
                    ->whereDate('tanggal_akhir', '<=', $tanggal_akhir)
                    ->whereHas('produk', function ($query) use ($layanan) {
                        $query->whereHas('sublayanan', function ($query) use ($layanan) {
                            $query->where('layanan_id', $layanan->id);
                        });
                    })->get();
            } else if ($tanggal_awal != "" && $tanggal_akhir == "") {
                $tikets = Tiket::where('status', 'selesai')
                    ->whereDate('tanggal_awal', '>=', $tanggal_awal)
                    ->whereHas('produk', function ($query) use ($layanan) {
                        $query->whereHas('sublayanan', function ($query) use ($layanan) {
                            $query->where('layanan_id', $layanan->id);
                        });
                    })->get();
            } else {
                $tikets = Tiket::where('status', 'selesai')
                    ->whereHas('produk', function ($query) use ($layanan) {
                        $query->whereHas('sublayanan', function ($query) use ($layanan) {
                            $query->where('layanan_id', $layanan->id);
                        });
                    })->get();
            }
            
            $labels[] = $layanan->layanan;
            $data[] = count($tikets);
        }

        return view('admin.dashboard.index', compact(
            'menunggus',
            'proseses',
            'selesais',
            'tikets',
            'labels',
            'data'
        ));
    }
}
