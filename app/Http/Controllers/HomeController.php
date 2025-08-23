<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::latest()->get();
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $spp = Spp::all();
        $pembayaran = Pembayaran::all();
        $petugas = User::all();
        return view('dashboard.home', [
            'title' => 'Dashboard',
            'page' => 'home'
        ], compact('invoices','pembayaran', 'kelas', 'siswa', 'spp', 'petugas'));

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
