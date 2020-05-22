<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<a href="<?= site_url('master/Lapsekolahkelurahan/cetak') ?>" class="btn bg-aqua"><i class="fa fa-print">Cetak Laporan</i></a>
				<a href="<?= site_url('Home') ?>" class="btn bg-yellow"><i class="fa fa-backward">Kembali</i></a>

				<center><h2><b>Laporan Data Sekolah per Kelurahan</b></h2></center>
				<center><h4><b>Kecamatan Padang Timur</b></h4></center>
				<center><h4><b>Kota Padang</b></h4></center>
				<hr>
					<div class="col-lg-1 col-xs-6">
						<div style="height: 7px"></div>
    					<div class="form-group">
							<label>Kode Kelurahan</label>
						</div>
						<div style="height: 7px"></div>
    					<div class="form-group">
							<label>Kode Sekolah</label>
						</div>	
					</div>
					<div class="col-lg-3 col-xs-6">
    					<div class="form-group">
							<select class="form-control" name="kodelurah">
						<option value="">-- Pilih Kelurahan --</option>
						<?php foreach ($dlurah as $d) : ?>
							<option value="<?= $d['kode_lurah']; ?>"><?= $d['kode_lurah']."-". $d['nama_lurah']; ?></option>
						<?php endforeach; ?>
					</select>
					
							<span class="error kodelurah text-red"></span>
						</div>
						<div class="form-group">
							<select class="form-control" name="kodsekolah">
						<option value="">-- Pilih Sekolah --</option>
						<?php foreach ($dsekolah as $d) : ?>
							<option value="<?= $d['kode_sekolah']; ?>"><?= $d['kode_sekolah']."-". $d['nama_sekolah']; ?></option>
						<?php endforeach; ?>
					</select>
							<span class="error kodesekolah text-red"></span>
						</div>
					</div>
				</hr>
			</div>
			<div class="box-body table-responsive">
				<?= $this->session->flashdata('pesan'); ?>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th>Kode Sekolah</th>
							<th>Nama Sekolah</th>
							<th>Alamat Sekolah</th>
							<th>No Telpon</th>
							<th>Jumlah Guru Honor</th>
							<th>Jumlah Guru PNS</th>
							<th>Jumlah Siswa Laki-Laki</th>
							<th>Jumlah Siswi Perempuan</th>
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
								<td class="text-center" width="40px"><?= $no . '.'; ?></td>
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
							<td colspan="4" align="center">
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
			</div>
		</div>
	</div>
</div>

<div id="tampil_modal"></div>

