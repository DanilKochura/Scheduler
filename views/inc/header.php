<?php

$t1 = count($tasks->new);
$t2 = count($tasks->work);
$t3 = count($tasks->done);
if($t1 or $t2 or  $t3)
{
	$counters = true;
}
?>
<!doctype html>
<!-- <html lang="ar" dir="rtl"> -->
<html lang="en" dir="ltr">
<head>

	<title>My plan</title>
	<meta name="description" content="...">

	<meta charset="utf-8">
	<meta name="MobileOptimized" content="320"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- speed up external res -->
	<link rel="dns-prefetch" href="https://fonts.googleapis.com/">
	<link rel="dns-prefetch" href="https://fonts.gstatic.com/">
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<!-- preloading icon font is helping to speed up a little bit -->
	<link rel="preload" href="<?=PATH?>assets/fonts/flaticon/Flaticon.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="stylesheet" href="<?=PATH?>assets/css/core.min.css">
	<link rel="stylesheet" href="<?=PATH?>assets/css/vendor_bundle.min.css">
	<link rel="stylesheet" href="<?=PATH?>assets/css/custom.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>

<?php if(!in_array($routed_file, ['login.php', 'signup.php', 'reset.php'])): ?>
    <body class="header-sticky header-fixed <?=str_contains($routed_file, 'profile') ? 'aside-start aside-sticky' : ''?>">
    <header id="header" class="shadow-dark-sm ">

	<!-- /TOP BAR -->

	<!-- Navbar -->
	<div class="container position-relative">

		<!-- /SEARCH -->
		<nav class="navbar navbar-expand-lg navbar-light justify-content-lg-between justify-content-md-inherit">

			<div class="collapse navbar-collapse navbar-animate-fadein" id="navbarMainNav">

				<!-- navbar : mobile menu -->
				<div class="navbar-xs d-none"><!-- .sticky-top -->

					<!-- mobile menu button : close -->
					<button class="navbar-toggler pt-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
						<svg width="20" viewBox="0 0 20 20">
							<path d="M 20.7895 0.977 L 19.3752 -0.4364 L 10.081 8.8522 L 0.7869 -0.4364 L -0.6274 0.977 L 8.6668 10.2656 L -0.6274 19.5542 L 0.7869 20.9676 L 10.081 11.679 L 19.3752 20.9676 L 20.7895 19.5542 L 11.4953 10.2656 L 20.7895 0.977 Z"></path>
						</svg>
					</button>

					<!--
						Mobile Menu Logo
						Logo : height: 70px max
					-->
					<a class="navbar-brand" href="index.html">
						<img src="assets/images/logo/logo_dark.svg" width="110" height="38" alt="...">
					</a>

				</div>
				<!-- /navbar : mobile menu -->

				<!-- navbar : navigation -->
				<ul class="navbar-nav">

					<li class="nav-item d-block d-sm-none">

						<!-- image -->
						<div class="mb-4">
							<img width="600" height="600" class="img-fluid" src="demo.files/svg/artworks/people_crossbrowser.svg" alt="...">
						</div>

					</li>


					<!-- home -->
					<li class="nav-item dropdown active">

						<a href="https://imdibil.ru/scheduler/" id="mainNavHome" class="nav-link dropdown-toggle js-stoppropag" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Доски
						</a>

						<div aria-labelledby="mainNavBlog" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover dropdown-fadeinup">
							<ul class="list-unstyled m-0 p-0">
								<li class="dropdown-item fw-bold"><a class="dropdown-link" href="<?=PATH?>">Моя доска</a></li>
								<?php foreach($user->admissions	 as $a): ?>
									<li class="dropdown-item"><a class="dropdown-link" href="<?=PATH?>desk/<?=$a['uid']?>"><?=$a['name']?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>

					</li>

					<!-- social icons : mobile only -->
					<li class="nav-item d-block d-sm-none text-center mb-4">

						<h3 class="h6 text-muted">Follow Us</h3>

						<!-- facebook -->
						<a href="#" class="btn btn-sm btn-facebook transition-hover-top mb-2 rounded-circle text-white" rel="noopener">
							<i class="fi fi-social-facebook"></i>
						</a>

					</li>
				</ul>
				<!-- /navbar : navigation -->

			</div>


			<!-- OPTIONS -->
            <ul class="mx-1 mb-0">
                <?php if(isset($counters)): ?>
									<div class="col">
										<div class="d-inline-block">
											<div class="row text-center mb-2">
												<div class="col-auto h-100 py-2 px-lg-3 px-xl-4 lh-sm text-dark">
													<span class="fs-6"><?=$t1?></span>
													<p class="small mb-0">В очереди</p>
												</div>
												<div class="col-auto h-100 py-2 px-lg-3 px-xl-4 border-start lh-sm text-muted">
													<span class="fs-6"><?=$t2?></span>
													<p class="small mb-0">В работе</p>
												</div>
												<div class="col-auto h-100 py-2 px-lg-3 px-xl-4 border-start lh-sm text-success">
													<span class="fs-6"><?=$t3?></span>
													<p class="small mb-0">Выполнено</p>
												</div>
											</div>

											<!-- project progress -->
											<div class="progress" style="height: 4px;">
												<div class="progress-bar bg-warning" role="progressbar" style="width: <?=($t3/($t1+$t2+$t3))*100?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</div>
<?php endif; ?>
            </ul>
			<ul class="list-inline list-unstyled mb-0 d-flex align-items-end">

				<li class="list-inline-item mx-1 dropdown">

					<a href="#" aria-label="Account Options" id="dropdownAccountOptions" class="btn btn-sm rounded-circle btn-light bg-transparent text-muted shadow-none js-stoppropag" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
									<span class="group-icon">
										<i class="fi fi-user-male"></i>
										<i class="fi fi-close"></i>
									</span>
					</a>


					<!--

						Dropdown Classes
							.dropdown-menu-dark 		- dark dropdown (desktop only, will be white on mobile)
							.dropdown-menu-hover 		- open on hover
							.dropdown-menu-clean 		- no background color on hover
							.dropdown-menu-invert 		- open dropdown in oposite direction (left|right, according to RTL|LTR)
							.dropdown-click-ignore 		- keep dropdown open on inside click (useful on forms inside dropdown)

							Dropdown prefix icon (optional, if enabled in variables.scss)
								.prefix-link-icon .prefix-icon-dot 		- link prefix
								.prefix-link-icon .prefix-icon-line 	- link prefix
								.prefix-link-icon .prefix-icon-ico 		- link prefix
								.prefix-link-icon .prefix-icon-arrow 	- link prefix

								.prefix-icon-ignore 					- ignore, do not use on a specific link

					-->
					<!-- dropdown -->
					<div aria-labelledby="dropdownAccountOptions" class="list-unstyled dropdown-menu dropdown-menu-clean dropdown-click-ignore end-0 py-2 rounded-xl" style="min-width:215px;">

						<div class="dropdown-header px-4 mb-1 text-wrap fw-medium"><?=$user->name?></div>
						<div class="dropdown-divider mb-3"></div>
						<a class="dropdown-item active" href="/scheduler/profile">
							<svg class="text-gray-600 float-start" width="18px" height="18px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
								<path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
								<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
							</svg>
							<span>Мой аккакунт</span>
						</a>
						<a class="dropdown-item" href="https://imdibil.ru/scheduler/profile/access">
							<svg class="text-gray-600 float-start" width="18px" height="18px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
								<path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"></path>
								<path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zm4.354 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
							</svg>
							<span>Мои доски</span>
						</a>

						<a class="dropdown-item" href="https://imdibil.ru/scheduler/profile/design">
							<svg class="text-gray-600 float-start" width="18px" height="18px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
								<path fill-rule="evenodd" d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019L13 11l-.471.242-.529.026-.287.445-.445.287-.026.529L11 13l.242.471.026.529.445.287.287.445.529.026L13 15l.471-.242.529-.026.287-.445.445-.287.026-.529L15 13l-.242-.471-.026-.529-.445-.287-.287-.445-.529-.026z"></path>
							</svg>
							<span>Настройки</span>
						</a>
						<div class="dropdown-divider mt-3"></div>
						<a href="<?=PATH?>logout" title="Log Out" class="dropdown-item mt-1">
							<i class="fi fi-power float-start"></i>
							Выйти
						</a>
					</div>

				</li>

			</ul>
			<!-- /OPTIONS -->

		</nav>

	</div>
	<!-- /Navbar -->

</header>
<?php else: ?>
<body>
<?php endif; ?>