<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="view`port" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>SIBERKESOS</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="<?= base_url().'template/homepage/'?>css/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="<?= base_url().'template/homepage/'?>css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?= base_url().'template/homepage/'?>style.css" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="<?= base_url().'template/homepage/'?>css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="<?= base_url().'template/homepage/'?>css/colors.css" rel="stylesheet">

<!-- Version Garden CSS for this template -->
<link href="<?= base_url().'template/homepage/'?>css/version/garden.css" rel="stylesheet">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<div id="wrapper">
		<div class="collapse top-search" id="collapseExample">
			<div class="card card-block">
				<div class="newsletter-widget text-center">
					<form class="form-inline">
						<input type="text" class="form-control" placeholder="What you are looking for?">
						<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
					</form>
				</div><!-- end newsletter -->
			</div>
		</div><!-- end top-search -->

		<div class="topbar-section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6 hidden-xs-down">
						<div class="topsocial">
							<a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
									class="fa fa-facebook"></i></a>
							<a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i
									class="fa fa-youtube"></i></a>
							<a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
									class="fa fa-pinterest"></i></a>
							<a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
									class="fa fa-twitter"></i></a>
							<a href="#" data-toggle="tooltip" data-placement="bottom" title="Flickr"><i
									class="fa fa-flickr"></i></a>
							<a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
									class="fa fa-instagram"></i></a>
							<a href="#" data-toggle="tooltip" data-placement="bottom" title="Google+"><i
									class="fa fa-google-plus"></i></a>
						</div><!-- end social -->
					</div><!-- end col -->

					<div class="col-lg-4 hidden-md-down">
					</div><!-- end col -->

				</div><!-- end row -->
			</div><!-- end header-logo -->
		</div><!-- end topbar -->

		<div class="header-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="logo">
							<a href="garden-index.html"><img src="images/version/garden-logo.png" alt=""></a>
						</div><!-- end logo -->
					</div>
				</div><!-- end row -->
			</div><!-- end header-logo -->
		</div><!-- end header -->

		<header class="header">
			<div class="container">
				<a href="<?= base_url('/') ?>">Home</a> |
				<a href="<?= base_url().'Auth'?>">PORTAL SIBERKESOS</a>
			</div><!-- end container -->
		</header><!-- end header -->


		<section class="section wb">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
						<div class="page-wrapper">

							<div class="blog-list clearfix">
								<div class="blog-box row">
									<div class="col-md-4">
										<!-- <a href="" title=""> -->
										<small>Dipost Oleh :<a href="#" title=""><?= $blog->penulis ?></a></small><br>
										<small>Tanggal : <?= $blog->tanggal ?></small>

										<!-- </a> -->
									</div><!-- end col -->
									<div class="blog-meta big-meta col-md-8">
										<img src="<?= base_url().'template/blog/'. $blog->foto ?>" alt=""
											class="img-fluid">

										<span class="bg-aqua"><?= $blog->kategori ?></span>
										<h4><?= $blog->judul ?></h4>
										<p>
											<?php
											echo  $blog->deskripsi;
									    ?>
										</p>
									</div><!-- end meta -->


								</div><!-- end blog-box -->

							</div><!-- end blog-list -->
						</div><!-- end page-wrapper -->

						<hr class="invis">

					</div><!-- end col -->


				</div><!-- end row -->
			</div><!-- end container -->
		</section>

		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<div class="widget">
							<div class="footer-text text-center">
								<a href="index.html"><img src="images/version/garden-footer-logo.png" alt=""
										class="img-fluid"></a>
								<p>SIBERKESOS <?= date('Y') ?></p>
								<div class="social">
									<a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
											class="fa fa-facebook"></i></a>
									<a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
											class="fa fa-twitter"></i></a>
									<a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
											class="fa fa-instagram"></i></a>
									<a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i
											class="fa fa-google-plus"></i></a>
									<a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
											class="fa fa-pinterest"></i></a>
								</div>

								<hr class="invis">

							</div><!-- end footer-text -->
						</div><!-- end widget -->
					</div><!-- end col -->
				</div>
			</div><!-- end container -->
		</footer><!-- end footer -->

		<div class="dmtop">Scroll to Top</div>

	</div><!-- end wrapper -->

	<!-- Core JavaScript
    ================================================== -->
	<script src="<?= base_url().'template/homepage/'?>js/jquery.min.js"></script>
	<script src="<?= base_url().'template/homepage/'?>js/tether.min.js"></script>
	<script src="<?= base_url().'template/homepage/'?>js/bootstrap.min.js"></script>
	<script src="<?= base_url().'template/homepage/'?>js/custom.js"></script>

</body>

</html>
