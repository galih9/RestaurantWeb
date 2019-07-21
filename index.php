<!DOCTYPE html>
<html>
<head>
	<title>Selamat datang</title>
<style type="text/css">
	.container{
		display: block;
		position: absolute;
		top: 0;
	}
	.container img{
		margin-left: 5%;
		float: left;
	}
	.container ul{
		margin-left: 120px;
	}
	.container ul li{
		list-style-type: none;
		float: left;
		width: 120px;
		height: 40px;
		background-color: #ff0000;
		border: 1px solid #ffcc00;
		border-radius: 5px;
		text-align: center;
		padding-top: 20px;
		margin-top: 10px;
	}
	.container ul li a{
		font-family: calibri;
		font-weight: bold;
		font-size: 17px;
		text-decoration: none;
		color: white;
	}
	.container ul li:hover{
		background-color: #ff6600; 
	}
.bkonten{
	width: 90%;
	padding-bottom: 50px;
	background-color:rgba(255, 204, 0,0.7);
	border-radius: 5px;
	margin-top: 180px;
	border: 1px solid #ff0000;
	margin-left: 5%;
	margin-right: 5%;
}
.bkonten .bteks{
	margin-top: 5px;
	margin-left: 7px;
}
.bjudul{
	font-family: calibri;
	font-size: 20px;
	text-align: center;
}
body{
	/*background-image: url(img/bg.jpg);*/
	background-size: 100%;
	font-family: calibri;
	
}
body a{
	text-decoration: none;
}
</style>

</head>
<body>
<?php
session_start();
include 'konek.php';
ini_set("display_errors", 0);

?>

<div class="container">
<p>	
<?php
$nama=$_SESSION['user'];
?>
</p>
<img src="menu/img/logo.png" width="100" height="100">
<ul>
	<li><a href="login.php?pesan=belum_login">HOME</a></li>
	<li><a href="menu/fitur/about.php">ABOUT</a></li>
	<li><a href="menu/fitur/contact.php">CONTACT</a></li>
	<li><a href="menu/fitur/support.php">SUPPORT</a></li>
	<li><a href="login.php">LOG IN</a></li>
</ul>
</div>


<div class="bkonten">
<div class="bteks"><div class="bjudul">SELAMAT DATANG PELANGGAN</div><br>
</div>
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

<center><div style="margin-top: 20px;width: 100px;height: 50px;background-color: red;border-radius: 5px;border: 1px solid yellow;"><a style="color: white; text-decoration-style: none;" href="login.php">Login sekarang</a></div></center>
</div>
</body>
</html>