<?php get_header('');
//print_r($post); 
?>
<?php
$cur_terms = get_the_terms($post->ID, 'team');
if (is_array($cur_terms)) {
	foreach ($cur_terms as $cur_term) {
		echo '<a href="' . get_term_link($cur_term->term_id, $cur_term->taxonomy) . '">' . $cur_term->name . '</a>,';
	}
}
?>
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


				<article id="post-<?php the_ID(); ?>"  <?php post_class('clearfix my-5 col-md-10 offset-md-1'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<div class="row">
						<div class="col-md-12">

						</div>
					</div>
					<div class="row">
						<div class="col-md-3">

							<?php if (has_post_thumbnail()) : ?>
								<div class="article-img-block">
									<figure>
										<?php the_post_thumbnail() ?>
									</figure>
								</div>
							<?php endif; ?>
						</div>
						<div class="col-md-9">
							<header>
								<h2><?php the_title(); ?></h2>
								<h3><?php echo get_post_meta($post->ID, 'member_position', true); ?></h3>
								<hr>
							</header>
							<p>FB: <?php echo get_post_meta($post->ID, 'member_fb', true); ?></p>
							<p>Insta: <?php echo get_post_meta($post->ID, 'member_inst', true); ?></p>
							<p>Twitter: <?php echo get_post_meta($post->ID, 'member_telegramm', true); ?></p>
							<p>W: <?php echo get_post_meta($post->ID, 'wiki', true); ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="article-body">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</article>
			<?php endwhile; ?>

		<?php else : ?>

			<article id="post-not-found">
				<header>
					<h2>Not Found Article</h2>
				</header>
				<section class="post_content">
					<p>Not Found Article</p>
				</section>
			</article>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>