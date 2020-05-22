<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<a href="<?= site_url('master/Lapgurusekolah/cetak') ?>" class="btn bg-aqua"><i class="fa fa-print">Cetak Laporan</i></a>
				<a href="<?= site_url('Home') ?>" class="btn bg-yellow"><i class="fa fa-backward">Kembali</i></a>

				<center><h2><b>Laporan Data Guru per Sekolah</b></h2></center>
				<center><h4><b>Kecamatan Padang Timur</b></h4></center>
				<center><h4><b>Kota Padang</b></h4></center>
				<hr>
					<div class="col-lg-1 col-xs-6">
						<div style="height: 7px"></div>
    					<div class="form-group">
							<label>Kode Sekolah</label>
						</div>
						<div style="height: 7px"></div>
    					<div class="form-group">
							<label>Nama Sekolah</label>
						</div>	
					</div>
					<div class="col-lg-3 col-xs-6">
    					<div class="form-group">
							<select class="form-control" name="kodesekolah">
						<option value="">-- Pilih Kode Sekolah --</option>
						<?php foreach ($dsekolah as $d) : ?>
							<option value="<?= $d['kode_sekolah']; ?>"><?=$d['kode_sekolah']; ?></option>
						<?php endforeach; ?>
					</select>
					
							<span class="error kodelurah text-red"></span>
						</div>
						<div class="form-group">
							<select class="form-control" name="namasekolah">
						<option value="">-- Pilih Nama Sekolah --</option>
						<?php foreach ($dsekolah as $d) : ?>
							<option value="<?= $d['kode_sekolah']; ?>"><?= $d['nama_sekolah']; ?></option>
						<?php endforeach; ?>
					</select>
							<span class="error namasekolah text-red"></span>
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
							<th>NIP Guru</th>
							<th>Nama Guru</th>
							<th>Alamat</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>No Telpon</th>
							<th>Jenis Kelamin</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($data as $d) { ?>
							<tr>
								<td class="text-center" width="40px"><?= $no . '.'; ?></td>
								<td><?= $d['kode_sekolah'] ?></td>
								<td><?= $d['nama_sekolah'] ?></td>
								<td><?= $d['nip_guru'] ?></td>
								<td><?= $d['nama_guru'] ?></td>
								<td><?= $d['alamat_guru'] ?></td>
								<td><?= $d['tmp_lahir_guru'] ?></td>
								<td><?= $d['tgl_lahir_guru'] ?></td>
								<td><?= $d['telp_guru'] ?></td>
								<td><?= $d['jenkel_guru'] ?></td>
								
									
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

