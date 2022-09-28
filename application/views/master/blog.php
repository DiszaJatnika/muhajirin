<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Blog</h2>
			<ul class="nav navbar-right panel_toolbox">
				<a href="<?= base_url('').'Master-tambah-blog'?>" class="btn btn-primary btn-md">
					<i class="fa fa-plus"> Tambah Data </i>
				</a>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box table-responsive">
						<table id="datatable" class="table table-striped table-bordered" style="width:100%">

							<thead>
								<tr>
									<th>No</th>
									<th>Judul</th>
									<th>Penulis</th>
									<th>Tanggal</th>
									<th>Kategori</th>
									<th>Jenis</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
							<?php $no = 1; if (!empty($hasil)) : ?>
                      		<?php foreach ($hasil as $row) : 
                                $idblog = $row->pk_blog_id;
                            ?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $row->judul; ?></td>
									<td><?= $row->penulis; ?></td>
									<td><?= $row->tanggal; ?></td>
									<td><?= $row->kategori; ?></td>
									<td><?= $row->jenis; ?></td>
									<td width="15%">
										<a href="<?= base_url('').'Master-edit-blog/'.$row->pk_blog_id;?>" class="btn btn-success btn-sm">
											<i class="fa fa-edit" > Ubah</i>
										</a>
										<a href="#" onclick="sweets('<?= $idblog ?>')" class="btn btn-danger btn-sm">
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
				window.location.href = "<?= base_url().'Master-delete-blog/';?>"+id;
			});
	}
</script>