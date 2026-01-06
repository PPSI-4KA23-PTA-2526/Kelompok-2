@extends('layouts.app')

@section('title', 'Transaksi')
@section('page_title', 'Transaksi')

@section('content')
<div class="card shadow-sm p-4">
    <h2 class="h5 fw-bold mb-3 text-primary">Tambah Transaksi</h2>
    <form action="{{ route('transaksi.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label class="form-label">Nama Customer</label>
            <input type="text" name="nama_customer" class="form-control" placeholder="Masukkan nama customer" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Metode Pembayaran</label>
            <select name="metode_pembayaran" class="form-select" required>
                <option value="Tunai">Tunai</option>
                <option value="Transfer">Transfer</option>
                <option value="QRIS">QRIS</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Total</label>
            <input type="number" step="0.01" name="total" class="form-control" placeholder="Total pembayaran" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Catatan</label>
            <input type="text" name="catatan" class="form-control" placeholder="Opsional">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Simpan Transaksi</button>
        </div>
    </form>
</div>

<div class="card shadow-sm p-4 mt-4">
    <h2 class="h5 fw-bold mb-3 text-primary">Daftar Transaksi</h2>
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>Metode Pembayaran</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksis as $trx)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $trx->nama_customer }}</td>
                <td>{{ $trx->metode_pembayaran }}</td>
                <td>Rp {{ number_format($trx->total, 0, ',', '.') }}</td>
                <td>{{ $trx->tanggal }}</td>
                <td>{{ $trx->catatan }}</td>
                <td>
                    <a href="{{ route('transaksi.edit', $trx->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('transaksi.destroy', $trx->id) }}" method="POST" class="d-inline">
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
                <td colspan="7" class="text-center text-muted">Belum ada transaksi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
