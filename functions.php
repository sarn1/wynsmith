<?php

//nav menus

$navmenus = array(
	'Main Menu'
);


//widget areas

$widgetareas = array(
	'Sidebar'
	, 'Footer'
	, 'Footer_Column_1'
	, 'Footer_Column_2'
	, 'Footer_Column_3'
	, 'Footer_Column_4'
	, 'Home_Featured_1'
	, 'Home_Featured_2'
	, 'Home_Featured_3'
);


//enable theme features

add_theme_support('menus'); //enable menus
add_theme_support('post-thumbnails'); //enable post thumbnails
add_theme_support( 'title-tag' ); //enable title


//register nav menus

add_action('init','jet4_register_nav_menus');

function jet4_register_nav_menus() {

	global $navmenus;
	if (function_exists('register_nav_menus')) {
		$navmenus_proc = array();
		foreach($navmenus as $menu) {
			$key = sanitize_title($menu);
			$val = $menu;
			$navmenus_proc[$key] = $val;
		}
		register_nav_menus($navmenus_proc);
	}
}


//register widget areas

add_action('init','jet4_register_widget_areas');

function jet4_register_widget_areas() {
	global $widgetareas;
	if (function_exists('register_sidebar')) {
		foreach ($widgetareas as $widgetarea) {
			register_sidebar(array(
				'name'          => $widgetarea,
				'id'            => sanitize_title($widgetarea),
				'before_widget' => '<div id="%1$s" class="widget '.(string)sanitize_title($widgetarea).' %2$s %1$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>'
			));
		}
	}
}



//register theme script

add_action('init','jet4_register_theme_script');
function jet4_register_theme_script() {
	if ( !is_admin() ) {
		wp_register_script('jet4_theme_script',	get_bloginfo('template_directory') . '/includes/scripts.min.js',	array('jquery'));
		wp_enqueue_script('jet4_theme_script');
	}
}


add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );
function prefix_add_my_stylesheet() {
	
	// Respects SSL, Style.css is relative to the current file
	wp_register_style( 's452-normalize-style', get_bloginfo('template_directory').'/includes/theme-core.min.css' , __FILE__ );
	wp_enqueue_style( 's452-normalize-style' );

	wp_register_style( 's452-foundation', get_bloginfo('template_directory').'/includes/foundation/foundation.min.css' , __FILE__ );
	wp_enqueue_style( 's452-foundation' );

	wp_register_style( 's452-style', get_bloginfo('template_directory').'/style.css' , __FILE__ );
	wp_enqueue_style( 's452-style' );

    }


//menu walker for custom styling

class CSS_Menu_Walker extends Walker {

	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');

	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}

	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

		global $wp_query;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;

		/* Add active class */
		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active';
			unset($classes['current-menu-item']);
		}

		/* Check for children */
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$classes[] = 'has-sub';
		}

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><span>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}


/*	TINYMCE */


function my_mce4_options( $init ) {
$default_colours = '
    "000000", "Black",        "993300", "Burnt orange", "333300", "Dark olive",   "003300", "Dark green",   "003366", "Dark azure",   "000080", "Navy Blue",      "333399", "Indigo",       "333333", "Very dark gray", 
    "800000", "Maroon",       "FF6600", "Orange",       "808000", "Olive",        "008000", "Green",        "008080", "Teal",         "0000FF", "Blue",           "666699", "Grayish blue", "808080", "Gray", 
    "FF0000", "Red",          "FF9900", "Amber",        "99CC00", "Yellow green", "339966", "Sea green",    "33CCCC", "Turquoise",    "3366FF", "Royal blue",     "800080", "Purple",       "999999", "Medium gray", 
    "FF00FF", "Magenta",      "FFCC00", "Gold",         "FFFF00", "Yellow",       "00FF00", "Lime",         "00FFFF", "Aqua",         "00CCFF", "Sky blue",       "993366", "Brown",        "C0C0C0", "Silver", 
    "FF99CC", "Pink",         "FFCC99", "Peach",        "FFFF99", "Light yellow", "CCFFCC", "Pale green",   "CCFFFF", "Pale cyan",    "99CCFF", "Light sky blue", "CC99FF", "Plum",         "FFFFFF", "White"
';
$custom_colours = '
	"000033", "Dark Blue"
	,"3399cc", "Light Blue"
	,"cc9933", "Gold"
';
$init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']'; // build colour grid default+custom colors
$init['textcolor_rows'] = 6; // enable 6th row for custom colours in grid
return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');



//blog commenting 
function mw_comments($comment, $args, $depth) { ?> 
	<?php $GLOBALS['comment'] = $comment; ?>

	
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="comment-author vcard">
			<div class="image">
				<?php echo get_avatar( $comment, 48 ); ?>
			</div>
			<div class="info">
				<div class="comment-meta">
					<?php printf(__('%s'), get_comment_author_link()) ?>
				</div>
				<small class="comment-date"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></small>
			</div>
		</div>		 
		<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.') ?></em>
			<br />
		<?php endif; ?>		 
		 <div class="comment-text">	
			 <?php comment_text() ?>
			 <div class="reply">
				<?php echo comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'])); ?>
			 </div>
		 </div>
<?php }


/*
 * get_listings ()
 * listing_type = chicago, suburban
 */
function get_listings ($listing_category, $listing_type = null) {

	global $wpdb;
	return $wpdb->get_results($wpdb->prepare(
		"
		select distinct
			addr1.meta_value as 'address1'
			, addr2.meta_value as 'address2'
			, city.meta_value as 'city'
			, state.meta_value as 'state'
			, zip.meta_value as 'zip'
			, hood.meta_value as 'hood'
			, price.meta_value as 'price'
			, bed.meta_value as 'bedroom'
			, bath.meta_value as 'bathroom'
			, sq.meta_value as 'sqft'
			, sold.meta_value as 'is_sold'

			, p.post_name as 'permalink'

			, taxonomy.name as 'taxonomy_name'
			, taxonomy.term_order as 'order'
		FROM {$wpdb->postmeta} m

		inner join {$wpdb->posts} p on p.id = m.post_id
		inner join (select post_id, meta_value from {$wpdb->postmeta} where meta_key = 'wpcf-addresss-1') as addr1 on addr1.post_id = m.post_id

		left join (select post_id, meta_value from {$wpdb->postmeta} where meta_key = 'wpcf-address-2') as addr2 on addr2.post_id = m.post_id
		left join (select post_id, meta_value from {$wpdb->postmeta} where meta_key = 'wpcf-city') city on city.post_id = m.post_id
		left join (select post_id, meta_value from {$wpdb->postmeta} where meta_key = 'wpcf-state') as state on state.post_id = m.post_id
		left join (select post_id, meta_value from {$wpdb->postmeta} where meta_key = 'wpcf-zip') as zip on zip.post_id = m.post_id
		left join (select post_id, meta_value from {$wpdb->postmeta} where meta_key = 'wpcf-neighboorhood') as hood on hood.post_id = m.post_id
		left join (select post_id, meta_value from {$wpdb->postmeta} where meta_key = 'wpcf-price') as price on price.post_id = m.post_id
		left join (select post_id, meta_value from {$wpdb->postmeta} where meta_key = 'wpcf-bedrooms') as bed on bed.post_id = m.post_id
		left join (select post_id, meta_value from {$wpdb->postmeta} where meta_key = 'wpcf-bathrooms') as bath on bath.post_id = m.post_id
		left join (select post_id, meta_value from {$wpdb->postmeta} where meta_key = 'wpcf-square-feet') as sq on sq.post_id = m.post_id
		left join (select post_id, meta_value from {$wpdb->postmeta} where meta_key = 'wpcf-is-sold') as sold on sold.post_id = m.post_id

		inner join (
			select
				t.name
				, t.term_order
				, tr.object_id
				, tt.taxonomy
			from {$wpdb->term_taxonomy} tt
			inner join {$wpdb->terms} t on tt.term_id = t.term_id
			inner join {$wpdb->term_relationships} tr on tr.term_taxonomy_id = tt.term_taxonomy_id
		) as taxonomy on p.id = taxonomy.object_id


		where m.post_id in (
		 select distinct post_id from {$wpdb->postmeta} where meta_key = 'wpcf-listing-type' and meta_value like %s
		)  and p.post_status = 'publish' and taxonomy.taxonomy like %s
		order by
			taxonomy.term_order
			, hood.meta_value
			, p.menu_order
		",'%'.$listing_type.'%', '%'.$listing_category.'%'
	));

}