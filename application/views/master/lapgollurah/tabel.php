				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th>NIP Guru</th>
							<th>Nama Guru</th>
<!-- 							<th>Kode Golongan</th>
							<th>Pangkat</th>
							<th>Golongan</th> -->
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($data as $d) { ?>
							<tr>
								<td class="text-center" width="40px"><?= $no . '.'; ?></td>
								<td><?= $d['nip_guru'] ?></td>
								<td><?= $d['nama_guru'] ?></td>
<!-- 								<td><?= $d['kode_golongan'] ?></td>
								<td><?= $d['pangkat'] ?></td>
								<td><?= $d['golongan'] ?></td> -->
								
									
								</td>
							</tr>
						<?php $no++;
						} ?>
						
					</tbody>
					<tfoot>
					</tfoot>
				</table>