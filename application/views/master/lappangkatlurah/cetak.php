<?php //ob_start(); ?>
<!DOCTYPE html>

<html>
<head>
	<title>Laporan </title>
	<style>

 table {border-collapse:collapse; table-layout:fixed;}
 table td {word-wrap:break-word;text-align: center;}

 </style>
</head>
<body onload="window.print()">
	<h1 align="center">Laporan Data berdasarkan Pangkat per Kelurahan
		 <br>Kecamatan Padang Timur</h1>
	<h3 align="center">Kota Padang</h3>
<table align="center" width="60%" border="1">
	<thead>
		<tr>
			<th  width="5%">No.</th>
			<th width="20%">NIP Guru</th>
			<th width="20%">Nama Guru</th>
<!-- 			<th width="15%">Kode Golongan</th>
			<th width="12%">Pangkat</th>
			<th width="12%">Golongan</th> -->


			
			
		</tr>
	</thead>
	<tbody>
						<?php $no = 1;
						
						foreach ($data as $d) { ?>
							<tr>
								<td width="40px"><?= $no . '.'; ?></td>
								<td><?= $d['nip_guru'] ?></td>
								<td><?= $d['nama_guru'] ?></td>
<!-- 								<td><?= $d['kode_golongan'] ?></td>
								<td><?= $d['pangkat'] ?></td>
								<td><?= $d['golongan'] ?></td> -->
								
									
								</td>
							</tr>
						<?php $no++;
						
						} ?>
						
					</tbody>
	<tfoot>
						
					</tfoot>
</table>
<center><br>Padang,
<?php echo date('d-M-yy') ?>
<br><br><br><br>
<u>(......................................)</u><br>
<b>Ketua Pengurus</b></center>
</body>
</html>
<?php
// $html = ob_get_contents();
// ob_end_clean();
// require_once('html2pdf/html2pdf.class.php');
// $pdf = new HTML2PDF('P','A4','en');
// $pdf->WriteHTML($html);
// $pdf->Output('Laporan File.pdf', 'D');
?>