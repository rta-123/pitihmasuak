<div class="modal fade" id="modal_tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Data</h4>
			</div>
			<?= form_open('master/Sekolah/store', ['class' => 'form_create']) ?>
			<div class="modal-body">
				<div class="form-group">
					<label>Kode Sekolah</label>
					<input type="text" name="kode" class="form-control">
					<span class="error kode text-red"></span>
				</div>

				<div class="form-group">
					<label>Nama Sekolah</label>
					<input type="text" name="nama" class="form-control">
					<span class="error nama text-red"></span>
				</div>

				<div class="form-group">
					<label>Alamat Sekolah</label>
					<input type="text" name="alamat" class="form-control">
					<span class="error alamat text-red"></span>
				</div>

				<div class="form-group">
					<label>Telp Sekolah</label>
					<input type="text" name="telp" class="form-control">
					<span class="error telp text-red"></span>
				</div>

				<div class="form-group">
					<label>Jml.Guru Honorer</label>
					<input type="text" name="jmlhonor" class="form-control">
					<span class="error jmlhonor text-red"></span>
				</div>

				<div class="form-group">
					<label>Jml.Guru PNS</label>
					<input type="text" name="jmlpns" class="form-control">
					<span class="error jmlpns text-red"></span>
				</div>

				<div class="form-group">
					<label>Jml.Siswa Laki-Laki</label>
					<input type="text" name="jmllk" class="form-control">
					<span class="error jmllk text-red"></span>
				</div>

				<div class="form-group">
					<label>Jml.Siswi Perempuan</label>
					<input type="text" name="jmlpr" class="form-control">
					<span class="error jmlpr text-red"></span>
				</div>

				<div class="form-group">
					<label>Kode Kelurahan</label>
					<select class="form-control" name="kodelurah">
						<option value="">-- Pilih Kelurahan --</option>
						<?php foreach ($dlurah as $d) : ?>
							<option value="<?= $d['kode_lurah']; ?>"><?= $d['kode_lurah']."-". $d['nama_lurah']; ?></option>
						<?php endforeach; ?>
					</select>
					<span class="error kodelurah text-red"></span>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btnStore"><i class="icon-floppy-disk"></i> Simpan</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross2"></i> Close</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<script>
	$(document).on('submit', '.form_create', function(e) {
		$.ajax({
			type: "post",
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			beforeSend: function() {
				$('.btnStore').attr('disabled', 'disabled');
				$('.btnStore').html('<i class="fa fa-spin fa-spinner"></i> Sedang di Proses');
			},
			success: function(response) {
				$('.error').html('');
				if (response.status == false) {
					$.each(response.pesan, function(i, m) {
						$('.' + i).text(m);
					});
				} else {
					window.location.href = "<?= site_url('sikola') ?>";
				}
			},
			complete: function() {
				$('.btnStore').removeAttr('disabled');
				$('.btnStore').html('<i class="icon-floppy-disk"></i> Simpan');
			}
		});
		return false;
	});
</script>
