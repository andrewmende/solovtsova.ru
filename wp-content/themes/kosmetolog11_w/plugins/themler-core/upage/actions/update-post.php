<?php

function upage_update_post() {

    if (!isset($_REQUEST['id']) || !isset($_REQUEST['html'])) {
        return array(
            'status' => 'error',
            'message' => 'post parameter missing',
        );
    }

    $id = $_REQUEST['id'];
    $ids = _at($_REQUEST, 'ids', array());
    $html = $_REQUEST['html'];

    $post = get_post($id);
    if (!$post) {
        return array(
            'result' => 'error',
            'message' => 'There is no post with id=' . $id,
        );
    }

    update_post_meta($id, '_upage_sections_html', $html);
    update_post_meta($id, '_upage_sections', $ids);

    return array(
        'result' => 'done',
    );
}
upage_add_action('upage_update_post');