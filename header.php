<!DOCTYPE html><!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]--><!--[if IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]--><!--[if IE 8]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]--><!--[if gt IE 8]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width,initial-scale=1"><link rel="profile" href="http://gmpg.org/xfn/11"><link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php wp_head(); ?><!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/includes/ie.css" /><![endif]--><!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --><!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script><![endif]--></head><body <?php body_class(); ?>>

<header>
    <!-- mobile trigram menu -->
    <?php echo do_shortcode( '[responsive-menu menu="main-menu"]' ); ?>

    <div class="row">
        <div class="large-2 large-offset-10 columns" style="border: thin solid #FFF;">
            <ul id="social_media_menu">
                <li><a href="https://www.facebook.com/pages/Wynsmith-Realty/571125339694495" target="_blank"><img src="/wp-content/uploads/2015/07/ico_facebook.png" title="Like Us On Facebook!" alt="Like Us On Facebook!"></a></li>
                <li><a href="https://twitter.com/Wynsmith_Group" target="_blank"><img src="/wp-content/uploads/2015/07/ico_twitter.png" title="Tweet Us On Twitter!" alt="Tweet Us On Twitter!"></a></li>
                <li><a href="#" target="_blank"><img src="/wp-content/uploads/2015/07/ico_instagram.png" title="Find Us On Instagram!" alt="Find Us On Instagram!"></a></li>
                <li><a href="#" target="_blank"><img src="/wp-content/uploads/2015/07/ico_linkedin.png" title="Find Us On LinkedIn" alt="Find Us On LinkedIn!"></a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="large-4 columns"><a href="/"><img src="/wp-content/uploads/2015/07/logo.png" alt="Wynsmith Realty" title="Wynsmith Realty"></a></div>
        <div class="large-8 columns">
            <nav>
                <!-- desktop menu -->
                <?php wp_nav_menu(array('menu' => 'Main Menu','container_id' => 'cssmenu', 'walker' => new CSS_Menu_Walker())); ?>
            </nav>
            <h1>Contact us today! <strong>(312) 213-8330</strong> or <a href="mailto:info@wynsmith.com">info@wynsmith.com</a></h1>
        </div>
    </div>
</header>