<div class="col-md-12 col-sm-12 ">
	
	<div class="x_panel">
		<div class="x_title">
			<h2>History Keluar Komplek</h2>
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
									<th>Tanggal</th>
									<th>Keterangan</th>
									<th>Jam Keluar</th>
									<th>Batas Waktu</th>
									<th>Waktu Kembali</th>
									<th>Status</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($siswa)) : ?>
								<?php foreach ($siswa as $m) : 
                                $pegawai 		= $this->session->userdata('pegawai_id');
                                $waktukembali 	= $m['waktu_kembali'];
                                $waktumasuk     = $m['batas_waktu'];
                                $tanggalkeluar 	= $m['tanggal'];
                                $tanggalkembali = $m['tanggal_kembali'];

                                if($waktukembali == ''){
                                    $status = "";
                                }else{
                                    if($tanggalkeluar == $tanggalkembali):
                                        if($waktukembali <= $waktumasuk):
                                            $status = "<span class='badge badge-success'>Tepat Waktu</span>";
                                        else:
                                            $waktukembali 	= date_create($m['waktu_kembali']);
                                            $waktumasuk     = date_create($m['batas_waktu']);
                                            $diff  = date_diff( $waktukembali, $waktumasuk );
                                            
                                            // die;
                                            // Output: Total selisih hari: 10398
                                            // $jam    =floor($calculate / (60 * 60));
                                            // $menit    =$diff - $jam * (60 * 60);
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
                                    <td><?= $no; ?></td>
									<td><?= $m['tanggal']?></td>
									<td><?= $m['keterangan']?></td>
									<td><?= $m['jam_keluar']?></td>
									<td><?= $m['batas_waktu']?></td>
									<td><?= $m['waktu_kembali']?></td>
									<td><?= $status ?></td>
								</tr>
								<?php $no++; endforeach ?>
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