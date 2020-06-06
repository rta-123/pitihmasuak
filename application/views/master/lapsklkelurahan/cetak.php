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
	<h1 align="center">Laporan Data Sekolah per Kelurahan
		 <br>Kecamatan Padang Timur</h1>
	<h3 align="center">Kota Padang</h3>
<table align="center" width="60%" border="1">
	<thead>
		<tr>
			<th  width="5%">No.</th>
			<th width="15%">Kode Sekolah</th>
			<th width="20%">Nama Sekolah</th>
			<th width="20%">Alamat Sekolah</th>
			<th width="15%">Telp Sekolah</th>
			<th width="12%">Jml.Guru Honor</th>
			<th width="12%">Jml.Guru PNS</th>
			<th width="15%">Jml.Siswa Laki-Laki</th>
			<th width="15%">Jml.Siswi Perempuan</th>


			
			
		</tr>
	</thead>
	<tbody>
						<?php $no = 1;
						$tothonor=0;
						$totpns=0;
						$totlk=0;
						$totpr=0;
						foreach ($data as $d) { ?>
							<tr>
								<td width="40px"><?= $no . '.'; ?></td>
								<td><?= $d['kode_sekolah'] ?></td>
								<td><?= $d['nama_sekolah'] ?></td>
								<td><?= $d['alamat_sekolah'] ?></td>
								<td><?= $d['telp_sekolah'] ?></td>
								<td><?= $d['jml_guru_honor'] ?></td>
								<td><?= $d['jml_guru_pns'] ?></td>
								<td><?= $d['jml_siswa_lk'] ?></td>
								<td><?= $d['jml_siswa_pr'] ?></td>
								
									
								</td>
							</tr>
						<?php $no++;
						$tothonor=$tothonor+$d['jml_guru_honor'];
						$totpns=$totpns+$d['jml_guru_pns'];
						$totlk=$totlk+$d['jml_siswa_lk'];
						$totpr=$totpr+$d['jml_siswa_pr'];
						} ?>
						
					</tbody>
	<tfoot>
						<th>
							<td colspan="4" align="right">
								<b>Total</b> 
							</td>	
							<td>
								<b><?=  $tothonor ?></b>
							</td>
							<td>
								<b><?=  $totpns ?></b>
							</td>
							<td>
								<b><?=  $totlk ?></b>
							</td>
							<td>
								<b><?=  $totpr ?></b>
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