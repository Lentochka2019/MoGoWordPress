<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<title><?php bloginfo('name'); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_admin_bar_render(); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<button onclick="topFunction()" id="Btntop" title="Go to top">Top</button>
	<header class="main-navigation">
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-expand-md">
					<div class="col-md-2">

						<h1 class="navbar-brand"><a href="<?php echo home_url();  ?>"> MoGo </a></h1>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
					<div class="col-md-10  pb-5 pb-sm-0">
						<div class="collapse navbar-collapse float-md-right" id="navbarTogglerDemo03">
							<?php $args = array(
								'theme_location' => 'main_nav',
								'container' => false,
								'menu_id' => 'top-nav-ul', // id для ul
								'items_wrap' => '<ul id="%1$s" class="nav navbar-nav mr-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
								'menu_class' => 'main_menu',
								'walker' => new main_menu(true) // верхнее меню выводится по разметке бутсрапа, см класс в functions.php, если по наведению субменю не раскрывать то передайте false		  		
							);
							wp_nav_menu($args);
							?>

							<img src="<?php echo get_template_directory_uri(); ?>/img/cart.png" alt="cart" width="20" height="20" class="button-img">
							<form class="noshow form-inline my-2 my-lg-0 ">
								<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
							</form>
							<img class="button-search" src="<?php echo get_template_directory_uri(); ?>/img/zoom.png" alt="search" width="20" height="20">
						</div>
					</div>
				</nav>
			</div>
		</div>
	</header>
	<main>
		<section class="banner">
			<div class="container">
				<div class="row">
					<div class="col-md">
						<div id="carouselExampleIndicators" class="carousel slide d-block w-100" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
									<p><span>01</span> INTRO</p>
								</li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1">
									<p><span>02</span> INTRO</p>
								</li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2">
									<p><span>03</span> INTRO></p>
								</li>
								<li data-target="#carouselExampleIndicators" data-slide-to="3">
									<p><span>04</span> INTRO</p>
								</li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<header class="col-md-10 offset-md-1">
										<h3>What we do</h3>
										<h2>Welcome to Wogo</h2>
										<hr>
										<a href="#" class="button">Learn more</a>
									</header>
								</div>
								<div class="carousel-item ">
									<header class="col-md-10 offset-md-1">
										<h3>What we do1</h3>
										<h2>Story about us</h2>
										<hr>
										<a href="#" class="button">Learn more</a>
									</header>
								</div>
								<div class="carousel-item">
									<header class="col-md-10 offset-md-1">
										<h3>What we do2</h3>
										<h2>Story about us</h2>
										<hr>
										<a href="#" class="button">Learn more</a>
									</header>
								</div>
								<div class="carousel-item">
									<header class="col-md-10 offset-md-1">
										<h3>What we do2</h3>
										<h2>Story about us</h2>
										<hr>
										<a href="#" class="button">Learn more</a>
									</header>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>