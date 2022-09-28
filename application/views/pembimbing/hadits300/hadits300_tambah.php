<div class="col-md-12 col-sm-12 ">

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Hadits 300 </h2>
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
				<form method="POST" action="<?= base_url('Hadits-300-save'); ?>" data-parsley-validate
					class="form-horizontal form-label-left">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
							<span class="badge badge-success">Rombongan Belajar</span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<select name="rombel_id" id="rombel_id" class="form-control" >
									<option value="">Pilih</option>
									<?php foreach ($rombel as $rm) : ?>
										<option value="<?= $rm['rombel_id']?>"><?= $rm['nama_rombel']?></option>
									<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
							<span class="badge badge-success">Nama Siswa</span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<select name="siswa_id" id="siswa_id" class="form-control select2" >
									<option value="">Pilih Siswa</option>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
							<span class="badge badge-success">Hadits : </span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<select name="hadits_id" id="hadits_id" class="form-control select2" >
									<?php foreach ($hadits as $m) : ?>
										<option value="<?= $m['hadits300_id']?>"><?= $m['nama_hadits']?></option>
									<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
							<span class="badge badge-success">Putaran </span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<input type="radio" name="putaran" id="putaran" value="1"> Satu
							<input type="radio" name="putaran" id="putaran" value="2"> Dua
							<input type="radio" name="putaran" id="putaran" value="3"> Tiga
						</div>
					</div>

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
							<span class="badge badge-success">Keterangan : </span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"></textarea>
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
						<br><br>
                            <a href="<?= base_url('Hadits-300'); ?>">
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
<script type="text/javascript" src="<?php echo base_url().'template/build/js/jquery-3.3.1.js'?>"></script>
<script type="text/javascript">    
$(document).ready(function () {
	$('#rombel_id').change(function () {
		var id = $(this).val();
		$.ajax({
			url: "<?php echo site_url('Hafalan_siswa/get_siswa');?>",
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
					html += '<option value=' + data[i].siswa_id + '>' + data[i].nama_siswa +
						'</option>';
				}
				$('#siswa_id').html(html);
			}
		});
		return false;
	});
});
</script>
