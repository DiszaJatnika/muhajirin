<div class="col-md-12 col-sm-12 ">
	<img src="<?= base_url('/assets/profil/rombel.png')?>" alt="" width="100%">
	<br><br>
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Pelanggaran</h2>
            
				<div class="x_content">
				<i class='btn btn-success btn-sm '>K</i> Pelanggaran Kecil &nbsp;&nbsp;&nbsp;
				<i class='btn btn-warning btn-sm '>B</i> Pelanggaran Besar
				</div>
			
				<ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="<?php echo base_url('Master-pelanggaran-tambah')?>">
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
									<th>Nama Pelanggaran</th>
									<th>Jenis Pelanggaran</th>
									<th>Poin Pelanggaran</th>

									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($pelanggaran)) : ?>
								<?php foreach ($pelanggaran as $m) : ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $m['nama_pelanggaran'] ?></td>
									<td>
                                        <?php 
                                            if($m['jenis_pelanggaran'] == 'K'):
                                                $btn = "btn btn-success";
                                            else:
                                                $btn = "btn btn-warning";
                                            endif;
                                        ?>
                                        <?= "<span class='$btn btn-sm'>".$m['jenis_pelanggaran']."</span>" ?>
                                    </td>
									<td><?php echo $m['poin_pelanggaran']  ?></td>
									<td>
										<a href="<?= base_url('Master-pelanggaran-edit/'.encrypt_url($m['pelanggaran_id'])) ?>">
											<i class="fa fa-pencil btn btn-warning"></i>
										</a>
										<a href="<?= base_url('Master-pelanggaran-hapus/'.encrypt_url($m['pelanggaran_id'])) ?>" onclick="return confirm('Anda Yakin Ingin Menghapus?'+ '<?=   '&nbsp;'.$m['nama_pelanggaran']; ?>')">
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
