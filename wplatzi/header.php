<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php 
		// Obtener la primera parte del contenido
		$content = get_post_field( 'post_content', $post->ID );
		// Nos devuelve un array
		// [main] => Muestra el contenido antes del "more tag"
		// [extended] => Muestra el contenido después del "more tag"
		$content_parts = get_extended( $content );
		// echo wp_strip_all_tags( $content_parts['main'] );

		// wp_get_attachment_image_src( $attachment_id, $size, $icon )
		// Nos devuelve un array
		// [0] => url
		// [1] => width
		// [2] => height
		// [3] => boolean: true si la $url es una imagen redimensionada, false si es la original o la imagen no existe.
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wplatzi-full-width' ); 
	?>
	<?php if (is_singular()) : ?>
	
	<meta property="og:site_name" content="<?php the_title(); ?>" />
	<meta property="og:locale" content="es_ES" />
	<meta property="og:url" content="<?php the_permalink(); ?>"/>
	<meta property="og:description" content="<?php the_excerpt(); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php echo $image[0]; ?>" />
	<link rel="image_src" href="<?php echo $image[0]; ?>" id="image_src" />
	
	<?php else : ?>

	<meta property="og:site_name" content="<?php wp_title( '|', true, 'right' ); ?>" />
	<meta property="og:locale" content="es_ES" />
	<meta property="og:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
	<meta property="og:description" content="Blog de patinaje donde encontrarás las útlimas noticias, eventos, reviews y todo el contenido sobre patinaje en un solo lugar." />
	<meta property="og:type" content="blog" />
	<meta property="og:image" content="http://maspormenos.com.pe/pichangatottus/wp-content/themes/tottus/images/bg-widescreen.png" />
	<link rel="image_src" href="http://maspormenos.com.pe/pichangatottus/wp-content/themes/tottus/images/bg-widescreen.png" id="image_src" />

	<?php endif; ?>

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
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

