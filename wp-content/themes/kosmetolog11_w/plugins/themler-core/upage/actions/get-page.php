<?php

function upage_get_page() {

    $id = $_REQUEST['pageId'];
    $post = get_post($id);

    $result = upage_get_post($post);
    $result['html'] = upage_get_sections_html($id);

    return array(
        'result' => 'done',
        'data' => $result,
    );
}
upage_add_action('upage_get_page');