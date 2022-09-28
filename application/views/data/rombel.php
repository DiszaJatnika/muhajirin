<div class="col-md-12 col-sm-12 ">
	<img src="<?= base_url('/assets/profil/rombel.png')?>" alt="" width="100%">
	<br><br>
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Rombongan Belajar</h2>

			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="<?php echo base_url('Master-rombel-tambah')?>">
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
									<th>Nama Rombel</th>
									<th>Wali Kelas</th>
									<th>Jumlah Siswa</th>
									<th>Status</th>

									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($rombel)) : ?>
								<?php foreach ($rombel as $m) : 
									$rombelid = $m->rombel_id;
									$total = $this->db->get_where('tbl_siswa', array('kelas_id' =>$rombelid));
									$totalsiswa = $total->num_rows();
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $m->nama_rombel ?></td>
									<td><?php echo $m->nama ?></td>
									<td><?php echo $totalsiswa.' Orang' ?></td>
									<td><?php echo $m->status ?></td>
									<td class="text-center">
										<a href="<?= base_url('Master-rombel-edit/'.encrypt_url($m->rombel_id)) ?>">
											<i class="fa fa-pencil btn btn-warning"></i>
										</a>
										<a href="<?= base_url('Master-rombel-hapus/'.encrypt_url($m->rombel_id)) ?>" onclick="return confirm('Anda Yakin Ingin Menghapus?'+ '<?=   '&nbsp;'.$m->nama_rombel; ?>')">
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
