<?php get_header(); ?>

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
            <div class="col-md-12"><?php the_posts_pagination(); ?></div>
        </div>
        <?php get_sidebar();  ?>
    </div>
</section>
<?php get_footer();  ?>