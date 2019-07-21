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
<div class="teks"><div class="judul">HALAMAN KELOLA TRANSAKSI</div><br>

<?php
$id=$_GET['id'];
$query=mysqli_query($konek,"SELECT *FROM tb_transaksi WHERE id_transaksi='$id'");
while($data=mysqli_fetch_array($query)){
?>
<div class="in">
  <center><div class="judul">edit transaksi</div></center><br>
  <br>
<form id="form1" name="form1" method="post" action="transaksi_editproses.php?id=<?php echo $data['id_transaksi']; ?>" autocomplete="off">
<table width="426" border="0" >
  <tr>
    <td width="90">id user</td>
    <td><label>
      <input type="number" name="user" style="width: 120px;" class="inteks" required value="<?php echo $data['id_user']; ?>"/>
    </label></td>
  </tr>
  <tr>
    <td>id order</td>
    <td><label>
      <input type="text" name="order" style="width: 120px;" class="inteks" required value="<?php echo $data['id_order']; ?>"/>
    </label></td>
  </tr>
  <tr>
    <td>tanggal</td>
    <td><label>
      tanggal saat ini <br> <?php echo tglindo($data['tanggal']); ?><br>
      <input type="date" name="tgl" required/>
    </label></td>
  </tr>
  <tr>
    <td>total bayar</td>
    <td><label>
      <input type="number" name="totbay" style="width: 120px;" class="inteks" required value="<?php echo $data['total_bayar'];} ?>"/>
    </label></td>
  </tr>
  <tr>
    <td><input name="" type="submit" value="ubah" class="kirim" /></td>
    <td><input name="" type="reset" class="kirims" /></td>
  </tr>
</table>
</form>
</div>

<div class="isi">
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