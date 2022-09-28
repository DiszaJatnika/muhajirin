<div class="col-md-12 col-sm-12 ">
	<img src="<?= base_url('/template/profil/programstudi.png')?>" alt="" width="100%">
	<br><br>
	<div class="x_panel">

		<div class="x_title">
			<h2>Tahun Ajaran </h2>
			<ul class="nav navbar-right panel_toolbox">
				<li>
                    <a href="<?php echo base_url('Tahun-ajaran-add')?>">
					 <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
				</li>
			</ul>
			<div class="clearfix"></div>
			<?php
				$announce = $this->session->flashdata('announce');
				if(!empty($announce)){
					if($announce == 'Berhasil menambah data'){
						echo '<div class="alert alert-success">'.$announce.'</div>';
					}else if($announce == 'Berhasil mengubah data'){
						echo '<div class="alert alert-success">'.$announce.'</div>';
					}else if($announce == 'Berhasil menghapus data'){
						echo '<div class="alert alert-success">'.$announce.'</div>';
					}
					else{
						echo '<div class="alert alert-danger">'.$announce.'</div>';
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
									<th>Tahun Ajaran</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($ta)) : ?>
								<?php 
                                foreach ($ta as $row) : 
                            ?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $row->tahun_ajaran; ?></td>
                                    <td>
                                        <a href="<?= base_url('Tahun-ajaran-update-view/'). $row->pk_tahunajaran_id ?>">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>
                                        <a href="<?= base_url('Tahun-ajaran-delete/'). $row->pk_tahunajaran_id ?>" onclick="return confirm('Yakin akan menghapus data ini?')">
                                            <i class="fa fa-trash" title="Hapus"></i>
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
