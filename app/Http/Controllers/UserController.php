<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(3);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'telp' => 'unique:users',
            'foto' => 'image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'nama.required' => 'Nama user harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email sudah digunakan!',
            'email.email' => 'Email salah!',
            'role.required' => 'Role harus dipilih!',
            'telp.unique' => 'Nomor telepon sudah digunakan!',
            'foto.image' => 'Foto harus berformat jpeg, jpg, png!'
        ]);

        if ($request->foto) {
            $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
            $namafoto = "user/" . date('YmdHis') . "." . $foto;
            $request->foto->storeAs('public/uploads', $namafoto);
        } else {
            $namafoto = null;
        }

        $kode = $this->kodeUser();

        User::create(array_merge($request->all(), [
            'kode' => $kode,
            'password' => bcrypt($kode),
            'foto' => $namafoto,
        ]));

        return redirect('user')->with('status', 'Berhasil menambahkan user');
    }

    public function edit(User $user)
    {
        return view('.back.user.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required',
            'name' => 'required',
            'gambar' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
            'phone' => 'required',
        ]);

        if ($request->gambar) {
            Storage::disk('local')->delete('public/uploads/' . $user->gambar);
            $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $namaGambar = "user/" . date('YmdHis') . "." . $gambar;
            $request->gambar->storeAs('public/uploads', $namaGambar);
        } else {
            $namaGambar = $user->gambar;
        }
        User::where('id', $user->id)
            ->update([
                'role_id' => $request->role_id,
                'name' => $request->name,
                'phone' => $request->phone,
                'gambar' => $namaGambar,
            ]);
        return redirect('user')->with('status', 'Berhasil mengubah User');
    }

    public function show(User $user)
    {
        return view('.back.user.show', compact('user'));
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('user')->with('status', 'User berhasil dihapus');
    }

    public function kodeUser()
    {
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
        $kode  = substr(str_shuffle($karakter), 0, 10);
        return $kode;
    }
}
