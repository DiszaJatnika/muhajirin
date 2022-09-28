<div class="col-md-12 col-sm-12 ">

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Pegawai  </h2>
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
				<form method="POST" action="<?= base_url('Master-pegawai-edit-save'); ?>" data-parsley-validate
					class="form-horizontal form-label-left">
                    <input type="hidden" name="pegawai_id" id="pegawai_id" value="<?= encrypt_url($pegawai['pegawai_id'])?>">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nomor Induk Kependudukan
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="nomor_induk" name="nomor_induk" value="<?= $pegawai['nik'] ?>" required="required" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Pegawai <span
								class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="nama" name="nama"
                            value="<?= $pegawai['nama'] ?>"  required="required" class="form-control ">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Jabatan
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
                            <select name="jabatan" id="jabatan" class="form-control">
                                <?php 
                                foreach($jabatan as $jbt): ?>
                                    <option value="<?= $jbt['jabatan_id']?>" <?php if($jbt['jabatan_id'] == $pegawai['jabatan']) { echo"selected" ;} ?>><?= $jbt['nama_jabatan']?></option>
                                <?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No HP <span
								class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="no_hp" name="no_hp"
                            value="<?= $pegawai['no_hp'] ?>"  required="required" class="form-control ">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat <span
								class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5"><?= $pegawai['alamat']?></textarea>
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="<?= base_url('Master-pegawai'); ?>">
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