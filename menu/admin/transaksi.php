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
ini_set("display_errors", 0)
?>

<div class="konten">
<div class="teks"><div class="judul">HALAMAN KELOLA TRANSAKSI</div><br>

<div class="isi">
	<?php

	if ($_GET['pesan']=="teredit") {
		echo "transaksi berhasil diperbaharui";
	}
	elseif ($_GET['pesan']=="terhapus") {
		echo "transaksi berhasil dihapus";
	}
	elseif ($_GET['pesan']=="gteredit") {
		echo "transaksi gagal diperbaharui";
	}
	elseif ($_GET['pesan']=="gterhapus") {
		echo "transaksi gagal dihapus";
	}
	elseif ($_GET['pesan']=="selesai") {
		echo "transaksi sukses, data tersimpan di sistem kami";
	}
	elseif ($_GET['pesan']=="gselesai") {
		echo "transaksi gagal, mohon coba lagi";
	}
	?>
	<table border="1" class="stab">
		<tr>
			<th width="30" align="center">no</th>
			<th width="80">id transaksi</th>
			<th width="120">pelayanan</th>
			<th width="100">id order</th>
			<th width="220">tanggal</th>
			<th width="120">total bayar</th>
      <th width="160" colspan="2">tindakan</th>
		</tr>
<?php
    $no=1;
    $query=mysqli_query($konek,"SELECT *FROM tb_transaksi");
    while ($data=mysqli_fetch_array($query)) {
      $t=$data['id_user'];
      $sql=mysqli_query($konek,"SELECT tb_user.nama_user AS nama FROM tb_user WHERE tb_user.id_user='$t'");
      $i=$sql->fetch_array();

      echo "<tr>";
      echo "<td  align='center'>".$no."</td>";      
      echo "<td>".$data['id_transaksi']."</td>";
      echo "<td>".$i['nama']."</td>";
      echo "<td>".$data['id_order']."</td>";
      echo "<td>".tglindo($data['tanggal'])."</td>";
      echo "<td>".$data['total_bayar']."</td>";
      echo "<td><a href='transaksi_edit.php?id=".$data['id_transaksi']."'>edit</a></td>";
      echo "<td>";?>
        <a href="<?php echo 'transaksi_hapus.php?id='.$data['id_transaksi'];?>" onclick="return confirm('yakin mau diahvus?')">
        <?php 
        echo "hapus</a></td></tr>";
        $no++;
    }
  ?>
	</table>
</div>	 
</div>
</body>
</html>