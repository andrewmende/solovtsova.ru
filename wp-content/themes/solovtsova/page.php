<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<div id="main" class="site-main row" role="main">
			<div class="col-md-3">
				<div class="sidebarprocedures-wrapper sidebar-wrapper">
					<h3 class="sidebarprocedures-title">Процедуры</h3>
					<hr class="sidebarprocedures-hr sidebar-hr" />
					<?php wp_nav_menu( array( 'theme_location' => 'sidebarprocedures' ) ); ?>
				</div>
			</div>
			<div class="col-md-6">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

				// End the loop.
				endwhile;
				?>

				<?php   if ( is_page(1277) ) { ?>
					<div class="procedure-gallery">
						<center><h1>Услуги</h1></center>
						<?php
						// Filter through all pages and find Portfolio's children
						$services_children = get_children(array(
						   'post_parent' => 113
						   ));
						//echo '<pre>'; var_dump($services_children);
						
						// echo what we get back from WP to the browser?>
						<div class="container">
							<div class="row"><?php
							foreach($services_children as $item) { ?>
							    <div class="service_block col-md-4" style="background-image: url(<?php echo get_the_post_thumbnail_url( $item->ID, 'thumbnail' );?>);">
							    	<div class="service_block-title">	
								    	<?php
								    	echo $item->post_title;
								    	//echo get_the_post_thumbnail_url( $item->ID, 'thumbnail' );
								    	?>
								    </div>
							    </div>
						
							    <?php
							    // to know what's in $item
							    //echo '<pre>'; var_dump($item);
							}
							?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-3">
				<div class="sidebarproblems-wrapper sidebar-wrapper">
					<h3 class="sidebarproblems-title">Проблемы</h3>
					<hr class="sidebarproblems-hr sidebar-hr" />
					<?php wp_nav_menu( array( 'theme_location' => 'sidebarproblems' ) ); ?>
				</div>
			</div>
		</div><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>