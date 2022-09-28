<div class="col-md-12 col-sm-12 ">
<!-- <img src="<?= base_url('/assets/profil/izinpulang.png')?>" alt="" width="100%"> -->
	<span class="btn btn-primary btn-sm"> <i class="fa fa-book"></i> Murojaah </span>
	<span class="btn btn-success btn-sm"> <i class="fa fa-book"></i> Hadits 40</span>
	<span class="btn btn-danger btn-sm"> <i class="fa fa-book"></i> Hadits 300</span>
	<span class="btn btn-secondary btn-sm"> <i class="fa fa-book"></i> Praktek Ibadah</span>
	<span class="btn btn-dark btn-sm"> <i class="fa fa-book"></i> Doa Harian</span>
	<span class="btn btn-warning btn-sm"> <i class="fa fa-book"></i> Jurumiyah</span>
	<span class="btn btn-primary btn-sm"> <i class="fa fa-book"></i> Tashrif</span>
	<br><br>
	<div class="x_panel">
		<div class="x_title">
			<h2>Catatan Setoran Siswa</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="#">`
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahizinkeluar"><i
								class="fa fa-plus"></i> Tambah Setoran</button>
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
						<?php 
							$awal  = date_create('20:59:14');
							$akhir = date_create('20:59:18'); // waktu sekarang

						?>
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal </th>
									<th>Jam </th>
									<th width="30%">Nama Siswa</th>
									<th>Kelas</th>
									<th>Jenis Kegiatan</th>
									<th>Penerima Hafalan</th>
									<th>Keterangan </th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($hafalan)) : ?>
								<?php foreach ($hafalan as $m) : ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $m['created_at'] ?></td>
									<td><?= $m['created_at'] ?></td>
									<td><?= $m['nama_siswa'] ?></td>
									<td><?= $m['nama_rombel'] ?></td>
									<td><?= $m['nama_jenis_kegiatan'] ?></td>
									<td><?= $m['nama_pembimbing'] ?></td>
									<td><?= $m['keterangan'] ?></td>
									<td>
										
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

<!-- Tambah ijin keluar -->
<div class="modal fade" id="tambahizinkeluar"  role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?= base_url('hafalan-tambah')?>" method="POST" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahizinkeluar">Tambah Hafalan Siswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-borderless">
						<tr>
							<td>Kelas</td>
							<td>: </td>
							<td>
								<select name="rombel_id" id="rombel_id" class="form-control select2 ">
									<option value="">--Pilih--</option>
									<?php 
							foreach($rombel as $rmbl):
								?>
									<option value="<?= $rmbl->rombel_id;?>"><?= $rmbl->nama_rombel;?></option>
									<?php
							endforeach;
							?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Nama </td>
							<td>: </td>
							<td>
								<select id="siswa" name="siswa" width="100%" class="form-control select2">
									<option value="">-- Pilih --</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Jenis Kegiatan</td>
							<td>: </td>
							<td>
								<select name="kgt" width="100%" class="form-control">
									<option value="">-- Pilih Kegiatan --</option>
									<?php 
										foreach($kegiatan as $kgt):
									?>
									 <option value="<?= $kgt->jenis_kegiatan_id;?>"><?= $kgt->nama_jenis_kegiatan;?></option>
									<?php
										endforeach;
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Tanggal Hafalan</td>
							<td>: </td>
							<td>
								<input type="hidden" name="tanggal_hafalan" id="tanggal_pengajuan" value="<?= date('Y-m-d') ?>">
								<?= date('d-m-Y')?>
							</td>
						</tr>
					
						<tr>
							<td>Hadits</td>
							<td>: </td>
							<td>
								<select name="" id="" class="form-control select2">
									<option value="">Hadits 1 - Niat</option>
									<option value="">Hadits 2 - Iman Islam dan Ihsan</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td>: </td>
							<td><textarea name="keterangan" id="keterangan" class="form-control" rows="5"></textarea></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i>
						Close</button>
					<input type="submit" class="btn btn-primary " value="Tambahkan">
				</div>
			</div>
		</form>
	</div>
</div>
<!-- End Tambah Izin Keluar -->
<!-- update tanggal pulang -->

<div class="modal fade" id="tambahizinkeluar"  role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?= base_url('Izin-pulang-tambah')?>" method="POST" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahizinkeluar">Tambah Izin Pulang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-borderless">
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i>
						Close</button>
					<input type="submit" class="btn btn-primary " value="Tambahkan">
				</div>
			</div>
		</form>
	</div>
</div>
<!-- end update tanggal pulang -->
<script type="text/javascript" src="<?php echo base_url().'template/build/js/jquery-3.3.1.js'?>"></script>
<script type="text/javascript">
	$.ajax({
			url: "<?php echo base_url('Izin-keluar-komplek-get-total');?>",
			method: "POST",
			data: {
			
			},
			async: true,
			dataType: 'json',
			success: function (data) {
				$("#total").html(data);
			}
	});

	window.onload = function () {
		jam();
	}

	function jam() {
		var e = document.getElementById('jam'),
			d = new Date(),
			h, m, s;
		h = d.getHours();
		m = set(d.getMinutes());
		s = set(d.getSeconds());

		e.innerHTML = h + ':' + m + ':' + s;

		setTimeout('jam()', 1000);
	}

	function set(e) {
		e = e < 10 ? '0' + e : e;
		return e;
	}

	function sweets(id) {
		swal({
				title: "Siswa sudah kembali ke pondok ?",
				// text: "",
				type: "info",
				showCancelButton: true,
				confirmButtonColor: "#00FFAA",
				confirmButtonText: "Sudah",
				closeOnConfirm: false
			},
			function () {
				window.location.href = "<?= base_url().'Izin-keluar-komplek-approve-masuk/';?>" + id;
			});
	}

	function hapus(id) {
		swal({
				title: "Hapus Data Ini ?",
				// text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Hapus",
				closeOnConfirm: false
			},
			function () {
				window.location.href = "<?= base_url().'Izin-keluar-komplek-hapus/';?>" + id;
			});
	}


	$(document).ready(function () {

		$('#rombel_id').change(function () {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('Pembimbing/get_siswa');?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function (data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option  value=' + data[i].siswa_id + '>' + data[i]
							.nama_siswa +
							'</option>';
					}
					$('#siswa').html(html);
				}
			});
			return false;
		});

		$("#siswa").select2({
			width: '300px'
		});
	});


  	
</script>
