<?php
include '../config/koneksi.php';

if (isset($_POST['submit_pinjam'])) {
    $id_buku       = $_POST['id_buku'];
    $nama_peminjam = mysqli_real_escape_string($koneksi, $_POST['nama_peminjam']);
    $tgl_pinjam    = $_POST['tgl_pinjam'];
    $tgl_kembali   = $_POST['tgl_kembali'];
    $status        = 'Dipinjam'; // Status awal peminjaman

    // 1. Cek ketersediaan stok buku
    $cek_stok = mysqli_query($koneksi, "SELECT stok FROM buku WHERE id_buku = '$id_buku'");
    $data_stok = mysqli_fetch_assoc($cek_stok);

    if ($data_stok['stok'] > 0) {
        // 2. Simpan data peminjaman ke tabel 'peminjaman'
        $query_pinjam = "INSERT INTO peminjaman (id_buku, nama_peminjam, tgl_pinjam, tgl_kembali, status) 
                    VALUES ('$id_buku', '$nama_peminjam', '$tgl_pinjam', '$tgl_kembali', '$status')";
        
        if (mysqli_query($koneksi, $query_pinjam)) {
            // 3. Kurangi stok buku di tabel 'buku' sejumlah 1
            mysqli_query($koneksi, "UPDATE buku SET stok = stok - 1 WHERE id_buku = '$id_buku'");

            echo "<script>alert('Peminjaman berhasil diajukan!'); window.location='../halaman_Utama/index.php';</script>";
        } else {
            echo "Gagal memproses peminjaman: " . mysqli_error($koneksi);
        }
    } else {
        echo "<script>alert('Maaf, stok buku ini sedang habis!'); window.location='../halaman_Utama/index.php';</script>";
    }
}
?>