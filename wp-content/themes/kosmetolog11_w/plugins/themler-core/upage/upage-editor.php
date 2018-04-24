<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly

$user = wp_get_current_user();
$domain = upage_get_editor_domain();

$uid = (int)$user->ID;
$ajax_nonce = wp_create_nonce('upage-upload');
$post_id = $_GET['p'];

$settings = array(
    'actions' => array(
        'uploadImage' => upage_get_action_url('upage_upload_image'),
        'uploadSections' => upage_get_action_url('upage_upload_sections'),
        'updatePost' => upage_get_action_url('upage_update_post'),
        'getSite' => upage_get_action_url('upage_get_site'),
        'getPage' => upage_get_action_url('upage_get_page'),
        'duplicatePage' => upage_get_action_url('upage_duplicate_page'),
        'updatePages' => upage_get_action_url('upage_update_pages'),
        'updatePageSections' => upage_get_action_url('upage_update_page_sections'),
        'getPageHtml' => upage_get_action_url('upage_get_page_html'),
        'updateSectionThumbnail' => upage_get_action_url('upage_update_section_thumbnail'),
    ),
    'ajaxData' => array(
        'uid' => $uid,
        '_ajax_nonce' => $ajax_nonce,
    ),
    'uploadImageOptions' => array(
        'formFileName' => 'async-upload',
        'params' => array(
            'html-upload' => 'Upload',
            'post_id' => $post_id,//TODO unused?
            '_wpnonce' => wp_create_nonce('media-form'),
            'uid' => $uid,
            '_ajax_nonce' => $ajax_nonce,
        ),
    ),
    'postId' => $post_id,
);

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script type="text/javascript">
        var upageSettings = <?php echo json_encode($settings, JSON_PRETTY_PRINT); ?>;
    </script>

    <script type="text/javascript" src="<?php echo THEMLER_PLUGIN_URL; ?>/upage/assets/js/editor.js?version=<?php echo THEMLER_PLUGIN_VERSION; ?>"></script>
    <script type="text/javascript" src="<?php echo THEMLER_PLUGIN_URL; ?>/upage/assets/js/editor-utility.js?version=<?php echo THEMLER_PLUGIN_VERSION; ?>"></script>
    <script type="text/javascript" src="<?php echo THEMLER_PLUGIN_URL; ?>/upage/assets/js/editor-uploader.js?version=<?php echo THEMLER_PLUGIN_VERSION; ?>"></script>

    <script type="text/javascript" src="<?php echo $domain; ?>/Editor/loader.js" data-processor="wp"></script>
</head>
<body>

</body>
</html>