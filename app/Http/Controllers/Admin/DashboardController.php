<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Tiket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menunggus = Tiket::where('status', 'menunggu')->get();
        $proseses = Tiket::where('status', 'proses')->get();
        $selesais = Tiket::where('status', 'selesai')->get();

        $layanans = Layanan::get();
        $labels = array();
        $data = array();

        foreach ($layanans as $layanan) {
            $tikets = Tiket::where('status', 'selesai')->whereHas('produk', function ($query) use ($layanan) {
                $query->whereHas('sublayanan', function ($query) use ($layanan) {
                    $query->where('layanan_id', $layanan->id);
                });
            })->get();
            $labels[] = $layanan->layanan;
            $data[] = count($tikets);
        }

        return view('admin.dashboard.index', compact(
            'menunggus', 
            'proseses', 
            'selesais',
            'labels',
            'data'
        ));
    }

    public function grafik()
    {

        // $ruangs = Ruang::selectRaw('nama')->withCount('pinjams')->orderByDesc('pinjams_count')->limit(10)->get();

        // $labels = $ruangs->pluck('nama');
        // $data = $ruangs->pluck('pinjams_count');

        // return view('kalab.grafik.ruang', compact('labels', 'data'));
    }
}
