<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'TB Ucok')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    /* Sidebar */
    .sidebar {
      background-color: #074f97ff;
      min-height: 100vh;
      overflow: hidden;
      transition: width 0.3s ease;
      position: relative;
    }
    .sidebar.expanded { width: 250px; }
    .sidebar.collapsed { width: 70px; }
    .sidebar.collapsed .nav-link span { display: none; }

    /* Notch panah di tengah */
    .toggle-notch {
      position: absolute;
      top: 50%;
      right: 0;
      transform: translateY(-50%);
      width: 40px;
      height: 80px;
      background: #fff;
      border-top-left-radius: 40px;
      border-bottom-left-radius: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: -2px 0 6px rgba(0,0,0,0.1);
    }
    .toggle-notch i {
      font-size: 1.5rem;
      color: #003366;
    }

    /* Card custom */
    .card-custom {
      background: linear-gradient(135deg, #003366 0%, #4dabf7 100%);
      color: #fff;
      border: none;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.15);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card-custom:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 18px rgba(0,0,0,0.25);
    }
    .card-custom h2 { color: #e3f2fd; }
    .card-custom p { color: #f8f9fa; }

    /* Chart container */
    .chart-container {
      background: #fff;
      border-radius: 12px;
      padding: 1rem;
      box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }
  </style>
</head>
<body>
<div class="d-flex">
  @include('layouts.sidebar')

  <main class="flex-grow-1 p-4">
    <h1 class="h3 text-primary mb-4">@yield('page_title')</h1>
    @yield('content')
  </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const icon = document.getElementById('toggleIcon');
    sidebar.classList.toggle('collapsed');
    sidebar.classList.toggle('expanded');
    if (sidebar.classList.contains('collapsed')) {
      icon.classList.remove('bi-chevron-left');
      icon.classList.add('bi-chevron-right');
    } else {
      icon.classList.remove('bi-chevron-right');
      icon.classList.add('bi-chevron-left');
    }
  }
</script>
@stack('scripts')
</body>
</html>
