<?php
include '../konek.php';
$id=$_GET['id'];
$query=mysqli_query($konek,"DELETE FROM tb_transaksi WHERE id_transaksi='$id'");
if ($query) {
  header("location: akun.php?pesan=terhapus");
}
else{
  header("location: akun.php?pesan=gterhapus");
}

?>