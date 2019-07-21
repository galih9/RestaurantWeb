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
</style>

<div class="container">
<p>	
<?php
if (empty($_SESSION['user'])) {
	header("location: ../gagal.php");
}
$nama=$_SESSION['user'];
function tglindo($tgl)
{
	$bulan=array(
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
		 );
	$pecah=explode('-', $tgl);
	return $pecah[2]." ".$bulan[(int)$pecah[1]]." ".$pecah[0];
}
?>
</p>
<img src="../img/logo.png" width="100" height="100">
<ul>
	<li><a href="index.php">HOME</a></li>
	<li><a href="../fitur/about.php">ABOUT</a></li>
	<li><a href="../fitur/contact.php">CONTACT</a></li>
	<li><a href="../fitur/support.php">SUPPORT</a></li>
	<li><a href="../logout.php">LOGOUT</a></li>
</ul>
</div>