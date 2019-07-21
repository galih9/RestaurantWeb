<?php
session_start();
$masakan=$_GET['id'];
unset($_SESSION['pesanan'][$masakan]);
header("location: pesanan.php");
?>