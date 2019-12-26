<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
</head>
	<?php
		$conn = mysqli_connect('localhost', 'root', '', 'informatika');
	?>
<body>
	<center>
	<h3>Masukkan Data Mahasiswa</h3>
	<table border="0" width="30%">
		<form method="POST" action="form.php">
			<tr>
				<td width="25%">NIM</td>
				<td width="5%">:</td>
				<td width="65%">
					<input type="text" name="nim" size="10">
				</td>
			</tr>
			<tr>
				<td width="25%">Nama</td>
				<td width="5%">:</td>
				<td width="65%">
					<input type="text" name="nama" size="30">
				</td>
			</tr>
			<tr>
				<td width="25%">Kelas</td>
				<td width="5%">:</td>
				<td width="65%">
					<input type="radio" name="kelas" value="A" checked>A
					<input type="radio" name="kelas" value="B">B
					<input type="radio" name="kelas" value="C">C
				</td>
			</tr>
			<tr>
				<td width="25%">Alamat</td>
				<td width="5%">:</td>
				<td width="65%"><input type="text" name="alamat" size="40"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Kirimkan"></td>
			</tr>
		</form>
	</table>

	<?php
		error_reporting(E_ALL^E_NOTICE);
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$kelas = $_POST['kelas'];
		$alamat = $_POST['alamat'];
		$submit = $_POST['submit'];
		$input = "insert into mahasiswa (nim, nama, kelas, alamat) VALUES ('$nim', '$nama', '$kelas', '$alamat')";
		if ($submit) {
			if ($nim == '') {
				echo "NIM tidak boleh kosong";
			} elseif ($nama == '') {
				echo "Nama tidak boleh kosong";
			} elseif ($alamat == '') {
				echo "Alamat tidak boleh kosong";
			} else {
				mysqli_query($conn,$input);
			}	
		}
	?>
	<hr>
	<h3>Data Mahasiswa</h3>
	<table border="1" width="50%">
		<tr>
			<td align="center" width="15%"><b>NIM</b></td>
			<td align="center" width="20%"><b>Nama</b></td>
			<td align="center" width="10%"><b>Kelas</b></td>
			<td align="center" width="25%"><b>Alamat</b></td>
			<td align="center" width="15%"><b>Edit</b></td>
			<td align="center" width="15%"><b>Hapus</b></td>
		</tr>

		<?php
			$cari = "select * from mahasiswa order by nim";
			$hasil_cari = mysqli_query($conn, $cari);
			while ($data = mysqli_fetch_row($hasil_cari)) {
				echo "
				<tr>
					<td width='15%' align='center'>$data[0]</td>
					<td width='20%' align='center'>$data[1]</td>
					<td width='10%' align='center'>$data[2]</td>
					<td width='25%' align='center'>$data[3]</td>
					<td width='15%' align='center'><a href='edit.php?nim=$data[0]'>Edit</td>
					<td width='15%' align='center'><a href='hapus.php?nim=$data[0]'>Hapus</td>
				</tr>
				";
			}
		?>
	</table>
	</center>
</body>
</html>