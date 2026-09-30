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
    <title>Formulir Peminjaman Buku</title>
</head>
<body>

<!-- Info Buku yang dipinjam -->
<p><strong>Judul Buku:</strong> <?= htmlspecialchars($buku['judul_buku']); ?></p>
<p><strong>Pengarang:</strong> <?= htmlspecialchars($buku['pengarang']); ?></p>

<!-- Form Peminjaman -->
<form action="../proses/proses_pinjam.php" method="POST">
    <!-- Hidden Input untuk mengirim ID Buku tanpa terlihat pengguna -->
    <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">

    <label>Nama Peminjam:</label><br>
    <input type="text" name="nama_peminjam" required><br><br>

    <label>Tanggal Pinjam:</label><br>
    <input type="date" name="tgl_pinjam" value="<?= date('Y-m-d'); ?>" required><br><br>

    <label>Lama Pinjam (Hari):</label><br>
    <input type="number" name="durasi_pinjam" min="1" placeholder="contoh: 7"  required><br><br>

    <button type="submit" name="submit_pinjam">Ajukan Peminjaman</button>
    <a href="../halaman_Utama/index.php"></a>
</form>

</body>
</html>