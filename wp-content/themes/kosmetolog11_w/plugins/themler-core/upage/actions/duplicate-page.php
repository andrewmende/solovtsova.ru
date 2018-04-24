<?php

function upage_duplicate_post($post) {

    $new_post = array(
        'menu_order' => $post->menu_order,
        'comment_status' => $post->comment_status,
        'ping_status' => $post->ping_status,
        'post_author' => $post->ID,
        'post_content' => $post->post_content,
        'post_excerpt' => $post->post_excerpt,
        'post_mime_type' => $post->post_mime_type,
        'post_parent' => $new_post_parent = $post->post_parent,
        'post_password' => $post->post_password,
        'post_status' => $post->post_status,
        'post_title' => $post->post_title,
        'post_type' => $post->post_type,
    );

    $new_post_id = wp_insert_post($new_post);

    $meta_keys = get_post_custom_keys($post->ID);
    if (!empty($meta_keys)) {
        foreach ($meta_keys as $meta_key) {
            $meta_values = get_post_custom_values($meta_key, $post->ID);
            foreach ($meta_values as $meta_value) {
                $meta_value = maybe_unserialize($meta_value);
                add_post_meta($new_post_id, $meta_key, $meta_value);
            }
        }
    }
    foreach(upage_get_sections_ids($post->ID) as $section_id) {
        $source_path = upage_get_thumbnail_path($post->ID, $section_id);
        $dest_path = upage_get_thumbnail_path($new_post_id, $section_id);
        FilesUtility::removeFile($dest_path);
        FilesUtility::copyRecursive($source_path, $dest_path);
    }
    return $new_post_id;
}

function upage_duplicate_page() {

    $id = $_REQUEST['pageId'];
    $post = get_post($id);

    $new_post_id = upage_duplicate_post($post);
    $new_post = get_post($new_post_id);
    $result = upage_get_post($new_post);

    return array(
        'result' => 'done',
        'data' => $result,
    );
}
upage_add_action('upage_duplicate_page');