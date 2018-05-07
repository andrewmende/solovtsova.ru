<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<?php do_action('theme_after_head'); ?>
<?php ob_start(); // body start ?>
<body>
    <!-- <?php include 'templates/header.php'; ?> -->
    <?php the_content(); ?>
    <?php wp_footer(); ?>
    <!-- <?php printf(__('%d queries. %s seconds.', 'default'), get_num_queries(), timer_stop(0, 3)); ?>  -->
</body>
</html>