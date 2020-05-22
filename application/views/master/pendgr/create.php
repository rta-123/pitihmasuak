<div class="modal fade" id="modal_tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Data</h4>
			</div>
			<?= form_open('master/Pendguru/store', ['class' => 'form_create']) ?>
			<div class="modal-body">
				<div class="form-group">
					<label>NIP Guru</label>
					<select class="form-control" name="nippend">
						<option value="">-- Pilih NIP --</option>
						<?php foreach ($dguru as $d) : ?>
							<option value="<?= $d['nip_guru']; ?>"><?= $d['nip_guru']."-".  $d['nama_guru']; ?></option>
						<?php endforeach; ?>
					</select>
					<span class="error nippend text-red"></span>
				</div>

				<div class="form-group">
					<label>Instansi/Kampus</label>
					<input type="text" name="instansi" class="form-control">
					<span class="error instansi text-red"></span>
				</div>

				<div class="form-group">
					<label>Prodi</label>
					<input type="text" name="prodi" class="form-control">
					<span class="error prodi text-red"></span>
				</div>

				<div class="form-group">
					<label>Tahun Lulus</label>
					<input type="text" name="thnlulus" class="form-control">
					<span class="error thnlulus text-red"></span>
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
					window.location.href = "<?= site_url('pendgr') ?>";
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
