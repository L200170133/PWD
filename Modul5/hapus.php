<?php
	$conn = mysqli_connect('localhost', 'root', '', 'informatika');
	$nim = $_GET['nim'];
	$hapus = "DELETE FROM mahasiswa WHERE nim='$nim'";
	$data = mysqli_query($conn, $hapus);

	if ($data > 0) {
		echo "<script>
			alert('data berhasil dihapus');
			document.location.href='form.php';
			</script>";
	} else{
		echo "<script>
			alert('data gagal dihapus');
			document.location.href='form.php';
			</script>";
	}
?>