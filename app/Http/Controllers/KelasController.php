<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('dashboard.daftar_kelas', [
            'title' => 'Daftar Kelas',
            'page' => 'd_kelas'
        ], compact('kelas'));
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
            'nama_kelas' => 'required|string|min:3|max:255',
            'jurusan' => 'required|string|min:3|max:255',
        ], [
            'nama_kelas.required' => 'Nama kelas harus diisi.',
            'jurusan.required' => 'Jurusan tidak boleh kosong.',
            'nama_kelas.min' => 'Nama kelas minimal 3 karakter.',
            'jurusan.min' => 'Jurusan minimal 3 karakter'
        ]);
        Kelas::create($validate);
        return redirect()->route('kelas.index')->with('sKelas', 'Kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        $kelasIndex = Kelas::all();
        $kelasDetail = $kelas;
        return view('dashboard.update_kelas', [
            'title' => 'Edit Kelas',
            'page' => 'd_kelas'
        ], compact('kelas', 'kelasDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $validate = $request->validate([
            'nama_kelas' => 'required|string|min:3|max:255',
            'jurusan' => 'required|string|min:3|max:255',
        ], [
            'nama_kelas.required' => 'Nama kelas harus diisi.',
            'jurusan.required' => 'Jurusan tidak boleh kosong.',
            'nama_kelas.min' => 'Nama kelas minimal 3 karakter.',
            'jurusan.min' => 'Jurusan minimal 3 karakter'
        ]);

        $kelas->update($validate);
        return redirect()->route('kelas.index')
            ->with('sKelas', 'Kelas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kelas.index')
            ->with('sKelas', 'Kelas berhasil dihapus!');
    }
}
