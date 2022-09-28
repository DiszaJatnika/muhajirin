<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Level Akun </h2>

			<div class="clearfix"></div>
			<?php
				$announce = $this->session->flashdata('announce');
				if(!empty($announce)){
					if($announce == 'Berhasil menghapus data'){
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
									<th>Level</th>
									<th>Tanggal Dibuat</th>
									<th>Dibuat Oleh</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($hasil)) : ?>
								<?php foreach ($hasil as $row) : 
									
									$idlevel = $row->pk_level_id;
								?>
								<tr>
									<td width="5%"><?= $no; ?></td>
									<td><?= $row->nama_level; ?></td>
									<td><?= $row->created_date; ?></td>
									<td><?= $row->created_by; ?></td>
									<td width="15%">
										<a href="#" class="btn btn-success btn-sm">
											<i class="fa fa-edit" > Ubah</i>
										</a>
										<a href="#" onclick="sweets('<?= $idlevel?>')" class="btn btn-danger btn-sm">
											<i class="fa fa-trash"> Hapus</i>
										</a>
									</td>

								</tr>
								<?php 
                            $no++;
							
                            endforeach; endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function sweets(id) {
		swal({
				title: "Yakin ingin menghapus data ?",
				text: "Data tidak bisa dikembalikan",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Delete",
				closeOnConfirm: false
			},
			function() {
				window.location.href = "<?= base_url().'Master-level-delete/';?>"+id;
			});
	}
</script>

