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
<p>laporan detail order</p>
<table border="1">
    <tr>
      <th width="30" align="center">no</th>
      <th width="60">id detail order</th>
      <th width="60">nama masakan</th>
      <th width="180">keterangan</th>
      <th width="160">status detail order</th>
    </tr>
<?php
    $no=1;
    $query=mysqli_query($konek,"SELECT *FROM tb_detail_order");
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
	</table>
</center>
<br><input type="button" id="printButton" value="print" onclick="window.print()" name=""><br>
laporan ini dibuat tanggal <?php echo tglindo(date("Y-m-d")); ?>
</body>
</html>