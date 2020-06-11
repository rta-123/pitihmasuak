<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<a href="#" class="btn bg-aqua"><i class="fa fa-print cetak">Cetak Laporan</i></a>
				<a href="<?= site_url('Home') ?>" class="btn bg-yellow"><i class="fa fa-backward">Kembali</i></a>

				<center><h2><b>Laporan Data Guru Berdasarkan Pangkat per Sekolah</b></h2></center>
				<center><h4><b>Kecamatan Padang Timur</b></h4></center>
				<center><h4><b>Kota Padang</b></h4></center>
				<hr>
					<div class="col-lg-1 col-xs-6">
						<div style="height: 7px"></div>
    					<div class="form-group">
							<label>Kode/Nama Sekolah</label>
						</div>

						<div style="height: 7px"></div>
    					<div class="form-group">
							<label>Pangkat</label>
						</div>	
					</div>
					<div class="col-lg-3 col-xs-6">
    					<div class="form-group">
							<select class="form-control kode_sekolah" name="kode_sekolah">
						<option value="">-- Pilih Kode Sekolah --</option>
						<?php foreach ($dsikola as $d) : ?>
							<option value="<?= $d['kode_sekolah']; ?>"><?=$d['kode_sekolah']; ?>/<?=$d['nama_sekolah']; ?></option>
						<?php endforeach; ?>
					</select>
						</div>

						<div class="form-group">
							<select class="form-control kode_golongan" name="kode_golongan">
						<option value="">-- Pilih Pangkat --</option>
						<?php foreach ($dgolongan as $d) : ?>
							<option value="<?= $d['kode_golongan']; ?>"><?=$d['pangkat']; ?></option>
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
                    url: '<?= site_url('master/Lappangkatsekolah/tabel')  ?>',
                    type: "post",
                    cache: false,
                    success: function(response) {
                    	$('.tampil_tabel').html(response);
                    	// alert("Bisa");
                    }
                });

	   	$(document).on('change', '.kode_sekolah', function(e) {
 		let kode= "&a=" +$('.kode_sekolah').val()+"&b=" +$('.kode_golongan').val();
	          $.ajax({
                    url: '<?= site_url('master/Lappangkatsekolah/tabel_kode')  ?>',
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
 		let kode= "&a=" +$('.kode_sekolah').val()+"&b=" +$('.kode_golongan').val();
	          $.ajax({
                    url: '<?= site_url('master/Lappangkatsekolah/tabel_kode')  ?>',
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
 		let kode= "/" +$('.kode_sekolah').val()+"/" +$('.kode_golongan').val();
                    	    setTimeout(function() {
                                window.location.href = '<?= site_url('master/Lappangkatsekolah/cetak')?>'+kode;
                            }, 100);

	});
	});

</script>
