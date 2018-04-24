<?php
function theme_logo_3(){
?>
<?php
    $logoAlt = get_option('blogname');
    $logoSrc = theme_get_option('theme_logo_url');
    $logoLink = theme_get_option('theme_logo_link');
?>

<a class=" bd-logo-3" href="<?php
    if (!theme_is_empty_html($logoLink)) {
        echo $logoLink;
    } else {
        ?>http://solovtsova.ru<?php
    }
?>">
<img class=" bd-imagestyles"<?php
                if (!theme_is_empty_html($logoSrc)) {
                    echo ' src="' . $logoSrc . '"';
                } else {
                    ?>
 src="<?php echo theme_get_image_path('images/d7d5bf6e5e4402cf1e0886708ac9aa35_Yana_Solovtseva_kosmetolog_logo.png'); ?>"<?php
                } ?> alt="<?php echo $logoAlt ?>">
</a>
<?php
}