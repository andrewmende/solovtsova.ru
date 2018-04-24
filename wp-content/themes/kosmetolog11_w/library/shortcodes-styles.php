<?php

class ThemeShortcodesStyles {

    public static function putStyleClassname($type, $style, $className, $mixinClass = '') {
        $type = strtolower($type);
        add_filter('theme_shortcodes_styles_' . strtolower($type) . '_' . $style, create_function('', "return array('$className', '$mixinClass');"));
    }
}

?>
<?php
ThemeShortcodesStyles::putStyleClassname('Blockquotes', "", "bd-blockquotes bd-no-margins", "bd-blockquotes-1-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', 'default', 'btn-default');
ThemeShortcodesStyles::putStyleClassname('Button', 'primary', 'btn-primary');
ThemeShortcodesStyles::putStyleClassname('Button', 'success', 'btn-success');
ThemeShortcodesStyles::putStyleClassname('Button', 'info', 'btn-info');
ThemeShortcodesStyles::putStyleClassname('Button', 'warning', 'btn-warning');
ThemeShortcodesStyles::putStyleClassname('Button', 'danger', 'btn-danger');
ThemeShortcodesStyles::putStyleClassname('Button', 'link', 'btn-link');
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', 'rounded', 'img-rounded');
ThemeShortcodesStyles::putStyleClassname('Image', 'circle', 'img-circle');
ThemeShortcodesStyles::putStyleClassname('Image', 'thumbnail', 'img-thumbnail');
?>
<?php
ThemeShortcodesStyles::putStyleClassname('BulletList', "", "bd-bulletlist", "bd-bulletlist-1-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "button-16", "bd-button-16", "bd-button-16-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "button-30", "bd-button-30", "bd-button-30-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "button-8", "bd-button-8", "bd-button-8-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "button-29", "bd-button-29", "bd-button-29-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "button-11", "bd-button-11", "bd-button-11-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "button-12", "bd-button-12", "bd-button-12-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "button-26", "bd-button-26", "bd-button-26-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "button-25", "bd-button-25", "bd-button-25-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "button-17", "bd-button-17", "bd-button-17-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "button-28", "bd-button-28", "bd-button-28-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "button-27", "bd-button-27", "bd-button-27-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "button-18", "bd-button-18", "bd-button-18-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Button', "", "bd-button", "bd-button-1-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-29", "bd-imagestyles-29", "bd-imagestyles-29-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-18", "bd-imagestyles-18", "bd-imagestyles-18-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-1", "bd-imagestyles-1", "bd-imagestyles-1-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-31", "bd-imagestyles-31 bd-no-margins", "bd-imagestyles-31-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-27", "bd-imagestyles-27", "bd-imagestyles-27-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-25", "bd-imagestyles-25 bd-no-margins", "bd-imagestyles-25-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-36", "bd-imagestyles-36", "bd-imagestyles-36-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-30", "bd-imagestyles-30", "bd-imagestyles-30-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-23", "bd-imagestyles-23 bd-no-margins", "bd-imagestyles-23-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-33", "bd-imagestyles-33", "bd-imagestyles-33-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-35", "bd-imagestyles-35", "bd-imagestyles-35-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-22", "bd-imagestyles-22 bd-no-margins", "bd-imagestyles-22-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-9", "bd-imagestyles-9", "bd-imagestyles-9-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-19", "bd-imagestyles-19 bd-no-margins", "bd-imagestyles-19-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-26", "bd-imagestyles-26", "bd-imagestyles-26-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-34", "bd-imagestyles-34", "bd-imagestyles-34-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-17", "bd-imagestyles-17 bd-no-margins", "bd-imagestyles-17-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-28", "bd-imagestyles-28", "bd-imagestyles-28-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-24", "bd-imagestyles-24 bd-no-margins", "bd-imagestyles-24-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-37", "bd-imagestyles-37", "bd-imagestyles-37-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "imagestyles-21", "bd-imagestyles-21 bd-no-margins", "bd-imagestyles-21-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Image', "", "bd-imagestyles", "bd-imagestyles-20-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('inputs', "", "bd-bootstrapinput form-control input-lg", "bd-bootstrapinput-1-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('OrderedList', "", "bd-orderedlist", "bd-orderedlist-1-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Table', "", "bd-table", "bd-table-1-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Block', "", "bd-block", "bd-block-1-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Carousel', "", "bd-carousel", "bd-carousel-12-mixin");
?>
<?php
ThemeShortcodesStyles::putStyleClassname('Indicators', "", "bd-indicators bd-no-margins", "bd-indicators-17-mixin");
?>