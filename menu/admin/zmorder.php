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
include '../asset/header.php';

?>
<div class="bkonten">
<div class="bteks"><div class="bjudul">SELAMAT DATANG PELANGGAN</div><br>
<pre>
	<?php
	print_r($_SESSION);
	?>
</pre>
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
<tr>
	<td colspan="2"><a href="zpesanan.php?aksi=pesan&masakan=<?php echo $data['id_masakan']; ?>">pesan</a></td>
</tr>
</table>
<?php } ?>
<br>

</div>	 
</div>
</body>
</html>