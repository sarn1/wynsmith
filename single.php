<?php get_header(); ?>
    <section>
        <div id="content_body" class="blog">
            <h1>Blog</h1>
            <div class="row">
                <div class="medium-9 columns">
                    <?php if (have_posts()) :
                        while (have_posts()) : the_post(); ?>
                            <article>
                                <h1><?php the_title(); ?></h1> - <h2><?php the_date() ?></h2>
                                <h3>Categories: <?php
                                    $categories = get_the_category();
                                    $separator = ', ';
                                    $output = '';
                                    if($categories) {
                                        foreach ($categories as $category) {
                                            $output .= '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("View all posts in %s"), $category->name)) . '">' . $category->cat_name . '</a>' . $separator;
                                        }
                                        echo trim($output, $separator);
                                    }
                                    ?></h3>
                                <?php the_content(); ?>
                                <?php the_tags( '<span class="tags">Tags:</span> ', ', ', '<br />' ); ?>
                                <div class="comments">
                                    <?php if (is_single()) comments_template();  ?>
                                </div>
                            </article>
                        <?php endwhile; ?>

                        <div class="page-link"><?= posts_nav_link('<span class="page-link-spacer">&bull;</span>','< Newer posts  ','  Older posts >')?></div>
                    <?php endif; ?>
                </div>
                <div class="medium-3 columns">
                    <aside class="blog_sidebar">
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>