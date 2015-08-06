<?php get_header(); ?>
  <section>
    <div id="content_body">
      <?php if (have_posts()) :
        while (have_posts()) : the_post();
        //default full width template
      ?>
        <div class="row">
          <div class="medium-12 columns">
            <h1><?php the_title(); ?></h1>
            <article><?php the_content(); ?></article>
          </div>
        </div>
        <?php endwhile;
      elseif (is_404()) : ?>
        <div class="row">
          <div class="medium-12 columns">
            <article>
              <h1>We're sorry...</h1>

              <p>Looks like we can't find the page you are looking for!</p>
            </article>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php get_footer(); ?>