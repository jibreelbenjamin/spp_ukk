<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('dashboard.daftar_pembayaran', [
            'title' => 'Daftar Pembayaran',
            'page' => 'd_pembayaran'
        ], compact('pembayaran'));
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
            'nama_pembayaran' => 'required|string|min:3',
        ], [
            'nama_pembayaran.required' => 'Nama Pembayaran harus diisi.',
            'nama_pembayaran.min' => 'Nama Pembayaran minimal 3 karakter.',
        ]);
        Pembayaran::create($validate);
        return redirect()->route('pembayaran.index')->with('sPembayaran', 'Pembayaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        $pembayaran = Pembayaran::findOrFail($pembayaran->id_pembayaran);
        return view('dashboard.update_pembayaran', [
            'title' => 'Edit Pembayaran',
            'page' => 'd_pembayaran'
        ], compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validate = $request->validate([
            'nama_pembayaran' => 'required|string|min:3',
        ], [
            'nama_pembayaran.required' => 'Nama Pembayaran harus diisi.',
            'nama_pembayaran.min' => 'Nama Pembayaran minimal 3 karakter.',
        ]);

        $pembayaran->update($validate);
        return redirect()->route('pembayaran.index')
            ->with('sPembayaran', 'Pembayaran berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')
            ->with('sPembayaran', 'Pembayaran berhasil dihapus!');
    }
}
