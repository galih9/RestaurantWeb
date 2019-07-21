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

ini_set("display_errors", 0);

?>
<div class="konten">
  <center><div class="judul">HALAMAN KELOLA ORDERAN</div></center>
<div class="in">
	<center><div class="judul">input order</div><br>
	<br>
<a href="zmorder.php">klik disini untuk mengorder</a></center>
</div>
<?php
if ($_GET['pesan']=="berhasil") {
  echo "order berhasil diperbaharui";
}
elseif ($_GET['pesan']=="gagal") {
  echo "order gagal diperbaharui, silahkan coba lagi";
}
elseif ($_GET['pesan']=="terhapus") {
  echo "order berhasil dihapus";
}
elseif ($_GET['pesan']=="gterhapus") {
  echo "order gagal dihapus, mohon coba lagi";
}
elseif ($_GET['pesan']=="order") {
  echo "order ditambahkan";
}
?>
<br>
<div class="isi">
<table class="stab">
		<tr>
			<th width="30" align="center">no</th>
			<th width="60">id order</th>
			<th width="60">no meja</th>
			<th width="100">tanggal</th>
			<th width="80">pembeli</th>
			<th width="180">keterangan</th>
      <th width="80">Status order</th>
      <th width="220" colspan="3">tindakan</th>
		</tr>
<?php
    $no=1;
    $query=mysqli_query($konek,"SELECT *FROM tb_orderan");
    while ($data=mysqli_fetch_array($query)) {
      $t=$data['id_user'];
      $sql=mysqli_query($konek,"SELECT tb_user.nama_user AS nama FROM tb_user WHERE tb_user.id_user='$t'");
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
      echo "<td><a href='dorder.php?id=".$data['id_order']."'>lihat detail</a></td>";
      echo "<td><a href='order_edit.php?id=".$data['id_order']."'>edit</a></td>";
      echo "<td>";?>
        <a href="<?php echo 'order_hapus.php?id='.$data['id_order'];?>" onclick="return confirm('yakin mau diahvus?')">
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