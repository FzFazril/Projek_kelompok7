<?php
include '../../config/koneksi.php';

$id = $_GET['id_buku'];

// Ambil data lama buku
$query_lama = "SELECT * FROM buku WHERE id_buku = '$id'";
$hasil_lama = mysqli_query($koneksi, $query_lama);
$data       = mysqli_fetch_assoc($hasil_lama);

if (!$data) {
    die("<b>Error Data Kosong:</b> Tidak ditemukan buku dengan id_buku = <b>'$id'</b> di database phpMyAdmin.");
}

if (isset($_POST['submit'])) {
    $judul     = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit  = $_POST['penerbit'];
    $terbit    = $_POST['tahun_terbit'];
    $sinopsis  = $_POST['sinopsis'];
    $stok      = $_POST['stok'];

    // Jalur folder target disesuaikan dengan folder asett/uploads/
    $dir_target = __DIR__ . '/../../asett/uploads/';

    $nama_file = $_FILES['cover']['name'];
    $tmp_name  = $_FILES['cover']['tmp_name'];

    // Cek apakah ada file gambar baru yang diunggah
    if (!empty($nama_file)) {
        $cover_baru  = time() . '_' . basename($nama_file);
        $path_upload = $dir_target . $cover_baru;

        if (move_uploaded_file($tmp_name, $path_upload)) {
            // Hapus cover lama dari folder jika ada
            if (!empty($data['cover']) && file_exists($dir_target . $data['cover'])) {
                unlink($dir_target . $data['cover']);
            }

            // Query update dengan cover baru
            $query = "UPDATE buku SET
                    judul_buku   = '$judul', 
                    pengarang    = '$pengarang', 
                    penerbit     = '$penerbit', 
                    tahun_terbit = '$terbit', 
                    sinopsis     = '$sinopsis',
                    stok         = '$stok',
                    cover        = '$cover_baru'
                    WHERE id_buku = '$id'";
        } else {
            echo "<script>alert('Gagal memindahkan file ke folder asett/uploads!');</script>";
            $query = "UPDATE buku SET
                    judul_buku   = '$judul', 
                    pengarang    = '$pengarang', 
                    penerbit     = '$penerbit', 
                    tahun_terbit = '$terbit', 
                    sinopsis     = '$sinopsis',
                    stok         = '$stok'
                    WHERE id_buku = '$id'";
        }
    } else {
        // Query jika tidak memilih gambar baru
        $query = "UPDATE buku SET
                judul_buku   = '$judul', 
                pengarang    = '$pengarang', 
                penerbit     = '$penerbit', 
                tahun_terbit = '$terbit', 
                sinopsis     = '$sinopsis',
                stok         = '$stok'
                WHERE id_buku = '$id'";
    }

    // Jalankan query
    mysqli_query($koneksi, $query);
    header("Location: buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku - BacaGrid</title>
    
    <!-- Link CSS Dashboard Utama -->
    <link rel="stylesheet" href="../../asett/dasboard.css?v=2">
    <!-- Link CSS Form Baru -->
    <link rel="stylesheet" href="../../asett/form.css?v=1">
</head>
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
            <h1>Edit Data Buku</h1>
            <div class="user-profile">Welcome to BacaGrid</div>
        </header>

        <!-- Form Edit Buku -->
        <section class="form-card">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="judul_buku">Judul Buku:</label>
                    <input type="text" id="judul_buku" name="judul_buku" value="<?= htmlspecialchars($data['judul_buku']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="pengarang">Pengarang:</label>
                    <input type="text" id="pengarang" name="pengarang" value="<?= htmlspecialchars($data['pengarang']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="penerbit">Penerbit:</label>
                    <input type="text" id="penerbit" name="penerbit" value="<?= htmlspecialchars($data['penerbit']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit:</label>
                    <input type="number" id="tahun_terbit" name="tahun_terbit" value="<?= htmlspecialchars($data['tahun_terbit']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="sinopsis">Sinopsis:</label>
                    <textarea name="sinopsis" id="sinopsis"><?= htmlspecialchars($data['sinopsis']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="stok">Stok:</label>
                    <input type="number" id="stok" name="stok" value="<?= htmlspecialchars($data['stok']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Cover Saat Ini:</label>
                    <div class="cover-preview">
                        <?php if (!empty($data['cover']) && file_exists(__DIR__ . '/../../asett/uploads/' . $data['cover'])): ?>
                            <img src="../../asett/uploads/<?= $data['cover']; ?>" alt="Cover Buku">
                        <?php else: ?>
                            <p><i>Belum ada cover</i></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cover">Pilih Cover Baru (Opsional):</label>
                    <input type="file" name="cover" id="cover" accept="image/*">
                </div>

                <div class="form-actions">
                    <button type="submit" name="submit" class="btn-submit">Simpan Perubahan</button>
                    <a href="buku.php" class="btn-cancel">Batal</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>