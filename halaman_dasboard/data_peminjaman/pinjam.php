<?php
include '../../config/koneksi.php';
$query = "SELECT * FROM peminjam";
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
        <a href="pinjam.php">Data peminjam</a>
        <a href="../data_buku/buku.php">Data Buku</a>
    </ul>
</aside>
</div>
<div class="main-content">
    <h2>Data Buku</h2>
    <table>
        <thead>
            <tr>
                <th>id_peminjam</th>
                <th>nama_lengkap</th>
                <th>kelas</th>
                <th>no_hp</th>
                <th>id_buku</th>
                <th>nama_buku</th>
                <th>jumlah</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($data as $no => $row): 
        ?>
        <tr>
            <td><?= $no + 1; ?></td>
            <td><?= $row['nama_lengkap']; ?></td>
            <td><?= $row['kelas']; ?></td>
            <td><?= $row['no_hp']; ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>