<?php
session_start();
include '../konek.php';
$id=$_GET['id'];
$query="UPDATE tb_detail_order SET status_detail_order='selesai' WHERE id_detail_order='$id'";
$sql=mysqli_query($konek,$query);
$cek=mysqli_query($konek,"SELECT * FROM tb_detail_order WHERE id_detail_order='$id'");
while ($data=mysqli_fetch_array($cek)) {
	$t=$data['id_order'];
}

if ($sql) {
	header("location: dorder.php?id=".$t."&pesan=hidang");
}
else{
	header("location: order.php?pesan=gagal");
}

?>