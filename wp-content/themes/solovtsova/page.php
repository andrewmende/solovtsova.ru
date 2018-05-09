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
			<div id="procs" class="col-md-3">
				<h3>Процедуры</h3>
				<?php wp_nav_menu( array( 'menu' => 9 ) ); ?>
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
			</div>
			<div class="col-md-3">
				<div class="portrait">
					&nbsp;
				</div>
			</div>

		</div><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
