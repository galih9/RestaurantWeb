<?php
include '../konek.php';
$user=$_POST['user'];
$pass=$_POST['pass'];
$nama=$_POST['nama'];
$tlevel=$_POST['level'];
if ($tlevel=="admin") {
	$level=1;
}
elseif ($tlevel=="owner") {
	$level=2;
}
elseif ($tlevel=="kasir") {
	$level=3;
}
elseif ($tlevel=="pelayan") {
	$level=4;
}
elseif ($tlevel=="pelanggan") {
	$level=5;
}

$input=mysqli_query($konek,"INSERT INTO tb_user(username,password,nama_user,id_level) VALUES('$user','$pass','$nama','$level') ");
if ($input) {
  header("location: akun.php?pesan=kunses");
}
else{
  header("location: akun.php?pesan=gakunses");
}

?>