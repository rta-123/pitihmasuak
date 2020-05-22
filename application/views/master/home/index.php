<div class="row ">
        <div class="col-lg-2 col-xs-6">
		</div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Data Kelurahan</h3>
              <p>_</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="<?= site_url('lurah') ?>" class="small-box-footer">Lihat Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Data Golongan</h3>
              <p>_</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="<?= site_url('gol') ?>" class="small-box-footer">Lihat Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Data Kepegawaian</h3>
              <p>_</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="<?= site_url('pegawai') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
</div>



<div class="row ">
        <div class="col-lg-2 col-xs-6">
    </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Data Jenis Guru</h3>
              <p>_</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="<?= site_url('jenisgr') ?>" class="small-box-footer">Lihat Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Data Sekolah</h3>
              <p>_</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="<?= site_url('sikola') ?>" class="small-box-footer">Lihat Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Data Guru</h3>
              <p>_</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="<?= site_url('gr') ?>" class="small-box-footer">Lihat Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
</div>


<div class="row ">
        <div class="col-lg-2 col-xs-6">
    </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Data Pend. Guru</h3>
              <p>_</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="<?= site_url('pendgr') ?>" class="small-box-footer">Lihat Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
</div>


<div id="tampil_modal"></div>
<script>
	$(document).on('click', '.btntambah', function(e) {
		$.ajax({
			url: "<?= site_url('master/tahunajaran/create') ?>",
			success: function(data) {
				$('#tampil_modal').html(data);
				$('#modal_tambah').modal('show');
			}
		});
	});

	function edit(kode) {
		$.ajax({
			type: "post",
			url: "<?= site_url('master/tahunajaran/edit') ?>",
			data: "&kode=" + kode,
			cache: false,
			success: function(response) {
				$('#tampil_modal').html(response);
				$('#modal_edit').modal('show');
			}
		});
	}
</script>
