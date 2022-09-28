<div class="col-md-12 col-sm-12 ">
<img src="<?= base_url('/assets/profil/izinpulang.png')?>" alt="" width="100%">
	
	<br><br>
	<div class="x_panel">
		<div class="x_title">
			<h2>Pengajuan Pulang</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="#">
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahizinkeluar"><i
								class="fa fa-plus"></i> Tambah Izin Pulang</button>
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
									<th width="30%">Nama Siswa</th>
									<th>Kelas</th>
									<th>Tanggal Pengajuan</th>
									<th>Tanggal Mulai</th>
									<th>Tanggal Kembali</th>
									<th>Siswa Datang</th>
									<th>Lampiran</th>
									<th>Keterangan </th>
									<th>Status</th>
									<th width="30%">Approval Riayah</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($pulang)) : ?>
								<?php foreach ($pulang as $m) : 
                                    $lampiran   = $m['lampiran'];
                                    $status     = $m['status'];
									$link		= base_url('assets/izinpulang/'.$m['lampiran']);
                                    if($lampiran):
                                        $file = "<a href=$link><span class='badge badge-primary'><i class='fa fa-download'></i></span></a>";
                                    else:
                                        $file ="-";
                                    endif;

                                    if($status == 'Pending'):
                                        $stt = "<span class='badge badge-warning'>Pending</span>";
                                    elseif($status == 'Ditolak'):
                                        $stt = "<span class='badge badge-danger'>Ditolak</span>";
                                    elseif($status == 'Disetujui'):
                                        $stt = "<span class='badge badge-success'>Disetujui</i></span>";
                                    endif;
								?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $m['nama_siswa'] ?></td>
									<td><?= $m['nama_rombel'] ?></td>
									<td><?= $m['tanggal_pengajuan'] ?></td>
									<td><?= $m['tanggal_mulai'] ?></td>
									<td><?= $m['tanggal_kembali'] ?></td>
									<td class="text-center">
										<?php if($status == 'Disetujui'): ?>
											<?= $m['tanggal_datang'] ?>
											<a class="btn btn-sm btn-warning fa fa-edit"></a>
										<?php endif; ?>
									</td>
									<td class="text-center"><?= $file ?></td>
									<td><?= $m['keterangan'] ?></td>
									<td><?= $stt ?></td>
									<td><?= $m['riayah'] ?></td>
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
						<tr>
							<td>Kelas</td>
							<td>: </td>
							<td>
								<select name="rombel_id" id="rombel_id" class="form-control select2 ">
									<option value="">-- Pilih --</option>
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
							<td>Tanggal Pengajuan</td>
							<td>: </td>
							<td>
								<input type="hidden" name="tanggal_pengajuan" id="tanggal_pengajuan" value="<?= date('Y-m-d') ?>">
								<?= date('d-m-Y')?>
							</td>
						</tr>
						<tr>
							<td>Tanggal Mulai</td>
							<td>: </td>
							<td><input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
						</tr>
						<tr>
							<td>Tanggal Kembali</td>
							<td>: </td>
							<td><input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">
							</td>
						</tr>
						<tr>
							<td>Lampiran</td>
							<td>: </td>
							<td><input type="file" id="lampiran" name="lampiran" class="form-control">
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
