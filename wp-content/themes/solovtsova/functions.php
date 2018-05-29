<?php

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Register Navigation Menus
function custom_navigation_menus() {

	$locations = array(
		'mainnavigation' => 'Horizontal main menu',
		'sidebarprocedures' => 'Left side menu of procedures',
		'sidebarproblems' => 'Left side menu of problems'
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'custom_navigation_menus' );
add_theme_support( 'post-thumbnails' ); 
?>
