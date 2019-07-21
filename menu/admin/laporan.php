<!DOCTYPE html>
<html>
<head>
	<title>Selamat datang</title>
	<link rel="stylesheet" type="text/css" href="../asset /style.css">
</head>
<body>
<?php
session_start();
include '../konek.php';
include '../asset/adsidebar.php';
include '../asset/header.php';

?>

<div class="konten">
<div class="teks"><div class="judul">KELOLA LAPORAN</div><br>
<?php
$query=mysqli_query($konek,"SELECT SUM(tb_transaksi.total_bayar) AS total FROM tb_transaksi");
$uang=mysqli_fetch_array($query);
$query2=mysqli_query($konek,"SELECT COUNT(id_transaksi) AS tra FROM tb_transaksi");
$tra=mysqli_fetch_array($query2);
$query3=mysqli_query($konek,"SELECT COUNT(id_user) AS aku FROM tb_user");
$akun=mysqli_fetch_array($query3);
?>
<table>
<tr>
<td width="120">total akun terdaftar</td>
<td width="120">total transaksi lunas</td>
<td>total pemasukan </td>
</tr>
<tr>
<td><input type="text" style="width: 40px;" value="<?php echo $akun['aku']; ?>" name="" readonly>orang</td>
<td><input type="text" style="width: 40px;" value="<?php echo $tra['tra']; ?>" name="" readonly=""></td>
<td>Rp. <input type="text" name="" value="<?php echo $uang['total']; ?>" readonly></td>
</tr>
</table>
<br>
<br>
<ul>
	<li><a href="laporan_transaksi.php">buat laporan transaksi</a></li>
	<li><a href="laporan_order.php">buat laporan order</a></li>
	<li><a href="laporan_akun.php">buat laporan akun</a></li>
	<li><a href="laporan_dorder.php">buat laporan detail order</a></li>
	<li><a href="laporan_masakan.php">buat laporan masakan</a></li>
</ul>
</div>	 
</div>
</body>
</html>