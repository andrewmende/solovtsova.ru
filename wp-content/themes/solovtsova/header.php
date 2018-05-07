<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="masthead" class="site-header" role="banner">
		<div id="blackline" class="container-fluid">
			yanasolovtsova@gmail.com
		</div>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		
	</header><!-- .site-header -->

	<div id="content" class="site-content">