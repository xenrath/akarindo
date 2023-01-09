<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    function index()
    {
        $produks = Produk::paginate(3);

        return view('admin.produk.index', compact('produks'));
    }

    function create()
    {
        $clients = User::where('role', 'client')->get();
        $layanans = Layanan::all();

        return view('admin.produk.create', compact('clients', 'layanans'));
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'client_id' => 'required',
            'layanan_id' => 'required',
            'pedoman' => 'nullable|mimes:doc,pdf,xls,xlsx,ppt,pptx',
        ], [
            'nama.required' => 'Nama produk harus diisi!',
            'client_id.required' => 'Client harus dipilih!',
            'layanan_id.required' => 'Layanan harus dipilih!',
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

        return redirect('admin/produk')->with('status', 'Berhasil menambahkan Produk');
    }

    public function show(Produk $produk)
    {
        return view('admin.produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        $clients = User::where('role', 'client')->get();
        $layanans = Layanan::all();

        return view('admin.produk.edit', compact('produk', 'clients', 'layanans'));
    }


    public function update(Request $request, Produk $produk)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'client_id' => 'required',
            'layanan_id' => 'required',
            'pedoman' => 'nullable|mimes:doc,pdf,xls,xlsx,ppt,pptx',
        ], [
            'nama.required' => 'Nama produk harus diisi!',
            'client_id.required' => 'Client harus dipilih!',
            'layanan_id.required' => 'Layanan harus dipilih!',
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
            'layanan_id' => $request->layanan_id,
            'url' => $request->url,
            'pedoman' => $namapedoman,
        ]);

        return redirect('admin/produk')->with('status', 'Berhasil mengubah Produk');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        Storage::disk('local')->delete('public/uploads/' . $produk->pedoman);
        $produk->delete();
        return redirect('admin/produk')->with('status', 'Berhasil menghapus Produk');
    }
}
