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
  <center><div class="judul">HALAMAN KELOLA MASAKAN</div></center>
<?php
$id=$_GET['id'];
$query=mysqli_query($konek,"SELECT *FROM tb_masakan WHERE id_masakan='$id'");
while($data=mysqli_fetch_array($query)){

?>

<div class="in">
	<center><div class="judul">input masakan</div></center><br>
	<br>
<form id="form1" name="form1" method="post" action="masakan_editproses.php?id=<?php echo $data['id_masakan']; ?>" autocomplete="off">
<table width="426" >
  <tr>
    <td width="90">nama masakan</td>
    <td><label>
      <input type="text" value="<?php echo $data['nama_masakan']; ?>" style="width: 120px;" name="nama" class="inteks"  required/>
    </label></td>
  </tr>
  <tr>
    <td>harga</td>
    <td><label>
      <input type="text" value="<?php echo $data['harga'];} ?>" style="width: 120px;" name="harga" class="inteks" required/>
    </label></td>
  </tr>
  <tr>
    <td>status masakan</td>
    <td><label>
      <select name="status">
        <option value="siap">Siap</option>
        <option value="belum">Belum Siap</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td><input name="" type="submit" value="tambah" class="kirim" /></td>
    <td><input name="" type="reset" class="kirims" /></td>
  </tr>
</table>
</form>
</div>
<?php
if ($_GET['pesan']=="edited") {
  echo "masakan berhasil diperbaharui";
}
elseif ($_GET['pesan']=="gedited") {
  echo "masakan gagal diperbaharui, silahkan coba lagi";
}
elseif ($_GET['pesan']=="terhapus") {
  echo "masakan berhasil dihapus";
}
elseif ($_GET['pesan']=="gterhapus") {
  echo "masakan gagal dihapus, mohon coba lagi";
}
elseif ($_GET['pesan']=="kunses") {
  echo "masakan berhasil dibuat";
}
elseif ($_GET['pesan']=="gakunses") {
  echo "masakan gagal dibuat, mohon coba lagi";
}
?>
<br>
<div class="isi">
  <div class="cari">
    <form action="masakan.php" method="POST">
      <input type="text" style="width: 120px;" name="cari"><input type="submit" name="tcari" value="cari"><a href="masakan.php">kembali</a><br>
    </form>
  </div>
	<table class="stab">
		<tr>
			<th width="30" align="center">no</th>
      <th width="40">id masakan</th>
			<th width="180">nama masakkan</th>
			<th width="120">harga</th>
			<th width="100">status masakan</th>
      <th width="160" colspan="2">tindakan</th>
		</tr>
    <?php
$cari=$_POST['tcari'];
$car=$_POST['cari'];
  if ($cari) {
      $no=1;
      $query="SELECT * FROM tb_masakan WHERE nama_masakan LIKE '$car%'";
      $sql=mysqli_query($konek,$query);
      $cek=mysqli_num_rows($sql);
      if (!empty($cek)) {
      while ($data=mysqli_fetch_array($sql)) {
      echo "<tr>";
      echo "<td>".$no."</td>";      
      echo "<td>".$data['id_masakan']."</td>";
      echo "<td>".$data['nama_masakan']."</td>";
      echo "<td>".$data['harga']."</td>";
      echo "<td>".$data['status_masakan']."</td>";
      echo "<td><a href='masakan_edit.php?id=".$data['id_masakan']."'>edit</a></td>";
      echo "<td>";?>
        <a href="<?php echo 'masakan_hapus.php?&id='.$data['id_masakan'];?>" onclick="return confirm('yakin mau dihapus?')">
        <?php 
        echo "hapus</a></td></tr>";
      $no++;
    }
    }
    elseif(empty($cek)){
      echo "maaf";
    }
  }
  else{
    $no=1;
    $query=mysqli_query($konek,"SELECT *FROM tb_masakan");
    while ($data=mysqli_fetch_array($query)) {
      echo "<tr>";
      echo "<td  align='center'>".$no."</td>";
      echo "<td>".$data['id_masakan']."</td>";
      echo "<td>".$data['nama_masakan']."</td>";
      echo "<td>".$data['harga']."</td>";
      echo "<td>".$data['status_masakan']."</td>";
      echo "<td><a href='masakan_edit.php?id=".$data['id_masakan']."'>edit</a></td>";
      echo "<td>";?>
        <a href="<?php echo 'masakan_hapus.php?id='.$data['id_masakan'];?>" onclick="return confirm('yakin mau diahvus?')">
        <?php 
        echo "hapus</a></td></tr>";
        $no++;
    }
  }
    ?>
	</table>
</div>
</div>	
</body>
</html>