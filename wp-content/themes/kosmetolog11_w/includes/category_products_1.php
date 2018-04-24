<?php
function theme_products() {
?>
    
    <div class=" bd-products">
        <div class="bd-container-inner">
        
            <div class=" bd-container-54 bd-tagstyles">
    <h2>
        <?php
            if ( is_search() ) {
                printf( __( 'Search Results: &ldquo;%s&rdquo;', 'woocommerce' ), get_search_query() );
                if ( get_query_var( 'paged' ) )
                    printf( __( '&nbsp;&ndash; Page %s', 'woocommerce' ), get_query_var( 'paged' ) );
            } elseif ( is_tax() ) {
                echo single_term_title( "", false );
            } else {
                $shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
                echo apply_filters( 'the_title', ( $shop_page_title = get_option( 'woocommerce_shop_page_title' ) ) ? $shop_page_title : $shop_page->post_title );
            }
        ?>
    </h2>
</div>

        
            <div class=" bd-categories-33">
    
    
    <div class=" bd-productcategories-31">
    <div class=" bd-grid-43">
        <div class="container-fluid">
            <div class="separated-grid row">
                <?php
                    add_filter('woocommerce_locate_template', 'wc_category_template_filter_31', 10, 3);
                    woocommerce_product_subcategories();
                    remove_filter('woocommerce_locate_template', 'wc_category_template_filter_31');
                ?>
            </div>
        </div>
    </div>
</div>
</div>

        <?php
            if ( have_posts() ) :
                theme_do_action('woocommerce_before_shop_loop', array(
                    array('woocommerce_catalog_ordering', 30) // 2.1.0
                ));
        ?>
                <div class=" bd-productsgridbar-35">
    <div class="bd-container-inner">
        <div class=" bd-layoutcontainer-27 bd-columns bd-no-margins">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row ">
                <div class=" bd-columnwrapper-60 
 col-md-6
 col-sm-6
 col-xs-4">
    <div class="bd-layoutcolumn-60 bd-column" ><div class="bd-vertical-align-wrapper"><div class=" bd-typeselector-1">
    
</div></div></div>
</div>
	
		<div class=" bd-columnwrapper-61 
 col-md-6
 col-sm-6
 col-xs-8">
    <div class="bd-layoutcolumn-61 bd-column" ><div class="bd-vertical-align-wrapper"><div class=" bd-productssorter-1">
    
    <?php woocommerce_catalog_ordering(); ?>
</div></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
                <div class=" bd-grid-45">
                  <div class="container-fluid">
                    <div class="separated-grid row">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php
                            global $product, $woocommerce_loop, $post;

                            // Store loop count we're currently on
                            if ( empty( $woocommerce_loop['loop'] ) )
                                $woocommerce_loop['loop'] = 0;

                            // Store column count for displaying the grid
                            if ( empty( $woocommerce_loop['columns'] ) )
                                $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

                            // Ensure visibilty
                            if ( !$product || !$product->is_visible() )
                                return;

                            // Increase loop count
                            $woocommerce_loop['loop']++;

                            $product_view = array();
                            $product_view['link']  = apply_filters('the_permalink', get_permalink());
                            $product_view['title'] = the_title('', '', false);
                            $product_view['price'] = theme_get_price_data($product);
                            $product_view['desc']  = $post->post_excerpt;
                            $product_view['image'] = woocommerce_get_product_thumbnail('shop_catalog', '', '');

                            $cart_item = isset($cart_item) ? $cart_item : array();
                            $cart_item_key = isset($cart_item_key) ? $cart_item_key : '';
                            $product_view['dafaultLayoutName'] = "grid";
                            $product_view['layouts_count'] = 2;
                            $product_view['activeLayoutName'] = isset($_COOKIE['layoutType']) ? $_COOKIE['layoutType'] : $product_view['dafaultLayoutName'];
                            ?>
                            
                            <div class="separated-item-4 col-md-3 grid"<?php if ('grid' !== $product_view['activeLayoutName']) { echo 'style="display:none;"';} ?>>
                                <div class=" bd-griditem-4">
                                    <?php theme_do_action('woocommerce_before_shop_loop_item', array(
                                        array('woocommerce_template_loop_product_link_open', 10) // 2.1.0
                                    )); ?>
                                    <a class=" bd-productimage-4" href="<?php echo $product_view['link']; ?>"><?php theme_product_image($product_view, ' bd-imagestyles-16', ''); ?></a>
	
		<?php if ( isset($product_view['link']) && isset($product_view['title']) ){ ?><div class=" bd-producttitle-8"><a itemprop="name" href="<?php echo $product_view['link']; ?>"><?php echo $product_view['title']; ?></a></div><?php } ?>
	
		<div class=" bd-productprice-3">
<?php
    if (isset($product_view['price'])) {
?>
        <span class="price"><?php
            echo theme_price_html(array(
                'price_data'       => $product_view['price'],
                'swap_old_regular' => false,
                'show_old_price'   => true,
                'old_price' => array(
                    'wrap_start'        => '<div class=" bd-pricetext-11">',
                    'wrap_end'          => '</div>',
                    'label_class'       => ' bd-label-11',
                    'label_attributes'  => '',
                    'amount_class'      => ' bd-container-30 bd-tagstyles',
                    'amount_attributes' => '',
                ),
                'price' => array(
                    'wrap_start'        => '<div class=" bd-pricetext-10">',
                    'wrap_end'          => '</div>',
                    'label_class'       => ' bd-label-10',
                    'label_attributes'  =>'',
                    'amount_class'      => ' bd-container-29 bd-tagstyles',
                    'amount_attributes' => '',
                ),
            )); ?>
        </span>
<?php
    }
?>
</div>
	
		<?php $desc_length = intval('65'); ?>
<div class=" bd-productdesc-9">
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
	
		<?php theme_product_buy(' bd-productbuy-2 bd-no-margins bd-button', ' '); ?>
	
		<?php if (time() - get_option('theme_products_newness_period') * 60 * 60 * 24 < strtotime(get_the_time('Y-m-d'))) { ?>
<div class=" bd-productnewicon-3 bd-productnew-2">
    <span><?php _e('New!', 'woocommerce'); ?></span>
</div>
<?php } ?>
	
		<?php if ($product->is_on_sale()): ?>
<div class=" bd-productsaleicon bd-productsale-2">
    <span><?php _e('Sale!', 'woocommerce'); ?></span>
</div>
<?php endif; ?>
	
		<?php
    if (!$product->is_in_stock()) :
?>
        <div class=" bd-productoutofstockicon-3 bd-productoutofstock-2">
            <span>
                <?php _e('Out of stock', 'woocommerce'); ?>
            </span>
        </div>
<?php
    endif;
?>
                                    <?php theme_do_action('woocommerce_after_shop_loop_item', array(
                                        array('woocommerce_template_loop_product_link_close', 5), // 2.1.0
                                        array('woocommerce_template_loop_add_to_cart', 10)
                                    )); ?>
                                </div>
                            </div>
                            <div class="separated-item-5 col-md-12 list"<?php if ('list' !== $product_view['activeLayoutName']) { echo 'style="display:none;"';} ?>>
                                <div class=" bd-griditem-5">
                                    <?php theme_do_action('woocommerce_before_shop_loop_item', array(
                                        array('woocommerce_template_loop_product_link_open', 10) // 2.1.0
                                    )); ?>
                                    <div class=" bd-layoutcontainer-26 bd-columns bd-no-margins">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row ">
                <div class=" bd-columnwrapper-57 
 col-md-3">
    <div class="bd-layoutcolumn-57 bd-column" ><div class="bd-vertical-align-wrapper"><a class=" bd-productimage-5" href="<?php echo $product_view['link']; ?>"><?php theme_product_image($product_view, ' bd-imagestyles', ''); ?></a>
	
		<?php if (time() - get_option('theme_products_newness_period') * 60 * 60 * 24 < strtotime(get_the_time('Y-m-d'))) { ?>
<div class=" bd-productnewicon-2 bd-productnew-3">
    <span><?php _e('New!', 'woocommerce'); ?></span>
</div>
<?php } ?>
	
		<?php if ($product->is_on_sale()): ?>
<div class=" bd-productsaleicon bd-productsale-3">
    <span><?php _e('Sale!', 'woocommerce'); ?></span>
</div>
<?php endif; ?>
	
		<?php
    if (!$product->is_in_stock()) :
?>
        <div class=" bd-productoutofstockicon bd-productoutofstock-3">
            <span>
                <?php _e('Out of stock', 'woocommerce'); ?>
            </span>
        </div>
<?php
    endif;
?></div></div>
</div>
	
		<div class=" bd-columnwrapper-58 
 col-md-7">
    <div class="bd-layoutcolumn-58 bd-column" ><div class="bd-vertical-align-wrapper"><?php if ( isset($product_view['link']) && isset($product_view['title']) ){ ?><div class=" bd-producttitle-10"><a itemprop="name" href="<?php echo $product_view['link']; ?>"><?php echo $product_view['title']; ?></a></div><?php } ?>
	
		<?php $desc_length = intval('65'); ?>
<div class=" bd-productdesc-11">
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
</div></div></div>
</div>
	
		<div class=" bd-columnwrapper-59 
 col-md-2">
    <div class="bd-layoutcolumn-59 bd-column" ><div class="bd-vertical-align-wrapper"><div class=" bd-productprice-4 bd-no-margins">
<?php
    if (isset($product_view['price'])) {
?>
        <span class="price"><?php
            echo theme_price_html(array(
                'price_data'       => $product_view['price'],
                'swap_old_regular' => true,
                'show_old_price'   => true,
                'old_price' => array(
                    'wrap_start'        => '<div class=" bd-pricetext-13">',
                    'wrap_end'          => '</div>',
                    'label_class'       => ' bd-label-13',
                    'label_attributes'  => '',
                    'amount_class'      => ' bd-container-32 bd-tagstyles',
                    'amount_attributes' => '',
                ),
                'price' => array(
                    'wrap_start'        => '<div class=" bd-pricetext-12">',
                    'wrap_end'          => '</div>',
                    'label_class'       => ' bd-label-12',
                    'label_attributes'  =>'',
                    'amount_class'      => ' bd-container-31 bd-tagstyles',
                    'amount_attributes' => '',
                ),
            )); ?>
        </span>
<?php
    }
?>
</div>
	
		<?php theme_product_buy(' bd-productbuy-3 bd-button', ' '); ?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
                                    <?php theme_do_action('woocommerce_after_shop_loop_item', array(
                                        array('woocommerce_template_loop_product_link_close', 5), // 2.1.0
                                        array('woocommerce_template_loop_add_to_cart', 10)
                                    )); ?>
                                </div>
                            </div>
                        <?php endwhile; // end of the loop. ?>
                    </div>
                  </div>
                </div>

                <div class=" bd-productsgridbar-37">
    <div class="bd-container-inner">
        <div id="pagination" class=" bd-productsgridpagination-1">
<?php
    global $wp_query;

    if ( $wp_query->max_num_pages > 1 ) {
        echo preg_replace(
            array(
                '/<li(.*current)/',
                '/<ul class=\'page-numbers\'/',
                '/<li>/'
            ),
            array(
                '<li   class=" bd-paginationitem-4 active"$1',
                '<ul  class=" bd-pagination-4 pagination"',
                '<li  class="bd-paginationitem-4 ">'
            ),
            paginate_links( apply_filters( 'woocommerce_pagination_args', array(
                'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false ) ),
                'format' 		=> '',
                'current' 		=> max( 1, get_query_var('paged') ),
                'total' 		=> $wp_query->max_num_pages,
                'prev_text' 	=> '&larr;',
                'next_text' 	=> '&rarr;',
                'type'			=> 'list',
                'end_size'		=> 3,
                'mid_size'		=> 3
            )))
        );
    }
?>
</div>
    </div>
</div>

        <?php
                theme_do_action('woocommerce_after_shop_loop', array(
                    array('woocommerce_pagination', 10) // 2.1.0
                ));
            endif;
        ?>
        <div class="clear"></div>
        </div>
    </div>
    
<?php
}
?>