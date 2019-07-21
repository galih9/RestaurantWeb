<style type="text/css">
	.container{
		display: block;
		position: absolute;
		top: 0;
	}
	.container img{
		margin-left: 2%;
		float: left;
	}
	.container ul{
		margin-left: 180px;
	}
	.container ul li{
		list-style-type: none;
		float: left;
		width: 120px;
		height: 40px;
		background-color: #ff0000;
		border: 1px solid #ffcc00;
		border-radius: 5px;
		text-align: center;
		padding-top: 20px;
		margin-top: 10px;
	}
	.container ul li a{
		font-family: calibri;
		font-weight: bold;
		font-size: 17px;
		text-decoration: none;
		color: black;
	}
	.container ul li:hover{
		background-color: #ff6600; 
	}
</style>
<div class="container">
<p>	
</p>

<img src="../img/logo.png" width="100" height="100">
<ul>
	<li><a href="
		<?php
			if (empty($_SESSION['lvl'])) {
				header("location: ../kluar.php");
			}
			elseif ($_SESSION['lvl']==1) {
				echo '../admin/';
			}
			elseif ($_SESSION['lvl']==5) {
				echo '../pelanggan/';
			}
		?>
		index.php">HOME</a></li>
	<li><a href="about.php">ABOUT</a></li>
	<li><a href="contact.php">CONTACT</a></li>
	<li><a href="support.php">SUPPORT</a></li>
	<li><a href="../logout.php">LOGOUT</a></li>
</ul>