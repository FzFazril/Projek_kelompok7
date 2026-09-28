<?php
include "../config/koneksi.php";

if(isset($_GET['id_peminjaman']) && isset($_GET['id_buku'])){
    $id_peminjam = $_GET['id_peminjaman'];
    $id_buku = $_GET['id_buku'];

    $query_update = "UPDATE peminjaman SET status = 'dikembalikan' WHERE id_peminjaman = '$id_peminjam'";
    $update_status = mysqli_query($koneksi, $query_update);

    if ($update_status) {
        $query_stok = "UPDATE buku SET stok = stok + 1 WHERE id_buku = '$id_buku'";
        mysqli_query($koneksi, $query_stok);

        echo "<script> alert('buku berhasil di kembalikan dan stok bertambah');
        window.location='../halaman_dasboard/data_peminjaman/pinjam.php'</script>";

    } else {
        echo "GAGAL mengubah status: " . mysqli_error($koneksi);
    } 
    } else {
    echo "Parameter ID tidak ditemukan di URL!";
    }
?>