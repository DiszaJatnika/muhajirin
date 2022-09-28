<div class="col-md-12 col-sm-12 ">

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Murojaah </h2>
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
				<form method="POST" action="<?= base_url('Murojaah-edit-save'); ?>" data-parsley-validate
					class="form-horizontal form-label-left">
                    <input type="hidden" name="murojaah_id" id="murojaah_id" value="<?= $murojaah['murojaah_id']?>">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
							<span class="badge badge-success">Rombongan Belajar</span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<select name="rombel_id" id="rombel_id" class="form-control" >
									<option value="">Pilih</option>
									<?php foreach ($rombel as $rm) : ?>
										<option value="<?= $rm['rombel_id']?>" <?php if($murojaah['rombel_id'] == $rm['rombel_id']) { echo"selected"; } ?>><?= $rm['nama_rombel']?></option>
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
							<span class="badge badge-primary">Dari Surah</span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<select name="dari_surah" id="dari_surah" class="form-control select2" >
									<?php foreach ($quran as $m => $value) : ?>
										<option value="<?= $value['nama_latin']?>" 
                                        <?php if($value['nama_latin'] == $murojaah['dari_surah']) { echo "selected";} ?> ><?= $value['nama_latin']?></option>
									<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
							<span class="badge badge-primary">Ayat Ke : </span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<input type="text" name="dari_ayat_ke" id="dari_ayat_ke" value="<?= $murojaah['dari_ayat_ke']?>" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
							<span class="badge badge-warning">Sampai Surah : </span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<select name="sampai_surah" id="sampai_surah" class="form-control select2" >
									<?php foreach ($quran as $m => $value) : ?>
										<option value="<?= $value['nama_latin']?>" <?php if($value['nama_latin'] == $murojaah['sampai_surah']) { echo "selected";} ?> ><?= $value['nama_latin']?></option>
									<?php endforeach; ?>
							</select>
						</div>
					</div>
					
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
							<span class="badge badge-warning">Ayat Ke : </span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<input type="text" name="sampai_ayat_ke" id="sampai_ayat_ke" value="<?= $murojaah['sampai_ayat_ke']?>" class="form-control">
						</div>
					</div>

					
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
							<span class="badge badge-success">Putaran </span>
						</label>
						<div class="col-md-4 col-sm-4 ">
							<input type="radio" name="putaran" id="putaran" value="1" <?php if($murojaah['putaran'] == 1) { echo "checked";} ?>> Satu
							<input type="radio" name="putaran" id="putaran" value="2" <?php if($murojaah['putaran'] == 2) { echo "checked";} ?>> Dua
							<input type="radio" name="putaran" id="putaran" value="3" <?php if($murojaah['putaran'] == 3) { echo "checked";} ?>> Tiga
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
						<br><br>
                            <a href="<?= base_url('Hafalan-murojaah'); ?>">
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

	var siswa  = "<?= $murojaah['siswa_id'] ?>";
	
	$.ajax({
		url: "<?php echo site_url('Hafalan_siswa/get_siswa');?>",
		method: "POST",
		data: {
			id: siswa
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
});
</script>
