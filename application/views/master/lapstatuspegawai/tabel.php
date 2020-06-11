				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th>NIP Guru</th>
							<th>Nama Guru</th>
							<!-- <th>Kode Kepegawaian</th> -->
					<!-- 		<th>Status Kepegawaian</th> -->
							<th>No SK</th>
							<th>Nama Diklat</th>
							<th>Tahun Diklat</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($data as $d) { ?>
							<tr>
								<td class="text-center" width="40px"><?= $no . '.'; ?></td>
								<td><?= $d['nip_guru'] ?></td>
								<td><?= $d['nama_guru'] ?></td>
								<!-- <td><?= $d['kode_pegawai'] ?></td> -->
								<!-- <td><?= $d['status_pegawai'] ?></td> -->
								<td><?= $d['no_sk_guru'] ?></td>
								<td><?= $d['nama_diklat_guru'] ?></td>
								<td><?= $d['thn_diklat_guru'] ?></td>
								
									
								</td>
							</tr>
						<?php $no++;
						} ?>
						
					</tbody>
					<tfoot>
						
					</tfoot>
				</table>