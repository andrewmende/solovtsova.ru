<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

require_once(dirname(__FILE__) . '/admin-page.php');
require_once(dirname(__FILE__) . '/actions/actions.php');

define('UPAGE_DOMAIN', 'upage.io');

function upage_get_editor_domain() {
    $domain = isset($_REQUEST['domain'])
        ? urldecode($_REQUEST['domain'])
        : UPAGE_DOMAIN;

    $domain = preg_replace('#^https?:#', '', $domain); // remove protocol
    $domain = preg_replace('#\/$#', '', $domain); // remove last slash
    return $domain;
}

function upage_get_editor_link($args = array()) {
    $post_id = '';
    if (isset($args['post_id'])) {
        $post_id = $args['post_id'];
    } else if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    }

    if (isset($args['domain'])) {
        $domain = $args['domain'];
    } else {
        $domain = upage_get_editor_domain();
    }

    $return = add_query_arg(array('page' => 'upage_editor'), admin_url() . 'themes.php');

    if ($domain) {
        $return = add_query_arg(array('domain' => urlencode($domain)), $return);
    }
    if ($post_id) {
        $return = add_query_arg(array('p' => $post_id), $return);
    }
    return $return;
}

function upage_edit_post_link_set_domain($link) {
    $domain = upage_get_editor_domain();
    if (strpos($domain, UPAGE_DOMAIN) === false) {
        $link = add_query_arg(array('domain' => urlencode($domain)), $link);
    }
    return $link;
}
add_filter('get_edit_post_link', 'upage_edit_post_link_set_domain');

function upage_update_post_set_domain_field() {
    $domain = upage_get_editor_domain();
    if (strpos($domain, UPAGE_DOMAIN) === false) {
        printf('<input type="hidden" name="domain" value="%s" />', $domain);
    }
}
add_action('edit_form_top', 'upage_update_post_set_domain_field');

function themler_add_upage_button($post) {
    if (!isset($_REQUEST['domain']) || strpos($_REQUEST['domain'], UPAGE_DOMAIN) !== false) return; // TODO

    $type = $post->post_type;
    if ($type === 'post' || $type === 'page') {
        $editor_link = upage_get_editor_link();
?>
        <a href="<?php echo $editor_link; ?>" target="_blank" id="edit-in-upage" class="button upage-editor"><?php _e('Edit in uPage', 'default'); ?></a>
<?php
    }
}
add_action('themler_edit_form_buttons', 'themler_add_upage_button');

function upage_get_thumbnail_url($page_id, $section_id) {
    $base_upload_dir = wp_upload_dir();
    $thumbnails_dir = $base_upload_dir['baseurl'] . '/upage-thumbnails';
    return "$thumbnails_dir/$page_id-$section_id.png";
}

function upage_add_editor_page() {
    add_theme_page(__('uPage', 'default'), __('uPage', 'default'), 'edit_themes', 'upage_editor', 'upage_editor');

    // remove submenu from Appearance
    global $submenu;
    if (is_array($submenu['themes.php'])) {
        foreach($submenu['themes.php'] as $key => $value) {
            if (in_array('upage_editor', $value)) {
                unset($submenu['themes.php'][$key]);
                break;
            }
        }
    }
}
add_action('admin_menu', 'upage_add_editor_page');

function upage_editor() {
    require_once(dirname(__FILE__) . '/upage-editor.php');
    die();
}
add_action('load-appearance_page_upage_editor', 'upage_editor');

function upage_get_sections_html($page_id) {
    $return = get_post_meta($page_id, '_upage_sections_html', true);
    return $return ? $return : '';
}

function upage_get_sections_ids($page_id) {
    $return = get_post_meta($page_id, '_upage_sections', true);
    return is_array($return) ? $return : array();
}

function upage_get_thumbnails_dir() {
    $base_upload_dir = wp_upload_dir();
    return $base_upload_dir['basedir'] . '/upage-thumbnails';
}

function upage_get_thumbnail_path($page_id, $section_id) {
    return upage_get_thumbnails_dir() . '/' . $page_id . '-' . $section_id . '.png';
}