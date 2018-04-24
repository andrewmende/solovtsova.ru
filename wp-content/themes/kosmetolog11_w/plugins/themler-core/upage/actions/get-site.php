<?php

/**
 * @param WP_Post $post
 * @return array
 */
function upage_get_sections($post) {

    $ids = upage_get_sections_ids($post->ID);
    $order = 0;
    $result = array();
    foreach($ids as $id) {
        $result[] = array(
            'order' => $order++,
            'pageId' => $post->ID,
            'status' => 2,
            'id' => $id,
            'thumbnailUrl' => upage_get_thumbnail_url($post->ID, $id),
            'clientId' => $id,
        );
    }
    return $result;
}

/**
 * @param WP_Post|int $post
 * @return array
 */
function upage_get_post($post) {
    if (is_int($post)) {
        $post = get_post($post);
    }

    $result = array(
        'siteId' => 1,
        'title' => $post->post_title,
        'publicUrl' => add_query_arg(array(
            'pageId' => $post->ID,
            'uid' => wp_get_current_user()->ID,
            '_ajax_nonce' => wp_create_nonce('upage-upload'),
        ), upage_get_action_url('upage_get_page_html')),
        'id' => $post->ID,
        'order' => 0,
        'status' => 2,
        'items' => upage_get_sections($post),
    );
    return $result;
}

function upage_get_pages() {

    $query_options = array(
        'post_type' => 'page',
        'posts_per_page' => 10,
        'order' => 'DESC',
        'orderby' => 'modified',
        'post_status' => 'publish',
    );

    $query = new WP_Query;
    $posts = $query->query($query_options);

    $result = array();

    foreach ($posts as $post) {
        $result[] = upage_get_post($post);
    }

    return $result;
}

function upage_get_site() {

    $result = array(
        'title' => get_bloginfo('name'),
        'publicUrl' => get_home_url(),
        'id' => 1,
        'order' => 1,
        'status' => 2,
        'items' => upage_get_pages(),
    );

    return array(
        'result' => 'done',
        'data' => $result,
    );
}
upage_add_action('upage_get_site');