<html>
	<head>
		<title>
		Data Mahasiswa FTI UKSW
		</title>
	</head>
	<body>
		<h1>Data Mahasiswa FTI UKSW</h1>
		<table id="mhs" border="1" width="50%">
			<thead>
				<th>Nama</th>
				<th>NIM</th>
				<th>Action</th>
			</thead>
		</table>
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script type="text/javascript">
			$.ajax({
				url: 'http://slimframeworkcrud/index.php/show',
				type: "get",
				dataType: "json",
			   
				success: function(data) {
					drawTable(data);
				}
			});
			function drawTable(data) {
				for (var i = 0; i < data.length; i++) {
					drawRow(data[i]);
				}
			}
			function drawRow(rowData) {
				var row = $("<tr />")
				$("#mhs").append(row); 
				row.append($("<td>" + rowData.nim + "</td>"));
				row.append($("<td>" + rowData.nama + "</td>"));
				row.append($("<td><a href=''>Edit</a> ||<a href='http://slimFrameworkCRUD/index.php/hapus/"+rowData.nim+"'>Hapus</a></td>"));
			}
		</script>
	</body>
</html>