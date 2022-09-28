<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Menu</h2>

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
									<th>Nama Menu</th>
									<th>Submenu</th>
									<th>Tanggal Dibuat</th>
									<th>Dibuat Oleh</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($hasil)) : ?>
								<?php foreach ($hasil as $row) : 
									$menu = $row->pk_menu_id;
								?>
								<tr>
									<td width="5%"><?= $no; ?></td>
									<td><?= $row->nama_menu; ?></td>
									<td>
										<?php 
										foreach($submenu as $sub): 
											$idsub = $sub->fk_menu_id;
											if($menu == $idsub):
											echo '- '.$sub->nama_submenu;
											echo "<br>";
											endif;
										endforeach;?>
									</td>
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