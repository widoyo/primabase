<html>
	<head>
		<title>
		Update Data Mahasiswa FTI UKSW
		</title>
	</head>
	<body>
		<h1>Update Data Mahasiswa FTI UKSW</h1>
		<?php
			$nim =$_GET['nim'];
		?>
		<form id="form" method = "POST" action="http://slimframeworkcrud/update/<?php echo $nim ?>">
			<table>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="nama"/></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" value="update"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>