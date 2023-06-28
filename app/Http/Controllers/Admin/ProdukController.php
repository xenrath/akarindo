<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Produk;
use App\Models\SubLayanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    // menampilkan halaman index produk

    function index()
    {
        $produks = Produk::get();
        return view('admin.produk.index', compact('produks'));
    }

    // menampilkan halaman tambah produk

    function create()
    {
        $clients = User::where('role', 'client')->get();
        $sublayanans = SubLayanan::get();

        return view('admin.produk.create', compact('clients', 'sublayanans'));
    }

    // proses tambah data produk

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'client_id' => 'required',
            'sublayanan_id' => 'required',
            'pedoman' => 'nullable|mimes:doc,pdf,xls,xlsx,ppt,pptx',
        ], [
            'nama.required' => 'Nama produk harus diisi!',
            'client_id.required' => 'Client harus dipilih!',
            'sublayanan_id.required' => 'Layanan harus dipilih!',
            'pedoman.mimes' => 'Pedoman yang dimasukan salah!'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        if ($request->pedoman) {
            $pedoman = str_replace(' ', '', $request->pedoman->getClientOriginalName());
            $namapedoman = "produk/" . date('YmdHis') . "." . $pedoman;
            $request->pedoman->storeAs('public/uploads', $namapedoman);
        } else {
            $namapedoman = null;
        }

        Produk::create(array_merge($request->all(), [
            'pedoman' => $namapedoman
        ]));

        return redirect('admin/produk')->with('success', 'Berhasil menambahkan Produk');
    }

    // menampilkan halaman detail produk

    public function show(Produk $produk)
    {
        return view('admin.produk.show', compact('produk'));
    }

    // menampilkan halaman ubah produk

    public function edit(Produk $produk)
    {
        $clients = User::where('role', 'client')->get();
        $sublayanans = SubLayanan::get();

        return view('admin.produk.edit', compact('produk', 'clients', 'sublayanans'));
    }

    // proses ubah data produk

    public function update(Request $request, Produk $produk)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'client_id' => 'required',
            'sublayanan_id' => 'required',
            'pedoman' => 'nullable|mimes:doc,pdf,xls,xlsx,ppt,pptx',
        ], [
            'nama.required' => 'Nama produk harus diisi!',
            'client_id.required' => 'Client harus dipilih!',
            'sublayanan_id.required' => 'Layanan harus dipilih!',
            'pedoman.mimes' => 'Pedoman yang dimasukan salah!'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        if ($request->pedoman) {
            Storage::disk('local')->delete('public/uploads/' . $produk->pedoman);
            $pedoman = str_replace(' ', '', $request->pedoman->getClientOriginalName());
            $namapedoman = "produk/" . date('YmdHis') . "." . $pedoman;
            $request->pedoman->storeAs('public/uploads', $namapedoman);
        } else {
            $namapedoman = $produk->pedoman;
        }
        Produk::where('id', $produk->id)->update([
            'nama' => $request->nama,
            'client_id' => $request->client_id,
            'sublayanan_id' => $request->sublayanan_id,
            'url' => $request->url,
            'pedoman' => $namapedoman,
        ]);

        return redirect('admin/produk')->with('success', 'Berhasil mengubah Produk');
    }

    // proses hapus data produk

    public function destroy($id)
    {
        $produk = Produk::find($id);
        Storage::disk('local')->delete('public/uploads/' . $produk->pedoman);
        $produk->delete();
        return redirect('admin/produk')->with('success', 'Berhasil menghapus Produk');
    }
}
