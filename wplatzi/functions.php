<?php 

function wplatzi_init(){
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
add_action( 'after_setup_theme', 'wplatzi_init' );

function wplatzi_scripts(){
	// Load CSS to front-end
	wp_enqueue_style( 'wplatzi-style', get_stylesheet_uri() );
	wp_enqueue_style( 'wplatzi-css-normalize', get_template_directory_uri() . '/css/normalize.css', array( 'wplatzi-style' ) );
	wp_enqueue_style( 'wplatzi-css-foundation', get_template_directory_uri() . '/css/foundation.css', array( 'wplatzi-style' ) );
	wp_enqueue_style( 'wplatzi-css-base', get_template_directory_uri() . '/css/wplatzi.css', array( 'wplatzi-style' ) );

	// Load JS to front-end
	wp_enqueue_script( 'wplatzi-js-base', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'wplatzi_scripts' );

/**
 * Change the markup of wp_title().
 */
function wplatzi_wp_title( $title, $sep ) {
	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	return $title;
}
add_action( 'wp_title', 'wplatzi_wp_title', 10, 2 );