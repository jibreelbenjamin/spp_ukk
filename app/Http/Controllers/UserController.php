<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id_user', '!=', Auth::user()->id_user)->get();
        return view('dashboard.daftar_petugas', [
            'title' => 'Daftar Petugas',
            'page' => 'd_petugas'
        ], compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|string|min:3|unique:users,username',
            'name'     => 'required|string|min:3',
            'password' => 'required|string|min:8',
            'role'     => 'required|string|in:admin,petugas'
        ], [
            'username.required' => 'Username harus diisi.',
            'username.unique'   => 'Username sudah terdaftar.',
            'name.required'     => 'Nama harus diisi.',
            'password.required' => 'Password harus diisi.',
            'username.min'      => 'Username minimal harus 8 karakter.',
            'name.min'          => 'Nama minimal harus 8 karakter.',
            'password.min'      => 'Password minimal harus 8 karakter.',
            'role.required'     => 'Role harus dipilih.',
            'role.in'           => 'Role hanya boleh berisi admin atau petugas.'
        ]);
        User::create($validate);
        return redirect()->route('petugas.index')->with('sPetugas', 'Petugas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $petugasIndex = User::all();
        $petugasDetail = $user;
        return view('dashboard.update_petugas', [
            'title' => 'Edit Petugas',
            'page' => 'd_petugas'
        ], compact('user', 'petugasDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'username' => 'required|string|min:3|unique:users,username,' . $user->id_user . ',id_user',
            'name'     => 'required|string|min:3',
            'role'     => 'required|string|in:admin,petugas'
        ], [
            'username.required' => 'Username harus diisi.',
            'username.unique'   => 'Username sudah terdaftar.',
            'name.required'     => 'Nama harus diisi.',
            'username.min'      => 'Username minimal harus 8 karakter.',
            'name.min'          => 'Nama minimal harus 8 karakter.',
            'role.required'     => 'Role harus dipilih.',
            'role.in'           => 'Role hanya boleh berisi admin atau petugas.'
        ]);

        $user->update($validate);
        return redirect()->route('petugas.index')
            ->with('sPetugas', 'Petugas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('petugas.index')
            ->with('sPetugas', 'Petugas berhasil dihapus!');
    }
}
