<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
	<header id="masthead" class="site-header" role="banner">
		<div id="blackline">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<a href="mailto:yanasolovtsova@gmail.com">yanasolovtsova@gmail.com</a>
					</div>
				</div>
			</div>
		</div>
		<div id="site-branding">
			<div class="container">
				<div class="row">
					<div class="col-md-9 offset-md-3">
						<div class="titles-group">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<p class="site-subtitle"><?php bloginfo( 'description' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="navigation">
			Меню    |    Обо мне    |    Итд
		</div>
		
		
	</header><!-- .site-header -->

	<div id="content" class="site-content">