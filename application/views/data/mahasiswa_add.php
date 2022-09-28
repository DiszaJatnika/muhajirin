<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Upload Data Mahasiswa </h2> &nbsp;&nbsp;
				<a href="<?= base_url('assets/download/template_data_mahasiswa.xlsx'); ?>">
					<button class="btn btn"> <i class="fa fa-download"></i> Download Template</button>
				</a>

				<div class="clearfix"></div>
				<?php
					$announce = $this->session->flashdata('announce');
					if(!empty($announce)){ 
						if($announce == 'Data Berhasil diupload'){ echo '<div class="alert alert-success"> '.$announce.'</div>';}
						else{echo '<div class="alert alert-danger">'.$announce.'</div>';}
					}
				?>
			</div>
			<div class="x_content">
				<br />
				<form method="post" action="<?= base_url('Kemahasiswaan-upload'); ?>" enctype="multipart/form-data">

					<label>Pilih File Excel</label>
					<input type="file" name="filee" id="filee" required accept=".xls, .xlsx" />
					<input type="submit" value="Import" class="btn btn-info"
						onclick="return confirm('Data sudah benar dan saya akan menguploadnya?')" /></p>
				</form>
				<div class="col-md-12 col-sm-12">
				</div>
			</div>
			<div class="x_content">
				<div class="divider"></div>
				<?php $no = 1; if (!empty(@$tmp)) : ?>

				<div class="row">
					<div class="col-sm-12">
						<div class="card-box table-responsive">
							<table id="datatable" class="table table-striped table-bordered" style="width:100%">

								<thead>
									<tr>
										<th>No</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Tempat Lahir</th>
										<th>Tgl Lahir</th>
										<th>Jenis Kelamin</th>
										<th>NIK</th>
										<th>Agama</th>
										<th>NISN</th>
										<th>Id Jalur Masuk</th>
										<th>NPWP</th>
										<th>Kewarganegaraan</th>
										<th>Jenis Pendaftaran</th>
										<th>Tanggal Masuk Kuliah</th>
										<th>Tahun Masuk</th>
										<th>Mulai Semester</th>
										<th>Jalan</th>
										<th>RT</th>
										<th>RW</th>
										<th>Dusun</th>
										<th>Kelurahan</th>
										<th>Kecamatan</th>
										<th>Kode POS</th>
										<th>Jenis Tinggal</th>
										<th>Alat Transportasi</th>
										<th>Telp Rumah</th>
										<th>No Hp</th>
										<th>Email</th>
										<th>Terima KPS</th>
										<th>No KPS</th>
										<th>NIK Ayah</th>
										<th>Nama Ayah</th>
										<th>Tanggal Lahir Ayah</th>
										<th>Pendidikan Ayah</th>
										<th>Pekerjaan Ayah</th>
										<th>Penghasilan Ayah</th>
										<th>NIK Ibu</th>
										<th>Nama Ibu</th>
										<th>Tanggal Lahir Ibu</th>
										<th>Pendidikan Ibu</th>
										<th>Pekerjaan Ibu</th>
										<th>Penghasilan Ibu</th>
										<th>Nama Wali</th>
										<th>Tanggal Lahir Wali</th>
										<th>Pendidikan Wali</th>
										<th>Pekerjaan Wali</th>
										<th>Penghasilan Wali</th>
										<th>Semester Dijalani</th>
										<th>Jurusan </th>
										<th>Kelas</th>
										<th>Tahun Ajaran</th>

									</tr>
								</thead>

								<tbody>
									<?php foreach ($tmp as $m) : ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $m->nim ?></td>
										<td><?php echo $m->nama ?></td>
										<td><?php echo $m->tempat_lahir ?></td>
										<td><?php echo $m->tanggal_lahir ?></td>
										<td><?php echo $m->jenis_kelamin ?></td>
										<td><?php echo $m->nik ?></td>
										<td><?php echo $m->agama ?></td>
										<td><?php echo $m->nisn ?></td>
										<td><?php echo $m->id_jalur_masuk ?></td>
										<td><?php echo $m->npwp ?></td>
										<td><?php echo $m->kewarganegaraan ?></td>
										<td><?php echo $m->jenis_pendaftaran ?></td>
										<td><?php echo $m->tanggal_masuk_kuliah ?></td>
										<td><?php echo $m->tahun_masuk ?></td>
										<td><?php echo $m->mulai_semester ?></td>
										<td><?php echo $m->jalan ?></td>
										<td><?php echo $m->rt ?></td>
										<td><?php echo $m->rw ?></td>
										<td><?php echo $m->dusun ?></td>
										<td><?php echo $m->kelurahan ?></td>
										<td><?php echo $m->kecamatan ?></td>
										<td><?php echo $m->kode_pos ?></td>
										<td><?php echo $m->jenis_tinggal ?></td>
										<td><?php echo $m->alat_transportasi ?></td>
										<td><?php echo $m->telp_rumah ?></td>
										<td><?php echo $m->no_hp ?></td>
										<td><?php echo $m->email ?></td>
										<td><?php echo $m->terima_kps ?></td>
										<td><?php echo $m->no_kps ?></td>
										<td><?php echo $m->nik_ayah ?></td>
										<td><?php echo $m->nama_ayah ?></td>
										<td><?php echo $m->tanggal_lahir_ayah ?></td>
										<td><?php echo $m->pendidikan_ayah ?></td>
										<td><?php echo $m->pekerjaan_ayah ?></td>
										<td><?php echo $m->penghasilan_ayah ?></td>
										<td><?php echo $m->nik_ibu ?></td>
										<td><?php echo $m->nama_ibu ?></td>
										<td><?php echo $m->tanggal_lahir_ibu ?></td>
										<td><?php echo $m->pendidikan_ibu ?></td>
										<td><?php echo $m->pekerjaan_ibu ?></td>
										<td><?php echo $m->penghasilan_ibu ?></td>
										<td><?php echo $m->nama_wali ?></td>
										<td><?php echo $m->tanggal_lahir_wali ?></td>
										<td><?php echo $m->pendidikan_wali ?></td>
										<td><?php echo $m->pekerjaan_wali ?></td>
										<td><?php echo $m->penghasilan_wali ?></td>
										<td><?php echo $m->semester_dijalani ?></td>
										<td><?php echo $m->fk_jurusan_id ?></td>
										<td><?php echo $m->fk_kelas_id ?></td>
										<td><?php echo $m->fk_tahunajaran_id ?></td>
									</tr>
									<?php endforeach ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<br>
				<center>
				<a href="<?= base_url('kemahasiswaan-insert-data') ?>">
					<button class="btn btn-primary " onclick="return confirm('Data sudah benar dan saya akan menguploadnya?')" ><i class="fa fa-save"></i> Simpan Ke Data Mahasiswa</button></center>
				</a>
					<?php else: ?>
			<tr>
				<td colspan="9" align="center">Tidak Ada Data</td>
			</tr>
			<?php endif ?>
			</div>
			
		</div>
	</div>
</div>
