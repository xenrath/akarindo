<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::paginate(3);
        return view('back.level.index', compact('levels'));
    }

    public function create()
    {
        return view('back.level.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'pengerjaan' => 'required',
            'perbaikan' => 'required',
        ], [
            'nama.required' => 'Nama level harus diisi!',
            'pengerjaan.required' => 'Lama pengerjaan harus diisi!',
            'perbaikan.required' => 'Lama perbaikan harus diisi!',
        ]);

        Level::create($request->all());

        return redirect('level')->with('status', 'Berhasil menambahkan level');
    }

    public function edit(Level $level)
    {
        return view('back.level.edit', compact('level'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'pengerjaan' => 'required',
            'perbaikan' => 'required',
        ], [
            'nama.required' => 'Nama level harus diisi!',
            'pengerjaan.required' => 'Lama pengerjaan harus diisi!',
            'perbaikan.required' => 'Lama perbaikan harus diisi!',
        ]);

        Level::where('id', $id)->update([
            'nama' => $request->nama,
            'pengerjaan' => $request->pengerjaan,
            'perbaikan' => $request->perbaikan
        ]);

        return redirect('level')->with('status', 'Berhasil mengubah Level');
    }

    public function show(Level $level)
    {
        return view('back.level.show', compact('level'));
    }

    public function destroy($id)
    {
        $data = Level::find($id);
        $data->delete();
        return redirect('level')->with('status', 'Level berhasil dihapus');
    }
}
