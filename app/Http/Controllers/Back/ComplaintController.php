<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Produk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $menunggu = Complaint::where('status', 'Menunggu')->get();
        $diproses = Complaint::where('status', 'Diproses')->get();
        $selesai = Complaint::where('status', 'Selesai')->get();

        return view('back.complaint.index', compact('menunggu', 'diproses', 'selesai'));
    }

    public function create()
    {
        $users = User::get();
        $products = Produk::where('user_id', auth()->user()->id)->get();

        return view('back.complaint.create', compact('users', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'description' => 'required'
        ], [
            'product_id.required' => 'Pilih produk terlebih dahulu!',
            'description.required' => 'Deskripsi tidak boleh kosong!',
        ]);

        $now = Carbon::now()->format('d-m-Y');

        Complaint::create(array_merge($request->all(), [
            'user_id' => auth()->user()->id,
            'code' => $this->generateCode(),
            'status' => 'Menunggu',
            'start_date' => $now
        ]));

        if (auth()->user()->role_id == 1) {
            return redirect('complaint')->with('status', 'Berhasil menambahkan complaint');
        } else {
            return redirect('dashboard')->with('status', 'Berhasil menambahkan complaint');
        }
    }

    public function show($id)
    {
        $complaint = Complaint::where('id', $id)->first();
        return view('back.complaint.show', compact('complaint'));
    }

    public function edit($id)
    {
        $complaint = complaint::where('id', $id)->first();
        return view('back.complaint.edit', compact('complaint'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'complaint' => 'required'
        ], [
            'complaint.required' => 'complaint tidak boleh kosong!'
        ]);

        complaint::where('id', $id)->update([
            'complaint' => $request->complaint
        ]);

        return redirect('complaint')->with('status', 'Berhasil mengubah complaint');
    }

    public function destroy($id)
    {
        $complaint = complaint::find($id);
        $complaint->delete();
        return redirect('complaint')->with('status', 'Berhasil menghapus complaint');
    }

    public function generateCode()
    {
        $now = Carbon::now();
        $complaints = Complaint::where('start_date', $now->format('d-m-Y'))->get();
        if (count($complaints) > 0) {
            $count = count($complaints) + 1;
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
            'status.required' => 'Pilih status pengaduan!'
        ]);

        $code = $request->code;
        $status = $request->status;

        Complaint::where('code', $code)->update([
            'status' => $status
        ]);

        return redirect('complaint')->with('status', 'Berhasil memperbarui status pengaduan');
    }

    public function statusDiproses($id) {
        Complaint::where('id', $id)->update([
            'status' => 'Diproses'
        ]);

        return redirect('complaint')->with('status', 'Berhasil memproses tiket');
    }

    public function statusSelesai($id) {
        $now = Carbon::now()->format('d-m-Y');
        
        Complaint::where('id', $id)->update([
            'status' => 'Selesai',
            'end_date' => $now
        ]);

        return redirect('complaint')->with('status', 'Berhasil menyelesaikan tiket');
    }
}
