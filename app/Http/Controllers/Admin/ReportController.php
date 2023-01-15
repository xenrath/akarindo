<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $tikets = Tiket::where('status', 'selesai')->get();
        return view('admin.report.index', compact('tikets'));
    }

    public function print()
    {
        $tikets = Tiket::where('status', 'selesai')->get();
        $pdf = Pdf::loadview('admin.report.print', compact('tikets'));
        return $pdf->stream('Laporan Pengaduan');
    }
}
