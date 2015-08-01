<?php get_header(); ?>
  <section>
    <div id="content_body">
      <?php if (have_posts()) : ?>
        <div class="row">
          <div class="medium-9 columns">
            <article>
              <?php if (has_post_thumbnail()) {
                the_post_thumbnail();
              } ?>
              <h1><?php the_title(); ?></h1>
              <?php while (have_posts()) :
              the_post(); ?>
              <?php the_content(); ?>
            </article>
            <?php endwhile; ?>
          </div>
          <div class="medium-3 columns">
            <aside>
              <h2>FEATURED PROPERTIES</h2>
              <?php dynamic_sidebar('Home_Featured_1'); ?>
              <?php dynamic_sidebar('Home_Featured_2'); ?>
              <?php dynamic_sidebar('Home_Featured_3'); ?>
            </aside>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php get_footer(); ?>