<?php
/**

 */
?>

	<div class="entry-content">
		<?php if (!is_front_page()) {
			the_title($before = '<h1>', $after = '</h1>');	
		} ?> 
		<?php the_content(); ?>
	</div><!-- .entry-content -->