<?php

function upage_screenshorts($post) {
    if ($post->post_type == 'page' || $post->post_type == 'post') {
        $thumbnails = array();

        $sections_ids = upage_get_sections_ids($post->ID);
        foreach($sections_ids as $section_id) {
            $thumbnails[] = sprintf('<div><a href="#" class="upage-editor"><img src="%s"></a></div>',
                upage_get_thumbnail_url($post->ID, $section_id));
        }
?>
        <div id="upage-preview">
            <?php echo implode('', $thumbnails); ?>
        </div>
<?php
    }
}
add_action('edit_form_after_title', 'upage_screenshorts', 100);

function upage_preview_styles() {
?>
    <style>
        #upage-preview a img {
            max-width: 100%;
        }
    </style>
<?php
}
add_action('admin_head', 'upage_preview_styles');