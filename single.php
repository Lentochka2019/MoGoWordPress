<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>"  <?php post_class('clearfix my-5 col-md-10 offset-md-1'); ?>  itemscope itemtype="http://schema.org/BlogPosting">

                        <header>
                            <h2><?php the_title(); ?></h2>
                            <hr>
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="article-img-block">
                                <figure>
                                    <?php the_post_thumbnail() ?>
                                </figure>
                            </div>
                        <?php endif; ?>

                        <time datetime="<?php echo the_time('Y-m-j'); ?>" class="mb-5"><?php echo get_the_date('Y-m-j'); ?> </time>

                        <div class="article-body">
                            <?php the_content(); ?>
                        </div>
                        <footer>
                            <hr>
                            <div class="article-meta">
                                <span class="article-view">
                                    <img alt="view" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAACHUlEQVRIie2UP2hTYRTFf/d7aaOSSWpAiQl2q6VmKQHp0rqJboLgYLs41dqh4B+qxtJiIAgVNHVyagZBcCgKbmrXqkOpqVu0tXSoD6fXVorvuw4JIXl5NApKl57tnfvuOefe970P9rHXkN2KT7+VDu/4eklFzwJpoKNacoFFUXnd7sizK8e7f/yVwYS+jcRXO64rjAOxFiE9gdxG0n0wIQO/Who8WltMGN+8EMi0EG6AwoJ17IXRRHqtnjf1D4XycsrxzXyzuMyJ0f6tqI1tRW3MWgaAl4GkGcc384Xycip0gpmNUoxtuwB0Nb6gt4ZTp/JhqQurS+Oi3A/QnzloMlfj3R5ApEZv25mgOMjccKon/7xUav8e86dALoOqYopxT7IXk925JytLpxXO1zV1VbWGait6/GWpHxgMJhRjHwJsxHQS5AZwFOSYoDcrHKjKdMhwg1XNioExTIWtQKPOx+qams3RIYADPyMfwnqNkcmaQWuohpA+wKbj7PovGQBruRtWtJu2F0AxxeaqFAHa2nZ6Q3utZmsG1070vANmm9wNYwBxT7KK5EHXQdcVyR/x5B6AFTsWoj9b1Wx9TFW4PZLsyYWlLHz9dEdEg9+v4Zg27K9QXk6J478BOut5gVeqMs0heQ9gtshUk58LiJfVd86MdJ5cqettxH+9KgBGE+k1N+n2SeWi8/5A2xMYd5NuX1A8dIJ6/Ivreh97j9+5pddLYUbTNgAAAABJRU5ErkJggg==">

                                    <span><i class="fa fa-eye"></i> <?php echo setPostViews(get_the_ID()); ?> <?php echo getPostViews(get_the_ID()); ?> &nbsp;&nbsp;</span>
                                </span>
                                <span class="article-comment">
                                    <img alt="comment"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAB6ElEQVRIidWVMWgTURjHf19yrXWQKiJdNNdYM4hNQmsncSlWcHYSBXFQik2bRQRFh4wiFHUoIijo1kUHNwcpgopClbZByKKYUZuA7RTT5H0OSc7zkkua9Bb/07vve/f7vXf3uIP/PdKu+ejr8mDF6j+HyhmEBDBUb/1AWEX1lVUpL06PTGx0JcjoknUgv/8mIteAwQ6L/KUq8wV7/U5GJisdBfe/ZYf6wrwATnQAe0HvZMucvXok+dNXUH8kSyBj3cBd+VwtD0ymY7HNRiHk7m6Fd93bARxg3OovzbsLzg4efv8yZsR8osOL30YMJnQ8FT22Aq4dGDGXAoDXmFK9+PfCiZ4KAF6LyFQLgUS881J2XFJ2XLZ77cpwCwGm9yU3pa8xcOwL+ewaEA8Er6ylhuNJcO1A0NeBwGuw942hI6hUQ08BDYQf0sUmQfrw6Cro4wD4yzOHEm+aBABWpXwdWNkBvCrGzLkL/wimRyY2NGxNofqxF7rC3Zlo8oOvAGD24NHiul08qcItYNPb94fry0Jk9La33vbT8CSX21PaXT6vyGmBcWBvvbXPs/LnpjxwIR2L/e5K4JeFfNY5bYo+K0SKl1v9bACsXgT1lIAbs3biQbtJvQreGqNX5qKJXI/3t09Gtelw+OUP5vuQuT+j+V8AAAAASUVORK5CYII=">

                                    <a href="<?php the_permalink() ?>#comments">
                                        <?php comments_number('0', '1', '%'); ?>
                                    </a>
                                </span>
                            </div>
                        </footer>
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
                    <footer>
                    </footer>
                </article>

            <?php endif; ?>
        </div>
    </div>  

<?php get_footer(); ?>