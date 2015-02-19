<?php 

if ( ! function_exists( 'wplatzi_init' ) ) :

function wplatzi_init() {

	// Activate post thumbnails with two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'wplatzi-full-width', 1024, 500, true );
	add_image_size( 'wplatzi-facebook', 1200, 627, true );

	// Menu locations, use with wp_nav_menu()
	register_nav_menus( array(
		'top_menu'    => 'Top menu',
		'footer_menu' => 'Footer menu'
	) );

}
endif;
add_action( 'after_setup_theme', 'wplatzi_init' );

/**
 * Add some scripts and styles - front end.
 */
function wplatzi_scripts() {
	// Load our main CSS with theme data.
	wp_enqueue_style( 'wplatzi-style', get_stylesheet_uri() );
	wp_enqueue_style( 'wplatzi-normalize', get_template_directory_uri() . '/css/normalize.css', array( 'wplatzi-style' ), '' );
	wp_enqueue_style( 'wplatzi-foundation', get_template_directory_uri() . '/css/foundation.css', array( 'wplatzi-style' ), '' );
	wp_enqueue_style( 'wplatzi-base', get_template_directory_uri() . '/css/wplatzi.css', array( 'wplatzi-style' ), '' );

	// Load CSS & JS to single and page
	if ( is_singular() ) {
		
	}

	// Load JS
	// Last param: true load in wp_head(), if false load in wp_footer()
	wp_enqueue_script( 'wplatzi-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wplatzi_scripts' );

function wplatzi_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	return $title;
}
add_filter( 'wp_title', 'wplatzi_wp_title', 10, 2 );