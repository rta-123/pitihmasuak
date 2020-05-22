<table>
					<thead>
						<tr>
							<th>No.</th>
							<th>Kode Kelurahan</th>
							<th>Nama Kelurahan</th>
							<th>Jumlah SD</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						$totsd=0;

						foreach ($data as $d) { ?>
							<tr>
								<td width="40px"><?= $no . '.'; ?></td>
								<td><?= $d['kode_lurah'] ?></td>
								<td><?= $d['nama_lurah'] ?></td>
								<td><?= $d['jumlah_sd'] ?></td>
								
									
								</td>
							</tr>
						<?php $no++;
						$totsd=$totsd+$d['jumlah_sd'];
						} ?>
						
					</tbody>
					<tfoot>
						<th>
							<td colspan="2" align="right">
								Total 
							</td>	
							<td>
								<?=  $totsd ?>
							</td>
						</th>
					</tfoot>
				</table>