<div class="col-md-12 col-sm-12 ">
	<br><br>
	<div class="x_panel">
		<div class="x_title">
			<h2>Pengajuan Pulang Disetujui</h2>
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
									<th>Lampiran</th>
									<th>Keterangan </th>
									<th>Status</th>
									<th width="30%">Approval Riayah</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; if (!empty($approve)) : ?>
								<?php foreach ($approve as $m) : 
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
