<?php
session_start();

// Jika belum login, tendang ke form login
if (!isset($_SESSION['status_login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../form/login.php");
    exit();
}

include '../../config/koneksi.php';
$query = "SELECT * FROM petugas";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
    <link rel="stylesheet" href="../../asett/dasboard.css?v=7">
    <link rel="stylesheet" href="../../asett/loading.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--animasi AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>
<!-- Layar Loading -->
<div id="loading-screen">
    <img src="../../asett/loading.gif" alt="Memuat..." class="gif-loader">
</div>
<aside class="sidebar">
    <div class="brand">
    <img src="../../asett/logo_vertikal.webp" alt="logo">
    </div>
    <ul class="nav-links">
        <li><a href="../dasboard.php"><i class="fa-solid fa-house"></i> Beranda</a></li>
        <li><a href="../data_petugas/petugas.php"><i class="fa-solid fa-user-gear"></i> Data Petugas</a></li>
        <li><a href="../data_peminjaman/pinjam.php"><i class="fa-solid fa-users-rectangle"></i> Data Peminjam</a></li>
        <li><a href="../data_buku/buku.php"><i class="fa-solid fa-book-open"></i> Data Buku</a></li>
        <li><a href="../../halaman_Utama/index.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Kembali</a></li>
    </ul>
</aside>
</div>
<div class="main-content">
    <header class="topbar">
    <h1>Data Petugas</h1>
    <div class="user-profile">Kelola Data Petugas</div>
    </header>
    <div class="btn-tambah">
        <a href="tambah.php">Tambah Data</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>id_petugas</th>
                <th>nama_lengkap</th>
                <th>jabatan</th>
                <th>Deskripsi</th>
                <th>no_hp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($data as $no => $row): 
        ?>
        <tr>
            <td><?= htmlspecialchars($no + 1); ?></td>
            <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
            <td><?= htmlspecialchars($row['jabatan']); ?></td>
            <td><?= htmlspecialchars($row['deskripsi']); ?></td>
            <td><?= htmlspecialchars(0 . $row['no_hp']); ?></td>
            <td>
            <div class="aksi">
                    <a href="edit.php?id_petugas=<?= $row['id_petugas']; ?>" class="btn-edit"><i class="fa-solid fa-pencil"></i></a>
                    <a href="hapus.php?id_petugas=<?= $row['id_petugas']; ?>" class="btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus petugas <?= $row['nama_lengkap']; ?>?');"><i class="fa-solid fa-trash"></i></a>
            </div>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<script src="../../asett/script.js"></script>
</body>
</html>