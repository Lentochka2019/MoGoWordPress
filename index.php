<?php get_header(); ?>

<section class="aboutAs" id="team">
	<div class="container">
		<div class="row">
			<header class="col-md-10 offset-md-1">
				<h3>Who we are</h3>
				<h2>Meet our team</h2>
				<hr>
				<p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
					tempor
					incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
					exercitation
					ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
			</header>
		</div>

		<div class="row">
			<?php
			echo do_shortcode('[team]');
			?>
		</div>
	</div>
</section>
<section class="service2" id="service">
	<div class="container">
		<div class="row">
			<header class="col-md-10 offset-md-1">
				<h3>Service</h3>
				<h2>What we do</h2>
				<hr>
				<p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
					tempor
					incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
					exercitation
					ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
			</header>
		</div>
		<div class="row">
			<div class="col-md-6">
				<figure>
					<img src="<?php echo get_template_directory_uri(); ?>/img/wal.jpg" width="500" alt="wall">
				</figure>
			</div>
			<div class="col-md-6 pl-md-0">
				<div class="accordion" id="accordionExample">
					<div class="card">
						<div class="card-header" id="headingOne">
							<h4 class="mb-0">
								<button class="btn btn-link p-0 w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<img src="<?php echo get_template_directory_uri(); ?>/img/pic1.png" alt="pic1"> Photography
								</button>
							</h4>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
							<div class="card-body">
								<div class="card-text">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
									richardson ad squid. 3 wolf moon
									officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
									nesciunt laborum eiusmod. Brunch 3
									wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
									nulla assumenda shoreditch et.
									Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
									sapiente ea proident. Ad vegan
									excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
									denim aesthetic synth nesciunt
									you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="headingTwo">
							<h4 class="mb-0">
								<button class="btn btn-link collapsed p-0 w-100" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<img src="<?php echo get_template_directory_uri(); ?>/img/pic1.png" alt="pic1"> Creativity
								</button>
							</h4>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
							<div class="card-body">
								<div class="card-text">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
									richardson ad squid. 3 wolf moon
									officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
									nesciunt laborum eiusmod. Brunch 3
									wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
									nulla assumenda shoreditch et.
									Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
									sapiente ea proident. Ad vegan
									excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
									denim aesthetic synth nesciunt
									you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="headingThree">
							<h4 class="mb-0">
								<button class="btn btn-link collapsed p-0 w-100" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<img src="<?php echo get_template_directory_uri(); ?>/img/pic1.png" alt="pic1"> web design
								</button>
							</h4>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
							<div class="card-body">
								<div class="card-text">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
									richardson ad squid. 3 wolf moon
									officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
									nesciunt laborum eiusmod. Brunch 3
									wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
									nulla assumenda shoreditch et.
									Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
									sapiente ea proident. Ad vegan
									excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
									denim aesthetic synth nesciunt
									you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="blog" id="blog">
	<div class="container">

		<div class="row">
			<header class="col-md-10 offset-md-1">
				<h3>Our Stories</h3>
				<h2>Latest blog</h2>
				<hr>
			</header>
		</div>

		<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
					<?php get_template_part('loop');  ?>
			<?php endwhile;
			else : echo '<p>No posts</p>';
			endif; ?>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php
				global $wp_query;

				if ($wp_query->max_num_pages > 1)
					echo '<a href="' . site_url() . '/category/news/" class="more_post">More posts</a>';
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer();  ?>