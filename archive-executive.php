<?php get_header(); ?>
  <section>
    <div id="content_body">
      <h1>Executive Team</h1>
      <?php if (have_posts()) :
        while (have_posts()) : the_post();
          $position = get_post_meta(get_the_ID(), 'wpcf-position', true);
          $email = get_post_meta(get_the_ID(), 'wpcf-email', true);
          $phone = get_post_meta(get_the_ID(), 'wpcf-phone', true);
          $fax = get_post_meta(get_the_ID(), 'wpcf-fax', true);
          ?>
          <article>
            <div class="row">
              <div class="medium-2 columns">
                <?php if (has_post_thumbnail()) {
                  the_post_thumbnail();
                } ?>

                <?php if (!empty($phone)): ?>
                  <div class="phone"><?php echo $phone; ?> Phone</div>
                <?php endif; ?>

                <?php if (!empty($fax)): ?>
                  <div class="phone"><?php echo $fax; ?> Fax</div>
                <?php endif; ?>

                <div class="email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>

              </div>
              <div class="medium-10 columns">
                <article>
                  <h1><?php the_title(); ?></h1> - <h2><?php echo $position; ?></h2>
                  <?php the_content(); ?>
                </article>
              </div>
            </div>
          </article>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </section>
<?php get_footer(); ?>