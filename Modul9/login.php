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
		$row = mysqli_fetch_array($query);
		if ($row['username'] != '') {
			$_SESSION['username']=$row['username'];
			$_SESSION['status']=$row['status'];
			echo 
			"<script>
			alert('anda login sebagai $row[username]');
			document.location = 'hasillogin.php';
			</script>";
		} else{
			echo 
			"<script>
			alert('Gagal Login');
			document.location = 'login.php';
			</script>";
		}
	}
?>

<form method="POST" action="login.php">
		username : <input type="text" name="username"><br>
		password : <input type="password" name="password"><br>
		<input type="submit" name="submit">
	</p>
</form>