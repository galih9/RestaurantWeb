<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		@media print {
		  #printButton {
		    display: none;
		  }
		}
	</style>
</head>
<body>
<?php
session_start();
include '../konek.php';
function tglindo($tgl)
{
	$bulan=array(
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
		 );
	$pecah=explode('-', $tgl);
	return $pecah[2]." ".$bulan[(int)$pecah[1]]." ".$pecah[0];
}
?><center>
<h3>RESTORAN McDONALD CABANG MAJENANG</h3>
<h5>CABANG MAJENANG</h5>
<p>laporan transaksi</p>
<table border="1">
	<tr>
			<th width="30" align="center">no</th>
			<th width="80">id transaksi</th>
			<th width="120">pelayanan</th>
			<th width="100">id order</th>
			<th width="220">tanggal</th>
			<th width="120">total bayar</th>
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
        $no++;
    }
  ?>
</table>
</center>
<br><input id="printButton" type="button" value="print" onclick="window.print()" name=""><br>
laporan ini dibuat tanggal <?php echo tglindo(date("Y-m-d")); ?>
</body>
</html>