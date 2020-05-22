<div class="modal fade" id="modal_edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Update Data</h4>
			</div>
			<?= form_open('master/Pendguru/update', ['id' => 'edit', 'class' => 'form_edit'], ['kode' => $data['nip_pend_guru']]) ?>
			<div class="modal-body">
				<div class="form-group">
					<label>NIP Guru</label>
					<input type="text" name="nippend" class="form-control" value="<?= $data['nip_pend_guru'] ?>" readonly="disabled">
					<span class="error nippend text-red"></span>
				</div>

				<div class="form-group">
					<label>Instansi/Kampus</label>
					<input type="text" name="instansi" class="form-control" value="<?= $data['instansi_pend_guru'] ?>">
					<span class="error instansi text-red"></span>
				</div>

				<div class="form-group">
					<label>Prodi</label>
					<input type="text" name="prodi" class="form-control" value="<?= $data['prodi_pend_guru'] ?>">
					<span class="error prodi text-red"></span>
				</div>

				<div class="form-group">
					<label>Tahun Lulus</label>
					<input type="text" name="thnlulus" class="form-control" value="<?= $data['thn_lulus_pend_guru'] ?>">
					<span class="error thnlulus text-red"></span>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btnUpdate"><i class="icon-floppy-disk"></i> Update</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross2"></i> Close</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<script>
	$(document).on('submit', '.form_edit', function(e) {
		$.ajax({
			type: "post",
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			beforeSend: function() {
				$('.btnUpdate').attr('disabled', 'disabled');
				$('.btnUpdate').html('<i class="fa fa-spin fa-spinner"></i> Sedang di Proses');
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
				$('.btnUpdate').removeAttr('disabled');
				$('.btnUpdate').html('<i class="icon-floppy-disk"></i> Update');
			}
		});
		return false;
	});
</script>
