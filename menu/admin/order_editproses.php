<?php
include '../konek.php';
session_start();
$id=$_GET['id'];
$nmeja=$_POST['nmeja'];
$tgl=$_POST['tgl'];
$ket=$_POST['ket'];

$input=mysqli_query($konek,"UPDATE tb_orderan SET no_meja='$nmeja',tanggal='$tgl',keterangan='$ket' WHERE id_order='$id'");
if ($input) {
  header("location: order.php?pesan=berhasil");
}
else{
  header("location: order.php?pesan=gagal");
}


?>