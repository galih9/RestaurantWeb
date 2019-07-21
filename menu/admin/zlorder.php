<?php
include '../konek.php';
session_start();
$id=$_GET['id'];
foreach ($_SESSION['pesanan'] as $masakan => $value) {
	$idmas=$masakan;
	$input=mysqli_query($konek,"INSERT INTO tb_detail_order(id_order,id_masakan,status_detail_order) VALUES ('$id','$idmas','diproses')");
}
unset($_SESSION['pesanan']);
header("location: order.php?pesan=order");
?>