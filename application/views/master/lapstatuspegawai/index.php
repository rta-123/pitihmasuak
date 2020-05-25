<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<a href="<?= site_url('master/Lapstatuspegawai/cetak') ?>" class="btn bg-aqua"><i class="fa fa-print">Cetak Laporan</i></a>
				<a href="<?= site_url('Home') ?>" class="btn bg-yellow"><i class="fa fa-backward">Kembali</i></a>

				<center><h2><b>Laporan Data berdasarkan Status Kepegawaian</b></h2></center>
				<center><h4><b>Kecamatan Padang Timur</b></h4></center>
				<center><h4><b>Kota Padang</b></h4></center>
				<hr>
					<div class="col-lg-2 col-xs-6">
						<div style="height: 7px"></div>
    					<div class="form-group">
							<label>Kode Kepegawaian</label>
						</div>

						<div style="height: 7px"></div>
    					<div class="form-group">
							<label>Status Kepegawaian</label>
						</div>	
					</div>
					<div class="col-lg-3 col-xs-6">
    					<div class="form-group">
							<select class="form-control" name="kodepegawai">
						<option value="">-- Pilih Kode Kepegawaian --</option>
						<?php foreach ($dpegawai as $d) : ?>
							<option value="<?= $d['kode_pegawai']; ?>"><?=$d['kode_pegawai']; ?></option>
						<?php endforeach; ?>
					</select>
						</div>

						<div class="form-group">
							<select class="form-control" name="kodegol">
						<option value="">-- Pilih Status Kepegawaian --</option>
						<?php foreach ($dpegawai as $d) : ?>
							<option value="<?= $d['kode_pegawai']; ?>"><?=$d['status_pegawai']; ?></option>
						<?php endforeach; ?>
					</select>
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
							<th>NIP Guru</th>
							<th>Nama Guru</th>
							<th>Kode Kepegawaian</th>
							<th>Status Kepegawaian</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($data as $d) { ?>
							<tr>
								<td class="text-center" width="40px"><?= $no . '.'; ?></td>
								<td><?= $d['nip_guru'] ?></td>
								<td><?= $d['nama_guru'] ?></td>
								<td><?= $d['kode_pegawai'] ?></td>
								<td><?= $d['status_pegawai'] ?></td>
								
									
								</td>
							</tr>
						<?php $no++;
						} ?>
						
					</tbody>
					<tfoot>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="tampil_modal"></div>

