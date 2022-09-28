<div class="col-md-12 col-sm-12 ">
	
	<div class="x_panel">
		<div class="x_title">
			<h2>Approve Izin Keluar Komplek</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="#">
						<h4 class="text-danger"><span id="jam" class="text-danger"> <?= date('H:i:s')?> </span> WIB</h4>
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

							<thead>
								<tr>
									<th>No</th>
									<th>Nama Siswa</th>
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
												$status = "<span class='badge badge-danger'>Telat</span>";
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
										</a></br>
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

<script type="text/javascript" src="<?php echo base_url().'template/build/js/jquery-3.3.1.js'?>"></script>
<script type="text/javascript">
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
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Sudah",
				closeOnConfirm: false
			},
			function () {
				window.location.href = "<?= base_url().'Izin-keluar-komplek-approve-masuk/';?>" + id;
			});
	}
</script>
