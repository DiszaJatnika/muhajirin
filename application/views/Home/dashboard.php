<?php 
	$level =  $this->session->userdata['jabatan'];

	if($level == 2):
?>
<img src="<?= base_url('/assets/profil/dashboard.png')?>" alt="" width="100%">

<div class="row" style="display: inline-block;"></div>
<div class="row">

	<div class="col-md-3 col-sm-3 ">
		<div class="card text-white bg-primary mb-4 mt-12" style="max-width: 30rem;">
			<div class="card-body">
				<p class="card-title">Total Siswa</p>
				<h4><?= $totalsiswa ?> Orang</h4>
			</div>
		</div>
	</div>
	
	

	<div class="col-md-3 col-sm-3 ">
		<div class="card text-white bg-info mb-4 mt-12" style="max-width: 30rem;">
			<div class="card-body">
				<p class="card-title">Total PTK</p>
				<h4><?= $totalptk ?> Orang</h4>

			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-3 ">
		<div class="card text-white bg-danger mb-4 mt-12" style="max-width: 30rem;">
			<div class="card-body">
				<p class="card-title">Total Rombel</p>
				<h4><?= $totalrombel ?> Rombel</h4>

			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-3 ">
		<div class="card text-white bg-success mb-4 mt-12" style="max-width: 30rem;">
			<div class="card-body">
				<p class="card-title">Total User</p>
				<h4><?= $totaluser?> User</h4>

			</div>
		</div>
	</div>

</div>
<div class="divider"></div>

<div class="row">

	<div class="col-md-4">
		<div class="x_panel">
			<div class="x_title">
				<h2>Tentang Aplikasi</h2>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<article class="media event ">
					<img src="<?= base_url('/assets/profil/logo.png')?>" alt="" width="100%">
				</article>
				<h4>
					Selamat datang di SIAKAD Qoshrul Muhajirin Versi 0.1. <br>
				</h4>
				<div class="divider"></div>
				<article class="media event">
					Tahun Ajaran Berjalan : <span class="badge badge-primary">2021/2022</span>
				</article>
				<div class="divider"></div>

				<article class="media event">
					Semester Berjalan : <span class="badge badge-primary">2021/2022</span>

				</article>

			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="x_panel">
			<div class="x_title">
				<h2>Siswa Aktif Berdasarkan Jenis Kelamin</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table class="table table-striped">
					<tr>
						<th>Laki Laki</th>
						<td>:</td>
						<td><span class="badge badge-primary"><?= $siswa?> Siswa</span></td>
					</tr>
					<tr>
						<th>Perempuan</th>
						<td>:</td>
						<td><span class="badge badge-primary"><?= $siswi?> Siswi</span></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="x_panel">
			<div class="x_title">
				<h2>Siswa Aktif Berdasarkan Angkatan</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table class="table table-striped">
					<tr>
						<th>Kelas VII</th>
						<td>:</td>
						<td><span class="badge badge-primary"><?= $vii?> Orang</span></td>
					</tr>
					
					<tr>
						<th>Kelas VIII</th>
						<td>:</td>
						<td><span class="badge badge-primary"><?= $viii?> Orang</span></td>
					</tr>
					<tr>
						<th>Kelas IX</th>
						<td>:</td>
						<td><span class="badge badge-primary"><?= $ix?> Orang</span></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="x_panel">
			<div class="x_title">
				<h2>Detail Rombel</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table class="table table-striped">
					<?php foreach($rombel as $rombel):
						$total = $this->db->get_where('tbl_siswa', array('kelas_id' => $rombel->rombel_id));
						$total = $total->num_rows();
					?>
					<tr>
						<th><?= $rombel->nama_rombel?></th>
						<td>:</td>
						<td><span class="badge badge-primary"> <?= $total?> Orang</span></td>
					</tr>
					<?php endforeach;?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php 
	elseif($level == 3):
?>
<img src="<?= base_url('/assets/profil/dashboard.png')?>" alt="" width="100%">

<div class="row" style="display: inline-block;"></div>
<div class="row">

	<div class="col-md-3 col-sm-3 ">
		<div class="card text-white bg-primary mb-4 mt-12" style="max-width: 30rem;">
			<div class="card-body">
				<p class="card-title">Total Siswa</p>
				<h4><?= $totalsiswa ?> Orang</h4>
			</div>
		</div>
	</div>
	
	

	<div class="col-md-3 col-sm-3 ">
		<div class="card text-white bg-info mb-4 mt-12" style="max-width: 30rem;">
			<div class="card-body">
				<p class="card-title">Total PTK</p>
				<h4><?= $totalptk ?> Orang</h4>

			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-3 ">
		<div class="card text-white bg-danger mb-4 mt-12" style="max-width: 30rem;">
			<div class="card-body">
				<p class="card-title">Total Rombel</p>
				<h4><?= $totalrombel ?> Rombel</h4>

			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-3 ">
		<div class="card text-white bg-success mb-4 mt-12" style="max-width: 30rem;">
			<div class="card-body">
				<p class="card-title">Total User</p>
				<h4><?= $totaluser?> User</h4>

			</div>
		</div>
	</div>

</div>
<div class="divider"></div>

<div class="row">

	<div class="col-md-4">
		<div class="x_panel">
			<div class="x_title">
				<h2>Tentang Aplikasi</h2>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<article class="media event ">
					<img src="<?= base_url('/assets/profil/logo.png')?>" alt="" width="100%">
				</article>
				<h4>
					Selamat datang di SIAKAD Qoshrul Muhajirin Versi 0.1. <br>
				</h4>
				<div class="divider"></div>
				<article class="media event">
					Tahun Ajaran Berjalan : <span class="badge badge-primary">2021/2022</span>
				</article>
				<div class="divider"></div>

				<article class="media event">
					Semester Berjalan : <span class="badge badge-primary">2021/2022</span>

				</article>

			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="x_panel">
			<div class="x_title">
				<h2>Siswa Aktif Berdasarkan Jenis Kelamin</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table class="table table-striped">
					<tr>
						<th>Laki Laki</th>
						<td>:</td>
						<td><span class="badge badge-primary"><?= $siswa?> Siswa</span></td>
					</tr>
					<tr>
						<th>Perempuan</th>
						<td>:</td>
						<td><span class="badge badge-primary"><?= $siswi?> Siswi</span></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="x_panel">
			<div class="x_title">
				<h2>Siswa Aktif Berdasarkan Angkatan</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table class="table table-striped">
					<tr>
						<th>Kelas VII</th>
						<td>:</td>
						<td><span class="badge badge-primary"><?= $vii?> Orang</span></td>
					</tr>
					
					<tr>
						<th>Kelas VIII</th>
						<td>:</td>
						<td><span class="badge badge-primary"><?= $viii?> Orang</span></td>
					</tr>
					<tr>
						<th>Kelas IX</th>
						<td>:</td>
						<td><span class="badge badge-primary"><?= $ix?> Orang</span></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="x_panel">
			<div class="x_title">
				<h2>Detail Rombel</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table class="table table-striped">
					<?php foreach($rombel as $rombel):
						$total = $this->db->get_where('tbl_siswa', array('kelas_id' => $rombel->rombel_id));
						$total = $total->num_rows();
					?>
					<tr>
						<th><?= $rombel->nama_rombel?></th>
						<td>:</td>
						<td><span class="badge badge-primary"> <?= $total?> Orang</span></td>
					</tr>
					<?php endforeach;?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php 
	endif;
?>