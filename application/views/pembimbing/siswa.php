<div class="col-md-12 col-sm-12 ">
	
	<div class="x_panel">
		<div class="x_title">
			<h2>History Keluar Komplek</h2>
			<div class="clearfix"></div>
			<?php
				$announce = $this->session->flashdata('announce');
				if(!empty($announce)){
					
						echo '
							<div class="alert alert-success">
							'.$announce.'
							</div>
						';
				}
			?>

		</div>
		<div class="x_content">
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box table-responsive">
						<table id="datatable" class="table table-striped table-bordered" style="width:100%">

							<thead>
								<tr>
									<th>No</th>
									<th>Nomor Induk</th>
									<th>Nama Siswa</th>
									<th>Kelas</th>
									<th>Keluar Komplek</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($siswa)) : ?>
								<?php foreach ($siswa as $m) : 
								?>
								<tr>
                                    <td><?= $no; ?></td>
									<td><?= $m['nomor_induk']?></td>
									<td><?= $m['nama_siswa']?></td>
									<td><?= $m['nama_rombel']?></td>
									<td><?= $m['total']. ' Kali'?></td>
									<td>
                                        <a href="<?= base_url('Izin-keluar-komplek-by-id/'.encrypt_url($m['siswa_id']));?>" class="btn btn-sm btn-success fa fa-eye"></a>
                                    </td> 
								</tr>
								<?php $no++; endforeach ?>
								<?php else: ?>
								<tr>
									<td colspan="9" align="center">Tidak Ada Data</td>
								</tr>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
