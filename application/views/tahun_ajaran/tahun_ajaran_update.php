<div class="col-md-12 col-sm-12 ">

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Ubah Tahun Ajaran </h2>
				
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
				<form id="demo-form2" method="POST" action="<?= base_url('Tahun-ajaran-update-save'); ?>" data-parsley-validate
					class="form-horizontal form-label-left">
					<!-- hidden field -->
					<input type="hidden" name="tahunajaran_id" value="<?= $ta->pk_tahunajaran_id; ?>">
					<!-- end hidden field -->
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tahun Ajaran
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="last-name" name="tahun_ajaran" value="<?= $ta->tahun_ajaran ?>"
								required="required" class="form-control">
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
							<button class="btn btn-primary" type="reset">Reset</button>
							<input type="submit" class="btn btn-success" name="submit" value="Simpan">
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
</div>