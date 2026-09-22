<?php
include "../../config/koneksi.php";

if (isset($_POST['submit'])) {
    $judul_buku  = $_POST['judul_buku'];
    $pengarang   = $_POST['pengarang'];
    $penerbit    = $_POST['penerbit'];
    $tahun_terbit= $_POST['tahun_terbit'];
    $sinopsis    = $_POST['sinopsis'];
    $stok        = $_POST['stok'];

    $cover_baru = "";
    if (isset($_FILES['cover']['name']) && $_FILES['cover']['name'] != "") {
        $nama_file = $_FILES['cover']['name'];
        $tmp_name  = $_FILES['cover']['tmp_name'];
        $cover_baru= time() . '_' . $nama_file;
        
        move_uploaded_file($tmp_name, "../../asett/uploads/" . $cover_baru);
    }

    $query = "INSERT INTO buku
            (cover, judul_buku, pengarang, penerbit, tahun_terbit, sinopsis, stok) VALUES
            ('$cover_baru','$judul_buku','$pengarang','$penerbit','$tahun_terbit','$sinopsis','$stok')";

    mysqli_query($koneksi, $query);
    header("location:buku.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Buku</title>
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
    
    <label for="cover">Cover Buku:</label><br>
    <input type="file" name="cover" id="cover" accept="image/*"><br><br>

    <label for="judul_buku">Judul Buku</label><br>
    <input type="text" name="judul_buku" placeholder="contoh: Laskar Pelangi" required><br><br>

    <label for="pengarang">Pengarang</label><br>
    <input type="text" name="pengarang" placeholder="contoh: Tere Liye"><br><br>

    <label for="penerbit">Penerbit</label><br>
    <input type="text" name="penerbit" placeholder="contoh: Pt. Maju Mundur"><br><br>

    <label for="tahun_terbit">Tahun Terbit</label><br>
    <input type="number" name="tahun_terbit" placeholder="contoh: 2017" min="1900" max="2099" required><br><br>

    <label for="sinopsis">Sinopsis</label><br>
    <textarea name="sinopsis" id="sinopsis" placeholder="tuliskan deskripsi singkat tentang buku tersebut"></textarea><br><br>

    <label for="stok">Stok</label><br>
    <input type="number" name="stok" placeholder="contoh: 67"><br><br>

    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
</form>
</body>
</html>