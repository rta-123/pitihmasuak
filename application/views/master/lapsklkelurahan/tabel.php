				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th>Kode Sekolah</th>
							<th>Nama Sekolah</th>
							<th>Alamat Sekolah</th>
							<th>No Telpon</th>
							<th>Jumlah Guru Honor</th>
							<th>Jumlah Guru PNS</th>
							<th>Jumlah Siswa Laki-Laki</th>
							<th>Jumlah Siswi Perempuan</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						$tothonor=0;
						$totpns=0;
						$totlk=0;
						$totpr=0;
						foreach ($data as $d) { ?>
							<tr>
								<td class="text-center" width="40px"><?= $no . '.'; ?></td>
								<td><?= $d['kode_sekolah'] ?></td>
								<td><?= $d['nama_sekolah'] ?></td>
								<td><?= $d['alamat_sekolah'] ?></td>
								<td><?= $d['telp_sekolah'] ?></td>
								<td><?= $d['jml_guru_honor'] ?></td>
								<td><?= $d['jml_guru_pns'] ?></td>
								<td><?= $d['jml_siswa_lk'] ?></td>
								<td><?= $d['jml_siswa_pr'] ?></td>
								
									
								</td>
							</tr>
						<?php $no++;
						$tothonor=$tothonor+$d['jml_guru_honor'];
						$totpns=$totpns+$d['jml_guru_pns'];
						$totlk=$totlk+$d['jml_siswa_lk'];
						$totpr=$totpr+$d['jml_siswa_pr'];
						} ?>
						
					</tbody>
					<tfoot>
						<th>
							<td colspan="4" align="center">
								<b>Total</b> 
							</td>	
							<td>
								<b><?=  $tothonor ?></b>
							</td>
							<td>
								<b><?=  $totpns ?></b>
							</td>
							<td>
								<b><?=  $totlk ?></b>
							</td>
							<td>
								<b><?=  $totpr ?></b>
							</td>
						</th>
					</tfoot>
				</table>