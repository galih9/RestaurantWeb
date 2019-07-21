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
$did=$_GET['id'];
ini_set("display_errors", 0);

?>
<div class="bkonten">
  <center><div class="judul">KELOLA ORDER ANDA</div></center>

<br>
<div class="isi">
<table class="stab">
    <tr>
      <th width="30" align="center">no</th>
      <th width="60">id detail order</th>
      <th width="60">nama masakan</th>
      <th width="180">keterangan</th>
      <th width="160">status detail order</th>
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
        $no++;
    }
    ?>
    <tr>
      <th colspan="3">TOTAL HARGA</th>
      <th>
<?php
$sql=mysqli_query($konek,"SELECT SUM(tb_masakan.harga) AS harga FROM tb_detail_order,tb_masakan WHERE tb_detail_order.id_order='$did' AND tb_detail_order.id_masakan=tb_masakan.id_masakan");
$data=mysqli_fetch_array($sql);
$totbay=$data['harga'];
echo $data['harga'];
?>
</th>
<th>
<?php
$cekz=$konek->query("SELECT * FROM tb_orderan WHERE id_order='$did'");
$it=$cekz->fetch_array();
if ($it['status_order']=="lunas") {
  echo "pembayaran ini sudah lunas";
}
elseif($it['status_order']=="blunas"){
  echo "orderan ini belum dibayar";
}
?>
  
</th>
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