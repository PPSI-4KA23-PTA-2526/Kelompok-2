<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokProduk; // gunakan model yang benar

class ProdukController extends Controller
{
    public function index()
    {
        $barangs = StokProduk::all();
        return view('produk.index', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|string|max:50|unique:stok_produk',
            'nama' => 'required|string|max:100',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        StokProduk::create($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = StokProduk::findOrFail($id);
        return view('produk.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = StokProduk::findOrFail($id);
        $barang->update($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        StokProduk::destroy($id);
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
