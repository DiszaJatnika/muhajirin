<div class="col-md-12 col-sm-12 ">

	<div class="container">
		<div class="main-body">
 
			<nav aria-label="breadcrumb" class="main-breadcrumb">
				<ol class="breadcrumb">
					<li>Profil Mahasiswa</li>
				</ol>
			</nav>
			<?php
				$announce = $this->session->flashdata('announce');
				if(!empty($announce)){
					if($announce == 'Berhasil mengubah profil'){
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
			<form action="<?= base_url('Profil-save'); ?>" method="POST">
			<div class="row gutters-sm">
				<div class="col-md-4 mb-3">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="<?= base_url('/template/profil/default.png'); ?>" alt="Admin"
									class="rounded-circle" width="150">
								<div class="mt-3">
									<h4><?php echo $mhs->nama_lengkap; ?></h4>
									<span class="badge badge-primary"><i class='fa fa-edit'></i> Ubah Foto Profil</span>
								</div>
							</div>
						</div>
					</div>
					<div class="card mt-3">
						<ul class="list-group list-group-flush">
							<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">Log
								Aktivitas</li>

								<?php for($a=1; $a<=5; $a++): ?>
							<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
								<span class="badge badge"><i class='fa fa-edit'></i> Mengubah Foto Profil ~ 10:35 AM
									7/12/2021 ~ android </span>
									
							</li>
								<?php  endfor; ?>
						</ul>
					</div>
				</div>
				<!-- <form action=""> -->
				<div class="col-md-4">
					<div class="card mb-3">
						<div class="card-body imgfluid">
							<div class="row">
								<span class="badge badge-primary">Informasi Data Diri</span>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Nama Lengkap</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<input type="text" class="form-control" disabled value="<?= $mhs->nama_lengkap; ?>"
										name="nama_lengkap" id="nama_lengkap">
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">NIM</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<input type="text" class="form-control" disabled value="<?= $mhs->nim; ?>"
										name="nim" id="nim">
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Tempat Lahir *</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<input type="text" class="form-control" value="<?= $mhs->tempat_lahir; ?>"
										name="tempat_lahir" id="tempat_lahir" required>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Tanggal Lahir</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<input type="date" class="form-control" value="<?= $mhs->tanggal_lahir; ?>"
										name="tanggal_lahir" id="tanggal_lahir">
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Jenis Kelamin</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<select name="jenis_kelamin" id="jenis_kelamin" class='form-control'>
										<option>Pilih</option>
										<option value="1"  <?php if($mhs->jenis_kelamin == 1){ echo "selected"; }?>>Laki Laki</option>
										<option value="0" <?php if($mhs->jenis_kelamin == 0){ echo "selected"; }?>>Perempuan</option>
									</select>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Asal Negara</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<select name="asal_negara" id="asal_negara" class='form-control'>
										<option> Pilih</option>
										<option value="1"  <?php if($mhs->asal_negara == 1){ echo "selected"; }?>>Indonesia</option>
										<option value="2" <?php if($mhs->asal_negara == 2){ echo "selected"; }?>>Malaysia</option>
										<option value="3" <?php if($mhs->asal_negara == 3){ echo "selected"; }?>>Singapura</option>
										<option value="4" <?php if($mhs->asal_negara == 4){ echo "selected"; }?>>Brunei Darussalam</option>
										<option value="5" <?php if($mhs->asal_negara == 5){ echo "selected"; }?>>Negara Timur Tengah (Arab)</option>
										<option value="6" <?php if($mhs->asal_negara == 6){ echo "selected"; }?>>Negara Lainnya di Asia</option>
										<option value="7" <?php if($mhs->asal_negara == 7){ echo "selected"; }?>>Negara Afrika</option>
										<option value="8" <?php if($mhs->asal_negara == 8){ echo "selected"; }?>>Negara Eropa</option>
										<option value="9" <?php if($mhs->asal_negara == 9){ echo "selected"; }?>>Negara di Benua Lainnya</option>
									</select>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Asal Jenjang Pendidikan</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<select name="asal_jenjang_pendidikan" id="asal_jenjang_pendidikan" class='form-control'>
										<option > Pilih</option>
										<option value="MA"  <?php if($mhs->asal_jenjang_pendidikan == "MA"){ echo "selected"; }?>>MA</option>
										<option value="SMA" <?php if($mhs->asal_jenjang_pendidikan == "SMA"){ echo "selected"; }?>>SMA</option>
										<option value="SMK" <?php if($mhs->asal_jenjang_pendidikan == "SMK"){ echo "selected"; }?>>SMK</option>
										<option value="Paket C" <?php if($mhs->asal_jenjang_pendidikan == "Paket C"){ echo "selected"; }?>>Paket C</option>
										<option value="Pondok Pesantren" <?php if($mhs->asal_jenjang_pendidikan == "Pondok Pesantren"){ echo "selected"; }?>>Pondok Pesantren</option>
										<option value="SMA Di Luar Negeri" <?php if($mhs->asal_jenjang_pendidikan == "SMA Di Luar Negeri"){ echo "selected"; }?>>SMA Di Luar Negeri</option>
										<option value="Program Diploma" <?php if($mhs->asal_jenjang_pendidikan == "Program Diploma"){ echo "selected"; }?>>Program Diploma</option>
									</select>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Alamat</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<textarea name="alamat" id="alamat" class="form-control"><?= $mhs->alamat; ?></textarea>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Provinsi</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<select class="form-control select2" name="provinsi" id="provinsi" >
										<option value="">-- Pilih --</option>
										<?php foreach($provinsi as $row):?>
										<option value="<?php echo $row->id_prov;?>" <?php if($row->id_prov == $mhs->provinsi){ echo "selected"; }?>><?php echo strtoupper($row->nama);?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Kabupaten/Kota</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<select class="form-control select2" id="kabupaten" name="kabupaten" >
										<option value="">-- Pilih --</option>
									</select>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-12">
									<input class="btn btn-info " type="submit" value="Simpan Perubahan">
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card mb-3">
						<div class="card-body imgfluid">

							<div class="row">
								<span class="badge badge-primary">Informasi Wali</span>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Rerata Penghasilan Orang Tua</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<select name="rerata_penghasilan" id="rerata_penghasilan" class='form-control select2'>
										<option>Pilih</option>
										<option value="1" <?php if($mhs->rata_rata_penghasilan_orangtua == 1){ echo "selected"; }?>>Di bawah Rp.1.000.000</option>
										<option value="2" <?php if($mhs->rata_rata_penghasilan_orangtua == 2){ echo "selected"; }?>>Rp. 1.000.000 - Rp.2.000.000</option>
										<option value="3" <?php if($mhs->rata_rata_penghasilan_orangtua == 3){ echo "selected"; }?>>Rp. 2.000.001 - Rp.4.000.000</option>
										<option value="4" <?php if($mhs->rata_rata_penghasilan_orangtua == 4){ echo "selected"; }?>>Rp. 4.000.001 - Rp.6.000.000</option>
										<option value="5" <?php if($mhs->rata_rata_penghasilan_orangtua == 5){ echo "selected"; }?>>Di atas Rp.6.000.000</option>
									</select>

								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Pekerjaan Ayah</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<select name="pekerjaan_ayah" id="pekerjaan_ayah" class='form-control select2' >
										<option > Pilih</option>
										<?php foreach($pekerjaan as $pekerjaan): ?>
											<option value="<?= $pekerjaan->pk_pekerjaan_id ?>"  <?php if($mhs->pekerjaan_ayah == $pekerjaan->pk_pekerjaan_id) { echo"selected";}?>> <?= $pekerjaan->nama_pekerjaan ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Pendidikan Ayah</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<select name="pendidikan_ayah" id="pendidikan_ayah" class='form-control select2'>
										<option > Pilih</option>
										<option value="1" <?php if($mhs->pendidikan_ayah == 1){ echo "selected"; }?>>Tidak berpendidikan formal</option>
										<option value="2" <?php if($mhs->pendidikan_ayah == 2){ echo "selected"; }?>><= SLTA </option>
										<option value="3" <?php if($mhs->pendidikan_ayah == 3){ echo "selected"; }?>>Diploma</option>
										<option value="4" <?php if($mhs->pendidikan_ayah == 4){ echo "selected"; }?>>S1</option>
										<option value="5" <?php if($mhs->pendidikan_ayah == 5){ echo "selected"; }?>>S2</option>
										<option value="6" <?php if($mhs->pendidikan_ayah == 6){ echo "selected"; }?>>S3</option>
									</select>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Pekerjaan Ibu</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<select name="pekerjaan_ibu" id="pekerjaan_ibu" class='form-control select2'>
										<option value="0"> Pilih</option>
										
										<?php foreach($pekerjaan2 as $pekerjaan): ?>
											<option value="<?= $pekerjaan->pk_pekerjaan_id ?>" <?php if($mhs->pekerjaan_ibu == $pekerjaan->pk_pekerjaan_id) { echo"selected";}?>> <?= $pekerjaan->nama_pekerjaan ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Pendidikan Ibu</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<select name="pendidikan_ibu" id="pendidikan_ibu" class='form-control select2'>
										<option > Pilih</option>
										<option value="1" <?php if($mhs->pendidikan_ibu == 1){ echo "selected"; }?>>Tidak berpendidikan formal</option>
										<option value="2" <?php if($mhs->pendidikan_ibu == 2){ echo "selected"; }?>><= SLTA </option>
										<option value="3" <?php if($mhs->pendidikan_ibu == 3){ echo "selected"; }?>>Diploma</option>
										<option value="4" <?php if($mhs->pendidikan_ibu == 4){ echo "selected"; }?>>S1</option>
										<option value="5" <?php if($mhs->pendidikan_ibu == 5){ echo "selected"; }?>>S2</option>
										<option value="6" <?php if($mhs->pendidikan_ibu == 6){ echo "selected"; }?>>S3</option>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="card mb-3">
						<div class="card-body imgfluid">

							<div class="row">
								<span class="badge badge-primary">Informasi Kontak & Rekening</span>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">No Handphone</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<input type="text" class="form-control"  name="no_handphone"
										id="no_handphone" value="<?= $mhs->no_handphone ?>">
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Kepemilikan </h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<select name="kepemilikan" id="kepemilikan" class='form-control'>
										<option > Pilih</option>
										<option value="1" <?php if($mhs->kepemilikan == 1){ echo "selected";} ?>> Milik Sendiri</option>
										<option value="2" <?php if($mhs->kepemilikan == 2){ echo "selected";} ?>>Keluarga</option>
										<option value="3" <?php if($mhs->kepemilikan == 3){ echo "selected";} ?>>Lainnya</option>
									</select>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">No Rekening</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<input type="text" class="form-control" value="<?= $mhs->no_rekening; ?>" name="no_rekening"
										id="no_rekening">
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Nama Rekening</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<input type="text" class="form-control" value="<?= $mhs->nama_rekening; ?>" name="nama_rekening"
										id="nama_rekening">
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Nama Bank</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<input type="text" class="form-control" value="<?= $mhs->nama_bank; ?>" name="nama_bank"
										id="nama_bank">
								</div>
							</div>
							<br>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>

</div>
<?php $this->load->view('template/footer'); ?>

<script>
$(document).ready(function() {

	//nilai default sebelum update
	$(function() {
		var id 	= '<?= $mhs->provinsi ?>';
		var kab = '<?= $mhs->kota ?>';

		$.ajax({
			url: "<?php echo site_url('Profil/get_kabupaten');?>",
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
					if(data[i].id_kab == kab){
						html += '<option value=' + data[i].id_kab + ' selected>' + data[i].nama +
						'</option>';
					}else{
						html += '<option value=' + data[i].id_kab + '>' + data[i].nama +
						'</option>';
					}
				}
				$('#kabupaten').html(html);

			}
		});
	});

	//nilai ketika update
	$('#provinsi').change(function () {
		var id = $(this).val();
		$.ajax({
			url: "<?php echo site_url('Profil/get_kabupaten');?>",
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
					html += '<option value=' + data[i].id_kab + '>' + data[i].nama +
						'</option>';
				}
				$('#kabupaten').html(html);

			}
		});
		return false;
	});
});

</script>