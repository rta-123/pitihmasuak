<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<a href="#" class="btn bg-aqua cetak"><i class="fa fa-print">Cetak Laporan</i></a>
				<a href="<?= site_url('Home') ?>" class="btn bg-yellow"><i class="fa fa-backward">Kembali</i></a>

				<center><h2><b>Laporan Data Guru per Kelurahan</b></h2></center>
				<center><h4><b>Kecamatan Padang Timur</b></h4></center>
				<center><h4><b>Kota Padang</b></h4></center>
				<hr>
					<div class="col-lg-1 col-xs-6">
						<div style="height: 7px"></div>
    					<div class="form-group">
							<label>Kode Kelurahan</label>
						</div>
						<div style="height: 7px"></div>
<!--     					<div class="form-group">
							<label>Nama Kelurahan</label>
						</div> -->	
					</div>
					<div class="col-lg-3 col-xs-6">
    					<div class="form-group">
							<select class="form-control kodelurah" name="kodelurah">
						<option value="">-- Pilih Kode Kelurahan --</option>
						<?php foreach ($dlurah as $d) : ?>
							<option value="<?= $d['kode_lurah']; ?>"><?=$d['kode_lurah']; ?>-<?= $d['nama_lurah']; ?></option>
						<?php endforeach; ?>
					</select>
					
							<span class="error kodelurah text-red"></span>
						</div>
<!-- 						<div class="form-group">
							<select class="form-control namalurah" name="namalurah">
						<option value="">-- Pilih Nama Kelurahan --</option>
						<?php foreach ($dlurah as $d) : ?>
							<option value="<?= $d['nama_lurah']; ?>"><?= $d['nama_lurah']; ?></option>
						<?php endforeach; ?>
					</select>
							<span class="error namalurah text-red"></span>
						</div> -->
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
                    url: '<?= site_url('master/Lapgurukelurahan/tabel')  ?>',
                    type: "post",
                    cache: false,
                    success: function(response) {
                    	$('.tampil_tabel').html(response);
                    	// alert("Bisa");
                    }
                });
 	$(document).on('change', '.namalurah', function(e) {
 		let kode= "&a=" +$('.kodelurah').val()+"&b=" +$('.namalurah').val();

	          $.ajax({
                    url: '<?= site_url('master/Lapgurukelurahan/tabel_kode')  ?>',
                    type: "post",
                    data: kode,
                    cache: false,
                    success: function(response) {
                    	$('.tampil_tabel').html('');
                    	$('.tampil_tabel').html(response);
                    }
                });

	});
	   	$(document).on('change', '.kodelurah', function(e) {
 		let kode= "&a=" +$('.kodelurah').val()+"&b=" +$('.namalurah').val();
	          $.ajax({
                    url: '<?= site_url('master/Lapgurukelurahan/tabel_kode')  ?>',
                    type: "post",
                    data: kode,
                    cache: false,
                    success: function(response) {
                    			// alert("Kode Sekolah harus dipilih !");
                    	
                    	$('.tampil_tabel').html('');
                    	$('.tampil_tabel').html(response);
                    }
                });

	});
	   		$(document).on('click', '.cetak', function(e) {
 		let kode= "/" +$('.kodelurah').val();
                    	    setTimeout(function() {
                                window.location.href = '<?= site_url('master/Lapgurukelurahan/cetak')?>'+kode;
                            }, 100);

	});
	});

</script>
