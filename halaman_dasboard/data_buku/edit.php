<?php
include '../../config/koneksi.php';

$id = $_GET['id_buku'];

if(isset($_POST['submit'])){
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $terbit = $_POST['tahun_terbit'];
    $sinopsis = $_POST['sinopsis'];
    $stok = $_POST['stok'];
    $query = "UPDATE buku SET
            judul_buku = '$judul', 
            pengarang = '$pengarang', 
            penerbit = '$penerbit', 
            tahun_terbit = '$terbit', 
            sinopsis = '$sinopsis',
            stok = '$stok'
            WHERE id_buku ='$id'";

    mysqli_query($koneksi, $query);
    header("Location: buku.php");
    exit;
}   

$query_lama = "SELECT * FROM buku WHERE id_buku = '$id'";
$hasil_lama = mysqli_query($koneksi, $query_lama);
$data = mysqli_fetch_assoc($hasil_lama);

if (!$data) {
    die("<b>Error Data Kosong:</b> Tidak ditemukan buku dengan id_buku = <b>'$id'</b> di database phpMyAdmin.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Buku</title>
<body>
    <form action="" method="POST">
    <input type="text" name="judul_buku" value="<?= $data['judul_buku']?>"><br>
    <input type="text" name="pengarang" value="<?= $data['pengarang']?>"><br>
    <input type="text" name="penerbit" value="<?= $data['penerbit']?>"><br>
    <input type="number" name="tahun_terbit" value="<?= $data['tahun_terbit']?>"><br>
    <textarea name="sinopsis" id="sinopsis"><?= $data ['sinopsis'] ?></textarea><br>
    <input type="number" name="stok" value="<?= $data['stok']?>"><br>
    <button type="submit" name="submit">Edit</button>
    </form>
</body>
</html>