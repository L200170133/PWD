<!DOCTYPE html>
<html>
<head>
	<title>Data Buku</title>
</head>
<?php
	$conn = mysqli_connect('localhost','root','','databuku');
?>
<body>
	<center>
		
		<table border="0" width="30%">
			<h3>Masukkan Data Buku</h3>
			<form method="POST" action="form.php">
				<tr>
					<td width="25%">Kode Buku</td>
					<td width="5%">:</td>
					<td width="65%">
						<input type="text" name="kodebuku" size="10">
					</td>
				</tr>
				<tr>
					<td width="25%">Nama Buku</td>
					<td width="5%">:</td>
					<td width="65%"d width="65%">
						<input type="text" name="namabuku" size="10">
					</td>
				</tr>
				<tr>
					<td width="25%">Jenis Buku</td>
					<td width="5%">:</td>
					<td width="65%">
						<select name="jenisbuku">
							<?php
								$sql = "SELECT * FROM `jenis_buku`";
								$retval = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_array($retval)) {
									echo "<option value='$row[kode_jenis]'>$row[nama_jenis]</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit" value="Masukkan Data">
					</td>
				</tr>
			</form>
		</table>
		<?php
			error_reporting(E_ALL ^ E_NOTICE);
			$kodebuku = $_POST['kodebuku'];
			$namabuku = $_POST['namabuku'];
			$jenisbuku = $_POST['jenisbuku'];
			$submit = $_POST['submit'];
			$input = "INSERT INTO `buku`(`kode_buku`, `nama_buku`, `kode_jenis`) VALUES ('$kodebuku','$namabuku','$jenisbuku')";

			if ($submit) {
				mysqli_query($conn, $input);
				echo "<br>Data berhasil dimasukkan";
			}
		?>
		<h3>Data Buku</h3>
		<table border="1" width="70%">
			<tr>
				<th align="center" width="20%">Kode Buku</th>
				<th align="center" width="30%">Nama Buku</th>
				<th align="center" width="20%">Jenis Buku</th>
				<th align="center" width="10%">Edit</th>
				<th align="center" width="10%">Hapus</th>
			</tr>
		
			<?php
				$cari = "SELECT * FROM `buku`, `jenis_buku` WHERE `buku`.`kode_jenis`=`jenis_buku`.`kode_jenis`";
				$hasil = mysqli_query($conn, $cari);
				while ($row = mysqli_fetch_array($hasil)) {
					echo "
					<tr>
						<td width='20%'>$row[kode_buku]</td>
						<td width='30%'>$row[nama_buku]</td>
						<td width='20%'>$row[nama_jenis]</td>
						<td width='10%' align='center'><a href='edit.php?kode_buku=$row[kode_buku]'>Edit</a></td>
						<td width='10%' align='center'><a href='hapus.php?kode_buku=$row[kode_buku]'>Hapus</a></td>
					</tr>
					";
				}
			?>
		</table>
	</center>
</body>
</html>