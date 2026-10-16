<?php
include "../../config/koneksi.php";

// Variabel untuk menampung pesan error
$pesan_error = "";

if (isset($_POST['submit'])) {
    // 1. Amankan data input dengan mysqli_real_escape_string untuk mencegah SQL Injection dasar
    $nama_lengkap = mysqli_real_escape_string($koneksi, trim($_POST['nama_lengkap']));
    $jabatan      = mysqli_real_escape_string($koneksi, trim($_POST['jabatan']));
    $no_hp        = mysqli_real_escape_string($koneksi, trim($_POST['no_hp']));
    $deskripsi    = mysqli_real_escape_string($koneksi, trim($_POST['deskripsi']));
    
    // Validasi Kolom Kosong
    if (empty($nama_lengkap) || empty($no_hp)) {
        $pesan_error = "Nama lengkap dan No Telepon wajib diisi!";
    } 
    // Validasi Nomor HP harus berupa angka (digit) dan panjang minimal/maksimal (misal: 10 - 13 digit)
    elseif (!preg_match('/^[0-9]+$/', $no_hp)) {
        $pesan_error = "Nomor telepon hanya boleh berisi angka!";
    } 
    elseif (strlen($no_hp) < 10 || strlen($no_hp) > 15) {
        $pesan_error = "Nomor telepon harus memiliki panjang antara 10 sampai 15 digit!";
    } 
    else {
        // Cek apakah nomor HP sudah terdaftar sebelumnya (Opsional agar tidak duplikat)
        $cek_hp = mysqli_query($koneksi, "SELECT * FROM petugas WHERE no_hp = '$no_hp'");
        if (mysqli_num_rows($cek_hp) > 0) {
            $pesan_error = "Nomor telepon tersebut sudah terdaftar pada petugas lain!";
        } else {
            // Jika semua validasi lolos, jalankan query INSERT
            $query = "INSERT INTO petugas (nama_lengkap, jabatan, no_hp, deskripsi) 
                    VALUES ('$nama_lengkap', '$jabatan', '$no_hp', '$deskripsi')";
            
            if (mysqli_query($koneksi, $query)) {
                header("location:petugas.php");
                exit();
            } else {
                $pesan_error = "Gagal menyimpan data: " . mysqli_error($koneksi);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Data petugas</title>
    <!-- Link CSS Dashboard Utama -->
    <link rel="stylesheet" href="../../asett/dasboard.css?v=6">
    <!-- Link CSS Form Baru -->
    <link rel="stylesheet" href="../../asett/form.css?v=3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
</head>
<body>
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
    <!-- Area Konten Utama -->
    <main class="main-content">
        <!-- Header Atas -->
        <header class="topbar">
            <h1>Tambah Data Petugas</h1>
            <div class="user-profile">Welcome to BacaGrid</div>
        </header>
            <?php if (!empty($pesan_error)) : ?>
            <div class="alert-error">
                <i class="fa-solid fa-triangle-exclamation"></i> <?= $pesan_error; ?>
            </div>
            <?php endif; ?>
        <section class="form-card">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" placeholder="contoh: Muhamad Fazril" required>
                </div>

                <div class="form-group">
                    <label for="Jabatan">Jabatan</label>
                    <input type="text" name="jabatan" placeholder="contoh: Ketua Perpustakaan" required>
                </div>

                <div class="form-group">
                    <label for="no_hp">No telepon</label>
                    <input type="number" name="no_hp" placeholder="contoh: 0855*******" required>
                </div>
                
                <div class="form-group">
                    <label for="deskripsi">deskripsi:</label>
                    <textarea name="deskripsi" id="deskripsi" required></textarea>
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
