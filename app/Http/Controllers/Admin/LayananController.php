<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::paginate(3);
        return view('admin.layanan.index', compact('layanans'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('admin.layanan.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'layanan' => 'required',
            'level_id' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'layanan.required' => 'Layanan tidak boleh kosong!',
            'level_id.required' => 'Level harus dipilih!',
            'keterangan.required' => 'Keterangan tidak boleh kosong!',
            'gambar.required' => 'Gambar harus ditambahkan!',
            'gambar.image' => 'Gambar yang dimasukan salah!',
            'gambar.mimes' => 'Gambar yang dimasukan salah!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
        $namagambar = "layanan/" . date('YmdHis') . "." . $gambar;
        $request->gambar->storeAs('public/uploads', $namagambar);

        Layanan::create(array_merge($request->all(), [
            'gambar' => $namagambar
        ]));

        return redirect('admin/layanan')->with('status', 'Berhasil menambahkan Layanan');
    }

    public function show(Layanan $layanan)
    {
        return view('admin.layanan.show', compact('layanan'));
    }

    public function edit(Layanan $layanan)
    {
        $levels = Level::all();
        return view('admin.layanan.edit', compact('layanan', 'levels'));
    }


    public function update(Request $request, Layanan $layanan)
    {
        $validator = Validator::make($request->all(), [
            'layanan' => 'required',
            'keterangan' => 'required',
            'level_id' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'layanan.required' => 'Layanan tidak boleh kosong!',
            'keterangan.required' => 'Keterangan tidak boleh kosong!',
            'level_id.required' => 'Level tidak boleh kosong!',
            'gambar.image' => 'Gambar yang dimasukan salah!',
            'gambar.mimes' => 'Gambar yang dimasukan salah!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        if ($request->gambar) {
            Storage::disk('local')->delete('public/uploads/' . $layanan->gambar);
            $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $namagambar = "layanan/" . date('YmdHis') . "." . $gambar;
            $request->gambar->storeAs('public/uploads', $namagambar);
        } else {
            $namagambar = $layanan->gambar;
        }
        
        Layanan::where('id', $layanan->id)
            ->update([
                'layanan' => $request->layanan,
                'keterangan' => $request->keterangan,
                'level_id' => $request->level_id,
                'gambar' => $namagambar,
            ]);

        return redirect('admin/layanan')->with('status', 'Berhasil mengubah Layanan');
    }

    public function destroy($id)
    {
        $layanan = Layanan::find($id);
        Storage::disk('local')->delete('public/uploads/' . $layanan->gambar);
        $layanan->delete();
        return redirect('admin/layanan')->with('status', 'Berhasil menghapus Layanan');
    }
}
