@extends('layouts.app')

@section('title', 'Daftar Produk')
@section('page_title', 'Daftar Produk')

@section('content')
<div class="card shadow-sm p-4">
    <h2 class="h5 fw-bold mb-3 text-primary">Tambah Produk</h2>
    <form action="{{ route('produk.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-3">
            <input type="text" name="sku" class="form-control" placeholder="SKU" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="nama" class="form-control" placeholder="Nama Material" required>
        </div>
        <div class="col-md-3">
            <input type="number" step="0.01" name="harga_jual" class="form-control" placeholder="Harga Jual" required>
        </div>
        <div class="col-md-3">
            <input type="number" name="stok" class="form-control" placeholder="Jumlah Stok" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>
    </form>
</div>

<div class="card shadow-sm p-4 mt-4">
    <h2 class="h5 fw-bold mb-3 text-primary">Daftar Produk</h2>
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>SKU</th>
                <th>Nama</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($barangs as $barang)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $barang->sku }}</td>
                <td>{{ $barang->nama }}</td>
                <td>Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                <td>{{ $barang->stok }}</td>
                <td>
                    <a href="{{ route('produk.edit', $barang->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('produk.destroy', $barang->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted">Belum ada data produk</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
