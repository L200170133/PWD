<?php
	session_start();
	error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
	$conn = mysqli_connect('localhost', 'root', '', 'informatika');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$submit = $_POST['submit'];
	if ($submit) {
		$sql = "select * from user where username = '$username' and password = '$password'";
		$query = mysqli_query($conn, $sql);
		$cek = mysqli_num_rows($query);
		if ($cek > 0) {
			$row = mysqli_fetch_assoc($query);
			if ($row['status'] == 'admin') {
				$_SESSION['username'] = $row['username'];
                $_SESSION['status'] = "admin";
                $_SESSION['nama'] = $row['nama'];
				header("location: halamanadmin.php");
			} elseif ($row['status'] == 'member') {
				$_SESSION['username'] = $row['username'];
                $_SESSION['status'] = "member";
                $_SESSION['nama'] = $row['nama'];
				header("location: halamanmember.php");
			} 
		} else{
			echo "<script>
			alert('Gagal Login');
			document.location = 'loginbanyak.php'
			</script>";
		}
	}
?>

<form method="POST" action="loginbanyak.php">
	<p align="center">
		username : <input type="text" name="username"><br>
		password : <input type="password" name="password"><br>
		<input type="submit" name="submit">
	</p>
</form>