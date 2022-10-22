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
        return view('back.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('back.user.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'gambar' => 'required|nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $fileName = '';
        if ($request->file('gambar')->isValid()) {
            $gambar = $request->file('gambar');
            $extention = $gambar->getClientOriginalExtension();
            $fileName = "user/" . date('ymdHis') . "." . $extention;
            $upload_path = 'public/storage/uploads/user';
            $request->file('gambar')->move($upload_path, $fileName);
            $input['gambar'] = $fileName;
        }
        User::create(array_merge($request->all(), [
            'gambar' => $fileName,
            'email' => '',
            'password' => ''
        ]));

        return redirect('user')->with('status', 'Berhasil menambahkan user');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('.back.user.edit', compact('user', 'roles'));
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
}