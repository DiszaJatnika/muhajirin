<div class="col-md-12 col-sm-12 ">

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Pelanggaran </h2>
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
				<form method="POST" action="<?= base_url('Master-pelanggaran-edit-save'); ?>" data-parsley-validate
					class="form-horizontal form-label-left">
                    <input type="hidden" name="pelanggaran_id" value="<?= encrypt_url($pelanggaran['pelanggaran_id']) ?>">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Pelanggaran
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="nama_pelanggaran" name="nama_pelanggaran"  value="<?= $pelanggaran['nama_pelanggaran']?>" required="required" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Jenis Pelanggaran
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
                            <input type="radio" name="jenis_pelanggaran" id="" value="B" <?php if($pelanggaran['jenis_pelanggaran'] == "B"){ echo "checked";}?>>Besar
                            <input type="radio" name="jenis_pelanggaran" id="" value="K" <?php if($pelanggaran['jenis_pelanggaran'] == "K"){ echo "checked";}?>>Kecil
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Poin Pelanggaran
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="poin_pelanggaran" name="poin_pelanggaran" value="<?= $pelanggaran['poin_pelanggaran']?>" class="form-control">
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="<?= base_url('Master-pelanggaran'); ?>">
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