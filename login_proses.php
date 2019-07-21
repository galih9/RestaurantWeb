<?php
session_start();
include 'konek.php';

$user=$_POST['user'];
$pass=$_POST['pass'];

$sql=mysqli_query($konek,"SELECT * FROM tb_user WHERE username='$user' AND password='$pass'");
$cek=mysqli_num_rows($sql);
$data=mysqli_fetch_array($sql);

if ($cek) {
	$level=$data["id_level"];
	if ($level==1) {
		$_SESSION['user']=$data['username'];
		$_SESSION['id']=$data['id_user'];
		$_SESSION['lvl']=$data['id_level'];
		header("location: menu/admin/index.php");
	}
	elseif ($level==2) {
		$_SESSION['user']=$data['username'];
		$_SESSION['id']=$data['id_user'];
		$_SESSION['lvl']=$data['id_level'];
		header("location: menu/kasir/index.php");
	}
	elseif ($level==3) {
		$_SESSION['user']=$data['username'];
		$_SESSION['id']=$data['id_user'];
		$_SESSION['lvl']=$data['id_level'];
		header("location: menu/owner/index.php");
	}
	elseif ($level==4) {
		$_SESSION['user']=$data['username'];
		$_SESSION['id']=$data['id_user'];
		$_SESSION['lvl']=$data['id_level'];
		header("location: menu/pelayan/index.php");
	}
	elseif ($level==5) {
		$_SESSION['user']=$data['username'];
		$_SESSION['id']=$data['id_user'];
		$_SESSION['lvl']=$data['id_level'];
		header("location: menu/pelanggan/index.php");
	}
}
else{
	header("location: login.php?pesan=gagal");
}
?>