<?php
/*
Default Template
*/
$GLOBALS['theme_current_template_info'] = array('name' => 'default');
?>
<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>
<!DOCTYPE html>
<html <?php echo !is_rtl() ? 'dir="ltr" ' : ''; language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <script>
    var themeHasJQuery = !!window.jQuery;
</script>
<script src="<?php echo get_bloginfo('template_url', 'display') . '/jquery.js?ver=' . wp_get_theme()->get('Version'); ?>"></script>
<script>
    window._$ = jQuery.noConflict(themeHasJQuery);
</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--[if lte IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url', 'display') . '/layout.ie.css' ?>" />
<script src="<?php echo get_bloginfo('template_url', 'display') . '/layout.ie.js' ?>"></script>
<![endif]-->
<link class="" href='//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,regular,700|Ubuntu+Condensed:regular&subset=cyrillic-ext' rel='stylesheet' type='text/css'>
<script src="<?php echo get_bloginfo('template_url', 'display') . '/layout.core.js' ?>"></script>
<script src="<?php echo get_bloginfo('template_url', 'display'); ?>/CloudZoom.js?ver=<?php echo wp_get_theme()->get('Version'); ?>" type="text/javascript"></script>
    
    <?php wp_head(); ?>
    
</head>
<?php do_action('theme_after_head'); ?>
<?php ob_start(); // body start ?>
<body <?php body_class(' hfeed bootstrap bd-body-2  bd-pagebackground  bd-margins'); /*   */ ?>>
<?php include 'templates/header.php'; ?>
	
		<div class="bd-containereffect-3 container-effect container mt">
<div class=" bd-stretchtobottom-6 bd-stretch-to-bottom" data-control-selector=".bd-contentlayout-2">
<div class="bd-contentlayout-2   bd-sheetstyles  bd-no-margins bd-margins" >
    <div class="bd-container-inner">

        <div class="bd-flex-vertical bd-stretch-inner bd-contentlayout-offset">
            
 <?php theme_sidebar_area_6(); ?>
            <div class="bd-flex-horizontal bd-flex-wide bd-no-margins">
                
 <?php theme_sidebar_area_5(); ?>
                <div class="bd-flex-vertical bd-flex-wide bd-no-margins">
                    

                    <div class=" bd-layoutitemsbox-16 bd-flex-wide bd-no-margins">
    <div class=" bd-content-14">
    
    <?php theme_print_content(); ?>
</div>
</div>

                    
                </div>
                
            </div>
            
        </div>

    </div>
</div></div>
</div>
	
		<footer class=" bd-footerarea-1">
    <?php if (theme_get_option('theme_override_default_footer_content')): ?>
        <?php echo do_shortcode(theme_get_option('theme_footer_content')); ?>
    <?php else: ?>
        <section class=" bd-section-16 bd-page-width bd-tagstyles " id="section3" data-section-title="Three Columns With Social">
    <div class="bd-container-inner bd-margins clearfix">
        <div class=" bd-layoutcontainer-47 bd-columns bd-no-margins">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row 
 bd-row-flex 
 bd-row-align-middle">
                <div class=" bd-columnwrapper-126 
 col-lg-4
 col-md-4">
    <div class="bd-layoutcolumn-126 bd-column" ><div class="bd-vertical-align-wrapper"><p class=" bd-textblock-122 bd-content-element">
    <?php
echo <<<'CUSTOM_CODE'
Черногория Будва, Бар<br>
CUSTOM_CODE;
?>
</p></div></div>
</div>
	
		<div class=" bd-columnwrapper-128 
 col-lg-4
 col-md-4">
    <div class="bd-layoutcolumn-128 bd-column" ><div class="bd-vertical-align-wrapper"><div class=" bd-socialicons-6">
    
        <a target="_blank" class=" bd-socialicon-61 bd-socialicon" href="//www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fgroups%2Fsolovtsova%2F">
    <span class="bd-icon"></span><span></span>
</a>
    
    
    
    
    
        <a target="_blank" class=" bd-socialicon-66 bd-socialicon" href="//instagram.com/">
    <span class="bd-icon"></span><span></span>
</a>
    
    
    
    
</div></div></div>
</div>
	
		<div class=" bd-columnwrapper-130 
 col-lg-4
 col-md-4">
    <div class="bd-layoutcolumn-130 bd-column" ><div class="bd-vertical-align-wrapper"><p class=" bd-textblock-172 bd-content-element">
    <?php
echo <<<'CUSTOM_CODE'
email: <a href="#" draggable="false">yanasolovtsova@gmail.com</a>
CUSTOM_CODE;
?>
</p></div></div>
</div>
	
		<div class=" bd-columnwrapper-27 
 col-lg-12
 col-md-12">
    <div class="bd-layoutcolumn-27 bd-column" ><div class="bd-vertical-align-wrapper"><p class=" bd-textblock-24 bd-content-element">
    <?php
echo <<<'CUSTOM_CODE'
<a href="https://logotab.ru/help" target="_blank">
    Сайт разработан </a>LogoTAB.ru&nbsp;
CUSTOM_CODE;
?>
</p></div></div>
</div>
            </div>
        </div>
    </div>
</div>
	
		
    </div>
</section>
    <?php endif; ?>
</footer>
	
		<div data-smooth-scroll data-animation-time="250" class=" bd-smoothscroll-3"><a href="#" class=" bd-backtotop-1 ">
    <span class="bd-icon-67 bd-icon "></span>
</a></div>
<div id="wp-footer">
    <?php wp_footer(); ?>
    <!-- <?php printf(__('%d queries. %s seconds.', 'default'), get_num_queries(), timer_stop(0, 3)); ?> -->
</div>
</body>
<?php echo apply_filters('theme_body', ob_get_clean()); // body end ?>
</html>