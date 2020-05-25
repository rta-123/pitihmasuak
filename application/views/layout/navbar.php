<?php $urls = $this->uri->segment(1) ?>
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
	<ul class="nav navbar-nav">
		<li class="<?= $urls == "welcome" ? "active" : null ?>"><a href="<?= site_url('home') ?>"><i class="icon-home4"></i> Home</a></li>
		<?php //if ($urls == null) {
		?>
		<li class="dropdown <?= $urls == "List_Card" || $urls == "List_Guest"  ? "active" : null ?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-gear"></i> 
				Option's 
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li class="<?= $urls == "List_Guest" ? "active" : null ?>">
					<a href="<?= site_url('lurah') ?>">
						<i class="fa fa-list"></i> 
							Data Kelurahan
					</a>
				</li>
				<li class="<?= $urls == "List_Card" ? "active" : null ?>">
					<a href="<?= site_url('gol') ?>">
						<i class="fa fa-list"></i> 
							Data Golongan
					</a>
				</li>
				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('pegawai') ?>"><i class="fa fa-list"></i>
							Data Kepegawaian
					</a>
				</li>
				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('jenisgr') ?>"><i class="fa fa-list"></i>
							Data Jenis Guru
					</a>
				</li>
				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('sikola') ?>"><i class="fa fa-list"></i>
							Data Sekolah
					</a>
				</li>
				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('gr') ?>"><i class="fa fa-list"></i>
							Data Guru
					</a>
				</li>
				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('pendgr') ?>"><i class="fa fa-list"></i>
							Data Pend.Guru
					</a>
				</li>
			</ul>
		</li>




		<li class="dropdown <?= $urls == "List_Card" || $urls == "List_Guest"  ? "active" : null ?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-gear"></i> 
				Report's
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('laplurah') ?>">
						<i class="fa fa-file-text"></i> 
							Laporan Data Kelurahan
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lapsikola') ?>"><i class="fa fa-file-text"></i>
							Laporan Data Sekolah
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lapsklkelurahan') ?>"><i class="fa fa-file-text"></i>
							Laporan Data Sekolah per Kelurahan
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lapgr') ?>"><i class="fa fa-file-text"></i>
							Laporan Data Guru
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lapgrsekolah') ?>"><i class="fa fa-file-text"></i>
							Laporan Data Guru per Sekolah
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lapgrkelurahan') ?>"><i class="fa fa-file-text"></i>
							Laporan Data Guru per Kelurahan
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lapgol') ?>"><i class="fa fa-file-text"></i>
							Laporan Pangkat dan Golongan Guru
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lappangkat') ?>"><i class="fa fa-file-text"></i>
							Laporan Data berdasarkan Pangkat
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lappangkatlurah') ?>"><i class="fa fa-file-text"></i>
							Laporan Data berdasarkan Pangkat per Kelurahan
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lappangkatsekolah') ?>"><i class="fa fa-file-text"></i>
							Laporan Data berdasarkan Pangkat per Sekolah
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lapberdasarkangol') ?>"><i class="fa fa-file-text"></i>
							Laporan Data berdasarkan Golongan
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lapgollurah') ?>"><i class="fa fa-file-text"></i>
							Laporan Data berdasarkan Golongan per Kelurahan
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lapgolskl') ?>"><i class="fa fa-file-text"></i>
							Laporan Data berdasarkan Golongan per Sekolah
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lappegawai') ?>"><i class="fa fa-file-text"></i>
							Laporan Data Kepegawaian
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lapstatuspegawai') ?>"><i class="fa fa-file-text"></i>
							Laporan Data berdasarkan Status Kepegawaian
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lapstatuspegawaiskl') ?>"><i class="fa fa-file-text"></i>
							Laporan Data berdasarkan Status Kepegawaian per Sekolah
					</a>
				</li>

				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('lapstatuspegawailurah') ?>"><i class="fa fa-file-text"></i>
							Laporan Data berdasarkan Status Kepegawaian per Kelurahan
					</a>
				</li>
			</ul>
		</li>


		
	</ul>
</div>
