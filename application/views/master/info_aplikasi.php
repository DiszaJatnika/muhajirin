<div class="col-md-12 col-sm-12 ">

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Info Aplikasi </h2>
				
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
				<form id="demo-form2" method="POST" action="Master-update-info-aplikasi" data-parsley-validate
					class="form-horizontal form-label-left">

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Aplikasi <span
								class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="first-name" name="nama_aplikasi"
								value="<?= $profil->nama_aplikasi ?>" required="required" class="form-control ">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Deskripsi Singkat
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="last-name" name="deskripsi" value="<?= $profil->deskripsi ?>"
								required="required" class="form-control">
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
							<button class="btn btn-warning btn-sm" type="reset">Reset</button>
							<input type="submit" class="btn btn-success btn-sm" name="submit" value="Simpan">
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
</div>