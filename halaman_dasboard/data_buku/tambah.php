<?php
include "../../config/koneksi.php";

if (isset($_POST['submit'])) {
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sinopsis = $_POST['sinopsis'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO buku
            (judul_buku, pengarang, penerbit, tahun_terbit, sinopsis, stok) VALUES
            ('$judul_buku','$pengarang','$penerbit','$tahun_terbit','$sinopsis','$stok')";

    mysqli_query($koneksi, $query);
    header("location:buku.php");
}
?>

<html>
<head>
    <title>Tambah Data Buku</title>
</head>
<body>

<form action="" method="POST">
    <label for="judul_buku">Judul Buku</label><br>
    <input type="text" name="judul_buku" placeholder="contoh: Laskar Pelangi" required><br>
    <label for="pengarang">Pengarang</label><br>
    <input type="text" name="pengarang" placeholder="contoh: Tere Liye"><br>
    <label for="penerbit">Penerbit</label><br>
    <input type="text" name="penerbit" placeholder="contoh: Pt. Maju Mundur"><br>
    <label for="tahun_terbit">Tahun Terbit</label><br>
    <input type="number" name="tahun_terbit" placeholder="contoh: 2017" min="1900" max="2099" required><br>
    <label for="sinopsis">Sinopsis</label><br>
    <textarea name="sinopsis" id="sinopsis" placeholder="tuliskan deskripsi singkat tentang buku tersebut"></textarea><br>
    <label for="stok">Stok</label><br>
    <input type="number" name="stok" placeholder="comtoh: 67"><br>
    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </form>
</body>
</html>
