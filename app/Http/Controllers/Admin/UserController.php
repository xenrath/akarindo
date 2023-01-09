<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        if ($request->role == 'admin') {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'email' => 'required|email|unique:users',
                'role' => 'required',
                'telp' => 'nullable|unique:users',
                'foto' => 'image|mimes:jpeg,jpg,png|max:2048',
            ], [
                'nama.required' => 'Nama user harus diisi!',
                'email.required' => 'Email harus diisi!',
                'email.unique' => 'Email sudah digunakan!',
                'email.email' => 'Email yang dimasukan salah!',
                'role.required' => 'Role harus dipilih!',
                'telp.unique' => 'Nomor telepon sudah digunakan!',
                'foto.image' => 'Foto harus berformat jpeg, jpg, png!',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'email' => 'required|email|unique:users',
                'role' => 'required',
                'telp' => 'required|unique:users',
                'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'alamat' => 'required',
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
            ]);
        }

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

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

        return redirect('admin/user')->with('status', 'Berhasil menambahkan User');
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if ($request->role == 'admin') {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role' => 'required',
                'telp' => 'nullable|unique:users,telp,' . $user->id,
                'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            ], [
                'nama.required' => 'Nama user harus diisi!',
                'email.required' => 'Email harus diisi!',
                'email.unique' => 'Email sudah digunakan!',
                'email.email' => 'Email yang dimasukan salah!',
                'role.required' => 'Role harus dipilih!',
                'telp.unique' => 'Nomor telepon sudah digunakan!',
                'foto.image' => 'Foto harus berformat jpeg, jpg, png!',
            ]);
        } else {
            if ($user->foto) {
                $validator = Validator::make($request->all(), [
                    'nama' => 'required',
                    'email' => 'required|email|unique:users,email,' . $user->id,
                    'role' => 'required',
                    'telp' => 'required|unique:users,telp,' . $user->id,
                    'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
                    'alamat' => 'required',
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
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'nama' => 'required',
                    'email' => 'required|email|unique:users,email,' . $user->id,
                    'role' => 'required',
                    'telp' => 'required|unique:users,telp,' . $user->id,
                    'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                    'alamat' => 'required',
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
                ]);
            }
        }

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        if ($request->foto) {
            Storage::disk('local')->delete('public/uploads/' . $user->foto);
            $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
            $namafoto = "user/" . date('YmdHis') . "." . $foto;
            $request->foto->storeAs('public/uploads', $namafoto);
        } else {
            $namafoto = $user->foto;
        }

        User::where('id', $user->id)
            ->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'role' => $request->role,
                'telp' => $request->telp,
                'foto' => $namafoto,
                'alamat' => $request->alamat,
            ]);

        return redirect('admin/user')->with('status', 'Berhasil mengubah User');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        Storage::disk('local')->delete('public/uploads/' . $user->foto);
        $user->delete();
        return redirect('admin/user')->with('status', 'Berhasil menghapus User');
    }

    public function kodeUser()
    {
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
        $kode  = substr(str_shuffle($karakter), 0, 10);
        return $kode;
    }
}
