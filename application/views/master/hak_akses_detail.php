<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
        <h2><a href="<?= base_url('').'Master-hak-akses'?>" class="btn btn-primary btn-sm">
					<i class="fa fa-backward"> Kembali </i>
				</a>Level Akun : <?= $level->nama_level;?></h2>
    </div>
	<div class="x_panel">
		<div class="x_title">
			<h2>Hak Akses</h2>
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
									<th>Akses Modul</th>
									<th>Lihat Data</th>
									<th>Tambah Data</th>
									<th>Ubah Data</th>
									<th>Hapus Data</th>
								</tr>
							</thead>

							<tbody>
							<?php $no = 1; if (!empty($hasil)) : ?>
                      		<?php foreach ($hasil as $row) : 
									$create = $row->create;
									$read = $row->read;
									$update = $row->update;
									$delete = $row->delete;
								?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $row->nama_modul; ?></td>
									<td><input type="checkbox" <?php if($create){ echo "checked";}?>  name="" id=""></td>
									<td><input type="checkbox"  <?php if($read){ echo "checked";}?> name="" id=""></td>
									<td><input type="checkbox"  <?php if($update){ echo "checked";}?> name="" id=""></td>
									<td><input type="checkbox"  <?php if($delete){ echo "checked";}?> name="" id=""></td>
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
