<!-- /page content -->

<!-- footer content -->
<footer>
	<div class="pull-left">
		<?=
						 "<i class='fa fa-calendar'></i> " . date("d:M:Y") . "<br>";
					?>
	</div>
	<div class="pull-right">
		<?= $profil->nama_aplikasi ?> &copy; <?= date('Y')?>
	</div>
	<div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?= base_url('') ?>template/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('') ?>template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('') ?>template/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url('') ?>template/vendors/nprogress/nprogress.js"></script>
<!-- jQuery Smart Wizard -->
<script src="<?= base_url('') ?>template/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?= base_url('') ?>template/build/js/custom.min.js"></script>


</body>

</html>
