<?php

register_nav_menus(array('primary-menu-3' => __('Navigation 2', 'default')));

function theme_hmenu_3() {
?>
    
    <nav class=" bd-hmenu-3 bd-no-margins" data-responsive-menu="true" data-responsive-levels="expand on click">
        
            <div class=" bd-responsivemenu-2 collapse-button">
    <div class="bd-container-inner">
        <div class="bd-menuitem-7 ">
            <a  data-toggle="collapse"
                data-target=".bd-hmenu-3 .collapse-button + .navbar-collapse"
                href="#" onclick="return false;">
                    <span>MENU</span>
            </a>
        </div>
    </div>
</div>
            <div class="navbar-collapse collapse">
        
        <div class=" bd-horizontalmenu-1 clearfix">
            <div class="bd-container-inner">
            <?php
                echo theme_get_menu(array(
                    'source' => theme_get_option('theme_menu_source'),
                    'depth' => theme_get_option('theme_menu_depth'),
                    'theme_location' => 'primary-menu-3',
                    'responsive' => 'xs',
                    'responsive_levels' => 'expand on click',
                    'levels' => 'expand on hover',
                    'popup_width' => 'sheet',
                    'popup_custom_width' => '600',
                    'columns' => array(
                        'lg' => '',
                        'md' => '',
                        'sm' => '',
                        'xs' => '',
                    ),
                    'menu_function' => 'theme_menu_3_1',
                    'menu_item_start_function' => 'theme_menu_item_start_3_1',
                    'menu_item_end_function' => 'theme_menu_item_end_3_1',
                    'submenu_start_function' => 'theme_submenu_start_3_2',
                    'submenu_end_function' => 'theme_submenu_end_3_2',
                    'submenu_item_start_function' => 'theme_submenu_item_start_3_2',
                    'submenu_item_end_function' => 'theme_submenu_item_end_3_2',
                ));
            ?>
            </div>
        </div>
        
        
            </div>
    </nav>
    
<?php
}

function theme_menu_3_1($content = '') {
    ob_start();
    ?><ul class=" bd-menu-1 nav nav-pills nav-center">
    <?php echo $content; ?>
</ul><?php
    return ob_get_clean();
}

function theme_menu_item_start_3_1($class, $title, $attrs, $link_class, $item_type = '') {
    if ($item_type === 'mega') {
        $class .= ' ';
    }
    ob_start();
    ?><li class=" bd-menuitem-1 bd-toplevel-item <?php echo $class; ?>">
    <a class="<?php echo $link_class; ?>" <?php echo $attrs; ?>>
        <span>
            <?php echo $title; ?>
        </span>
    </a><?php
    return ob_get_clean();
}

function theme_menu_item_end_3_1() {
    ob_start();
?>
    </li>
    
<?php
    return ob_get_clean();
}

function theme_submenu_start_3_2($class = '', $item_type = '') {
    ob_start();
?>
    
    <div class="bd-menu-2-popup <?php if ($item_type === 'category') echo 'bd-megamenu-popup'; ?>">
    <?php if ($item_type === 'mega'): ?>
        <div class="bd-menu-2   bd-mega-grid bd-grid-1  <?php echo $class; ?>">
            <div class="container-fluid">
                <div class="separated-grid row">
    <?php else: ?>
        <ul class="bd-menu-2   <?php echo $class; ?>">
    <?php endif; ?>
<?php
    return ob_get_clean();
}

function theme_submenu_end_3_2($item_type = '') {
    ob_start();
?>
    <?php if ($item_type !== 'mega'): ?>
        </ul>
    <?php else: ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
    
<?php
    return ob_get_clean();
}

function theme_submenu_item_start_3_2($class, $title, $attrs, $link_class, $item_type = '') {
    $class .= ' bd-sub-item';
    switch($item_type) {
        case 'category':
            $class .= ' bd-mega-item  bd-menuitem-5';
            $class .= ' separated-item-6';
            break;
        case 'subcategory':
            $class .= ' bd-mega-item  bd-menuitem-6';
            break;
    }
    ob_start();
?>
    
    <?php if ($item_type === 'category'): ?>
        <div class=" bd-menuitem-2 <?php echo $class; ?>">
            <div class=" bd-griditem-6 bd-grid-item">
    <?php else: ?>
        <li class=" bd-menuitem-2 <?php echo $class; ?>">
    <?php endif; ?>

            <a class="<?php echo $link_class; ?>" <?php echo $attrs; ?>>
                <span>
                    <?php echo $title; ?>
                </span>
            </a>
<?php
    return ob_get_clean();
}

function theme_submenu_item_end_3_2($item_type = '') {
    ob_start();
?>
    <?php if ($item_type !== 'category'): ?>
        </li>
    <?php else: ?>
            </div>
        </div>
    <?php endif; ?>

    
<?php
    return ob_get_clean();
}