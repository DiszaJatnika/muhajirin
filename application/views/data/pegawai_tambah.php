<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Upload Pegawai </h2> &nbsp;&nbsp;
				<a href="<?= base_url('assets/download/data_pegawai.xlsx'); ?>">
					<button class="btn btn-sm btn-success"> <i class="fa fa-download"></i> Download Template</button>
				</a>

				<div class="clearfix"></div>
				<?php
					$announce = $this->session->flashdata('announce');
					if(!empty($announce)){ 
						if($announce == 'Data Berhasil diupload'){ echo '<div class="alert alert-success"> '.$announce.'</div>';}
						else{echo '<div class="alert alert-danger">'.$announce.'</div>';}
					}
				?>
			</div>
			<div class="x_content">
				<br />
				<form method="post" action="<?= base_url('Master-pegawai-save'); ?>" enctype="multipart/form-data">
                    <table class="table table-borderless">
                        <tr>
                            <td>Pilih File Excel</td>
                            <td>:</td>
                            <td>
                                <input type="file" name="filee" id="filee" required accept=".xls, .xlsx" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <input type="submit" value="Import" class="btn btn-info btn-sm"
                            onclick="return confirm('Data sudah benar dan saya akan menguploadnya?')" /></td>
                        </tr>
                    </table>
				</form>
			</div>
		</div>
	</div>
</div>