<div class="col-md-12 col-sm-12 ">

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Siswa  </h2>
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
				<form method="POST" action="<?= base_url('Master-siswa-edit-save'); ?>" data-parsley-validate
					class="form-horizontal form-label-left">
                    <input type="hidden" name="siswa_id" id="siswa_id" value="<?= encrypt_url($siswa['siswa_id'])?>">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nomor Induk Siswa
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="nomor_induk" name="nomor_induk" value="<?= $siswa['nomor_induk'] ?>" required="required" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Siswa <span
								class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="nama_siswa" name="nama_siswa"
                            value="<?= $siswa['nama_siswa'] ?>"  required="required" class="form-control ">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Jenis Kelamin
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
								<option value="L" <?php if($siswa['jenis_kelamin'] == 'L') { echo "selected"; } ?>>Laki Laki</option>
								<option value="P" <?php if($siswa['jenis_kelamin'] == 'P') { echo "selected"; } ?>>Perempuan</option>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Semester Dijalani
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="semester_dijalani" name="semester_dijalani"
                            value="<?= $siswa['semester_dijalani'] ?>"  required="required" class="form-control ">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kelas
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
                            <select name="kelas_id" id="kelas_id" class="form-control">
                                <?php foreach($kelas as $kls): ?>
                                    <option value="<?= $kls['rombel_id']?>"><?= $kls['nama_rombel']?></option>
                                <?php endforeach; ?>
							</select>
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Status Siswa
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
                            <select name="status_siswa" id="status_siswa" class="form-control">
                               <option value="A" <?php if($siswa['status_siswa'] == 'A') { echo "selected"; } ?>>Aktif</option>
                               <option value="L" <?php if($siswa['status_siswa'] == 'L') { echo "selected"; } ?>>Lulus</option>
                               <option value="DO" <?php if($siswa['status_siswa'] == 'DO') { echo "selected"; } ?>>Drop Out</option>
							</select>
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="<?= base_url('Master-siswa'); ?>">
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