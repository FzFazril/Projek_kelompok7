<?php
include '../../config/koneksi.php';
$query = "SELECT * FROM buku";
$hasil = mysqli_query($koneksi, $query);
$data  = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="../../asett/dasboard.css?v=2">
</head>
<body>

<aside class="sidebar">
    <div class="brand">
        <img src="../../asett/logo_vertikal.webp" alt="logo">
    </div>
    <ul class="nav-links">
        <li><a href="../dasboard.php">Beranda</a></li>
        <li><a href="../data_petugas/petugas.php">Data Petugas</a></li>
        <li><a href="../data_peminjaman/pinjam.php">Data Peminjam</a></li>
        <li><a href="../data_buku/buku.php">Data Buku</a></li>
        <li><a href="../../halaman_Utama/index.php">Kembali</a></li>
    </ul>
</aside>

<div class="main-content">
    <header class="topbar">
        <h1>Data Buku</h1>
        <div class="user-profile">Kelola Data Buku</div>
    </header>
    
    <div class="btn-tambah">
        <a href="tambah.php">Tambah Data</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Cover</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Sinopsis</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $no => $row): ?>
        <tr>
            <td><?= $no + 1; ?></td>
            
            <!-- Perbaikan Jalur Gambar & Penutupan Tag <td> -->
            <td>
                <?php if (!empty($row['cover']) && file_exists(__DIR__ . '/../../asett/uploads/' . $row['cover'])): ?>
                    <img src="../../asett/uploads/<?= $row['cover']; ?>" width="60" alt="Cover">
                <?php else: ?>
                    <span>Tidak ada cover</span>
                <?php endif; ?>
            </td>

            <td><?= htmlspecialchars($row['judul_buku']); ?></td>
            <td><?= htmlspecialchars($row['pengarang']); ?></td>
            <td><?= htmlspecialchars($row['penerbit']); ?></td>
            <td><?= htmlspecialchars($row['tahun_terbit']); ?></td>
            <td><?= htmlspecialchars($row['sinopsis']); ?></td>
            <td><?= htmlspecialchars($row['stok']); ?></td>
            <td>
                <div class="aksi">
                    <a href="edit.php?id_buku=<?= $row['id_buku']; ?>" class="btn-edit">Edit</a>
                    <a href="hapus.php?id_buku=<?= $row['id_buku']; ?>" class="btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus buku <?= htmlspecialchars($row['judul_buku']); ?>?');">Hapus</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>