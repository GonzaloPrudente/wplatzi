<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php 
		// Forma de uso 
		//wp_title( $sep, $display, $seplocation ); 
	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php $attachment_id = get_post_thumbnail_id( $post->ID ); ?>
	<?php $image = wp_get_attachment_image_src( $attachment_id, 'wplatzi-facebook' );  ?>
	<?php 
		// array() 
		// [0] => URL 
		// [1] => width
		// [2] => height
	?>
	<?php $content = get_extended( $post->post_content ); ?>
	<?php 
		// array() 
		// [main] => Before more tag
		// [extended] => After more tag
	?>
	
	<?php if ( is_singular() ) : ?>
	<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>" />
	<meta property="og:locale" content="es_ES" />
	<meta property="og:url" content="<?php the_permalink(); ?>"/>
	<meta property="og:description" content="<?php echo wp_strip_all_tags( $content['main'] ); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php echo $image[0]; ?>" />
	<?php else: ?>
	<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>" />
	<meta property="og:locale" content="es_ES" />
	<meta property="og:url" content="<?php the_permalink(); ?>"/>
	<meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
	<meta property="og:type" content="blog" />
	<meta property="og:image" content="<?php echo get_template_directory_uri() . '/images/wplatzi-shareFB.jpg'; ?>" />
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="main-container">
		<header class="row">
			<div class="logo large-3 columns">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/wplatzi_logo.png" alt=""></a>
			</div>
			<nav class="menu large-6 columns">
				<?php wp_nav_menu( array( 'theme_location' => 'top_menu' ) ); ?>
			</nav>
		</header>

