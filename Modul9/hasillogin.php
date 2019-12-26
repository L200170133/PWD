<?php
	session_start();
	echo "Anda berhasil login sebagai ".$_SESSION['username'].". Dan anda terdaftar sebagai ".$_SESSION['status'];
?>
<br>
Silahkan logout <a href="logout.php">di sini</a>