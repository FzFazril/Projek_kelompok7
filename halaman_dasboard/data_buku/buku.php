<?php
include '../../config/koneksi.php';
$query = "SELECT * FROM buku";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
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
    <img src="../../asett/logo_horizontal.webp" alt="logo">
    </div>
    <ul class="nav-links">
    <li><a href="../dasboard.php">Beranda</a></li>
    <li><a href="../data_petugas/petugas.php">Data Petugas</a></li>
    <li><a href="../data_peminjaman/pinjam.php">Data Peminjam</a></li>
    <li><a href="../data_buku/buku.php">Data Buku</a></li>
    </ul>
</aside>
</div>
<div class="main-content">
    <h2>Data Buku</h2>
    <div class="btn-tambah">
        <a href="tambah.php">Tambah Data</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>id_buku</th>
                <th>judul_buku</th>
                <th>pengarang</th>
                <th>penerbit</th>
                <th>tahun_terbit</th>
                <th>sinopsis</th>
                <th>stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($data as $no => $row): 
        ?>
        <tr>
            <td><?= $no + 1; ?></td>
            <td><?= $row['judul_buku']; ?></td>
            <td><?= $row['pengarang']; ?></td>
            <td><?= $row['penerbit']; ?></td>
            <td><?= $row['tahun_terbit']; ?></td>
            <td><?= $row['sinopsis']; ?></td>
            <td><?= $row['stok']; ?></td>
            <td>
            <div class="aksi">
                    <a href="edit.php?id_buku=<?= $row['id_buku']; ?>">Edit</a>
                    <a href="delete_guru.php?id_buku=<?= $row['id_buku']; ?>">Hapus</a>
            </div>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>