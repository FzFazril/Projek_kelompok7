<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dasboard</title>
    <link rel="stylesheet" href="../asett/dasboard.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
</head>
<body>
<aside class="sidebar">
    <div class="brand">
    <img src="../asett/logo_vertikal.webp" alt="logo">
    </div>
    <ul class="nav-links">
        <li><a href="dasboard.php"><i class="fa-regular fa-house"></i> Beranda</a></li>
        <li><a href="./data_petugas/petugas.php"><i class="fa-solid fa-user-gear"></i> Data Petugas</a></li>
        <li><a href="./data_peminjaman/pinjam.php"><i class="fa-solid fa-user-tag"></i> Data Peminjam</a></li>
        <li><a href="./data_buku/buku.php"><i class="fa-solid fa-book"></i> Data Buku</a></li>
        <li><a href="../halaman_Utama/index.php"><i class="fa-solid fa-circle-left"></i> Kembali</a></li>
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