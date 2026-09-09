<?php
include '../../koneksi/koneksi.php';
$query = "SELECT * FROM buku";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
            margin: 50px !important;
        }

        a{
            text-decoration: none !important;
            color: black !important;
            margin-top: 20px;
            border: 1px solid black;
            padding: 10px;
            border-radius: 20px;
            transition: 0.3s;
        }

        a:hover{
            background-color: black;
            color: white !important;
            box-shadow: 0 0 5px black;
        }
        h2{
            font-weight: bold;
            margin-top: 20px;
            animation: kedip 5s infinite;
        }
    @keyframes kedip{
        0%,100%{
            text-shadow: none;
        }
        50%{
            text-shadow: 0 0 10px black;
            color: white;
        }
    }
        .aksi {
            text-decoration: none !important;
            color: black !important;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            transition: 0.3s;
            display: inline-block;
        }

        .aksi:hover {
            background-color: black;
            color: white !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
</head>
<body>
    <h2>Tabel Data Guru</h2>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>id_buku</th>
                <th>Judul_buku</th>
                <th>pengarang</th>
                <th>penerbit</th>
                <th>tahun_terbit</th>
                <th>sinopsis</th>
                <th>stok</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($data as $no => $row): 
        ?>
        <tr>
            <td><?= $no + 1; ?></td>
            <td><?= $row['judul_buku']; ?></td>
            <td><?= $row['pengarang']; ?></td>
            <td><?= $row['penerbit']; ?></td>
            <td><?= $row['tahun_terbit']; ?></td>
            <td><?= $row['sinopsis']; ?></td>
            <td><?= $row['stok']; ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="tombol">
        <a href="tguru.php">Tambah Data Guru</a>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>