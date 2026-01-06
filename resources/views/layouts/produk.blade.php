@extends('layouts.app')

@section('title', 'Produk Barang')
@section('page_title', 'Produk Barang')

@section('content')
<div class="card shadow-sm p-4">
    <h2 class="h5 fw-bold mb-3 text-primary">Tambah Barang</h2>
    <form action="{{ route('Produk.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-4">
            <input type="text" name="nama" class="form-control" placeholder="Nama Barang" required>
        </div>
        <div class="col-md-3">
            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
        </div>
        <div class="col-md-3">
            <select name="status" class="form-select" required>
                <option value="Banyak">Banyak</option>
                <option value="Menipis">Menipis</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success w-100">Tambah</button>
        </div>
    </form>
</div>

<div class="card shadow-sm p-4 mt-4">
    <h2 class="h5 fw-bold mb-3 text-primary">Daftar Produk Barang</h2>
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($barangs as $barang)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $barang->nama }}</td>
                <td>{{ $barang->jumlah }}</td>
                <td>
                    <span class="badge {{ $barang->status == 'Menipis' ? 'bg-danger' : 'bg-success' }}">
                        {{ $barang->status }}
                    </span>
                </td>
                <td>
                    <!-- Edit -->
                    <a href="{{ route('Produk.edit', $barang->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <!-- Hapus -->
                    <form action="{{ route('Produk.destroy', $barang->id) }}" method="POST" class="d-inline">
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
                <td colspan="5" class="text-center text-muted">Belum ada data barang</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
