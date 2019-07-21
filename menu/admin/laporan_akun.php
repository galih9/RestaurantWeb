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
<p>laporan akun</p>
<table border="1">
		<tr>
			<th width="30" align="center">no</th>
			<th width="80">id user</th>
			<th width="120">username</th>
			<th width="100">password</th>
			<th width="220">nama lengkap</th>
			<th width="120">level</th>
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
        $no++;
    }
    ?>
	</table>
</center>
<br><input id="printButton" type="button" value="print" onclick="window.print()" name=""><br>
laporan ini dibuat tanggal <?php echo tglindo(date("Y-m-d")); ?>
</body>
</html>