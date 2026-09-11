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
    <link rel="stylesheet" href="../../asett/side_bar.css">
</head>
<body>

<aside class="sidebar">
    <div class="brand">
    <h2>BacaGrid</h2>
    </div>
    <ul class="nav-links">
        <a href="../index.php">Beranda</a>
        <a href="../data_petugas/petugas.php">data Petugas</a>
        <a href="../data_peminjaman/pinjam.php">Data peminjam</a>
        <a href="buku.php">Data Buku</a>
    </ul>
</aside>
</div>
<div class="main-content">
    <h2>Data Buku</h2>
    <table>
        <thead>
            <tr>
                <th>id_buku</th>
                <th>Judul_buku</th>
                <th>pengarang</th>
                <th>penerbit</th>
                <th>tahun_terbit</th>
                <th>sinopsis</th>
                <th>stok</th>
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
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>