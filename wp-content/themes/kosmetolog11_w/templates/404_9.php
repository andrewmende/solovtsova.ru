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
<body <?php body_class(' hfeed bootstrap bd-body-9  bd-pagebackground  bd-margins'); /*   */ ?>>
<header class=" bd-headerarea-1 bd-margins">
        <section class=" bd-section-10 bd-tagstyles bd-no-margins" id="section10" data-section-title="2 Columns">
    <div class="bd-container-inner bd-margins clearfix">
        <div class=" bd-layoutcontainer-10 bd-columns bd-no-margins">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row ">
                <div class=" bd-columnwrapper-19 
 col-lg-3
 col-sm-4">
    <div class="bd-layoutcolumn-19 bd-no-margins bd-column" ><div class="bd-vertical-align-wrapper"><p class=" bd-textblock-14 bd-content-element">
    <?php
echo <<<'CUSTOM_CODE'
yanasolovtsova@gmail.com
CUSTOM_CODE;
?>
</p></div></div>
</div>
	
		<div class=" bd-columnwrapper-25 
 col-lg-3
 col-sm-4">
    <div class="bd-layoutcolumn-25 bd-column" ><div class="bd-vertical-align-wrapper"><p class=" bd-textblock-20 bd-no-margins bd-content-element">
    <?php
echo <<<'CUSTOM_CODE'
Записаться на прием
CUSTOM_CODE;
?>
</p>
	
		<img class="bd-imagelink-10 bd-own-margins bd-imagestyles   "  src="<?php echo theme_get_image_path('images/2263184afc9c42b9d3ef0fc53d3a557d_ikonka_na_priyom.png'); ?>"></div></div>
</div>
	
		<div class=" bd-columnwrapper-26 
 col-lg-4
 col-sm-2">
    <div class="bd-layoutcolumn-26 bd-column" ><div class="bd-vertical-align-wrapper"><p class=" bd-textblock-22 bd-no-margins bd-content-element">
    <?php
echo <<<'CUSTOM_CODE'
Задать вопрос врачу
CUSTOM_CODE;
?>
</p>
	
		<img class="bd-imagelink-12 bd-own-margins bd-imagestyles   "  src="<?php echo theme_get_image_path('images/ddc031bc9c47705f2d799eb17ca39bb4_ikonka_vopros.png'); ?>"></div></div>
</div>
	
		<div class=" bd-columnwrapper-22 
 col-lg-2
 col-sm-4">
    <div class="bd-layoutcolumn-22 bd-column" ><div class="bd-vertical-align-wrapper"><div class=" bd-socialicons-1 bd-no-margins">
    
        <a target="_blank" class=" bd-socialicon-1 bd-socialicon" href="//www.facebook.com/sharer.php?u=">
    <span class="bd-icon"></span><span></span>
</a>
    
    
    
    
    
        <a target="_blank" class=" bd-socialicon-8 bd-socialicon" href="//instagram.com/">
    <span class="bd-icon"></span><span></span>
</a>
    
    
    
    
</div></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
</section>
	
		<section class=" bd-section-3 bd-tagstyles" id="section5" data-section-title="Header Block Right Image Behind Boxes Left">
    <div class="bd-container-inner bd-margins clearfix">
        <div class=" bd-layoutbox-3 bd-page-width  bd-no-margins clearfix">
    <div class="bd-container-inner">
        <div class=" bd-layoutbox-23 bd-no-margins bd-no-margins clearfix">
    <div class="bd-container-inner">
        <?php theme_logo_3(); ?>
    </div>
</div>
	
		<div class=" bd-layoutbox-25 bd-no-margins bd-no-margins clearfix">
    <div class="bd-container-inner">
        <?php
    if (theme_get_option('theme_use_default_menu')) {
        wp_nav_menu( array('theme_location' => 'primary-menu-3') );
    } else {
        theme_hmenu_3();
    }
?>
    </div>
</div>
    </div>
</div>
    </div>
</section>
</header>
	
		<div class=" bd-stretchtobottom-5 bd-stretch-to-bottom" data-control-selector=".bd-contentlayout-9">
<div class="bd-contentlayout-9  bd-sheetstyles  bd-no-margins bd-margins" >
    <div class="bd-container-inner">

        <div class="bd-flex-vertical bd-stretch-inner bd-contentlayout-offset">
            
 <?php theme_sidebar_area_6(); ?>
            <div class="bd-flex-horizontal bd-flex-wide bd-no-margins">
                
 <?php theme_sidebar_area_5(); ?>
                <div class="bd-flex-vertical bd-flex-wide bd-no-margins">
                    

                    <div class=" bd-layoutitemsbox-2 bd-flex-wide bd-no-margins">
    <div class=" bd-text404-12 bd-tagstyles bd-no-margins shape-only"><?php theme_404_content(); ?></div>
</div>

                    
                </div>
                
            </div>
            
        </div>

    </div>
</div></div>
	
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
<div id="wp-footer">
    <?php wp_footer(); ?>
    <!-- <?php printf(__('%d queries. %s seconds.', 'default'), get_num_queries(), timer_stop(0, 3)); ?> -->
</div>
</body>
<?php echo apply_filters('theme_body', ob_get_clean()); // body end ?>
</html>