<div class="col-md-12 col-sm-12 ">
	<img src="<?= base_url('/assets/profil/siswa.png')?>" alt="" width="100%">
	<br><br>
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Siswa</h2>

			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="<?php echo base_url('Master-siswa-tambah')?>">
						<button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah  Data</button>
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
									<th>Nomor Induk</th>
									<th>Nama Lengkap</th>
									<th>Jenis Kelamin</th>
									<th>Semester Dijalani</th>
									<th>Status Siswa</th>
									<th width="10%" >Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($siswa)) : ?>
								<?php foreach ($siswa as $m) : 
									// $data = $this->db->get_where('tkrs', array('fk_mahasiswa_id' => $m->pk_mahasiswa_id,'semester' => $m->semester_dijalani ));	
									// $total = $data->num_rows();
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $m->nomor_induk ?></td>
									<td><?php echo $m->nama_siswa ?></td>
									<td><?php echo $m->jenis_kelamin ?></td>
									<td><?php echo $m->semester_dijalani ?></td>
									<td><?php echo $m->status_siswa ?></td>
									<td class="text-center">
										<a href="<?= base_url('Master-siswa-edit/'.encrypt_url($m->siswa_id)) ?>">
											<i class="fa fa-pencil btn btn-warning"></i>
										</a>
										<a href="<?= base_url('Master-siswa-hapus/'.encrypt_url($m->siswa_id)) ?>" onclick="return confirm('Anda Yakin Ingin Menghapus?'+ '<?=   '&nbsp;'.$m->nama_siswa; ?>')">
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
