<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<div class="col-md-12 col-sm-12 ">

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Edit Blog </h2>
				
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
				<form id="demo-form2" method="POST" action="<?= base_url('').'Master-blog-save-update'?>" data-parsley-validate
					class="form-horizontal form-label-left">
					<input type="hidden" name="id_blog" value="<?= $blog->pk_blog_id; ?>">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Judul <span
								class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="first-name" name="judul"
							 required="required" value="<?= $blog->judul; ?>" class="form-control ">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Penulis
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="last-name" name="penulis" 
								required="required" value="<?= $blog->penulis; ?>" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tanggal
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="date" id="last-name" name="tanggal" value="<?= $blog->tanggal; ?>" 
								required="required" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kategori
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="Informasi" <?php if($blog->kategori == 'Informasi'){ echo "selected";}?>>Informasi</option>
                                <option value="Tutorial" <?php if($blog->kategori == 'Tutorial'){ echo "selected";}?>>Tutorial</option>
                                <option value="Lainnya" <?php if($blog->kategori == 'Lainnya'){ echo "selected";}?>>Lainnya</option>
                            </select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Jenis
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="primary" <?php if($blog->jenis == 'primary'){ echo "selected";}?>>Primary</option>
                                <option value="side" <?php if($blog->jenis == 'side'){ echo "selected";}?>>Side</option>
                            </select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Deskripsi Singkat
							<span></span>
						</label>
						<div class="col-md-6 col-sm-6 ">
                            <textarea id="editor" name="deskripsi" ><?= $blog->deskripsi; ?></textarea>
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
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

</script>