<!-- page content -->
<div class="col bg-white" role="main">
	<div class="col-md-12 col-sm-12 ">

		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>
							<a href="<?= base_url('').'Kemahasiswaan'?>" class="btn btn-primary btn-sm">
								<i class="fa fa-backward"> Kembali </i>
							</a>
						</h2>

						<div class="clearfix"></div>
					</div>
					<h2>Detail Mahasiswa</h2>
					<div class="x_content">
						<div class="col-md-3 col-sm-3  profile_left">
							<div class="profile_img">
								<div id="crop-avatar">
									<!-- Current avatar -->
									<img class="img-responsive avatar-view"
										src="<?= base_url('/template/profil/default.png')?>" width="100%" alt="Avatar"
										title="Change the avatar">
								</div>
							</div>
							<br><br>
							<h3><?php echo $m->nama; ?></h3>
							<br>
							<ul class="list-unstyled user_data">
								<li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $m->jalan; ?>
								</li>
								<li>
									<i class="fa fa-phone user-profile-icon"></i><?php echo $m->no_hp; ?></li>
								<li>
									<i class="fa fa-envelope user-profile-icon"></i>-
								</li>
							</ul>

							<br />


						</div>
						<div class="col-md-9 col-sm-9 ">


							<div class="" role="tabpanel" data-example-id="togglable-tabs">
								<br>
								<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content1" id="home-tab"
											role="tab" data-toggle="tab" aria-expanded="true">Detail Profil</a>
									</li>

								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane active " id="tab_content1"
										aria-labelledby="home-tab">

										<table>
											<tr>
												<th>Tempat Lahir</th>
												<th>:</th>
												<td><?php echo $m->tempat_lahir ?></td>
											</tr>
											<tr>
												<th>Tanggal Lahir</th>
												<th>:</th>
												<td><?php echo $m->tanggal_lahir ?></td>
											</tr>
											<tr>
												<th>Jenis Kelamin</th>
												<th>:</th>
												<td><?php echo $m->jenis_kelamin ?></td>
											</tr>
											<tr>
												<th>NIK</th>
												<th>:</th>
												<td><?php echo $m->nik ?></td>
											</tr>
											<tr>
												<th>Agama</th>
												<th>:</th>
												<td><?php echo $m->agama ?></td>
											</tr>
											<tr>
												<th>NISN</th>
												<th>:</th>
												<td><?php echo $m->nisn ?></td>
											</tr>
											<tr>
												<th>Jalur Masuk</th>
												<th>:</th>
												<td><?php echo $m->id_jalur_masuk ?></td>
											</tr>
											<tr>
												<th>NPWP</th>
												<th>:</th>
												<td><?php echo $m->npwp ?></td>
											</tr>
											<tr>
												<th>Kewarganegaraan</th>
												<th>:</th>
												<td><?php echo $m->kewarganegaraan ?></td>
											</tr>
											<tr>
												<th>Jenis Pendaftaran</th>
												<th>:</th>
												<td><?php echo $m->jenis_pendaftaran ?></td>
											</tr>
											<tr>
												<th>Tangagl Masuk Kuliah</th>
												<th>:</th>
												<td><?php echo $m->tanggal_masuk_kuliah ?></td>
											</tr>
											<tr>
												<th>Tahun Masuk</th>
												<th>:</th>
												<td><?php echo $m->tahun_masuk ?></td>
											</tr>
											<tr>
												<th>Mulai Semester</th>
												<th>:</th>
												<td><?php echo $m->mulai_semester ?></td>
											</tr>
											<tr>
												<th>Jalan</th>
												<th>:</th>
												<td><?php echo $m->jalan ?></td>
											</tr>
											<tr>
												<th>RT</th>
												<th>:</th>
												<td><?php echo $m->rt ?></td>
											</tr>
											<tr>
												<th>RW</th>
												<th>:</th>
												<td><?php echo $m->rw ?></td>
											</tr>
											<tr>
												<th>Dusun</th>
												<th>:</th>
												<td><?php echo $m->dusun ?></td>
											</tr>
											<tr>
												<th>Kelurahan</th>
												<th>:</th>
												<td><?php echo $m->kelurahan ?></td>
											</tr>
											<tr>
												<th>Kecamatan</th>
												<th>:</th>
												<td><?php echo $m->kecamatan ?></td>
											</tr>
											<tr>
												<th>Kode POS</th>
												<th>:</th>
												<td><?php echo $m->kode_pos ?></td>
											</tr>
											<tr>
												<th>Jenis Tinggal </th>
												<th>:</th>
												<td><?php echo $m->jenis_tinggal ?></td>
											</tr>
											<tr>
												<th>Alat Transportasi</th>
												<th>:</th>
												<td><?php echo $m->alat_transportasi ?></td>
											</tr>
											<tr>
												<th>Telp Rumah</th>
												<th>:</th>
												<td><?php echo $m->telp_rumah ?></td>
											</tr>
											<tr>
												<th>No HP</th>
												<th>:</th>
												<td><?php echo $m->no_hp ?></td>
											</tr>
											<tr>
												<th>Email</th>
												<th>:</th>
												<td><?php echo $m->email ?></td>
											</tr>
											<tr>
												<th>Terima KPS</th>
												<th>:</th>
												<td><?php echo $m->terima_kps ?></td>
											</tr>
											<tr>
												<th>No KPS</th>
												<th>:</th>
												<td><?php echo $m->no_kps ?></td>
											</tr>
											<tr>
												<th>NIK Ayah</th>
												<th>:</th>
												<td><?php echo $m->nik_ayah ?></td>
											</tr>
											<tr>
												<th>Nama Ayah</th>
												<th>:</th>
												<td><?php echo $m->nama_ayah ?></td>
											</tr>
											<tr>
												<th>Tanggal Lahir Ayah</th>
												<th>:</th>
												<td><?php echo $m->tanggal_lahir_ayah ?></td>
											</tr>
											<tr>
												<th>Pendidikan Ayah</th>
												<th>:</th>
												<td><?php echo $m->pendidikan_ayah ?></td>
											</tr>
											<tr>
												<th>Pekerjaan Ayah</th>
												<th>:</th>
												<td><?php echo $m->pekerjaan_ayah ?></td>
											</tr>
											<tr>
												<th>Penghasilan Ayah</th>
												<th>:</th>
												<td><?php echo $m->penghasilan_ayah ?></td>
											</tr>
											<tr>
												<th>NIK Ibu</th>
												<th>:</th>
												<td><?php echo $m->nik_ibu ?></td>
											</tr>
											<tr>
												<th>Nama Ibu</th>
												<th>:</th>
												<td><?php echo $m->nama_ibu ?></td>
											</tr>
											<tr>
												<th>Tanggal Lahir Ibu</th>
												<th>:</th>
												<td><?php echo $m->tanggal_lahir_ibu ?></td>
											</tr>
											<tr>
												<th>Pendidikan Ibu</th>
												<th>:</th>
												<td><?php echo $m->pendidikan_ibu ?></td>
											</tr>
											<tr>
												<th>Pekerjaan Ibu</th>
												<th>:</th>
												<td><?php echo $m->pekerjaan_ibu ?></td>
											</tr>
											<tr>
												<th>Penghasilan Ibu</th>
												<th>:</th>
												<td><?php echo $m->penghasilan_ibu ?></td>
											</tr>
											<tr>
												<th>Nama Wali</th>
												<th>:</th>
												<td><?php echo $m->nama_wali ?></td>
											</tr>
											<tr>
												<th>Tanggal Lahir Wali</th>
												<th>:</th>
												<td><?php echo $m->tanggal_lahir_wali ?></td>
											</tr>
											<tr>
												<th>Pendidikan Wali</th>
												<th>:</th>
												<td><?php echo $m->pendidikan_wali ?></td>
											</tr>
											<tr>
												<th>Pekerjaan Wali</th>
												<th>:</th>
												<td><?php echo $m->pekerjaan_wali ?></td>
											</tr>
											<tr>
												<th>Penghasilan Wali</th>
												<th>:</th>
												<td><?php echo $m->penghasilan_wali ?></td>
											</tr>
											<tr>
												<th>Jurusan</th>
												<th>:</th>
												<td><?php echo $m->fk_jurusan_id ?></td>
											</tr>
											<tr>
												<th>Kelas</th>
												<th>:</th>
												<td><?php echo $m->fk_kelas_id ?></td>
											</tr>
											<tr>
												<th>Tahun Ajaran</th>
												<th>:</th>
												<td><?php echo $m->fk_tahunajaran_id ?></td>
											</tr>
										</table>

									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
