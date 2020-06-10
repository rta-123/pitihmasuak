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
	<h1 align="center">Laporan Data Guru per Sekolah
		 <br>Kecamatan Padang Timur</h1>
	<h3 align="center">Kota Padang</h3>
<table align="center" width="60%" border="1">
	<thead>
		<tr>
			<th  width="5%">No.</th>
			<th width="20%">NIP Guru</th>
			<th width="20%">Nama Guru</th>
			<th width="20%">Alamat Guru</th>
			<th width="15%">Tempat Lahir</th>
			<th width="20%">Tanggal Lahir</th>
			<th width="15%">No Telpon</th>
			<th width="15%">Jenis Kelamin</th>
			<th width="20%">Status Kepegawaian</th>
			<th width="20%">Jenis Guru</th>
			<th width="20%">Jabatan</th>


			
			
		</tr>
	</thead>
	<tbody>
						<?php $no = 1;
						
						foreach ($data as $d) { ?>
							<tr>
								<td width="40px"><?= $no . '.'; ?></td>
								<td><?= $d['nip_guru'] ?></td>
								<td><?= $d['nama_guru'] ?></td>
								<td><?= $d['alamat_guru'] ?></td>
								<td><?= $d['tmp_lahir_guru'] ?></td>
								<td><?= $d['tgl_lahir_guru'] ?></td>
								<td><?= $d['telp_guru'] ?></td>
								<td><?= $d['jenkel_guru'] ?></td>
								<td><?= $d['status_pegawai'] ?></td>
								<td><?= $d['nama_matapelajaran'] ?></td>
								<td><?= $d['jabatan_guru'] ?></td>
								
									
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