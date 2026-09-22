<?php
include "../../config/koneksi.php";

$id = $_GET['id_petugas'];
$query = "DELETE FROM petugas WHERE id_petugas ='$id'";
mysqli_query($koneksi, $query);

// Tandai di browser bahwa baru saja melakukan hapus, lalu redirect
echo "<script>
        sessionStorage.setItem('skipLoader', 'true');
        window.location.href = 'petugas.php';
    </script>";
exit;
?>