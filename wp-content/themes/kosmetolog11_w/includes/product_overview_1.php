<?php
function theme_product_overview() {
    global $product_overview_context;
    $product_overview_context = '.bd-productoverview';

    // single post expected
    while (have_posts()) {
        the_post();
        do_action('woocommerce_before_single_product');
?>
        <div itemscope itemtype="<?php echo theme_wc_get_product_schema(); ?>"  id="product-<?php the_ID(); ?>" <?php post_class(" bd-productoverview"); ?>>

            <?php theme_do_action('woocommerce_before_single_product_summary', array(
                array('woocommerce_show_product_sale_flash', 10), // 2.1.0
                array('woocommerce_show_product_images', 20) // 2.1.0
            )); ?>

<?php
            global $post, $product;
            $product_view = array();
            $product_view['link']  = apply_filters('the_permalink', get_permalink());
            $product_view['title'] = the_title('', '', false);
            $product_view['price'] = theme_get_price_data($product);
            $product_view['desc']  = $post->post_excerpt;
            $product_view['image'] = woocommerce_get_product_thumbnail('shop_catalog', '', '');
?>
            <div class=" bd-layoutcontainer-29 bd-columns bd-no-margins">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row ">
                <div class=" bd-columnwrapper-66 
 col-md-6
 col-sm-12
 col-xs-12">
    <div class="bd-layoutcolumn-66 bd-column" ><div class="bd-vertical-align-wrapper"><?php if ( isset($product_view['link']) && isset($product_view['title']) ) : ?>
<h2 itemprop="name" class=" bd-productoverviewtitle-1 bd-no-margins"><?php echo $product_view['title']; ?></h2>
<?php endif; ?>
	
		<div class=" bd-productimage-6 ">
    <div class="zoom-container images">
    <?php if ( has_post_thumbnail() ) : ?>
        <a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>"  class="zoom" data-rel="prettyPhoto[product-gallery]" rel="thumbnails" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>">
        <?php
            global $post;
            remove_action('begin_fetch_post_thumbnail_html', '_wp_post_thumbnail_class_filter_add'); // disable 'wp-post-image' class
            // 
            echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ),  array('class' => ' bd-imagestyles') );
            add_action('begin_fetch_post_thumbnail_html', '_wp_post_thumbnail_class_filter_add');
        ?>
        </a>
    <?php else :  ?>
        <img class=' bd-imagestyles' src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" />
    <?php endif; ?>
    </div>
</div>
	
		<?php
    $images = theme_get_product_thumbnails_data();
    $imagesCount = count($images);
    if ($imagesCount > 0) {
        $items = intval('5');
        $loop = 0;
        $innerStyle = '';
        $itemStyle = '';
        // 
            if ($imagesCount < $items && $items !== 0) {
                $innerStyle = 'style="width: ' . floor(100 / $items) * $imagesCount . '%;margin: 0 auto;"';
                $itemStyle = 'style="width:' . floor(100 / $imagesCount) . '%"';
            }
        //
?>
<div class=" bd-imagethumbnails-1 carousel slide adjust-slides  ">
    
    <div class="carousel-inner" <?php echo $innerStyle ?>>
        <?php foreach ($images as $image): ?>
        <?php
            $classes = array('zoom');
            if ($loop == 0 || $loop % $items == 0) {
                $classes[] = 'first';
            }
            if (($loop + 1) % $items == 0) {
                $classes[] = 'last';
            }
            if (get_option('woocommerce_enable_lightbox') === 'yes') {
                $classes[] = 'with-lightbox';
            }
        ?>
        <?php if ($loop % $items === 0): ?>
        <div class="item<?php if ($loop == 0): ?> active<?php endif ?>">
        <?php endif ?>
            <a class=" bd-productimage-7 <?php echo implode(' ', $classes); ?>" href="<?php echo $image['url']; ?>" title="<?php echo $image['title']; ?>" data-rel="prettyPhoto[product-gallery]" rel="smallImage:'<?php echo $image['preview']; ?>'" <?php echo $itemStyle; ?>>
                <img class=" bd-imagestyles" src="<?php echo $image['src']; ?>" />
            </a>
        <?php if ($loop === $imagesCount - 1 || ($loop + 1) % $items === 0): ?>
        </div>
        <?php endif; $loop++; ?>
        <?php endforeach ?>
    </div>
    <?php if ($imagesCount > $items): ?>
        
            <div class="bd-left-button">
    <a class=" bd-carousel" href="#">
        <span class="bd-icon"></span>
    </a>
</div>

<div class="bd-right-button">
    <a class=" bd-carousel" href="#">
        <span class="bd-icon"></span>
    </a>
</div>
    <?php endif ?>
</div>
<?php
    }
?></div></div>
</div>
	
		<div class=" bd-columnwrapper-67 
 col-md-6
 col-sm-12
 col-xs-12">
    <div class="bd-layoutcolumn-67 bd-column" ><div class="bd-vertical-align-wrapper"><div class=" bd-productprice-5">
<?php
    if (isset($product_view['price'])) {
?>
        <span class="price"><?php
            echo theme_price_html(array(
                'price_data'       => $product_view['price'],
                'swap_old_regular' => true,
                'show_old_price'   => true,
                'old_price' => array(
                    'wrap_start'        => '<div class=" bd-pricetext-15">',
                    'wrap_end'          => '</div>',
                    'label_class'       => ' bd-label-17',
                    'label_attributes'  => '',
                    'amount_class'      => ' bd-container-36 bd-tagstyles bd-custom-blockquotes bd-custom-button bd-custom-image bd-custom-table',
                    'amount_attributes' => '',
                ),
                'price' => array(
                    'wrap_start'        => '<div class=" bd-pricetext-14">',
                    'wrap_end'          => '</div>',
                    'label_class'       => false,
                    'label_attributes'  =>'',
                    'amount_class'      => ' bd-container-35 bd-tagstyles bd-custom-blockquotes bd-custom-button bd-custom-image bd-custom-table',
                    'amount_attributes' => '',
                ),
            )); ?>
        </span>
<?php
    }
?>
</div>
	
		<?php

if (get_option('woocommerce_enable_review_rating' ) !== 'no') {

    global $product;

    $rating_count = method_exists($product, 'get_rating_count')   ? $product->get_rating_count()   : 1;
    $review_count = method_exists($product, 'get_review_count')   ? $product->get_review_count()   : 1;
    $average      = method_exists($product, 'get_average_rating') ? $product->get_average_rating() : 0;

    if ($rating_count > 0) {
?>

<div class=" bd-productrating-1" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">

    <div class=" bd-rating-2" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <span class="  bd-icon bd-icon-2 <?php if ($i <= round($average)) echo ' active'; ?>"></span>
        <?php endfor; ?>

        <span itemprop="ratingValue" style="display:none"><?php echo esc_html($average); ?></span>
        <span itemprop="ratingCount" style="display:none"><?php echo $rating_count; ?></span>
        <span itemprop="reviewCount" style="display:none"><?php echo $review_count; ?></span>
    </div>
</div>

<?php
    }
}
?>
	
		<?php $desc_length = intval('65'); ?>
<div class=" bd-productdesc-13">
    <?php
        if (isset($product_view['desc']) && $product_view['desc']) {
            $desc = apply_filters('woocommerce_short_description', $product_view['desc']);

            if ($desc_length > 0) {
                $excerpt = theme_create_excerpt($desc, $desc_length, 1, true);
                if ($excerpt) {
                    $desc = force_balance_tags($excerpt . '...');
                }
            }
            echo $desc;
        }
    ?>
</div>
	
		<div class=" bd-productvariations-1">
    <?php
        $variations = theme_wc_get_variations();
        $content = $variations['content'];
        if (theme_wc_quantity_buttons_supported()) {
            $content = str_replace('type="number', 'type="text', $content);
        }
        $content = str_replace('class="input-text qty text"', 'class=" bd-bootstrapinput-5 form-control input-sm qty" maxlength="12"', $content);
        echo $content;
    ?>
    <script>
        jQuery('.bd-productvariations-1 table.variations label').css('display', 'inline');
        jQuery('.bd-productvariations-1 table.variations a.reset_variations').each(function() {
            var reset_link = jQuery('<div>').append(jQuery(this).clone()).remove().html();
            this.remove();
            jQuery('.bd-productvariations-1 table.variations tbody').append('<tr><td></td><td>' + reset_link + '</td></tr>')
        });
    </script>
    <?php theme_do_action('woocommerce_single_product_summary', array(
        array('woocommerce_template_single_title', 5), // 2.1.0
        array('woocommerce_template_single_rating', 10), // 2.1.0
        array('woocommerce_template_single_price', 10), // 2.1.0
        array('woocommerce_template_single_excerpt', 20), // 2.1.0
        array('woocommerce_template_single_add_to_cart', 30), // 2.1.0
    )); ?>
</div>
	
		<?php theme_product_buy(' bd-productbuy-4 bd-no-margins bd-button-9', ' '); ?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
	
		<?php
    $tabs = apply_filters('woocommerce_product_tabs', array());

    if (is_null($tabs)) {
        $tabs = array('reviews' => array());
    }
    if (isset($tabs['reviews'])) {
        $tabs['reviews']['callback'] = 'theme_tab_reviews_2';
    }

    if ( ! empty( $tabs ) ) :
        ob_start();
        $count = 0;
        foreach ( $tabs as $key => $tab ) : ?>
            <li class="<?php if ($count == 0) echo 'active '; echo $key; ?>_tab  bd-menuitem-12">
                <a data-toggle="tab" href="#tab-<?php echo $key ?>2">
                    <span>
                        <?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?>
                    </span>
                </a>
            </li>
        <?php $count++; endforeach;
        $tabs_header = ob_get_clean();

        ob_start();
        $count = 0;
        foreach ( $tabs as $key => $tab ) : ?>
            <div class="tab-<?php echo $key; ?> tab-pane entry-content<?php if ($count == 0) echo ' active'; ?>" id="tab-<?php echo $key; ?>2">
                <?php call_user_func( $tab['callback'], $key, $tab ) ?>
            </div>
        <?php $count++; endforeach;
        $tabs_content = ob_get_clean();
    ?>

        <div class=" bd-tabinformationcontrol-2 tabbable" data-responsive="true">
            <div class="bd-container-inner">
            <div><ul class=" bd-menu-12 clearfix nav nav-tabs navbar-left">
    <?php echo $tabs_header; ?>
</ul></div>
            <div class=" bd-container-37 bd-tagstyles tab-content">
    <?php echo $tabs_content; ?>
</div>
            <div class=" bd-accordion accordion">
    <div class=" bd-menuitem-8 accordion-item"></div>
    <div class=" bd-container-41 bd-tagstyles accordion-content"></div>
</div>
            </div>
        </div>
<?php
    endif;
?>

			<?php theme_do_action('woocommerce_after_single_product_summary', array(
                array('woocommerce_output_product_data_tabs', 10), // 2.1.0
                array('woocommerce_upsell_display', 15), // 2.1.0
                array('woocommerce_output_related_products', 20) // 2.1.0
            )); ?>
        </div>
    <?php
        do_action('woocommerce_after_single_product');
    }

    $product_overview_context = null;
}