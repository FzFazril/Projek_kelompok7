<?php
include "koneksi.php";
$id =$_GET['id'];
if (isset ($_POST['submit'])){
    $nama_lengkap=$_POST['nama_lengkap'];
    $jabatan=$_POST['jabatan'];
    $no_hp=$_['no_hp'];
    $query="UPDATE FROM petugas SET nama_lengkap='$nama_lengkap',
            jabatan='$jabatan', no_hp='$no_hp'";
    mysqli_query($koneksi,$query);
    header("Location:tampil.php");
    exit;
}
$query_lama="SELECT FROM petugas
            where id='$id'";
$hasil_lama=mysqli_query($koneksi,$query_lama);
$data=mysqli_fetch_assoc($hasil_lama);
?>
<form action="" method="POST">
    <input type="text" name="nama_lengkap"
    value="<?php echo $data['nama_lengkap'];?>">
    <input type="text" name="jabatan"
    value="<?php echo $data['jabatan'];?>">
    <input type="text" name="no_hp"
    value="<?php echo $data['no_hp'];?>">
    <button type="submit" name="submit">update</button>
</form>
