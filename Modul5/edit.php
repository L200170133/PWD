<?php
	$conn = mysqli_connect('localhost', 'root', '', 'informatika');
	$nim = $_GET['nim'];
	$cari = "SELECT * FROM `mahasiswa` WHERE nim = '$nim'";
	$hasil = mysqli_query($conn, $cari);
	$data = mysqli_fetch_array($hasil);

	function active_radio_button($value, $input){
		$result = $value==$input?'checked':'';
		return $result;
	}

		if ($data > 0) {
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
</head>
<body>
	<h3>FORM MAHASISWA</h3>
	<table>
		<form method="POST" action="edit.php">
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td>
					<input type="text" name="nim" size="10" value="<?php echo $data['nim']?>">
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<input type="text" name="nama" size="30" value="<?php echo $data['nama']?>">
				</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td>
					<input type="radio" name="kelas" value="A" <?php echo active_radio_button("A", $data['kelas'])?>>A
					<input type="radio" name="kelas" value="B" <?php echo active_radio_button("B", $data['kelas'])?>>B
					<input type="radio" name="kelas" value="C" <?php echo active_radio_button("C", $data['kelas'])?>>C
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="alamat" size="40" value="<?= $data['alamat']?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Kirimkan"></td>
			</tr>
		</form>
	</table>
<?php
}
?>
<?php
	error_reporting(E_ALL^E_NOTICE);
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$alamat = $_POST['alamat'];
	$submit = $_POST['submit'];
	$update = "UPDATE mahasiswa set nim='$nim', nama='$nama', kelas='$kelas', alamat='$alamat' WHERE nim = '$nim'";
	if ($submit) {
			if ($nim == '') {
				echo "NIM tidak boleh kosong";
			} elseif ($nama == '') {
				echo "Nama tidak boleh kosong";
			} elseif ($alamat == '') {
				echo "Alamat tidak boleh kosong";
			} else {
				mysqli_query($conn,$update);
				echo "
					<script>
					alert('data berhasil diupdate');
					document.location.href='form.php';
					</script>";
			}	
		}
?>
</body>
</html>