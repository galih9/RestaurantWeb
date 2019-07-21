<?php
include '../konek.php';
$id=$_GET['id'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$status=$_POST['status'];

$input=mysqli_query($konek,"UPDATE tb_masakan SET nama_masakan='$nama',harga='$harga',status_masakan='$status' WHERE id_masakan='$id'");
if ($input) {
  header("location: masakan.php?pesan=edited");
}
else{
  header("location: masakan.php?pesan=gedited");
}

?>