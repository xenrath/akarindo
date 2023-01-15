<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);

        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email,' . $user->id . ',id',
            'telp' => 'required|unique:users,telp,' . $user->id . ',id',
            'password' => 'sometimes|nullable|confirmed'
        ], [
            'nama.required' => 'Nama harus diisi!',
            'email.required' => 'Email harus diisi!',
            'telp.required' => 'Nomor telepon harus diisi!',
        ]);

        if ($request->password) {
            $password = bcrypt($request->password);
        } else {
            $password = $user->password;
        }

        if ($request->foto) {
            Storage::disk('local')->delete('public/uploads/' . $user->foto);
            $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
            $namafoto = 'user/' . date('mYdHs') . rand(1, 10) . '_' . $foto;
            $request->foto->storeAs('public/uploads/', $namafoto);
        } else {
            $namafoto = $user->foto;
        }

        User::where('id', $user->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'foto' => $namafoto,
            'password' => $password
        ]);

        return redirect()->back()->with('success', 'Berhasil memperbarui Profile');
    }
}
