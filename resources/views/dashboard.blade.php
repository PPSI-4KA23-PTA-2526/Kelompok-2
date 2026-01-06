@extends('layouts.app')

@section('title', 'Dashboard TB Ucok')
@section('page_title', 'Dashboard')

@section('content')
<div class="row g-4">
  <div class="col-md-4">
    <div class="card card-custom p-3">
      <h2 class="h6 fw-semibold">Statistik Penjualan</h2>
      <p>Rp 12.000.000</p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-custom p-3">
      <h2 class="h6 fw-semibold">Jumlah Produk</h2>
      <p>120 item</p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-custom p-3">
      <h2 class="h6 fw-semibold">Transaksi Hari Ini</h2>
      <p>35 transaksi</p>
    </div>
  </div>
</div>

<!-- Chart -->
<div class="chart-container mt-4">
  <canvas id="salesChart"></canvas>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('salesChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
      datasets: [{
        label: 'Penjualan',
        data: [12, 19, 3, 5, 2],
        backgroundColor: 'rgba(13, 110, 253, 0.7)',
        borderRadius: 6
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } }
    }
  });
</script>
@endpush
