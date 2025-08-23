<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('dashboard.daftar_faktur', [
            'title' => 'Daftar Faktur',
            'page' => 'd_invoice'
        ], compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $spp = Spp::all();
        $pembayaran = Pembayaran::all();
        return view('dashboard.tambah_faktur', [
            'title' => 'Tambah Faktur',
            'page' => 'd_invoice'
        ], compact('kelas', 'siswa', 'spp', 'pembayaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nisn' => 'required|int|exists:siswa,nisn',
            'id_spp'     => 'required|int|exists:spp,id_spp',
            'bulan_dibayar' => 'required|int|between:1,12',
            'tahun_dibayar'     => 'required|string|digits:4',
            'id_pembayaran'     => 'required|int|exists:pembayaran,id_pembayaran',
            'status'     => 'required|string|in:lunas,pending,gagal',
            'keterangan'     => 'nullable|string|max:255',
        ], [
            'nisn.required' => 'NISN harus dipilih.',
            'id_spp.required'     => 'SPP harus dipilih.',
            'bulan_dibayar.required' => 'Bulan harus dipilih.',
            'tahun_dibayar.required'     => 'Tahun harus dipilih.',
            'id_pembayaran.required'     => 'Pembayaran harus dipilih.',
            'status.required'     => 'Status faktur harus dipilih.',

            'nisn.exists' => 'Siswa tidak terdaftar.',
            'id_spp.exists' => 'Paket SPP tidak terdaftar.',
            'bulan_dibayar.between' => 'Bulan tidak valid.',
            'tahun_dibayar.digits' => 'Tahun tidak valid.',
            'id_pembayaran.exists' => 'Metode pembayaran tidak terdaftar.',
            'status.in' => 'Status faktur tidak valid.',
            'keterangan.max' => 'Catatan maksimal 255 karakter.',
        ]);
        $validate['id_user'] = 1;
        $validate['jumlah_bayar'] = Spp::where('id_spp', $validate['id_spp'])->value('nominal');
        Invoice::create($validate);
        return redirect()->route('faktur.index')->with('sInvoice', 'Faktur berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $spp = Spp::all();
        $pembayaran = Pembayaran::all();
        return view('dashboard.detail_faktur', [
            'title' => 'Detail Faktur',
            'page' => 'd_invoice'
        ], compact('invoice', 'kelas', 'siswa', 'spp', 'pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $spp = Spp::all();
        $pembayaran = Pembayaran::all();
        return view('dashboard.update_faktur', [
            'title' => 'Update Faktur',
            'page' => 'd_invoice'
        ], compact('invoice', 'kelas', 'siswa', 'spp', 'pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $validate = $request->validate([
            'nisn' => 'required|int|exists:siswa,nisn',
            'id_spp'     => 'required|int|exists:spp,id_spp',
            'bulan_dibayar' => 'required|int|between:1,12',
            'tahun_dibayar'     => 'required|string|digits:4',
            'id_pembayaran'     => 'required|int|exists:pembayaran,id_pembayaran',
            'status'     => 'required|string|in:lunas,pending,gagal',
            'keterangan'     => 'nullable|string|max:255',
        ], [
            'nisn.required' => 'Siswa harus dipilih.',
            'id_spp.required'     => 'Paket SPP harus dipilih.',
            'bulan_dibayar.required' => 'Bulan harus dipilih.',
            'tahun_dibayar.required'     => 'Tahun harus dipilih.',
            'id_pembayaran.required'     => 'Pembayaran harus dipilih.',
            'status.required'     => 'Status faktur harus dipilih.',

            'nisn.exists' => 'Siswa tidak terdaftar.',
            'id_spp.exists' => 'Paket SPP tidak terdaftar.',
            'bulan_dibayar.between' => 'Bulan tidak valid.',
            'tahun_dibayar.digits' => 'Tahun tidak valid.',
            'id_pembayaran.exists' => 'Metode pembayaran tidak terdaftar.',
            'status.in' => 'Status faktur tidak valid.',
            'keterangan.max' => 'Catatan maksimal 255 karakter.',
        ]);
        $validate['id_user'] = 1;
        $validate['jumlah_bayar'] = Spp::where('id_spp', $validate['id_spp'])->value('nominal');

        $invoice->update($validate);
        return redirect()->route('faktur.index')
            ->with('sInvoice', 'Faktur berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('faktur.index')
            ->with('sInvoice', 'Faktur berhasil dihapus!');
    }
}
