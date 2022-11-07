<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::paginate(3);
        return view('back.layanan.index', compact('layanans'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('back.layanan.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan' => 'required',
            'level_id' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'layanan.required' => 'Layanan tidak boleh kosong!',
            'level_id.required' => 'Level harus dipilih!',
            'keterangan.required' => 'Keterangan tidak boleh kosong!',
            'gambar.required' => 'Gambar harus disertakan!',
        ]);

        $fileName = '';
        if ($request->file('gambar')->isValid()) {
            $gambar = $request->file('gambar');
            $extention = $gambar->getClientOriginalExtension();
            $fileName = "layanan/" . date('ymdHis') . "." . $extention;
            $upload_path = 'public/storage/uploads/layanan';
            $request->file('gambar')->move($upload_path, $fileName);
            $input['gambar'] = $fileName;
        }
        Layanan::create(array_merge($request->all(), [
            'gambar' => $fileName
        ]));

        return redirect('layanan')->with('status', 'Berhasil menambahkan layanan');
    }

    public function edit(Layanan $layanan)
    {
        $levels = Level::all();
        return view('.back.layanan.edit', compact('layanan', 'levels'));
    }


    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'layanan' => 'required',
            'keterangan' => 'required',
            'level_id' => 'required',
        ], [
            'layanan.required' => 'Layanan tidak boleh kosong!',
            'keterangan.required' => 'Keterangan tidak boleh kosong!',
            'level_id.required' => 'Level tidak boleh kosong!',
        ]);

        if ($request->gambar) {
            Storage::disk('local')->delete('public/uploads/' . $layanan->gambar);
            $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $namaGambar = "layanan/" . date('YmdHis') . "." . $gambar;
            $request->gambar->storeAs('public/uploads', $namaGambar);
        } else {
            $namaGambar = $layanan->gambar;
        }
        Layanan::where('id', $layanan->id)
            ->update([
                'layanan' => $request->layanan,
                'keterangan' => $request->keterangan,
                'level_id' => $request->level_id,
                'gambar' => $namaGambar,
            ]);

        return redirect('layanan')->with('status', 'Berhasil mengubah layanan');
    }

    public function show(Layanan $layanan)
    {
        return view('.back.layanan.show', compact('layanan'));
    }

    public function destroy($id)
    {
        $data = Layanan::find($id);
        $data->delete();
        return redirect('layanan')->with('status', 'Layanan berhasil dihapus');
    }
}
