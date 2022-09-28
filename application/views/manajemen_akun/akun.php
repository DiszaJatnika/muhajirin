
<div class="col-md-12 col-sm-12 ">
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Ganti Password </h2>
				
				<div class="clearfix"></div>
				<?php
					$announce = $this->session->flashdata('announce');
					if(!empty($announce)){
						if($announce == 'Berhasil mengubah data'){
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
				<form method="POST" action="<?= base_url()?>Akun-ganti-password" data-parsley-validate
					class="form-horizontal form-label-left">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $mhs->pk_user_id ?>">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Username <span
								class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<input type="text" id="username" name="username"
								value="<?= $mhs->username ?>" required="required" class="form-control " disabled>
						</div>
						<div class="col-sm-2 col-sm-2 mt-2">
                            <input type="checkbox" class="form-check-label" name="check" id="check"> Ubah Username
                        </div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Password Baru
							<span></span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<input type="password" id="password_baru" name="password_baru"
								required="required" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Konfirmasi Password Baru
							<span></span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<input type="password" id="konfir_password_baru" name="konfir_password_baru" 
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
<script>
    document.getElementById('check').onchange = function() {
        document.getElementById('username').disabled = !this.checked;
    };
</script>
