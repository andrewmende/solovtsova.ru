<?php

function upage_verify_nonce_and_login_user() {
    $uid = isset($_REQUEST['uid']) ? $_REQUEST['uid'] : 0;
    $nonce = isset($_REQUEST['_ajax_nonce']) ? $_REQUEST['_ajax_nonce'] : $_REQUEST['_wpnonce'];

    if (false !== wp_verify_nonce($nonce, 'upage-upload')){
        wp_clear_auth_cookie();
        wp_set_auth_cookie($uid);
        wp_set_current_user($uid);
        return true;
    }
    return false;
}

function upage_nopriv_action_wrapper() {
    if (upage_verify_nonce_and_login_user()){
        upage_action_wrapper();
    }
    die('session_error');
}
function upage_check_ajax_referer() {
    check_ajax_referer('upage-upload');
}
add_action('upage_check_ajax_referer', 'upage_check_ajax_referer');

function upage_action_wrapper() {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    do_action('upage_check_ajax_referer');

    if (null !== $action && is_callable($action)) {
        $result = call_user_func($action);
        if ($result !== null) {
            echo json_encode($result);
        }
        die;
    }
    die('invalid_action');
}

function upage_add_action($function_name) {
    if (is_callable($function_name)) {
        add_action('wp_ajax_nopriv_'. $function_name, 'upage_nopriv_action_wrapper', 9);
        add_action('wp_ajax_' . $function_name, 'upage_action_wrapper', 9);
    }
}

function upage_get_action_url($action) {
    return add_query_arg(array('action' => $action), admin_url('admin-ajax.php'));
}

require_once(dirname(__FILE__) . '/upload-image.php');
require_once(dirname(__FILE__) . '/update-post.php');
require_once(dirname(__FILE__) . '/get-site.php');
require_once(dirname(__FILE__) . '/get-page.php');
require_once(dirname(__FILE__) . '/duplicate-page.php');
require_once(dirname(__FILE__) . '/update-pages.php');
require_once(dirname(__FILE__) . '/get-page-html.php');