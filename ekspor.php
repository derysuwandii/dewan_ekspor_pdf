<?php
define('_MPDF_PATH','mpdf/');
include(_MPDF_PATH . "mpdf.php");

//Menggabungkan dengan file koneksi yang telah kita buat
include 'koneksi.php';


$nama_dokumen='hasil-ekspor';
$mpdf=new mPDF('utf-8', 'A4', 11, 'Georgia');
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
</head>
<body>
	<div>
		<h2>Cara Ekspor Data/Laporan ke PDF Dengan Mudah Menggunakan Mpdf pada PHP</h2>

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

	    <p>www.dewankomputer.com</p>
    </div>

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
$db1->close();
?>