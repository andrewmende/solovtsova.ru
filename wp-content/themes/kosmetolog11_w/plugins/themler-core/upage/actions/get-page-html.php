<?php

function upage_get_page_html() {

    $id = $_REQUEST['pageId'];
?>
<html>
    <head>
        <!--TODO-->

        <!--<link rel='stylesheet' href="<?php echo THEMLER_PLUGIN_URL; ?>shortcodes/assets/css/bootstrap.css?version=<?php echo THEMLER_PLUGIN_VERSION; ?>" />-->
        <!--<link rel='stylesheet' href="<?php echo THEMLER_PLUGIN_URL; ?>shortcodes/assets/css/style.css?version=<?php echo THEMLER_PLUGIN_VERSION; ?>" />-->
        <!--<link rel='stylesheet' href="<?php echo THEMLER_PLUGIN_URL; ?>shortcodes/assets/css/style.ie.css?version=<?php echo THEMLER_PLUGIN_VERSION; ?>" />-->

        <!--<link rel='stylesheet' href="<?php echo THEMLER_PLUGIN_URL; ?>shortcodes/assets/js/bootstrap.min.js?version=<?php echo THEMLER_PLUGIN_VERSION; ?>" />-->
        <!--<link rel='stylesheet' href="<?php echo THEMLER_PLUGIN_URL; ?>shortcodes/assets/js/script.js?version=<?php echo THEMLER_PLUGIN_VERSION; ?>" />-->
        <!--<link rel='stylesheet' href="<?php echo THEMLER_PLUGIN_URL; ?>shortcodes/assets/js/script.ie.js?version=<?php echo THEMLER_PLUGIN_VERSION; ?>" />-->
    </head>
    <body>
        <?php echo upage_get_sections_html($id); ?>
    </body>
</html>
<?php
}
upage_add_action('upage_get_page_html');