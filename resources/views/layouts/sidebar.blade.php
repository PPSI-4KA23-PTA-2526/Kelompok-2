<aside id="sidebar" class="sidebar expanded p-3 text-white">
  <div class="logo fw-bold mb-4">TB Ucok Jaya</div>
  <nav class="nav flex-column">
    <a class="nav-link text-light mb-2" href="{{ route('dashboard') }}">
      <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
    </a>
    <a class="nav-link text-light mb-2" href="{{ route('produk.index') }}">
      <i class="bi bi-box-seam"></i> <span>Produk</span>
    </a>
    <a class="nav-link text-light mb-2" href="{{ route('transaksi.index') }}">
      <i class="bi bi-receipt"></i> <span>Transaksi</span>
    </a>
  </nav>
      <a class="nav-link text-light mb-2" href="#">
      <i class="bi bi-receipt"></i> <span>Laporan</span>
    </a>
  </nav>

  <!-- Panah toggle di tengah batas sidebar -->
  <div class="toggle-notch" onclick="toggleSidebar()">
    <i id="toggleIcon" class="bi bi-chevron-left"></i>
  </div>
</aside>
