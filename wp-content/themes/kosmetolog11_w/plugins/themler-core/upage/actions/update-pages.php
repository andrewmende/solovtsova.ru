<?php

function upage_update_post_remove($data) {
    wp_delete_post($data['id']);
}

function upage_update_post_update($data) {
    $post = get_post($data['id']);

    $update_data = array();
    if ($post) {
        $update_data['ID'] = $post->ID;
    } else {
        $update_data['post_type'] = 'page';
        $update_data['post_status'] = 'publish';
    }
    if (!empty($data['title'])) {
        $update_data['post_title'] = $data['title'];
    }
    $new_post = $post ? wp_update_post($update_data) : wp_insert_post($update_data);
    return upage_get_post($new_post);
}

function upage_update_post_add($data) {
    return upage_update_post_update($data);
}

function upage_update_pages() {

    $result = array(
        'add' => array(),
        'update' => array(),
    );

    $data = $_REQUEST['data'];
    if (isset($data['add'])) {
        foreach($data['add'] as $add_data) {
            $result['add'][] = upage_update_post_add($add_data);
        }
    }
    if (isset($data['update'])) {
        foreach($data['update'] as $update_data) {
            $result['update'][] = upage_update_post_update($update_data);
        }
    }
    if (isset($data['remove'])) {
        foreach($data['remove'] as $remove_data) {
            upage_update_post_remove($remove_data);
        }
    }

    return array(
        'result' => 'done',
        'data' => $result,
    );
}
upage_add_action('upage_update_pages');