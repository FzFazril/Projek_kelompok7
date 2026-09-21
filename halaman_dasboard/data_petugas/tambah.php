<?php
include "../../config/koneksi.php";

if (isset($_POST['submit'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $jabatan = $_POST['jabatan'];
    $no_hp = $_POST['no_hp'];
    $query = "INSERT INTO petugas
            (nama_lengkap, jabatan, no_hp) VALUES
            ('$nama_lengkap','$jabatan','$no_hp')";

    mysqli_query($koneksi, $query);
    header("location:petugas.php");
}
?>

<html>
<head>
<<<<<<< HEAD
    <title>Tambah Data petugas/title>
=======
    <title>Tambah Data Petugas</title>
>>>>>>> cf6e5248aebe11c4f826dcbcf9c9596a8029596f
</head>
<body>

<form action="" method="POST">
    <label for="nama_lengkap">Nama Lengkap</label><br>
    <input type="text" name="nama_lengkap" placeholder="contoh: Muhamad Fazril" required><br>
    <label for="Jabatan">Jabatan</label><br>
    <input type="text" name="jabatan" placeholder="contoh: Ketua Perpustakaan"><br>
    <label for="no_hp">No telepon</label><br>
    <input type="number" name="no_hp" placeholder="contoh: 0855*******" required><br>
    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </form>
</body>
</html>
