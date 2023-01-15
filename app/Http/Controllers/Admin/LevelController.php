<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::get();
        return view('admin.level.index', compact('levels'));
    }

    public function create()
    {
        return view('admin.level.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'lama' => 'required',
        ], [
            'nama.required' => 'Nama level harus diisi!',
            'lama.required' => 'Lama perbaikan harus diisi!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Level::create($request->all());

        return redirect('admin/level')->with('success', 'Berhasil menambahkan Level');
    }

    public function show(Level $level)
    {
        return view('admin.level.show', compact('level'));
    }

    public function edit(Level $level)
    {
        return view('admin.level.edit', compact('level'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'lama' => 'required',
        ], [
            'nama.required' => 'Nama level harus diisi!',
            'lama.required' => 'Lama perbaikan harus diisi!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Level::where('id', $id)->update([
            'nama' => $request->nama,
            'lama' => $request->lama,
        ]);

        return redirect('admin/level')->with('success', 'Berhasil mengubah Level');
    }

    public function destroy($id)
    {
        $data = Level::find($id);
        $data->delete();
        return redirect('admin/level')->with('success', 'Berhasil menghapus Level');
    }
}
