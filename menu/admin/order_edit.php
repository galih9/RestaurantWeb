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

$id=$_GET['id'];
$query=mysqli_query($konek,"SELECT *FROM tb_orderan WHERE id_order='$id'");
while($data=mysqli_fetch_array($query)){

?>
<div class="konten">
  <center><div class="judul">HALAMAN KELOLA ORDERAN</div></center>
<div class="in">
	<center><div class="judul">input order</div></center><br>

<form method="POST" action="order_editproses.php?id=<?php echo $id; ?>">
  <table>
    <tr>
      <td>id order</td>
      <td><input type="text" style="width: 120px;" name="ido" value="<?php echo $data['id_order']; ?>"></td>
    </tr>
    <tr>
      <td>no meja</td>
      <td><input type="text" style="width: 120px;" name="nmeja" value="<?php echo $data['no_meja']; ?>" required></td>
    </tr>
    <tr>
      <td>tanggal</td>
      <td>tanggal saat ini :<br><?php echo tglindo($data['tanggal']); ?><br><input type="date" style="width: 120px;" name="tgl" required></td>
    </tr>
    <tr>
      <td>keterangan</td>
      <td><textarea name="ket"><?php echo $data['keterangan'];} ?></textarea></td>
    </tr>
  <tr>
    <td><input name="" type="submit" value="ubah" class="kirim" /></td>
    <td><input name="" type="reset" class="kirims" /></td>
  </tr>
  </table>
</form>


</div>
<?php
if ($_GET['pesan']=="berhasil") {
  echo "akun berhasil diperbaharui";
}
elseif ($_GET['pesan']=="gagal") {
  echo "akun gagal diperbaharui, silahkan coba lagi";
}
elseif ($_GET['pesan']=="terhapus") {
  echo "akun berhasil dihapus";
}
elseif ($_GET['pesan']=="gterhapus") {
  echo "akun gagal dihapus, mohon coba lagi";
}
elseif ($_GET['pesan']=="kunses") {
  echo "akun berhasil dibuat";
}
elseif ($_GET['pesan']=="gakunses") {
  echo "akun gagal dibuat, mohon coba lagi";
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
			<th width="110">pembeli</th>
			<th width="180">keterangan</th>
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