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
include '../asset/bheader.php';
ini_set("display_errors", 0);
$us=$_SESSION['id'];
?>

<div class="bkonten">
<div class="bteks"><div class="judul">KELOLA TRANSAKSI ANDA</div><br>

<div class="isi">

<table class="stab">
		<tr>
			<th width="30" align="center">no</th>
			<th width="60">id order</th>
			<th width="60">no meja</th>
			<th width="100">tanggal</th>
			<th width="80">pembeli</th>
			<th width="180">keterangan</th>
      <th width="120">Status order</th>
      <th width="110">tindakan</th>
		</tr>
<?php
    $no=1;
    $query=mysqli_query($konek,"SELECT *FROM tb_orderan WHERE id_user='$us'");
    while ($data=mysqli_fetch_array($query)) {
      $t=$data['id_user'];
      $sql=mysqli_query($konek,"SELECT tb_user.nama_user AS nama FROM tb_user WHERE tb_user.id_user='$us'");
      $i=$sql->fetch_array();

      echo "<tr>";
      echo "<td  align='center'>".$no."</td>";      
      echo "<td>".$data['id_order']."</td>";
      echo "<td>".$data['no_meja']."</td>";
      echo "<td>".tglindo($data['tanggal'])."</td>";
      echo "<td>".$i['nama']."</td>";
      echo "<td>".$data['keterangan']."</td>";
if ($data['status_order']=="lunas") {
echo "<td>lunas</td>";
}
elseif($data['status_order']=="blunas"){
echo "<td>belum lunas</td>";
}
      echo "<td><a href='riwayat_detail.php?id=".$data['id_order']."'>lihat detail</a></td>";
        $no++;
    }
    ?>
	</table>
</div>	 
</div>
</body>
</html>