<div class="col-md-12 col-sm-12 ">
	<img src="<?= base_url('/template/profil/kemahasiswaan.png')?>" alt="" width="100%">
	<br><br>
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Mahasiswa Berdasarkan Semester</h2>

			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="<?php echo base_url('Kemahasiswaan-add-view')?>">
						<button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah & Ubah Data</button>
					</a>
				</li>
			</ul>
			<div class="clearfix"></div>
			<?php
				$announce = $this->session->flashdata('announce');
				if(!empty($announce)){
					if($announce == 'Berhasil upload data'){
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
									<th>Semester</th>
									<th>Jumlah Mahasiswa</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; if (!empty($semester)) : ?>
								<?php foreach ($semester as $smt) : ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php 
                                        if($smt->semester_dijalani){
                                            echo $smt->semester_dijalani;
                                        }
                                        else{
                                            echo "Belum Terdefinisi";
                                        }
                                    ?></td>
									<td>
										<?= $smt->mhstotal." Orang"; ?>
									</td>
									<td><?php echo "<i class='fa fa-eye'></i> Detail"; ?></td>
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