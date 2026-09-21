<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dasboard</title>
    <link rel="stylesheet" href="../asett/dasboard.css?v=2">
</head>
<body>
<aside class="sidebar">
    <div class="brand">
    <img src="../asett/logo_horizontal.webp" alt="logo">
    </div>
    <ul class="nav-links">
    <li><a href="dasboard.php">Beranda</a></li>
    <li><a href="./data_petugas/petugas.php">Data Petugas</a></li>
    <li><a href="./data_peminjaman/pinjam.php">Data Peminjam</a></li>
    <li><a href="./data_buku/buku.php">Data Buku</a></li>
    </ul>
</aside>

<!-- Area Konten Utama Dashboard -->
<main class="main-content">
    
    <!-- Header Atas Dashboard -->
    <header class="topbar">
    <h1>Beranda Dashboard</h1>
    <div class="user-profile">Welcome to BacaGrid</div>
    </header>

    <!-- Ringkasan Statistik / Kartu Angka -->
    <section class="stats-grid">
    <div class="stat-card">
        <h3>Total Pengguna</h3>
        <p class="stat-number">1,245</p>
    </div>
    <div class="stat-card">
        <h3>Pendapatan</h3>
        <p class="stat-number">Rp 12.500.000</p>
    </div>
    <div class="stat-card">
        <h3>Pesanan Baru</h3>
        <p class="stat-number">84</p>
    </div>
    <div class="stat-card">
        <h3>Aktivitas</h3>
        <p class="stat-number">99.9%</p>
    </div>
    </section>
    </main>
</body>
</html>