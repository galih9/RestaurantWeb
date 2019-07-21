<?php
include '../konek.php';
session_start();
$nama=$_SESSION['id'];
$did=$_GET['id'];
$totbay=$_GET['totbay'];
$tgl=date("Y-m-d");
$update=mysqli_query($konek,"UPDATE tb_orderan SET status_order='lunas'");
$query="INSERT INTO tb_transaksi(id_order,tanggal,id_user,total_bayar) VALUES('$did','$tgl','$nama','$totbay')";
$sql=mysqli_query($konek,$query);
if ($sql) {
	header("location: transaksi.php?pesan=selesai");
}
else{
	echo "gagal";
	#eader("location: transaksi.php?pesan=selesai")
}
?>