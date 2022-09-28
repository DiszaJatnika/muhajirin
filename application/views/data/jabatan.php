<div class="col-md-12 col-sm-12 ">
	<br><br>
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Jabatan</h2>

			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="<?php echo base_url('Master-jabatan-tambah')?>">
						<button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</button>
					</a>
				</li>
			</ul>
			<div class="clearfix"></div>
			<?php
				$announce = $this->session->flashdata('announce');
				if(!empty($announce)){
					if($announce == 'Data Berhasil Disimpan'){
						echo '
							<div class="alert alert-success">
							'.$announce.'
							</div>
						';
					}else{
						echo '
							<div class="alert alert-danger">
							'.$announce.'
							</div>
						';
					}
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
									<th>Nama Jabatan</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($jabatan)) : ?>
								<?php foreach ($jabatan as $m) : ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $m['nama_jabatan'] ?></td>
									<td class="text-center">
										<a href="<?= base_url('Master-jabatan-edit/'.encrypt_url($m['jabatan_id'])) ?>">
											<i class="fa fa-pencil btn btn-warning"></i>
										</a>
										<a href="<?= base_url('Master-jabatan-hapus/'.encrypt_url($m['jabatan_id'])) ?>" onclick="return confirm('Anda Yakin Ingin Menghapus?'+ '<?=   '&nbsp;'.$m['nama_jabatan']; ?>')">
											<i class="fa fa-trash btn btn-danger"></i>
										</a>
									</td>
								</tr>
								<?php endforeach ?>
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
