<?php
include '../konek.php';
session_start();
$nmeja=$_POST['nmeja'];
$tgl=date("Y-m-d");
$id=$_SESSION['id'];
$ket=$_POST['ket'];
$sql=mysqli_query($konek,"INSERT INTO tb_orderan(no_meja,tanggal,id_user,keterangan,status_order) VALUES('$nmeja','$tgl','$id','$ket','blunas')");
$tes=mysqli_query($konek,"SELECT * FROM tb_orderan WHERE tb_orderan.no_meja='$nmeja' AND tb_orderan.id_user='$id'");
while ($data=mysqli_fetch_array($tes)) {
	$tam=$data['id_order'];
}
if ($sql) {
	header("location: lorder.php?id=".$tam."");
}
else{
	echo "gagal";
}
?>