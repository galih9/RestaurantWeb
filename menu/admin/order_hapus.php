<?php
include '../konek.php';
$id=$_GET['id'];
$query=mysqli_query($konek,"DELETE FROM tb_orderan WHERE id_order='$id'");
if ($query) {
  header("location: order.php?pesan=terhapus");
}
else{
  header("location: order.php?pesan=gterhapus");
}

?>