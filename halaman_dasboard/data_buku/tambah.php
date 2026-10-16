<?php
include "../../config/koneksi.php";

$pesan_error = "";

if (isset($_POST['submit'])) {
    $judul_buku   = mysqli_real_escape_string($koneksi, trim($_POST['judul_buku']));
    $pengarang    = mysqli_real_escape_string($koneksi, trim($_POST['pengarang']));
    $penerbit     = mysqli_real_escape_string($koneksi, trim($_POST['penerbit']));
    $tahun_terbit = trim($_POST['tahun_terbit']);
    $sinopsis     = mysqli_real_escape_string($koneksi, trim($_POST['sinopsis']));
    $stok         = trim($_POST['stok']);

    $tahun_sekarang = date('Y');

    // 1. VALIDASI INPUT TEKS & ANGKA
    if (empty($judul_buku) || empty($pengarang) || empty($penerbit) || empty($tahun_terbit) || $stok === '') {
        $pesan_error = "Semua kolom utama (Judul, Pengarang, Penerbit, Tahun, Stok) wajib diisi!";
    } elseif (!is_numeric($tahun_terbit) || $tahun_terbit < 1900 || $tahun_terbit > $tahun_sekarang) {
        $pesan_error = "Tahun terbit harus berupa angka antara 1900 sampai $tahun_sekarang!";
    } elseif (!is_numeric($stok) || $stok < 0) {
        $pesan_error = "Stok harus berupa angka minimal 0!";
    } else {
        // 2. VALIDASI COVER / GAMBAR
        $cover_baru = "";
        $upload_ok  = true;

        if (isset($_FILES['cover']['name']) && $_FILES['cover']['name'] != "") {
            $nama_file  = $_FILES['cover']['name'];
            $tmp_name   = $_FILES['cover']['tmp_name'];
            $ukuran_file = $_FILES['cover']['size'];
            $ext        = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
            $ext_diizinkan = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array($ext, $ext_diizinkan)) {
                $pesan_error = "Format file cover harus berupa JPG, JPEG, PNG, atau WEBP!";
                $upload_ok = false;
            } elseif ($ukuran_file > 2 * 1024 * 1024) { // Maksimal 2MB
                $pesan_error = "Ukuran file cover tidak boleh lebih dari 2MB!";
                $upload_ok = false;
            } else {
                $cover_baru = time() . '_' . uniqid() . '.' . $ext;
                move_uploaded_file($tmp_name, "../../asett/uploads/" . $cover_baru);
            }
        }

        // 3. JIKA VALIDASI GAMBAR DAN INPUTAN LOLOS
        if ($upload_ok) {
            $stmt = mysqli_prepare($koneksi, "INSERT INTO buku (cover, judul_buku, pengarang, penerbit, tahun_terbit, sinopsis, stok) VALUES (?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssssisi", $cover_baru, $judul_buku, $pengarang, $penerbit, $tahun_terbit, $sinopsis, $stok);
            
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                header("location:buku.php");
                exit;
            } else {
                $pesan_error = "Gagal menyimpan data ke database!";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Buku</title>
    <!-- Link CSS Dashboard Utama -->
    <link rel="stylesheet" href="../../asett/dasboard.css?v=6">
    <!-- Link CSS Form Baru -->
    <link rel="stylesheet" href="../../asett/form.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    <input type="number" name="stok" placeholder="contoh: 10">
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