<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Hak Akses</h2>

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
									<th>Level</th>
									<th>Akses Modul</th>
									<th>Tanggal Dibuat</th>
									<th>Dibuat Oleh</th>
								</tr>
							</thead>

							<tbody>
							<?php $no = 1; if (!empty($hasil)) : ?>
                      		<?php foreach ($hasil as $row) : ?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $row->nama_level; ?></td>
									<td><a href="<?= base_url().'Master-hak-akses-detail/'.$row->fk_level_id?>"><i class="fa fa-eye"></i> Lihat Detail </a></td>
									<td><?= $row->created_date; ?></td>
									<td><?= $row->created_by; ?></td>
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
