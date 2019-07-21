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
<div class="judul">HALAMAN KELOLA AKUN</div>
<?php

$id=$_GET['id'];
$query=mysqli_query($konek,"SELECT *FROM tb_user WHERE id_user='$id'");
while($data=mysqli_fetch_array($query)){
?>
<div class="in">
  <center><div class="judul">edit akun</div></center><br>
  <br>
<form id="form1" name="form1" method="post" action="akun_editproses.php?id=<?php echo $data['id_user']; ?>" autocomplete="off">
<table width="426" border="0" >
  <tr>
    <td width="90">username</td>
    <td><label>
      <input type="text" name="user" style="width: 120px;" class="inteks" required value="<?php echo $data['username']; ?>"/>
    </label></td>
  </tr>
  <tr>
    <td>password</td>
    <td><label>
      <input type="text" name="pass" style="width: 120px;" class="inteks" required value="<?php echo $data['password']; ?>"/>
    </label></td>
  </tr>
  <tr>
    <td>nama user</td>
    <td><label>
      <input type="text" name="nama" style="width: 120px;" class="inteks" required value="<?php echo $data['nama_user']; ?>"/>
    </label></td>
  </tr>
  <tr>
    <td>sebagai</td>
    <td><label>
      <select name="level" ontoggle="<?php echo $data['nama_level'];} ?>">
          <option value="admin">admin</option>
          <option value="owner">owner</option>
          <option value="kasir">kasir</option>
          <option value="pelayan">pelayan</option>
          <option value="pelanggan">pelanggan</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td><input name="" type="submit" value="ubah" class="kirim" /></td>
    <td><input name="" type="reset" class="kirims" /></td>
  </tr>
</table>
</form>
</div>
<br>
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

    ?>

</table>
</div>	
</body>
</html>