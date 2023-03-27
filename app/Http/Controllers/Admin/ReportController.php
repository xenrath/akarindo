<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        if ($status != "" && $tanggal_awal != "" && $tanggal_akhir != "") {
            $tikets = Tiket::where('status', $status)
                ->whereDate('tanggal_awal', '>=', $tanggal_awal)
                ->whereDate('tanggal_awal', '<=', $tanggal_akhir)
                ->orderBy('id', 'DESC')->get();
        } else if ($status != "" && $tanggal_awal == "" && $tanggal_akhir == "") {
            $tikets = Tiket::where('status', $status)->orderBy('id', 'DESC')->get();
        } else if ($status == "" && $tanggal_awal != "" && $tanggal_akhir != "") {
            $tikets = Tiket::whereDate('tanggal_awal', '>=', $tanggal_awal)
                ->whereDate('tanggal_awal', '<=', $tanggal_akhir)
                ->orderBy('id', 'DESC')->get();
        } else if ($status != "" && $tanggal_awal != "") {
            $tikets = Tiket::where('status', $status)
                ->whereDate('tanggal_awal', '>=', $tanggal_awal)
                ->orderBy('id', 'DESC')->get();
        } else if ($status == "" && $tanggal_awal != "") {
            $tikets = Tiket::whereDate('tanggal_awal', '>=', $tanggal_awal)
                ->orderBy('id', 'DESC')->get();
        } else {
            $tikets = Tiket::orderBy('id', 'DESC')->get();
        }

        // return response($tikets);

        return view('admin.report.index', compact('tikets'));
    }

    public function print(Request $request)
    {
        $status = $request->status;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        if ($status != "" && $tanggal_awal != "" && $tanggal_akhir != "") {
            $tikets = Tiket::where('status', $status)
                ->whereDate('tanggal_awal', '>=', $tanggal_awal)
                ->whereDate('tanggal_awal', '<=', $tanggal_akhir)
                ->orderBy('id', 'DESC')->get();
        } else if ($status != "" && $tanggal_awal == "" && $tanggal_akhir == "") {
            $tikets = Tiket::where('status', $status)->orderBy('id', 'DESC')->get();
        } else if ($status == "" && $tanggal_awal != "" && $tanggal_akhir != "") {
            $tikets = Tiket::whereDate('tanggal_awal', '>=', $tanggal_awal)
                ->whereDate('tanggal_awal', '<=', $tanggal_akhir)
                ->orderBy('id', 'DESC')->get();
        } else if ($status != "" && $tanggal_awal != "") {
            $tikets = Tiket::where('status', $status)
                ->whereDate('tanggal_awal', '>=', $tanggal_awal)
                ->orderBy('id', 'DESC')->get();
        } else if ($status == "" && $tanggal_awal != "") {
            $tikets = Tiket::whereDate('tanggal_awal', '>=', $tanggal_awal)
                ->orderBy('id', 'DESC')->get();
        } else {
            $tikets = Tiket::orderBy('id', 'DESC')->get();
        }

        $pdf = Pdf::loadview('admin.report.print', compact('tikets'));
        return $pdf->stream('Laporan Pengaduan');
    }
}
