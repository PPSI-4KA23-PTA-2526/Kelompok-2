<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Tampilkan daftar transaksi + laporan ringkas
     */
    public function index()
    {
        $transaksis = Transaksi::all();

        // Hitung jumlah transaksi dan total penjualan
        $jumlahTransaksi = $transaksis->count();
        $totalPenjualan = $transaksis->sum('total');

        return view('transaksi.index', compact('transaksis', 'jumlahTransaksi', 'totalPenjualan'));
    }

    /**
     * Simpan transaksi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:100',
            'metode_pembayaran' => 'required|in:Tunai,Transfer,QRIS',
            'total' => 'required|numeric',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string|max:255',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    /**
     * Form edit transaksi
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update transaksi
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:100',
            'metode_pembayaran' => 'required|in:Tunai,Transfer,QRIS',
            'total' => 'required|numeric',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string|max:255',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    /**
     * Hapus transaksi
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
