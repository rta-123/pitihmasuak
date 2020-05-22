<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<a href="<?= site_url('master/Lapkelurahan/cetak') ?>" class="btn bg-aqua"><i class="fa fa-print">Cetak Laporan</i></a>
				<a href="<?= site_url('Home') ?>" class="btn bg-yellow"><i class="fa fa-backward">Kembali</i></a>

				<center><h2><b>Laporan Data Kelurahan</b></h2></center>
				<center><h4><b>Kecamatan Padang Timur</b></h4></center>
				<center><h4><b>Kota Padang</b></h4></center>
			</div>
			<div class="box-body table-responsive">
				<?= $this->session->flashdata('pesan'); ?>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th>Kode Kelurahan</th>
							<th>Nama Kelurahan</th>
							<th>Jumlah SD</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						$totsd=0;
						foreach ($data as $d) { ?>
							<tr>
								<td class="text-center" width="40px"><?= $no . '.'; ?></td>
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
			</div>
		</div>
	</div>
</div>

<div id="tampil_modal"></div>

