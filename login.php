<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style_login.css">
</head>
<body>
<center>
<div class="container">
<div class="judul">
<p>LOGIN</p>
</div>
<p class="pesan">
<?php
ini_set("display_errors", 0);
if ($_GET['pesan']=="belum_login") {
	echo "Anda harus login dulu";
}
elseif ($_GET['pesan']=="gagal") {
	echo "username atau password salah";
}
elseif ($_GET['pesan']=="logout") {
	echo "anda berhasil logout";
}
?>
</p>
<form method="POST" action="login_proses.php">
	<input class="input" type="text" name="user" placeholder="username anda"><br>
	<input class="input" type="password" name="pass" placeholder="password anda"><br>
	<input class="tombol" type="submit" value="Login">
	<input class="tombol" type="reset" value="reset">
</form>
<a href="index.php">kembali ke halaman utama</a>
</div>
</center>
</body>
</html>