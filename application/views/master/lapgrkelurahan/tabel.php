				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th>NIP Guru</th>
							<th>Nama Guru</th>
							<th>Alamat </th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>No Telpon</th>
							<th>Jenis Kelamin</th>
							<th>Status Kepegawaian</th>
							<th>Jenis Guru</th>
							<th>Jabatan</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($data as $d) { ?>
							<tr>
								<td class="text-center" width="40px"><?= $no . '.'; ?></td>
								<td><?= $d['nip_guru'] ?></td>
								<td><?= $d['nama_guru'] ?></td>
								<td><?= $d['alamat_guru'] ?></td>
								<td><?= $d['tmp_lahir_guru'] ?></td>
								<td><?= $d['tgl_lahir_guru'] ?></td>
								<td><?= $d['telp_guru'] ?></td>
								<td><?= $d['jenkel_guru'] ?></td>
								<td><?= $d['status_pegawai'] ?></td>
								<td><?= $d['nama_matapelajaran'] ?></td>
								<td><?= $d['jabatan_guru'] ?></td>
								
									
								</td>
							</tr>
						<?php $no++;
						} ?>
						
					</tbody>
					<tfoot>
					</tfoot>
				</table>