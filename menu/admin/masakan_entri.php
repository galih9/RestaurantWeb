<?php
include '../konek.php';
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$status=$_POST['status'];

$input=mysqli_query($konek,"INSERT INTO tb_masakan(nama_masakan,harga,status_masakan) VALUES('$nama','$harga','$status') ");
if ($input) {
  header("location: masakan.php?pesan=kunses");
}
else{
  header("location: masakan.php?pesan=gakunses");
}

?>