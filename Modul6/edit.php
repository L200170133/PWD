<?php
	$conn = mysqli_connect('localhost', 'root', '', 'databuku');
	$kode_buku = $_GET['kode_buku'];
	$cari = "SELECT buku.kode_buku, buku.nama_buku, jenis_buku.kode_jenis, jenis_buku.nama_jenis FROM buku INNER JOIN jenis_buku ON buku.kode_jenis = jenis_buku.kode_jenis WHERE buku.kode_buku = '$kode_buku'";
	$hasil = mysqli_query($conn, $cari);
	$data = mysqli_fetch_array($hasil);
	$kode_jenis = $data['kode_jenis'];

	if ($data > 0) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Buku</title>
</head>
<body>
	<h3>FORM MAHASISWA</h3>
	<table border="0" width="30%">
			<h3>Edit Data Buku</h3>
			<form method="POST" action="edit.php">
				<tr>
					<td width="25%">Kode Buku</td>
					<td width="5%">:</td>
					<td width="65%">
						<input type="text" name="kodebuku" size="10" value="<?= $data['kode_buku'];?>">
					</td>
				</tr>
				<tr>
					<td width="25%">Nama Buku</td>
					<td width="5%">:</td>
					<td width="65%"d width="65%">
						<input type="text" name="namabuku" size="10" value="<?= $data['nama_buku'];?>">
					</td>
				</tr>
				<tr>
					<td width="25%">Jenis Buku</td>
					<td width="5%">:</td>
					<td width="65%">
						<select name="jenisbuku" id="jenisbuku">
                        <?php
	                        $jenis = "SELECT * FROM jenis_buku WHERE kode_jenis = '$kode_jenis'";
	                        $query = mysqli_query($conn, $jenis);
	                        $data=mysqli_fetch_array($query);

	                        echo "<option value='$data[kode_jenis]' selected>$data[nama_jenis]</option>";
	                    	
	                    	$jenis = "SELECT * FROM jenis_buku WHERE kode_jenis != '$kode_jenis'";
	                    	$query = mysqli_query($conn, $jenis);
	                    	while ($data=mysqli_fetch_array($query)) {
	                    		echo "<option value='$data[kode_jenis]'>$data[nama_jenis]</option>";
                    		} 
                    	?>
                    	</select>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit" value="Edit">
					</td>
				</tr>
			</form>
		</table>
<?php
}
?>
<?php
	error_reporting(E_ALL^E_NOTICE);
	$kodebuku = $_POST['kodebuku'];
	$namabuku = $_POST['namabuku'];
	$jenisbuku = $_POST['jenisbuku'];
	$submit = $_POST['submit'];
	$update = "UPDATE `buku` SET nama_buku='$namabuku', kode_jenis='$jenisbuku' WHERE kode_buku = '$kodebuku'";
	if ($submit) {
			if ($kodebuku == '') {
				echo "NIM tidak boleh kosong";
			} elseif ($namabuku == '') {
				echo "Nama tidak boleh kosong";
			} else {
				mysqli_query($conn,$update);
				echo "
					<script>
					document.location.href='form.php';
					</script>";
			}	
		}
?>
</body>
</html>