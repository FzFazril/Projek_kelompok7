<?php
include '../config/koneksi.php';

// Menggabungkan tabel peminjaman dan tabel buku berdasarkan id_buku
$query = "SELECT peminjaman.*, buku.judul_buku 
        FROM peminjaman 
        JOIN buku ON peminjaman.id_buku = buku.id_buku 
        ORDER BY peminjaman.id_peminjaman DESC";

$hasil = mysqli_query($koneksi, $query);
$data_pinjam = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dasboard</title>
    <link rel="stylesheet" href="../asett/form.css?v=1">
    <link rel="stylesheet" href="../asett/dasboard.css?v=4">
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

    <section class="data-terbaru">
    <div class="table-data">
        <h3>Data Terbaru Peminjam</h3>
        <table>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data_pinjam as $no => $row): ?>
            <tr>
                <td><?= $no + 1; ?></td>
                <td><?= htmlspecialchars($row['nama_peminjam']); ?></td>
                <td><?= htmlspecialchars($row['judul_buku']); ?></td>
                <td><?= $row['tgl_pinjam']; ?></td>
                <td><?= $row['tgl_kembali']; ?></td>
                <td>
                <?php if ($row['status'] === "Dipinjam") : ?>
                    <span class="badge-status badge-dipinjam">
                        <i class="fa-solid fa-clock-rotate-left"></i> Dipinjam
                    </span>
                <?php else : ?>
                    <span class="badge-status badge-dikembalikan">
                        <i class="fa-solid fa-circle-check"></i> Dikembalikan
                    </span>
                <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </section>
    </main>
</body>
</html>