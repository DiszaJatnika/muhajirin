
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>SIAKAD</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" href="<?= base_url('assets/profil/logo.png')?>" type="image/ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/template/login/vendor/bootstrap/css/bootstrap.min.css')?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/template/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/template/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/login/vendor/animate/animate.css')?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/template/login/vendor/animsition/css/animsition.min.css')?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/template/login/css/util.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/template/login/css/main.css')?>">

    <!-- Bootstrap -->
    <link href="<?= base_url('/template/login/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- PNotify -->
    <link href="<?= base_url('/template/login/vendors/pnotify/dist/pnotify.css')?>" rel="stylesheet">
    <link href="<?= base_url('/template/login/vendors/pnotify/dist/pnotify.buttons.css')?>" rel="stylesheet">
    <link href="<?= base_url('/template/login/vendors/pnotify/dist/pnotify.nonblock.css')?>" rel="stylesheet">
    <!--===============================================================================================-->
    <script src="<?= base_url('/template/login/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
   
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">
<style>.bungkus{background-color:#0d96df;width:100%;height:100%;position:absolute;z-index:-1;opacity:0;transition:1s}.mid{position:absolute;top:45%;left:50%;z-index:9999;transform:translate(-50%,-50%)}.spinner{width:170px;text-align:center}.spinner>div{width:38px;height:38px;background-color: #ffff;border-radius:100%;display:inline-block;-webkit-animation:sk-bouncedelay 1.4s infinite ease-in-out both;animation:sk-bouncedelay 1.4s infinite ease-in-out both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}.spinner2{margin:100px auto 0;width:180px;text-align:center}.spinner2>div{width:8px;height:8px;background-color: #ffff;border-radius:100%;display:inline-block;-webkit-animation:sk-bouncedelay .8s infinite ease-in-out both;animation:sk-bouncedelay .8s infinite ease-in-out both}.spinner2 .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner2 .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}.grupeye{position:absolute;top:50%;right:10px;transform:translate(-50%,-50%);z-index:99;cursor:pointer}@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}@keyframes sk-bouncedelay {
  0%, 80%, 100% { 
    -webkit-transform: scale(0);
    transform: scale(0);
  } 40% { 
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
  }
}.text-loading{position:absolute;top:90%;left:50%;transform:translate(-50%,-50%);margin:auto;color:#fff;text-align:center;font-family:'Gill Sans','Gill Sans MT',Calibri,'Trebuchet MS',sans-serif}</style>
<div class="bungkus">
	<div class="mid">
		<h3 class="text-loading">
		<div class="spinner2">
			Loading
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>	
		</h3>
	</div>
</div>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" class="login100-form validate-form" action="<?= base_url('Auth/proses_login'); ?>">
					<div class='text-center'>
						<img src="<?= base_url('assets/profil/logo.png'); ?>" alt="logo" width="100px" 	class="shadow-light  mb-5 mt-2">
						</div>
					<span class="login100-form-title p-b-20">
						<strong>Pesantren Terpadu Qoshrul Muhajirin</strong> 
					</span>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<input class="input100" type="text" name="user" id="user" value="">
						<span class="focus-input100"></span>
						<span class="label-input100">Username or Email </span>
					</div>
					<br>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pwd" id="pwd" value="">
						<div class="grupeye">
							<i style="font-size: 18px" id="icon" class="fa fa-eye-slash"></i>
						</div>
						<span class="focus-input100"></span>
						<span class="label-input100">Password </span>
					</div>
					<div class="p-b-25">
											</div>
					<div class="container-login100-form-btn">
						<button id="login-btn" type="submit" name="submit" class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							<a href="https://api.whatsapp.com/send?phone=+6289614729915&text=Saya%20Lupa%20Password%20saya" target="_blank" class="txt1">
								Lupa Password
							</a>
						</span>
					</div>
					<div class="login100-form-social flex-c-m">
						<a href="<?= base_url('/');?>" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-arrow-left" aria-hidden="true"></i>
						</a>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('assets/profil/bg.jpg');">
				<div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                               
                                <!-- <h1 class="mb-2 display-5 font-weight-bold text-success">Sistem Informasi Akademik (SIAKAD)</h1>
                                <h3 class="font-weight-normal text-muted-transparent">Pesantren Terpadu Qoshrul Muhajirin</h3>
								<br>
								<h5 class="font-weight-normal text-muted-transparent">Email : -</h5>
								<h5 class="font-weight-normal text-muted-transparent">WhatsApp : - </h5>
								<h5 class="font-weight-normal text-muted-transparent">Website : -</h5> -->
                            </div>
                            <!-- Photo by <a class="text-light bb" target="_blank"
                                href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a
                                class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a> -->
                        </div>
                    </div>
			</div>
		</div>
		<div class="respon-wa">
			<a href="https://api.whatsapp.com/send?phone=+6289614729915&text=Assalamualaikum%20Akun%20Saya%20Belum%20Ke%20Aktif" class="float" target="_blank">
				<i class="fa fa-whatsapp my-float"></i>
			</a>
			<a style="background: #4382f4" href="https://www.facebook.com/stainutasik/" class="float fb" target="_blank">
				<i class="fa fa-facebook my-float"></i>
			</a>
			<a style="background: #f09433; 
			background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
			background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
			background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );" href="https://www.instagram.com/campus.stainu/" class="float ig" target="_blank">
				<i class="fa fa-instagram my-float"></i>
			</a>
		</div>
		</div>
	</div>
	<script>
		$("#login-btn").click(function () {
			var user = $("#usr").val();
			var pass = $("#pwd").val();
			if (user != '' && pass != '') {
				document.querySelector(".bungkus").style.zIndex = 999;
				document.querySelector(".bungkus").style.opacity = 1;
				document.querySelector(".bungkus").style.transition = '1s';
				document.querySelector(".limiter").style.display = 'none';
			}
		});
			pass = $("#pwd");
			$("#icon").click( function () {
				if(pass.className == 'input100 active') {
					pass.attr('type', 'text');
					$("icon").className = 'fa fa-eye';
					pass.className = 'input100';

				} else {
					pass.attr('type', 'password');
					$("icon").className = 'fa fa-eye-slash';
					pass.className = 'input100 active';
				}

			});
	</script>
	