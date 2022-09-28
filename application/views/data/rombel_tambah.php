<div class="col-md-12 col-sm-12 ">

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Rombongan Belajar  </h2>
				<div class="clearfix"></div>
				<?php
					$announce = $this->session->flashdata('announce');
					if(!empty($announce)){
						if($announce == 'Berhasil menyimpan data'){
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
			</div>
			<div class="x_content">
				<br />
				<form method="POST" action="<?= base_url('Master-rombel-save'); ?>" data-parsley-validate
					class="form-horizontal form-label-left">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Rombel
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="nama_rombel" name="nama_rombel"  required="required" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Wali Kelas
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
                            <select name="wali_kelas" id="wali_kelas" class="form-control select2">
                                <option value="">Pilih</option>
                                <?php foreach($pegawai as $pgw): ?>
                                <option value="<?= $pgw['pegawai_id']?>"><?= $pgw['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Semester
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="semester" name="semester"  required="required" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tahun Ajaran
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
                            <select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                                <option value="">Pilih</option>
                                <?php foreach($tahunajaran as $ta): ?>
                                <option value="<?= $ta['tahun_ajaran_id']?>"><?= $ta['nama_tahun_ajaran'] ?></option>
                                <?php endforeach; ?>
                            </select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Strata
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="strata" name="strata"  required="required" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Status
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
                            <select name="status" id="status" class="form-control">
                                <option value="A">Aktif</option>
                                <option value="NA">Non Aktif</option>
                            </select>
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="<?= base_url('Master-jabatan'); ?>">
                                <span class="btn btn-warning btn-sm">
                                <i class="fa fa-arrow-left"></i> Kembali</span>
                            </a>
                            <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> Simpan</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
</div>