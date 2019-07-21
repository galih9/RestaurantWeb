<!DOCTYPE html>
<html>
<head>
	<title>Selamat datang</title>
	<link rel="stylesheet" type="text/css" href="../asset/style.css">
</head>
<body>
<?php
session_start();
include '../konek.php';
include '../asset/bheader.php';
ini_set("display_errors", 0);

?>

<div class="bkonten">
<div class="bteks"><div class="bjudul">SELAMAT DATANG PELANGGAN</div><br>
<?php
if ($_GET['pesan']=='pending') {
echo "<div style='font-size:13px;'>pesanan sudah terkirim mohon tunggu<br>untuk melakukan pembayaran mohon tunjukan riwayat pembelian anda</div>";
}
?>
<div style="font-size:13px;"><a href='riwayat.php'>riwayat pembelian</a></div>
<br>
<?php
$sql=mysqli_query($konek,"SELECT * FROM tb_masakan");
while ($data=mysqli_fetch_array($sql)){
?>
<table class="tmakan" style="display: inline-table;">
<tr>
	<td colspan="2"><img src="../img/" width="100" height="100"></td>
</tr>
<tr>
	<td colspan="2"><div style="font-weight: bold"><?php echo $data['nama_masakan']; ?></div></td>
</tr>
<tr>
<td>harga :</td>
<td><?php echo $data['harga']; ?></td>
</tr>
<tr>
<td>status :</td>				
<td><?php echo $data['status_masakan']; ?></td>
</tr>
</table>
<?php } ?>
</div>

<center><div id="pepe" style="margin-top: 20px;width: 100px;height: 50px;background-color: red;border-radius: 5px;border: 1px solid yellow;"><a style="color: white; text-decoration-style: none;" href="morder.php">pesan sekarang</a></div></center>
</form>
</div>
</body>
</html>