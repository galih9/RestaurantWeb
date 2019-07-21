<?php
include '../konek.php';
$id=$_GET['id'];
$query=mysqli_query($konek,"DELETE FROM tb_masakan WHERE id_masakan='$id'");
if ($query) {
  header("location: masakan.php?pesan=terhapus");
}
else{
  header("location: masakan.php?pesan=gterhapus");
}

?>