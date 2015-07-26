<?php get_header(); ?>
<div id="content_body">
    <section>
    <?php if (have_posts()) :
        while (have_posts()) : the_post();
            $position = get_post_meta(get_the_ID(), 'wpcf-position', true);
            $email = get_post_meta(get_the_ID(), 'wpcf-email', true);
            $phone = get_post_meta(get_the_ID(), 'wpcf-phone', true);
            $fax = get_post_meta(get_the_ID(), 'wpcf-fax', true);
    ?>
            <div class="row">
                <div class="medium-2 columns">
                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); }?>

                    <?php if (!empty($phone)): ?>
                        <div class="phone"><?php echo $phone; ?> Phone</div>
                    <?php endif; ?>

                    <?php if (!empty($fax)): ?>
                        <div class="phone"><?php echo $fax; ?> Fax</div>
                    <?php endif; ?>

                    <div class="email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>

                </div>
                <div class="medium-10 columns">
                    <h1><?php the_title(); ?></h1>
                    -<h2><?php echo $position; ?></h2>
                    <article><?php the_content(); ?></article>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    </section>
</div>
<?php get_footer(); ?>