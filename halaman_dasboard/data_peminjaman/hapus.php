<?php
include "koneksi.php";

$id = $_GET['id_buku'];
$query = "DELETE FROM pinjam WHERE id_buku ='$id'";
mysqli_query($koneksi, $query);

// Tandai di browser bahwa baru saja melakukan hapus, lalu redirect
echo "<script>
        sessionStorage.setItem('skipLoader', 'true');
        window.location.href = 'pinjam.php';
    </script>";
exit;
?>