<!DOCTYPE html>
<html>
<head>
	<title>Selamat datang</title>
	<link rel="stylesheet" type="text/css" href="../asset /style.css">
</head>
<body>
<?php
session_start();
include '../konek.php';
include '../asset/adsidebar.php';
include '../asset/header.php';

?>

<div class="konten">
<div class="teks"><div class="judul">SELAMAT DATANG ADMIN</div><br>

	<table>
	<tr>
		<th>Nama masakan</th>
		<th>Harga</th>
		<th>Status</th>
	</tr>
		<?php
		$sql=mysqli_query($konek,"SELECT * FROM tb_masakan");
		while ($data=mysqli_fetch_array($sql)){ ?>
					<tr>
				<td><?php echo $data['nama_masakan']; ?></td>
				<td><?php echo $data['harga']; ?></td>				
				<td><?php echo $data['status_masakan']; ?></td>
			</tr>
<?php
}
?>

		</table>
</div>	 
</div>
</body>
</html>