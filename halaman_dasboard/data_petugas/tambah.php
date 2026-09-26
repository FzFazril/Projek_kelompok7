<?php
include "../../config/koneksi.php";

if (isset($_POST['submit'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $jabatan = $_POST['jabatan'];
    $no_hp = $_POST['no_hp'];
    $deskripsi = $_POST['deskripsi'];
    $query = "INSERT INTO petugas
            (nama_lengkap, jabatan, no_hp, deskripsi) VALUES
            ('$nama_lengkap','$jabatan','$no_hp', '$deskripsi')";

    mysqli_query($koneksi, $query);
    header("location:petugas.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Data petugas</title>
    <!-- Link CSS Dashboard Utama -->
    <link rel="stylesheet" href="../../asett/dasboard.css?v=2">
    <!-- Link CSS Form Baru -->
    <link rel="stylesheet" href="../../asett/form.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
</head>
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
    <!-- Area Konten Utama -->
    <main class="main-content">
        <!-- Header Atas -->
        <header class="topbar">
            <h1>Tambah Data Petugas</h1>
            <div class="user-profile">Welcome to BacaGrid</div>
        </header>
        <section class="form-card">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" placeholder="contoh: Muhamad Fazril" required>
                </div>

                <div class="form-group">
                    <label for="Jabatan">Jabatan</label>
                    <input type="text" name="jabatan" placeholder="contoh: Ketua Perpustakaan">
                </div>

                <div class="form-group">
                    <label for="no_hp">No telepon</label>
                    <input type="number" name="no_hp" placeholder="contoh: 0855*******" required>
                </div>
                
                <div class="form-group">
                    <label for="deskripsi">deskripsi:</label>
                    <textarea name="deskripsi" id="deskripsi"></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" name="submit" class="btn-submit">Tambah</button>
                    <a href="petugas.php" class="btn-cancel">Batal</a>
                </div>

            </form>
        </section> 
    </main>
</body>
</html>
