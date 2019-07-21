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
<pre>
	<?php
	print_r($_SESSION);
	?>
</pre>

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
     echo "<pre>";
     echo print_r($array);
     echo "</pre>";
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
<a href="zmorder.php">pesan lagi</a>

<form method="POST" action="znuorder.php">
<input type="text" name="nmeja" required><br>
<input type="text" name="ket" required><br>

<input type="submit" value="PESAN !" name="">
</form>
</div>
</div>
</body>
</html>