<?php
include '../../config/koneksi.php';

$id = $_GET['id_petugas'];

if(isset($_POST['submit'])){
    $nama_lengkap = $_POST['nama_lengkap'];
    $jabatan = $_POST['jabatan'];
    $no_hp = $_POST['no_hp'];
    $query = "UPDATE petugas SET
            nama_lengkap = '$nama_lengkap', 
            jabatan = '$jabatan', 
            no_hp = '$no_hp'
            WHERE id_petugas ='$id'";

    mysqli_query($koneksi, $query);
    header("Location: petugas.php");
    exit;
}   

$query_lama = "SELECT * FROM petugas WHERE id_petugas = '$id'";
$hasil_lama = mysqli_query($koneksi, $query_lama);
$data = mysqli_fetch_assoc($hasil_lama);

if (!$data) {
    die("<b>Error Data Kosong:</b> Tidak ditemukan buku dengan id_petugas = <b>'$id'</b> di database phpMyAdmin.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Petugas</title>
    <!-- Link CSS Dashboard Utama -->
    <link rel="stylesheet" href="../../asett/dasboard.css?v=2">
    <!-- Link CSS Form Baru -->
    <link rel="stylesheet" href="../../asett/form.css?v=1">
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="brand">
            <img src="../../asett/logo_vertikal.webp" alt="logo">
        </div>
        <ul class="nav-links">
            <li><a href="../dasboard.php">Beranda</a></li>
            <li><a href="../data_petugas/petugas.php">Data Petugas</a></li>
            <li><a href="../data_peminjaman/pinjam.php">Data Peminjam</a></li>
            <li><a href="buku.php">Data Buku</a></li>
        </ul>
    </aside>
    <!-- Area Konten Utama -->
    <main class="main-content">
        <!-- Header Atas -->
        <header class="topbar">
            <h1>Edit Data Petugas</h1>
            <div class="user-profile">Welcome to BacaGrid</div>
        </header>
    <!-- Form Edit Buku -->
        <section class="form-card">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap:</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= htmlspecialchars($data['nama_lengkap']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan:</label>
                    <input type="text" id="jabatan" name="jabatan" value="<?= htmlspecialchars($data['jabatan']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomor Telepon:</label>
                    <input type="number" id="no_hp" name="no_hp" value="<?= htmlspecialchars($data['no_hp']) ?>" required>
                </div>

                <div class="form-actions">
                    <button type="submit" name="submit" class="btn-submit">Simpan Perubahan</button>
                    <a href="petugas.php" class="btn-cancel">Batal</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>