<div class="col-md-12 col-sm-12 ">
	<img src="<?= base_url('/assets/profil/izinkeluarkomplek.png')?>" alt="" width="100%">
	<br><br>
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Izin Keluar Komplek</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="#">
						<h4 class="text-danger"><span id="jam" class="text-danger"> <?= date('H:i:s')?> </span> WIB</h4>
					</a>
				</li>
				<li>
					<a href="#">
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahizinkeluar"><i
								class="fa fa-plus"></i> Tambah Izin Keluar</button>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('Izin-keluar-komplek-approve')?>">
						<button class="btn btn-success btn-sm"><i class="fa fa-check"></i> Approval Kedatangan <span id="total" class="badge badge-danger badge-sm"></span></button>
					</a>
				</li>
			</ul>
			<div class="clearfix"></div>
			<?php
				$announce = $this->session->flashdata('announce');
				if(!empty($announce)){
					if($announce == 'Berhasil mengubah status'){
						echo '
							<div class="alert alert-success">
							'.$announce.'
							</div>
						';
					}elseif($announce == 'Berhasil menambah data'){echo '<div class="alert alert-success">
						'.$announce.'
						</div>';}
					else{
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
						<?php 
							$awal  = date_create('20:59:14');
							$akhir = date_create('20:59:18'); // waktu sekarang

						?>
							<thead>
								<tr>
									<th>No</th>
									<th width="30%">Nama Siswa</th>
									<th>Kelas</th>
									<th>Tanggal</th>
									<th>Keterangan</th>
									<th>Jam Keluar</th>
									<th>Batas Waktu</th>
									<th>Approval Pembimbing </th>
									<th>Tiba Telat/Tepat Waktu</th>
									<th>Approval Pembimbing</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($izinkeluar)) : ?>
								<?php foreach ($izinkeluar as $m) : 
									$pegawai 		= $this->session->userdata('pegawai_id');
									$waktukembali 	= $m->waktu_kembali;
									$waktumasuk     = $m->batas_waktu;
									$tanggalkeluar 	= $m->tanggal;
									$tanggalkembali = $m->tanggal_kembali;

									if($waktukembali == ''){
										$status = "";
									}else{
										if($tanggalkeluar == $tanggalkembali):
											if($waktukembali <= $waktumasuk):
												$status = "<span class='badge badge-success'>Tepat Waktu</span>";
											else:
												$waktukembali 	= date_create($m->waktu_kembali);
												$waktumasuk     = date_create($m->batas_waktu);
												$diff  = date_diff( $waktukembali, $waktumasuk );
												
												$jam = '';
												$menit = '';
												$detik = '';
												if($diff->h != ''){
													$jam = $diff->h.' Jam ';
												}
												if($diff->i != ''){
													$menit = $diff->i.' Menit ';
												}
												if($diff->s != ''){
													$detik = $diff->s.' Detik ';
												}
												$status = "<span class='badge badge-danger'>Telat ". 
														$jam. $menit. $detik.
														"</span>";
											endif;
										else:
											$status = "<span class='badge badge-danger'>Telat</span>";
										endif;
									}
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo "<b>".$m->nama_siswa."</b>" ?></td>
									<td><?php echo "<b>".$m->nama_rombel."</b>" ?></td>
									<td><?php echo formatTanggal($m->tanggal) ?></td>
									<td><?php echo $m->keterangan ?></td>
									<td><?php echo "<span class='badge badge-primary'>".$m->jam_keluar."</span>" ?></td>
									<td><?php echo "<span class='badge badge-success'>".$m->batas_waktu."</span>" ?>
									</td>
									<td width="20%">
										<?php echo "<b>".$m->nama."</b>";?></td>
									<td>
										<?= $status ?>
									</td>
									<td width="20%" class="text-center">
										<?php
                                        if($m->namapegawai == ''):
										?>
										<a href="#" onclick="sweets('<?= encrypt_url($m->izinkeluarkomplek_id); ?>')">
											<?php
													echo "<i class='btn btn-primary btn-sm fa fa-cog'></i>";
													
											?>
										</a>
										<a href="#" onclick="hapus('<?= encrypt_url($m->izinkeluarkomplek_id); ?>')" 
										class='btn btn-sm btn-danger fa fa-trash text-white'></a>	
										</br>
										<?php
										endif;
                                        if($m->namapegawai != ''):
											if($pegawai == $m->pembimbing_approval_masuk):
                                            echo "<b>".$m->namapegawai."</b><br>";
											else:
                                            echo $m->namapegawai."<br>";
											endif;
                                        else:
                                            echo "<span class='badge badge-warning'>Belum Tersedia</span>";
                                        endif;
                                    ?></td>
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
		<form action="<?= base_url('Izin-keluar-komplek-tambah')?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahizinkeluar">Tambah Izin Keluar Komplek</h5>
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
								<select name="rombel_id" id="rombel_id" class="form-control select2 input-lg">
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
							<td>Tanggal</td>
							<td>: </td>
							<td>
								<?= date('d-m-Y')?>
							</td>
						</tr>
						<tr>
							<td>Jam Keluar</td>
							<td>: </td>
							<td><?= date('H:i:s')?> WIB</td>
						</tr>
						<tr>
							<td>Jam Masuk</td>
							<td>: </td>
							<td><input type="time" id="jam_masuk" name="jam_masuk">
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
