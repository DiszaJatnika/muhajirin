<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

	<title><?= $profil->nama_aplikasi ?></title>

	<!-- Bootstrap -->
	<link href="<?= base_url('') ?>template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?= base_url('') ?>template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?= base_url('') ?>template/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
	<!-- bootstrap-daterangepicker -->
	<link href="<?= base_url('') ?>template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="<?= base_url('') ?>template/build/css/custom.min.css" rel="stylesheet">
	<link href="<?= base_url('') ?>template/build/css/sweetalert.css" rel="stylesheet">

	<script src="<?= base_url('') ?>template/build/js/sweetalert-dev.js"></script>

	<link href="<?= base_url('') ?>template/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css"
		rel="stylesheet">
	<link href="<?= base_url('') ?>template/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"
		rel="stylesheet">
	<link href="<?= base_url('') ?>template/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
		rel="stylesheet">
	<link href="<?= base_url('') ?>template/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
		rel="stylesheet">
	<link href="<?= base_url('') ?>template/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
		rel="stylesheet">
	<script src="<?= base_url('') ?>template/build/js/jquery-3.6.0.min.js"></script>
	<!-- //select2 -->
	<link rel="stylesheet" href="<?= base_url('template/build/select2/select2.min.css');?>"/>

</script>
</head>

<body class="nav-md">
	<div class="container body ">
		<div class="main_container ">
			<div class="col-md-3 left_col ">
				<div class="left_col scroll-view ">
					<div class="navbar nav_title" style="border: 0;">
						<a href="<?= base_url()?>" class="site_title">
							
							<span> <img src="<?= base_url('template/rt/05.png') ?>" alt="" width="50px"><?= $profil->nama_aplikasi ?></span></a>
					</div>

					<div class="clearfix"></div>


					<hr>
					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu  ">
						<div class="menu_section">
							<?php 
								$level = $this->session->userdata['level'];

								if($level == 1 or $level == 2):
							?>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-cog"></i> Pengaturan <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="<?= base_url()?>Master-info-aplikasi">Info Aplikasi</a></li>
										<li><a href="<?= base_url()?>Master-menu">Master Menu</a></li>
										<li><a href="<?= base_url()?>Master-level">Master Level Akun</a></li>
										<li><a href="<?= base_url()?>Master-modul">Master Modul</a></li>
										<li><a href="<?= base_url()?>Master-hak-akses">Master Hak Akses</a></li>
										<li><a href="<?= base_url()?>Master-user">Master User</a></li>
										<li><a href="<?= base_url()?>Master-blog">Master Blog</a></li>
									</ul>
								</li>
							</ul>

								<?php 
								endif;
								?>
							<ul class="nav side-menu">

								<?php
								foreach($menu as $main): 
									$idmenu = $main->pk_menu_id;	
									$multi	= $main->multi;	

								if($multi == 'Y'):
							?>
								<li><a><i class="fa <?= $main->icon ?>"></i> <?= $main->nama_menu ?> <span
											class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<?php foreach($submenu as $sub): 
										$idsub = $sub->fk_menu_id;	

										if($idmenu == $idsub):
									?>
										<li><a href="<?= base_url().$sub->url ?>"><?= $sub->nama_submenu; ?></a></li>
										<?php 
										endif;
									endforeach; ?>
									</ul>
								</li>
								<?php else: ?>
								<div class="menu_section">
									<ul class="nav side-menu">
										<li><a href="<?= $main->url ?>"><i class="fa  <?= $main->icon ?>"></i> <?= $main->nama_menu ?></a>
										</li>
									</ul>
								</div>

								<?php endif; ?>

								<?php endforeach; ?>

							</ul>
						</div>

					</div>
				</div>
			</div>
		</div>


		<!-- top navigation -->
		<div class="top_nav">
			<div class="nav_menu">
				<div class="nav toggle">
					<a id="menu_toggle"><i class="fa fa-bars"></i></a>
				</div>

				<nav class="nav navbar-nav">
					<ul class=" navbar-right">
						<li class="nav-item dropdown open" style="padding-left: 15px;">
							<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
								id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
								<img src="<?= base_url('').'template/profil/default.png'?>" alt=""><?php echo "(". $_SESSION['username'] . ")"?>
							</a>
							<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
								<!-- <a class="dropdown-item" href="javascript:;"> Profile</a>
								<a class="dropdown-item" href="javascript:;">
									<span class="badge bg-red pull-right">50%</span>
									<span>Settings</span>
								</a>
								<a class="dropdown-item" href="javascript:;">Help</a> -->
								<a class="dropdown-item" href="<?php echo base_url('Auth/logout')?>"><i
										class="fa fa-sign-out pull-right"></i> Log Out</a>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /top navigation -->

		<!-- page content -->
		<div class="right_col bg-white" role="main">
