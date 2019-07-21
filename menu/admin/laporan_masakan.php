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
<p>laporan masakan</p>
<table border="1">
		<tr>
			<th width="30" align="center">no</th>
      <th width="40">id masakan</th>
			<th width="180">nama masakkan</th>
			<th width="120">harga</th>
			<th width="100">status masakan</th>
		</tr>
    <?php
    $no=1;
    $query=mysqli_query($konek,"SELECT *FROM tb_masakan");
    while ($data=mysqli_fetch_array($query)) {
      echo "<tr>";
      echo "<td  align='center'>".$no."</td>";
      echo "<td>".$data['id_masakan']."</td>";
      echo "<td>".$data['nama_masakan']."</td>";
      echo "<td>".$data['harga']."</td>";
      echo "<td>".$data['status_masakan']."</td>";
        $no++;
    }
    ?>
	</table>
</center>
<br>
<input id="printButton" type="button" value="print" onclick="window.print()" name=""><br>
laporan ini dibuat tanggal <?php echo tglindo(date("Y-m-d")); ?>
</body>
</html>