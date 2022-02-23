<?php
//Menggabungkan dengan file koneksi yang telah kita buat
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<title>Ekspor Data PDF - www.dewankomputer.com</title>
	<style type="text/css">
		table {
			font-size: 17px;
		}
		thead {
			font-weight: bold;
			background-color: blue;
			color: white;
		}
		td {
			padding: 10px;
		}
		hr {
			margin-top: 20px;
			margin-bottom: 20px;
		}
		.download {
			background-color: green;
			color: #fff;
			border-radius: 10px;
			padding: 10px 20px 10px 20px;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<div align="center">
		<h2>Cara Ekspor Data/Laporan ke PDF Dengan Mudah Menggunakan Mpdf pada PHP</h2>
		<a href="ekspor.php">
			<button class="download">Download</button>
		</a>
		<table border="1">
	    	<thead>
	    		<tr>
	    			<td>No</td>
	    			<td>Nama Mahasiswa</td>
	    			<td>Alamat</td>
	    			<td>Jenis Kelamin</td>
	    			<td>Tanggal Masuk</td>
	    		</tr>
	    	</thead>
	    	<tbody>
				<?php
			        $no = 1;
			        $query = "SELECT * FROM tbl_mahasiswa ORDER BY nama_mahasiswa ASC";
			        $dewan1 = $db1->prepare($query);
			        $dewan1->execute();
			        $res1 = $dewan1->get_result();

			        if ($res1->num_rows > 0) {
				        while ($row = $res1->fetch_assoc()) {
				            $nama_mahasiswa = $row['nama_mahasiswa'];
				            $alamat = $row['alamat'];
				            $jenis_kelamin = $row['jenis_kelamin'];
				            $tgl_masuk = $row['tgl_masuk'];

							echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$nama_mahasiswa."</td>";
								echo "<td>".$alamat."</td>";
								echo "<td>".$jenis_kelamin."</td>";
								echo "<td>".$tgl_masuk."</td>";
							echo "</tr>";
			    	} } else { 
			    		echo "<tr>";
			    			echo "<td colspan='5'>Tidak ada data ditemukan</td>";
			    		echo "</tr>";
			     	}
			    ?>
	    	</tbody>
	    </table>
    </div><hr>

</body>
</html>