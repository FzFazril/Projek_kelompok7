<?php
include '../config/koneksi.php';

// Ambil ID buku dari URL
$id_buku = $_GET['id_buku'];

// Ambil detail buku berdasarkan ID
$query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
$hasil = mysqli_query($koneksi, $query);
$buku  = mysqli_fetch_assoc($hasil);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Peminjaman Buku - BacaGrid</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../asett/pinjam.css?v=2">
    <!--animasi AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>

<div class="form-wrapper" data-aos="fade-up">
    <div class="form-card">
        <h2>Formulir Peminjaman</h2>
        
        <!-- Detail Info Buku -->
        <div class="book-info-box">
            <div class="info-item">
                <i class="fa-solid fa-book"></i>
                <div>
                    <span>Judul Buku</span>
                    <strong><?= htmlspecialchars($buku['judul_buku']); ?></strong>
                </div>
            </div>
            <div class="info-item">
                <i class="fa-solid fa-user-pen"></i>
                <div>
                    <span>Pengarang</span>
                    <strong><?= htmlspecialchars($buku['pengarang']); ?></strong>
                </div>
            </div>
        </div>

        <!-- Form Peminjaman -->
        <form action="../proses/proses_pinjam.php" method="POST">
            <!-- Hidden Input -->
            <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">

            <div class="input-group">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" id="nama_peminjam" name="nama_peminjam" placeholder="Masukkan nama lengkap Anda" required>
            </div>

            <div class="input-group">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="date" id="tgl_pinjam" name="tgl_pinjam" value="<?= date('Y-m-d'); ?>" required>
            </div>

            <div class="input-group">
                <label>Lama Pinjam (Hari):</label><br>
                <input type="number" name="durasi_pinjam" min="1" placeholder="contoh: 7"  required>
            </div>

            <div class="button-group">
                <button type="submit" name="submit_pinjam" class="btn-submit">
                    <i class="fa-solid fa-paper-plane"></i> Ajukan Peminjaman
                </button>
                <a href="../halaman_Utama/index.php#katalog" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
<script>
    AOS.init({
        duration: 1000,
        once: true
    })
</script>
</body>
</html>