<?php
include "koneksi.php";
$id =$_GET['id'];
if (isset ($_POST['submit'])){
    $judul_buku=$_POST['judul_buku'];
    $pengarang=$_POST['pengarang'];
    $penerbit=$_['penerbit'];
    $tahun_terbit=$_['tahun terbit'];
    $sinopsis=$_['sinopsis'];
    $stok=$_['stok'];
    $query="UPDATE FROM buku SET judul_buku='$judul_buku',pengarang='$pengarang',penerbit='$penerbit',tahun_terbit='$tahun_terbit',sinopsis='$sinopsis',stok='$stok'";
    mysqli_query($koneksi,$query);
    header("Location:tampil.php");
    exit;
}
$query_lama="SELECT FROM buku
            where id='$id'";
$hasil_lama=mysqli_query($koneksi,$query_lama);
$data=mysqli_fetch_assoc($hasil_lama);
?>
<form action="" method="POST">
    <input type="text" name="judul_buku"
    value="<?php echo $data['judul_buku'];?>">
    <input type="text" name="pengarang"
    value="<?php echo $data['pengarang'];?>">
    <input type="text" name="penerbit" 
    value="<?php echo $data['penerbit'];?>">
    <input type="number" name="tahun_terbit"
    value="<?php echo $data['tahun_terbit'];?>">
    <textarea type="text" name="sinopsis" placeholder="sinopsis"></textarea>
    <input type="number" name="stok"
    value="<?php echo $data['stok'];?>">
    <button type="submit" name="submit">update</button>
</form>