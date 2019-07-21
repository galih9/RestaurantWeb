<?php
include '../konek.php';
session_start();
$id=$_GET['id'];
$user=$_POST['user'];
$ordah=$_POST['order'];
$tgl=$_POST['tgl'];
$totbay=$_POST['totbay'];

$input=mysqli_query($konek,"UPDATE tb_transaksi SET id_user='$user', id_order='$ordah',tanggal='$tgl',total_bayar='$totbay' WHERE id_transaksi='$id'");
if ($input) {
  header("location: transaksi.php?pesan=teredit");
}
else{
  header("location: transaksi.php?pesan=gteredit");
}


?>