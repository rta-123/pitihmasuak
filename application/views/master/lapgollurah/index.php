<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<a href="#" class="btn bg-aqua"><i class="fa fa-print cetak">Cetak Laporan</i></a>
				<a href="<?= site_url('Home') ?>" class="btn bg-yellow"><i class="fa fa-backward">Kembali</i></a>

				<center><h2><b>Laporan Data berdasarkan Golongan per Kelurahan</b></h2></center>
				<center><h4><b>Kecamatan Padang Timur</b></h4></center>
				<center><h4><b>Kota Padang</b></h4></center>
				<hr>
					<div class="col-lg-1 col-xs-6">
						<div style="height: 7px"></div>
    					<div class="form-group">
							<label>Kode/Nama Kelurahan</label>
						</div>

						<div style="height: 7px"></div>
    					<div class="form-group">
							<label>Golongan</label>
						</div>	
					</div>
					<div class="col-lg-3 col-xs-6">
    					<div class="form-group">
							<select class="form-control kode_lurah" name="kode_lurah">
						<option value="">-- Pilih Kode Kelurahan --</option>
						<?php foreach ($dlurah as $d) : ?>
							<option value="<?= $d['kode_lurah']; ?>"><?=$d['kode_lurah']; ?>-<?=$d['nama_lurah']; ?></option>
						<?php endforeach; ?>
					</select>
						</div>

						<div class="form-group">
							<select class="form-control kode_golongan" name="kode_golongan">
						<option value="">-- Pilih Golongan --</option>
						<?php foreach ($dgolongan as $d) : ?>
							<option value="<?= $d['kode_golongan']; ?>"><?=$d['golongan']; ?></option>
						<?php endforeach; ?>
					</select>
						</div>
					</div>
				</hr>
			</div>
			<div class="box-body table-responsive">
				<?= $this->session->flashdata('pesan'); ?>
				<div  class="tampil_tabel">cssc</div>

			</div>
		</div>
	</div>
</div>

<div id="tampil_modal"></div>

<script type="text/javascript">
	$(document).ready( function(e) {
	$.ajax({
                    url: '<?= site_url('master/Lapgollurah/tabel')  ?>',
                    type: "post",
                    cache: false,
                    success: function(response) {
                    	$('.tampil_tabel').html(response);
                    	// alert("Bisa");
                    }
                });

	   	$(document).on('change', '.kode_lurah', function(e) {
 		let kode= "&a=" +$('.kode_lurah').val()+"&b=" +$('.kode_golongan').val();
	          $.ajax({
                    url: '<?= site_url('master/Lapgollurah/tabel_kode')  ?>',
                    type: "post",
                    data: kode,
                    cache: false,
                    success: function(response) {
                    	// alert("Golongan harus dipilih");
                    	$('.tampil_tabel').html('');
                    	$('.tampil_tabel').html(response);
                    }
                });

	});
	   		   	$(document).on('change', '.kode_golongan', function(e) {
 		let kode= "&a=" +$('.kode_lurah').val()+"&b=" +$('.kode_golongan').val();
	          $.ajax({
                    url: '<?= site_url('master/Lapgollurah/tabel_kode')  ?>',
                    type: "post",
                    data: kode,
                    cache: false,
                    success: function(response) {
                    	// alert("Golongan harus dipilih");
                    	$('.tampil_tabel').html('');
                    	$('.tampil_tabel').html(response);
                    }
                });


	});
	   		$(document).on('click', '.cetak', function(e) {
 		let kode= "/" +$('.kode_lurah').val()+"/" +$('.kode_golongan').val();
                    	    setTimeout(function() {
                                window.location.href = '<?= site_url('master/Lapgollurah/cetak')?>'+kode;
                            }, 100);

	});
	});

</script>