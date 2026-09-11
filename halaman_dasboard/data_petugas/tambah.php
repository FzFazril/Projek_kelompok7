<?php
include "../asset/config/koneksi.php";

if (isset($_POST['submit'])) {
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sinopsis = $_POST['sinopsis'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO data
              (judul_buku,pengarang,penerbit,tahun_terbit,sinopsis,stok) 
              VALUES
               ('$judul_buku','$pengarang','$penerbit','$tahun_terbit','$sinopsis','$stok')";

    mysqli_query($koneksi, $query);
    header("location:tampil.php");
}
?>

<html>
<head>
    <title>Data/title>
</head>
<body>

<form action="" method="POST">
    <input type="text" name="judul_buku" placeholder="Nama Anime">
    <input type="text" name="pengarang" placeholder="Karakter Anime">
    <input type="text" name="penerbit" placeholder="Jenis Kelamin">
    <input type="text" name="tahun_terbit" placeholder="Jenis Kelamin">
    <textarea type="text" name="sinopsis" placeholder="Jenis Kelamin"></textarea>
    <input type="text" name="stok" placeholder="Jenis Kelamin">

    <button type="submit" name="submit">Simpan</button>
</form>

</body>
</html>
