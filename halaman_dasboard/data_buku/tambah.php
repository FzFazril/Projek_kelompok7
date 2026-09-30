<?php
include "../../config/koneksi.php";

if (isset($_POST['submit'])) {
    $judul_buku   = $_POST['judul_buku'];
    $pengarang    = $_POST['pengarang'];
    $penerbit     = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sinopsis     = $_POST['sinopsis'];
    $stok         = $_POST['stok'];

    $cover_baru = "";
    if (isset($_FILES['cover']['name']) && $_FILES['cover']['name'] != "") {
        $nama_file  = $_FILES['cover']['name'];
        $tmp_name   = $_FILES['cover']['tmp_name'];
        $cover_baru = time() . '_' . $nama_file;
        
        move_uploaded_file($tmp_name, "../../asett/uploads/" . $cover_baru);
    }

    // 1. Siapkan query dengan placeholder (?)
    $stmt = mysqli_prepare($koneksi, "INSERT INTO buku (cover, judul_buku, pengarang, penerbit, tahun_terbit, sinopsis, stok) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    // 2. Bind parameter
    mysqli_stmt_bind_param($stmt, "ssssisi", $cover_baru, $judul_buku, $pengarang, $penerbit, $tahun_terbit, $sinopsis, $stok);
    
    // 3. Eksekusi dan tutup statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location:buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Buku</title>
    <!-- Link CSS Dashboard Utama -->
    <link rel="stylesheet" href="../../asett/dasboard.css?v=4">
    <!-- Link CSS Form Baru -->
    <link rel="stylesheet" href="../../asett/form.css?v=1">
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

    <!-- Area Konten Utama -->
    <main class="main-content">
        <!-- Header Atas -->
        <header class="topbar">
            <h1>Tambah Data Buku</h1>
            <div class="user-profile">Welcome to BacaGrid</div>
        </header>
        <section class="form-card">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" name="judul_buku" placeholder="contoh: Laskar Pelangi" required>
                </div>

                <div class="form-group">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" name="pengarang" placeholder="contoh: Tere Liye">
                </div>

                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" name="penerbit" placeholder="contoh: Pt. Maju Mundur">
                </div>

                <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" placeholder="contoh: 2017" min="1900" max="2099" required>
                </div>

                <div class="form-group">
                    <label for="sinopsis">Sinopsis</label>
                    <textarea name="sinopsis" id="sinopsis" placeholder="tuliskan deskripsi singkat tentang buku tersebut"></textarea>
                </div>

                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" placeholder="contoh: 67">
                </div>

                <div class="form-group">
                    <label for="cover">Cover Buku:</label>
                    <input type="file" name="cover" id="cover" accept="image/*">
                </div>

                <div class="form-actions">
                    <button type="submit" name="submit" class="btn-submit">Tambah</button>
                    <a href="buku.php" class="btn-cancel">Batal</a>
                </div>
            </form>
        </section>
    </main>
</form>
</body>
</html>