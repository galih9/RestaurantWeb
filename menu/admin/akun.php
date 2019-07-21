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
  <center><div class="judul">HALAMAN KELOLA AKUN</div></center>
<div class="in">
	<center><div class="judul">input akun</div></center><br>
	<br>
<form id="form1" name="form1" method="post" action="akun_entri.php" autocomplete="off">
<table width="426" border="0" >
  <tr>
    <td width="90">username</td>
    <td><label>
      <input type="text" style="width: 120px;" name="user" class="inteks"  required/>
    </label></td>
  </tr>
  <tr>
    <td>nama user</td>
    <td><label>
      <input type="text" style="width: 120px;" name="nama" class="inteks" required/>
    </label></td>
  </tr>
  <tr>
    <td>password</td>
    <td><label>
      <input type="text" style="width: 120px;" name="pass" class="inteks" required/>
    </label></td>
  </tr>
  <tr>
    <td>sebagai</td>
    <td><label>
      <select name="level">
      		<option value="admin">admin</option>
      		<option value="owner">owner</option>
      		<option value="kasir">kasir</option>
      		<option value="pelayan">pelayan</option>
      		<option value="pelanggan">pelanggan</option>
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
  <div class="cari">
    <form action="akun.php" method="POST">

      <input type="text" style="width: 120px;" name="cari"><input type="submit" name="tcari" value="cari"><a href="akun.php">kembali</a><br>
      cari berdasarkan :<select name="lewat">
        <option value="id">id user</option>
        <option value="username">username</option>
        <option value="nama">nama user</option>
      </select>
    </form>
  </div>
	<table class="stab">
		<tr>
			<th width="30" align="center">no</th>
			<th width="80">id user</th>
			<th width="120">username</th>
			<th width="100">password</th>
			<th width="220">nama lengkap</th>
			<th width="120">level</th>
      <th width="160" colspan="2">tindakan</th>
		</tr>
    <?php
$cari=$_POST['tcari'];
$car=$_POST['cari'];
$lew=$_POST['lewat'];
  if ($cari) {
      $no=1;
if ($lew=="id") {
  $query="SELECT *FROM tb_user WHERE id_user LIKE '$car%'";
}
elseif ($lew=="username") {
  $query="SELECT *FROM tb_user WHERE username LIKE '$car%'";
}
elseif ($lew=="nama") {
  $query="SELECT *FROM tb_user WHERE nama_user LIKE '$car%'";
}
      $sql=mysqli_query($konek,$query);
      $cek=mysqli_num_rows($sql);
      if (!empty($cek)) {
      while ($data=mysqli_fetch_array($sql)) {
if ($data['id_level']==1) {
  $nlevel="admin";
}
elseif ($data['id_level']==2) {
  $nlevel="owner";
}
elseif ($data['id_level']==3) {
  $nlevel="kasir";
}
elseif ($data['id_level']==4) {
  $nlevel="pelayan";
}
elseif ($data['id_level']==5) {
  $nlevel="pelanggan";
}
      echo "<tr>";
      echo "<td  align='center'>".$no."</td>";      
      echo "<td>".$data['id_user']."</td>";
      echo "<td>".$data['username']."</td>";
      echo "<td>".$data['password']."</td>";
      echo "<td>".$data['nama_user']."</td>";
      echo "<td>".$nlevel."</td>";
      echo "<td><a href='akun_edit.php?id=".$data['id_user']."'>edit</a></td>";
      echo "<td>";?>
        <a href="<?php echo 'akun_hapus.php?&id='.$data['id_user'];?>" onclick="return confirm('yakin mau diahvus?')">
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
    $query=mysqli_query($konek,"SELECT *FROM tb_user");
    while ($data=mysqli_fetch_array($query)) {
if ($data['id_level']==1) {
  $nlevel="admin";
}
elseif ($data['id_level']==2) {
  $nlevel="owner";
}
elseif ($data['id_level']==3) {
  $nlevel="kasir";
}
elseif ($data['id_level']==4) {
  $nlevel="pelayan";
}
elseif ($data['id_level']==5) {
  $nlevel="pelanggan";
}
      echo "<tr>";
      echo "<td  align='center'>".$no."</td>";      
      echo "<td>".$data['id_user']."</td>";
      echo "<td>".$data['username']."</td>";
      echo "<td>".$data['password']."</td>";
      echo "<td>".$data['nama_user']."</td>";
      echo "<td>".$nlevel."</td>";
      echo "<td><a href='akun_edit.php?id=".$data['id_user']."'>edit</a></td>";
      echo "<td>";?>
        <a href="<?php echo 'akun_hapus.php?id='.$data['id_user'];?>" onclick="return confirm('yakin mau diahvus?')">
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