<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Hak Akses </h2>
				<div class="x_content">
				<i class='btn btn-success btn-sm fa fa-power-off'></i> Akun Aktif &nbsp;&nbsp;&nbsp;
				<i class='btn btn-danger btn-sm fa fa-power-off'></i> Akun Dinonaktifkan
				<a href="#" data-toggle="modal" data-target="#tambahuser">
					<i class='btn btn-primary btn-sm fa fa-plus'></i>Buat Akun
				</a>
				</div>
			
				<div class="clearfix"></div>
				<?php
				$announce = $this->session->flashdata('announce');
				if(!empty($announce)){
					if($announce == 'Berhasil mengubah status'){
						echo '
							<div class="alert alert-success">
							'.$announce.'
							</div>
						';
					}else if($announce == 'Akun Berhasil Dibuat'){
						echo '
							<div class="alert alert-success">
							'.$announce.'
							</div>
						';
					}
					else{
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
									<th>Username</th>
									<th>Level Akun</th>
									<th>Status</th>
									<th>Tanggal Dibuat</th>
									<th>Dibuat Oleh</th>
								</tr>
							</thead>

							<tbody>
							<?php $no = 1; if (!empty($hasil)) : ?>
                      		<?php foreach ($hasil as $row) : 
								$iduser = $row->login_id;
								$status = $row->status;
							?>
								<tr>
									<td><?= $row->username; ?></td>
									<td><?= $row->nama_jabatan; ?></td>
									<td width="5%">
										<a href="#" onclick="sweets('<?= $iduser ?>')" >
											<?php
												if($status == 'Y'): 
													echo "<i class='btn btn-success btn-sm fa fa-power-off'></i>";
												else:
													echo "<i class='btn btn-danger btn-sm fa fa-power-off'></i>";
												endif; 
											?>
										</a>
									</td>
									<td><?= $row->tanggal_dibuat; ?></td>
									<td>-</td>
								</tr>
								
							<?php endforeach; endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="tambahuser"  role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?= base_url('Master-buat-akun')?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahuser">Buat Akun</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-borderless">
						<tr>
							<td>Nama </td>
							<td>: </td>
							<td>
								<select name="pegawai" id="pegawai" class="form-control select2 input-lg">
									<option value="">-- Pilih --</option>
									<?php 
								foreach($pegawai as $pgw):
								?>
									<option value="<?= $pgw->pegawai_id;?>"><?= $pgw->nama;?></option>
								<?php
								endforeach;
							?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Username</td>
							<td>: </td>
							<td><input type="text" class="form-control" id="username" name="username">
							</td>
						</tr>
						<tr>
							<td>Password</td>
							<td>: </td>
							<td><input type="password" class="form-control" id="password" name="password">
							</td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i>
						Close</button>
					<input type="submit" class="btn btn-primary " value="Buat Akun">
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url().'template/build/js/jquery-3.3.1.js'?>"></script>

<script>
	function sweets(id) {
		swal({
				title: "Mengubah Status User ?",
				// text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Ubah",
				closeOnConfirm: false
			},
			function() {
				window.location.href = "<?= base_url().'Master-akun-ubah-status/';?>"+id;
			});
	}

	$(document).ready(function () {
		$("#pegawai").select2({
			width: '350px'
		});
	});
</script>
