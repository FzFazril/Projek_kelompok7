<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan";

$koneksi = mysqli_connect($hostname, $username, $password, $dbname);

if (!$koneksi){
    die("koneksi gagal: " . mysqli_connect_error());
} else{
    echo"";
}
?>