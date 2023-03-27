<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class PenggunaController extends Controller
{
    public $title = 'Pengguna';

    public function index()
    {
        return view('pengguna/index', [
            'title' => $this->title,
            'data' => User::get(),
        ]);
    }

    public function create()
    {
        return view('pengguna/index', [
            'title' => $this->title,
            'pengguna' => new User(),
            'peran' => [
                'SEKRETARIS DAERAH',
                'KEPALA BAGIAN',
                'DINKES',
                'PU & PR',
                'DINPEND',
                'SATPOL PP',
                'DINSOS',
            ],
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $request->merge([
            'password' => Hash::make($request->password),
        ]);
        User::create($request->except(['password_confirmation']));
        return redirect(route('pengguna.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('pengguna/index', [
            'title' => $this->title,
            'pengguna' => $user,
            'peran' => [
                'SEKRETARIS DAERAH',
                'KEPALA BAGIAN',
                'DINKES',
                'PU & PR',
                'DINPEND',
                'SATPOL PP',
                'DINSOS',
            ],
            'cek' => [
                false => 'Tidak',
                true => 'Ya',
            ],
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        if (!is_null($request->password)) {
            $request->merge([
                'password' => Hash::make($request->password),
            ]);
        } else {
            $request->merge([
                'password' => $user->password,
            ]);
        }
        User::where('id', $user->id)->update($request->except('_method', '_token', 'password_confirmation'));
        return redirect(route('pengguna.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
