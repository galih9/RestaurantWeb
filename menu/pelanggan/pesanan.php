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

$masakan=$_GET['masakan'];

if ($_GET['aksi']=="pesan") {
    if (isset($_SESSION['pesanan'])) {
    	$_SESSION['pesanan'][$masakan]+=1;
    }
    elseif(empty($_SESSION['pesanan'][$masakan])){
    $_SESSION['pesanan'][$masakan]=1;
  }
}


?>
<div class="bkonten">
<div class="bteks"><div class="bjudul">SELAMAT DATANG PELANGGAN</div><br>

<table border="1" class="stab">
  <tr>
    <th width="20">No</th>    
    <th width="100">Gambar</th>
    <th width="120">Nama Masakan</th>
    <th width="100">Harga</th>
    <th width="40">Tindakan</th>
  </tr>
  <?php 
  $nomor=1;
  	foreach ($_SESSION['pesanan'] as $masakan => $value):
     $ambil=$konek->query("SELECT * FROM tb_masakan WHERE id_masakan='$masakan'");
     $array=$ambil->fetch_assoc();
    ?>
  <tr>
    <td><?php echo $nomor; ?></td>
    <td><img width="100" height="100" src="../img/" ></td>
    <td><?php echo $array['nama_masakan']; ?></td>
    <td>Rp. <?php echo number_format($array['harga']); ?></td>
    <td><a href="horder.php?id=<?php echo $masakan; ?>">Batal</a></td>
  </tr>
  <?php $nomor++; ?>
<?php endforeach ?>
</table>
<br>
<br>
<a href="morder.php">pesan lagi</a>

<form method="POST" action="nuorder.php">
<table>
<tr>
<td>masukan nomor meja</td> <td><input type="text" style="width: 20px;" name="nmeja" required></td>
</tr>
<tr>
<td>keterangan </td><td><input type="text" style="width: 120px;height: 30px;" name="ket" required></td>
</tr>
<tr>
<td>
<input type="submit" class="kirim" value="PESAN !" name=""></td>
<td><button class="kirims"><a style="text-decoration:none;color: white;" href="index.php?aksi=batbel">batal beli</a></button></td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>