<?php
include '../konek.php';
$id=$_GET['id'];
$mas=$_POST['mas'];
$ket=$_POST['ket'];

$input=mysqli_query($konek,"INSERT INTO tb_detail_order(id_order,id_masakan,keterangan,status_detail_order) VALUES('$id','$mas','$ket','diproses') ");
if ($input) {
  header("location: order.php?pesan=berhasil");
}
else{
  header("location: order.php?pesan=gagal");
}

?>