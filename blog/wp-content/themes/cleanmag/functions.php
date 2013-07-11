<?php
/**
 * @package WordPress
 * @subpackage CleanMag Theme
*/

//includes
include('admin/theme-admin.php');
include('functions/pagination.php');
include('functions/better-excerpts.php');
include('functions/slides-meta.php');
include('functions/shortcodes.php');

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) 
    $content_width = 620;

// get scripts
add_action('wp_enqueue_scripts','my_theme_scripts_function');

function my_theme_scripts_function() {
	
	//get theme options
	global $options;
	
	wp_deregister_script('jquery'); 
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"), false, '1.4.2'); 
	wp_enqueue_script('jquery');
	
	wp_deregister_script('jquery-ui'); 
		wp_register_script('jquery-ui', ("http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js"), false, '1.4.2'); 
	wp_enqueue_script('jquery-ui');
		
	wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js');
	wp_enqueue_script('supersubs', get_template_directory_uri() . '/js/supersubs.js');
	
	if ($options['disable_slider'] != true) { 
		if(is_front_page()) :

		endif;
	}
}

// Limit Post Word Count
function new_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'new_excerpt_length');

//Replace Excerpt Link
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Activate post-image functionality (WP 2.9+)
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

// featured image sizes
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'full-size',  9999, 9999, false );
add_image_size( 'image-thumb',  65, 55, true );
add_image_size( 'post-image',  610, 255, true );
}

// Enable Custom Background
add_custom_background();

// register navigation menus
register_nav_menus(
	array(
	'main nav'=>__('Main Nav'),
	)
);
/// add home link to menu
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

// menu fallback
function default_menu() {
	require_once (TEMPLATEPATH . '/includes/default-menu.php');
}

add_action( 'init', 'create_post_types' );
function create_post_types() {
// Define Post Type For Slider
  register_post_type( 'slides',
    array(
      'labels' => array(
		'name' => _x( 'Slides', 'post type general name' ), // Tip: _x('') is used for localization
		'singular_name' => _x( 'Slide', 'post type singular name' ),
		'add_new' => _x( 'Add New', 'Slide' ),
		'add_new_item' => __( 'Add New Slide' ),
		'edit_item' => __( 'Edit Slide' ),
		'new_item' => __( 'New Slide' ),
		'view_item' => __( 'View Slide' ),
		'search_items' => __( 'Search Slides' ),
		'not_found' =>  __( 'No Slides found' ),
		'not_found_in_trash' => __( 'No Slides found in Trash' ),
		'parent_item_colon' => ''
      ),
      'public' => true,
	  'exclude_from_search' => true,
	  'supports' => array('title','thumbnail'),
    )
  );
}


//Register Sidebars
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar',
'description' => 'Widgets in this area will be shown in the sidebar.',
'before_widget' => '<div class="sidebar-box clearfix">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));


// functions run on activation --> important flush to clear rewrites
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	$wp_rewrite->flush_rules();
}
?>