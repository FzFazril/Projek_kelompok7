<?php
session_start();

// Jika belum login, tendang ke form login
if (!isset($_SESSION['status_login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../form/login.php");
    exit();
}

include '../config/koneksi.php';

// Menggabungkan tabel peminjaman dan tabel buku berdasarkan id_buku
$query = "SELECT peminjaman.*, buku.judul_buku 
        FROM peminjaman 
        JOIN buku ON peminjaman.id_buku = buku.id_buku 
        ORDER BY peminjaman.id_peminjaman DESC";

$hasil = mysqli_query($koneksi, $query);
$data_pinjam = mysqli_fetch_all($hasil, MYSQLI_ASSOC);

// Hitung ringkasan statistik
$total_pinjam = count($data_pinjam);
$total_dipinjam = 0;
$total_kembali = 0;

foreach ($data_pinjam as $row) {
    if ($row['status'] === 'Dipinjam') {
        $total_dipinjam++;
    } else {
        $total_kembali++;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan - BacaGrid</title>
    <link rel="stylesheet" href="../asett/form.css?v=1">
    <link rel="stylesheet" href="../asett/dasboard.css?v=6">
    <link rel="stylesheet" href="../asett/loading.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!--animasi AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>
<!-- Layar Loading -->
<div id="loading-screen">
    <img src="../asett/loading.gif" alt="Memuat..." class="gif-loader">
</div>

<aside class="sidebar" data-aos="fade-right">
    <div class="brand">
        <img src="../asett/logo_vertikal.webp" alt="BacaGrid Logo">
    </div>
    <ul class="nav-links">
        <li class="active"><a href="dasboard.php"><i class="fa-solid fa-house"></i> Beranda</a></li>
        <li><a href="./data_petugas/petugas.php"><i class="fa-solid fa-user-gear"></i> Data Petugas</a></li>
        <li><a href="./data_peminjaman/pinjam.php"><i class="fa-solid fa-users-rectangle"></i> Data Peminjam</a></li>
        <li><a href="./data_buku/buku.php"><i class="fa-solid fa-book-open"></i> Data Buku</a></li>
        <li class="nav-logout"><a href="../halaman_Utama/index.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Kembali</a></li>
    </ul>
</aside>

<!-- Area Konten Utama Dashboard -->
<main class="main-content">
    
    <!-- Header Atas Dashboard -->
    <header class="topbar" data-aos="fade-down">
        <div>
            <h1>Beranda Dashboard</h1>
            <p class="subtitle">Selamat datang kembali di sistem pengelolaan <strong>BacaGrid</strong></p>
        </div>
        <div class="user-profile">
            <i class="fa-solid fa-circle-user"></i>
            <span>Administrator</span>
        </div>
    </header>

    <!-- Ringkasan Statistik / Kartu Angka -->
    <section class="stats-grid" data-aos="fade-down">
        <div class="stat-card">
            <div class="stat-icon icon-blue">
                <i class="fa-solid fa-hand-holding-hand"></i>
            </div>
            <div class="stat-info">
                <h3>Total Transaksi</h3>
                <p class="stat-number"><?= $total_pinjam; ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-yellow">
                <i class="fa-solid fa-clock-rotate-left"></i>
            </div>
            <div class="stat-info">
                <h3>Sedang Dipinjam</h3>
                <p class="stat-number"><?= $total_dipinjam; ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-green">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div class="stat-info">
                <h3>Telah Dikembalikan</h3>
                <p class="stat-number"><?= $total_kembali; ?></p>
            </div>
        </div>
    </section>

    <!-- Tabel Data Peminjam -->
    <section class="table-container" data-aos="fade-up">
        <div class="page-header">
            <h2><i class="fa-solid fa-list-check"></i> Data Terbaru Peminjam</h2>
        </div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th width="140" class="text-center">Tgl Pinjam</th>
                        <th width="140" class="text-center">Tgl Kembali</th>
                        <th width="150" class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($data_pinjam)): ?>
                    <?php foreach ($data_pinjam as $no => $row): ?>
                    <tr>
                        <td class="text-center"><?= $no + 1; ?></td>
                        <td><strong><?= htmlspecialchars($row['nama_peminjam']); ?></strong></td>
                        <td><?= htmlspecialchars($row['judul_buku']); ?></td>
                        <td class="text-center"><?= date('d M Y', strtotime($row['tgl_pinjam'])); ?></td>
                        <td class="text-center"><?= date('d M Y', strtotime($row['tgl_kembali'])); ?></td>
                        <td class="text-center">
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
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center empty-msg">Belum ada data peminjaman buku.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

</main>
<script>
window.addEventListener('load', () => {
    const loader = document.getElementById('loading-screen');

    // Jika ada penanda 'skipLoader' (bekas hapus data)
    if (sessionStorage.getItem('skipLoader') === 'true') {
        loader.style.display = 'none'; // Langsung sembunyikan loader tanpa animasi
        sessionStorage.removeItem('skipLoader'); // Hapus penanda agar loading normal kembali nanti
    } else {
        // Jika buka halaman biasa, jalankan animasi loading seperti biasa
        setTimeout(() => {
        loader.classList.add('hidden');
        }, 1500);
    }
    });
    AOS.init({
        duration: 3000,
        once: true
    });
</script>
</body>
</html>