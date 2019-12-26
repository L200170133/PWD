<?php
	session_start();
	if ($_SESSION['status']!="member") {
		header("location:loginbanyak.php?pesan=gagal");
	}
?>

<html>
    <head>
        <title>Halaman Admin</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="atasadmin">
            <p>WELCOME TO HALAMAN MEMBER</p>
        </div>
        <div class="bawahadmin">
            <p>Halo <?= $_SESSION['nama']; ?></p>
            <p>Anda Login sebagai member</p>
            <a href="logoutbanyak.php">LOGOUT</a>
        </div>
    </body>
</html>