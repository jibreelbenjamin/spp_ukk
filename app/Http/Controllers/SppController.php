<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spp = Spp::latest()->paginate(15);
        return view('dashboard.daftar_spp', [
            'title' => 'Daftar SPP',
            'page' => 'd_spp'
        ], compact('spp'));
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
            'tahun' => 'required|int|between:2000,2100',
            'nominal' => 'required|int|min:1',
        ], [
            'tahun.required' => 'Tahun SPP harus diisi.',
            'nominal.required' => 'Nominal SPP tidak boleh kosong.',
            'tahun.between' => 'Tahun SPP antara 2000 - 2100.',
            'nominal.min' => 'Nominal SPP tidak valid'
        ]);
        Spp::create($validate);
        return redirect()->route('spp.index')->with('sSpp', 'SPP berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spp $spp)
    {
        $spp = Spp::findOrFail($spp->id_spp);
        return view('dashboard.update_spp', [
            'title' => 'Edit SPP',
            'page' => 'd_spp'
        ], compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spp $spp)
    {
        $validate = $request->validate([
            'tahun' => 'required|int|between:2000,2100',
            'nominal' => 'required|int|min:1',
        ], [
            'tahun.required' => 'Tahun SPP harus diisi.',
            'nominal.required' => 'Nominal SPP tidak boleh kosong.',
            'tahun.between' => 'Tahun SPP antara 2000 - 2100.',
            'nominal.min' => 'Nominal SPP tidak valid'
        ]);

        $spp->update($validate);
        return redirect()->route('spp.index')
            ->with('sSpp', 'SPP berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spp $spp)
    {
        $spp->delete();
        return redirect()->route('spp.index')
            ->with('sSpp', 'SPP berhasil dihapus!');

    }
}
