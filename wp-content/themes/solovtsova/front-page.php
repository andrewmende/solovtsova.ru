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
				<div class="sidebarproblems-wrapper sidebar-wrapper">
					<h3 class="sidebarproblems-title">Проблемы</h3>
					<hr class="sidebarproblems-hr sidebar-hr" />
					<?php wp_nav_menu( array( 'theme_location' => 'sidebarproblems' ) ); ?>
				</div>
			</div>
			<div class="col-md-9">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

				// End the loop.
				endwhile;
				?>
				<div class="procedure-gallery">
					<center><h1>Процедуры</h1></center>
					<div>
						<?php
						// Filter through all pages and find Portfolio's children
						$services_children = get_children(array(
						   'post_parent' => 113, 
						   'post_type'      => 'page',
						   'numberposts' => 3,
						   ));
						//echo '<pre>'; var_dump($services_children);
						
						// echo what we get back from WP to the browser?>
						<div class="container service-gallery">
							<div class="row"><?php
							foreach($services_children as $item) { ?>
								<div class="service_block-container col-md-4 col-6">    
								    <a href="<?php echo get_permalink($item->ID);?>" class="service_block-link">
										<div class="service_block"> 
									    	<div class="service_block-title">	
										    	<?php
										    	echo $item->post_title;
										    	//echo get_the_post_thumbnail_url( $item->ID, 'thumbnail' );
										    	?>
										    </div>										   
										    <div class="service_block-background" style="background-image: url(<?php echo get_the_post_thumbnail_url( $item->ID, 'thumbnail' );?>);">
										    </div>
										</div>
									</a>
								</div>
							    <?php
							    // to know what's in $item
							    //echo '<pre>'; var_dump($item);
							}
							?>
							</div>
						</div>
					</div>
				</div> <!-- .procedure-gallery -->
			</div><!-- column -->  
		</div><!-- .site-main -->
	</div><!-- .content-area -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-100" src="/wp-content/themes/solovtsova/img/slider-1.png" alt="First slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="/wp-content/themes/solovtsova/img/slider-2.png" alt="Second slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="/wp-content/themes/solovtsova/img/slider-3.png" alt="Third slide">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>	
<?php get_footer(); ?>
