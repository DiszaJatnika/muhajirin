<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Hafalan Murojaah</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="<?= base_url("Murojaah-tambah-data");?>">
						<button class="btn btn-primary btn-sm" ><i
								class="fa fa-plus"></i> Tambah Hafalan</button>
					</a>
				</li>
			</ul>
			<div class="clearfix"></div>
			<?=  
				$this->session->flashdata('fatal');
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
									<th>Tanggal </th>
									<th width="20%">Nama Siswa</th>
									<th>Rombel</th>
									<th>Dari Surah</th>
									<th>Sampai Surah</th>
									<th>Putaran Ke </th>
									<th>Pembimbing</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>	
								<?php $no = 1; if (!empty($murojaah)) : ?>
								<?php foreach ($murojaah as $m) : ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $m['tanggal'] ?></td>
									<td><?php echo $m['nama_siswa'] ?></td>
									<td><?php echo $m['nama_rombel'] ?></td>
									<td><?php echo $m['dari_surah']." (". $m['dari_ayat_ke'].")" ?></td>
									<td><?php echo $m['sampai_surah']." (". $m['sampai_ayat_ke'].")"  ?></td>
									<td><?php echo $m['putaran']; ?></td>
									<td><?php echo $m['nama'] ?></td>
									<td class="text-center">
										<a href="<?= base_url('Murojaah-edit/'.encrypt_url($m['murojaah_id'])) ?>">
											<i class="fa fa-pencil btn btn-warning"></i>
										</a>
										<a href="<?= base_url('Murojaah-hapus/'.encrypt_url($m['murojaah_id'])) ?>" onclick="return confirm('Anda Yakin Ingin Menghapus?'+ '<?=   '&nbsp;'.$m['nama_siswa']; ?>')">
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
