<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $layanans = Layanan::get();
        return view('profile.index', compact('user', 'layanans'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        if ($user->role == 'admin') {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'telp' => 'nullable|unique:users,telp,' . $user->id,
                'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
                'password' => 'nullable|confirmed'
            ], [
                'nama.required' => 'Nama user harus diisi!',
                'email.required' => 'Email harus diisi!',
                'email.unique' => 'Email sudah digunakan!',
                'email.email' => 'Email yang dimasukan salah!',
                'role.required' => 'Role harus dipilih!',
                'telp.unique' => 'Nomor telepon sudah digunakan!',
                'foto.image' => 'Foto harus berformat jpeg, jpg, png!',
                'password.confirmed' => 'Konfirmasi password tidak sesuai!'
            ]);
        } else {
            if ($user->foto) {
                if ($user->role == 'teknisi') {
                    $validator = Validator::make($request->all(), [
                        'nama' => 'required',
                        'email' => 'required|email|unique:users,email,' . $user->id,
                        'layanan_id' => 'required',
                        'telp' => 'required|unique:users,telp,' . $user->id,
                        'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
                        'alamat' => 'required',
                        'password' => 'nullable|confirmed'
                    ], [
                        'nama.required' => 'Nama user harus diisi!',
                        'email.required' => 'Email harus diisi!',
                        'email.unique' => 'Email sudah digunakan!',
                        'email.email' => 'Email yang dimasukan salah!',
                        'role.required' => 'Role harus dipilih!',
                        'layanan_id.required' => 'Kategori teknisi harus dipilih!',
                        'telp.required' => 'Nomor telepon harus diisi!',
                        'telp.unique' => 'Nomor telepon sudah digunakan!',
                        'foto.image' => 'Foto harus berformat jpeg, jpg, png!',
                        'alamat.required' => 'Alamat harus diisi!',
                        'password.confirmed' => 'Konfirmasi password tidak sesuai!'
                    ]);
                } else {
                    $validator = Validator::make($request->all(), [
                        'nama' => 'required',
                        'email' => 'required|email|unique:users,email,' . $user->id,
                        'telp' => 'required|unique:users,telp,' . $user->id,
                        'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
                        'alamat' => 'required',
                        'password' => 'nullable|confirmed'
                    ], [
                        'nama.required' => 'Nama user harus diisi!',
                        'email.required' => 'Email harus diisi!',
                        'email.unique' => 'Email sudah digunakan!',
                        'email.email' => 'Email yang dimasukan salah!',
                        'role.required' => 'Role harus dipilih!',
                        'telp.required' => 'Nomor telepon harus diisi!',
                        'telp.unique' => 'Nomor telepon sudah digunakan!',
                        'foto.image' => 'Foto harus berformat jpeg, jpg, png!',
                        'alamat.required' => 'Alamat harus diisi!',
                        'password.confirmed' => 'Konfirmasi password tidak sesuai!'
                    ]);
                }
            } else {
                $validator = Validator::make($request->all(), [
                    'nama' => 'required',
                    'email' => 'required|email|unique:users,email,' . $user->id,
                    'telp' => 'required|unique:users,telp,' . $user->id,
                    'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                    'alamat' => 'required',
                    'password' => 'nullable|confirmed'
                ], [
                    'nama.required' => 'Nama user harus diisi!',
                    'email.required' => 'Email harus diisi!',
                    'email.unique' => 'Email sudah digunakan!',
                    'email.email' => 'Email yang dimasukan salah!',
                    'role.required' => 'Role harus dipilih!',
                    'telp.required' => 'Nomor telepon harus diisi!',
                    'telp.unique' => 'Nomor telepon sudah digunakan!',
                    'foto.required' => 'Foto harus ditambahkan!',
                    'foto.image' => 'Foto harus berformat jpeg, jpg, png!',
                    'alamat.required' => 'Alamat harus diisi!',
                    'password.confirmed' => 'Konfirmasi password tidak sesuai!'
                ]);
            }
        }

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

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
            'layanan_id' => $request->layanan_id,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'foto' => $namafoto,
            'password' => $password
        ]);

        return redirect()->back()->with('success', 'Berhasil memperbarui Profile');
    }
}
