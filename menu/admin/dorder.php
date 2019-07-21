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
$did=$_GET['id'];
ini_set("display_errors", 0);

?>
<div class="konten">
  <center><div class="judul">HALAMAN KELOLA DETAIL ORDER</div></center>
<div class="in">
  <center><div class="judul">input order</div></center><br>
  <br>
<form method="POST" action="dorder_order.php?id=<?php echo $did ?>">
  <table>
    <tr>
      <td>Nama masakan</td>
      <td>
        <select name="mas">
<?php
$mlist=mysqli_query($konek,"SELECT * FROM tb_masakan");
while ($data=mysqli_fetch_array($mlist)) {
  echo "<option value='".$data['id_masakan']."'>";
  echo $data['nama_masakan']."</option>";
}
?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td><textarea name="ket"></textarea></td>
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
  echo "detail order berhasil diperbaharui";
}
elseif ($_GET['pesan']=="gagal") {
  echo "detail order gagal diperbaharui, silahkan coba lagi";
}
elseif ($_GET['pesan']=="terhapus") {
  echo "detail order berhasil dihapus";
}
elseif ($_GET['pesan']=="gterhapus") {
  echo "detail order gagal dihapus, mohon coba lagi";
}
elseif ($_GET['pesan']=="hidang") {
  echo "orderan sukses dihidangkan";
}
elseif ($_GET['pesan']=="ghidang") {
  echo "orderan gagal dihidangkan";
}
?>
<br>
<div class="isi">
<table class="stab">
    <tr>
      <th width="30" align="center">no</th>
      <th width="60">id detail order</th>
      <th width="60">nama masakan</th>
      <th width="180">keterangan</th>
      <th width="160">status detail order</th>
      <th width="220" colspan="3">tindakan</th>
    </tr>
<?php
    $no=1;
    $query=mysqli_query($konek,"SELECT *FROM tb_detail_order WHERE id_order='$did' ");
    while ($data=mysqli_fetch_array($query)) {
      $t=$data['id_masakan'];
      $sql=mysqli_query($konek,"SELECT tb_masakan.nama_masakan AS nama FROM tb_masakan WHERE tb_masakan.id_masakan='$t'");
      $i=$sql->fetch_array();

      echo "<tr>";
      echo "<td  align='center'>".$no."</td>";      
      echo "<td>".$data['id_detail_order']."</td>";
      echo "<td>".$i['nama']."</td>";
      echo "<td>".$data['keterangan']."</td>";
      echo "<td>".$data['status_detail_order']."</td>";

if ($data['status_detail_order']!="selesai") {
  echo "<td><a href='dorder_hidang.php?id=".$data['id_detail_order']."'>hidangkan</a></td>";
}
      echo "<td><a href='dorder_edit.php?id=".$data['id_detail_order']."'>edit</a></td>";
      echo "<td>";?>
        <a href="<?php echo 'dorder_hapus.php?id='.$data['id_detail_order'];?>" onclick="return confirm('yakin mau diahvus?')">
        <?php 
        echo "hapus</a></td></tr>";
        $no++;
    }
    ?>
    <tr>
      <td colspan="5">TOTAL HARGA</td>
      <td>
<?php
$sql=mysqli_query($konek,"SELECT SUM(tb_masakan.harga) AS harga FROM tb_detail_order,tb_masakan WHERE tb_detail_order.id_order='$did' AND tb_detail_order.id_masakan=tb_masakan.id_masakan");
$data=mysqli_fetch_array($sql);
$totbay=$data['harga'];
echo $data['harga'];
?>
</td>
<td>
<?php
$cekz=$konek->query("SELECT * FROM tb_orderan WHERE id_order='$did'");
$it=$cekz->fetch_array();
if ($it['status_order']=="lunas") {
  echo "pembayaran ini sudah lunas";
}
elseif($it['status_order']=="blunas"){
  echo "<a href='dorder_lunasi.php?id=".$did."&totbay=".$totbay."'>lunasi pembayaran</a>";
}
?>
  
</td>
</tr>
  </table>
  <pre>
    <?php print_r($_SESSION);

    ?>
  </pre>
</div>
</div>  
</body>
</html>