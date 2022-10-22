<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    function index()
    {
        $produks = Produk::paginate(3);
        return view('back.produk.index', compact('produks'));
    }

    function create()
    {
        $users = User::all();
        $layanans = Layanan::all();
        return view('back.produk.create', compact('users', 'layanans'));
    }

    function store(Request $request)
    {
        $request->validate([
            'produk' => 'required',
            'user_id' => 'required',
            'layanan_id' => 'required',
            'url' => 'required',
            'pedoman' => 'required|nullable|mimes:doc,pdf,xls,xlsx,ppt,pptx',
        ]);

        $fileName = '';
        if ($request->file('pedoman')->isValid()) {
            $gambar = $request->file('pedoman');
            $extention = $gambar->getClientOriginalExtension();
            $fileName = "produk/" . date('ymdHis') . "." . $extention;
            $upload_path = 'public/storage/uploads/produk';
            $request->file('pedoman')->move($upload_path, $fileName);
            $input['pedoman'] = $fileName;
        }
        Produk::create(array_merge($request->all(), [
            'pedoman' => $fileName
        ]));
        return redirect('produk')->with('status', 'Berhasil menambahkan produk');
    }

    public function edit(Produk $produk)
    {
        $users = User::all();
        $layanans = Layanan::all();
        return view('.back.produk.edit', compact('produk', 'users', 'layanans'));
    }


    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'produk' => 'required',
            'user_id' => 'required',
            'layanan_id' => 'required',
            'url' => 'required',
            'pedoman' => 'required|nullable|mimes:doc,pdf,xls,xlsx,ppt,pptx',
        ]);
        if ($request->pedoman) {
            Storage::disk('local')->delete('public/uploads/' . $produk->pedoman);
            $pedoman = str_replace(' ', '', $request->pedoman->getClientOriginalName());
            $namaGambar = "produk/" . date('YmdHis') . "." . $pedoman;
            $request->pedoman->storeAs('public/uploads', $namaGambar);
        } else {
            $namaGambar = $produk->pedoman;
        }
        Produk::where('id', $produk->id)->update([
            'produk' => $request->produk,
            'user_id' => $request->user_id,
            'layanan_id' => $request->layanan_id,
            'url' => $request->url,
            'pedoman' => $namaGambar,
        ]);

        return redirect('produk')->with('status', 'Berhasil mengubah Produk');
    }

    public function show(Produk $produk)
    {
        return view('.back.produk.show', compact('produk'));
    }

    public function destroy($id)
    {
        $data = Produk::find($id);
        $data->delete();
        return redirect('produk')->with('status', 'Produk berhasil dihapus');
    }
}
