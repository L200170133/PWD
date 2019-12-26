<?php
	$conn = mysqli_connect('localhost', 'root', '', 'databuku');
	$kode_buku = $_GET['kode_buku'];
	$hapus = "DELETE FROM buku WHERE kode_buku='$kode_buku'";
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