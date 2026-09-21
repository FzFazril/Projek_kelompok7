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
<body>
    <form action="" method="POST">
    <input type="text" name="nama_lengkap" value="<?= $data['nama_lengkap']?>"><br>
    <input type="text" name="jabatan" value="<?= $data['jabatan']?>"><br>
    <input type="text" name="no_hp" value="<?= $data['no_hp']?>"><br>
    <button type="submit" name="submit">Edit</button>
    </form>
</body>
</html>