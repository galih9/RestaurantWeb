<?php
include '../konek.php';
session_start();
$id=$_GET['id'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$nama=$_POST['nama'];
$lvl=$_POST['level'];

if ($lvl=="admin") {
	$level=1;
}
elseif ($lvl=="owner") {
	$level=2;
}
elseif ($lvl=="kasir") {
	$level=3;
}
elseif ($lvl=="pelayan") {
	$level=4;
}
elseif ($lvl=="pelanggan") {
	$level=5;
}

$input=mysqli_query($konek,"UPDATE tb_user SET username='$user',password='$pass',nama_user='$nama',id_level='$level' WHERE id_user='$id'");
if ($input) {
  header("location: akun.php?pesan=berhasil");
}
else{
  header("location: akun.php?pesan=gagal");
}


?>