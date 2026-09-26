<?php
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
    <link rel="stylesheet" href="../../asett/dasboard.css?v=3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
</head>
<body>

<aside class="sidebar">
    <div class="brand">
    <img src="../../asett/logo_vertikal.webp" alt="logo">
    </div>
    <ul class="nav-links">
        <li><a href="../dasboard.php"><i class="fa-regular fa-house"></i> Beranda</a></li>
        <li><a href="../data_petugas/petugas.php"><i class="fa-solid fa-user-gear"></i> Data Petugas</a></li>
        <li><a href="../data_peminjaman/pinjam.php"><i class="fa-solid fa-user-tag"></i> Data Peminjam</a></li>
        <li><a href="../data_buku/buku.php"><i class="fa-solid fa-book"></i> Data Buku</a></li>
        <li><a href="../../halaman_Utama/index.php"><i class="fa-solid fa-circle-left"></i> Kembali</a></li>
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
</body>
</html>