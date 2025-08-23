<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('dashboard.daftar_siswa', [
            'title' => 'Daftar Siswa',
            'page' => 'd_siswa'
        ], compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('dashboard.tambah_siswa', [
            'title' => 'Tambah Siswa',
            'page' => 'd_siswa'
        ], compact('kelas', 'spp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nisn' => 'required|string|unique:siswa,nisn',
            'nis'     => 'required|string|unique:siswa,nis',
            'nama_siswa' => 'required|string|min:3',
            'id_kelas'     => 'required|int|exists:kelas,id_kelas',
            'alamat'     => 'required|string|min:5',
            'no_telp'     => 'required|string|digits_between:10,15',
            'id_spp'     => 'required|int|exists:spp,id_spp',
        ], [
            'nisn.required' => 'NISN harus diisi.',
            'nis.required'     => 'NIS harus diisi.',
            'nama_siswa.required' => 'Nama Siswa harus diisi.',
            'id_kelas.required'     => 'Kelas harus dipilih.',
            'alamat.required'     => 'Alamat harus diisi.',
            'no_telp.required'     => 'No Telepon harus diisi.',
            'id_spp.required'     => 'SPP harus dipilih.',

            'nama_siswa.min' => 'Nama Siswa minimal 3 karakter.',
            'alamat.min' => 'Alamat minimal 5 karakter.',
            'no_telp.digits_between' => 'No Telepon valid 10 - 15 digit.',

            'id_kelas.exists' => 'Kelas tidak ditemukan.',
            'id_spp.exists' => 'SPP tidak ditemukan.',
            'nisn.unique'   => 'NISN sudah terdaftar.',
            'nis.unique'   => 'NIS sudah terdaftar.',
        ]);
        Siswa::create($validate);
        return redirect()->route('siswa.index')->with('sSiswa', 'Siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('dashboard.update_siswa', [
            'title' => 'Edit Siswa',
            'page' => 'd_siswa'
        ], compact('siswa', 'kelas', 'spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validate = $request->validate([
            'nisn' => [
                'required',
                'string',
                Rule::unique('siswa', 'nisn')->ignore($siswa->nisn, 'nisn'),
            ],
            'nis' => [
                'required',
                'string',
                Rule::unique('siswa', 'nis')->ignore($siswa->nis, 'nis'),
            ],
            'nama_siswa' => 'required|string|min:3',
            'id_kelas'     => 'required|int|exists:kelas,id_kelas',
            'alamat'     => 'required|string|min:5',
            'no_telp'     => 'required|string|digits_between:10,15',
            'id_spp'     => 'required|int|exists:spp,id_spp',
        ], [
            'nisn.required' => 'NISN harus diisi.',
            'nis.required'     => 'NIS harus diisi.',
            'nama_siswa.required' => 'Nama Siswa harus diisi.',
            'id_kelas.required'     => 'Kelas harus dipilih.',
            'alamat.required'     => 'Alamat harus diisi.',
            'no_telp.required'     => 'No Telepon harus diisi.',
            'id_spp.required'     => 'SPP harus dipilih.',

            'nama_siswa.min' => 'Nama Siswa minimal 3 karakter.',
            'alamat.min' => 'Alamat minimal 5 karakter.',
            'no_telp.digits_between' => 'No Telepon valid 10 - 15 digit.',

            'id_kelas.exists' => 'Kelas tidak ditemukan.',
            'id_spp.exists' => 'SPP tidak ditemukan.',
            'nisn.unique'   => 'NISN sudah terdaftar.',
            'nis.unique'   => 'NIS sudah terdaftar.',
        ]);

        $siswa->update($validate);
        return redirect()->route('siswa.index')
            ->with('sSiswa', 'Siswa berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')
            ->with('sSiswa', 'Siswa berhasil dihapus!');

    }
}
