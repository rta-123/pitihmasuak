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
	<h1 align="center">Laporan Data Kelurahan
		 <br>Kecamatan Padang Timur</h1>
	<h3 align="center">Kota Padang</h3>
<table align="center" width="60%" border="1">
	<thead>
		<tr>
			<th  width="5%">No.</th>
			<th width="20%">Kode Kelurahan</th>
			<th width="20%">Nama Kelurahan</th>
			<th width="10%">Jumlah SD</th>
			
			
		</tr>
	</thead>
	<tbody>
						<?php $no = 1;
						$totsd=0;

						foreach ($data as $d) { ?>
							<tr>
								<td width="40px"><?= $no . '.'; ?></td>
								<td><?= $d['kode_lurah'] ?></td>
								<td><?= $d['nama_lurah'] ?></td>
								<td><?= $d['jumlah_sd'] ?></td>
								
									
								</td>
							</tr>
						<?php $no++;
						$totsd=$totsd+$d['jumlah_sd'];
						} ?>
						
					</tbody>
	<tfoot>
						<th>
							<td colspan="2" align="right">
								Total 
							</td>	
							<td>
								<?=  $totsd ?>
							</td>
						</th>
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