<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\SubLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubLayananController extends Controller
{
    // menampilkan halaman index sublayanan

    public function index()
    {
        $sublayanans = SubLayanan::get();

        return view('admin.sublayanan.index', compact('sublayanans'));
    }

    // menampilkan halaman tambah sublayanan

    public function create()
    {
        $layanans = Layanan::get();
        return view('admin.sublayanan.create', compact('layanans'));
    }

    // proses tambah data sublayanan

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'layanan_id' => 'required',
            'nama' => 'required',
        ], [
            'layanan_id.required' => 'Layanan harus dipilih!',
            'nama.required' => 'Nama sub layanan tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        SubLayanan::create($request->all());

        return redirect('admin/sublayanan')->with('success', 'Berhasil menambahkan Sub Layanan');
    }

    // menampilkan halaman ubah sublayanan

    public function edit($id)
    {
        $sublayanan = SubLayanan::where('id', $id)->first();
        $layanans = Layanan::get();
        return view('admin.sublayanan.edit', compact('sublayanan', 'layanans'));
    }

    // proses ubah data sublayanan

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'layanan_id' => 'required',
            'nama' => 'required',
        ], [
            'layanan_id.required' => 'Layanan harus dipilih!',
            'nama.required' => 'Nama sub layanan tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        SubLayanan::where('id', $id)
            ->update([
                'layanan_id' => $request->layanan_id,
                'nama' => $request->nama,
            ]);

        return redirect('admin/sublayanan')->with('success', 'Berhasil mengubah Sub Layanan');
    }

    // proses hapus data sublayanan

    public function destroy($id)
    {
        $sublayanan = SubLayanan::find($id);
        $sublayanan->delete();
        return redirect('admin/sublayanan')->with('success', 'Berhasil menghapus Sub Layanan');
    }
}
