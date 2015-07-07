<?php
if(get_option('cms_superheroes_client')){
    require_once 'client/client.php';
}
if(get_option('cms_superheroes_portfolio')){
    require_once 'portfolio/portfolio.php';
    require_once 'portfoliocarousel/portfoliocarousel.php';
}
if(get_option('cms_superheroes_pricing')){
    require_once 'pricing/pricing.php';
}
if(get_option('cms_superheroes_team')){
    require_once 'team/team.php';
}
if(get_option('cms_superheroes_testimonials')){
    require_once 'testimonial/testimonial.php';
}
if(get_option('cms_superheroes_restaurant')){
    require_once 'menucarousel/menucarousel.php';
    require_once 'menucategories/menucategories.php';
    require_once 'menufood/menufood.php';
}
if(class_exists('CMSEvents')){
    require_once 'eventcountdown/eventcountdown.php';
    require_once 'eventscarousel/eventscarousel.php';
    require_once 'upcomingevents/upcomingevents.php';
}
$elements = array(
    'counter',
    'coverbox',
    'dropcap',
    'fancybox',
    'interactivebanner',
    'fullbox',
    'gallery',
    'googlemapv3',
    'columns',
    'greyscale',
    'highlight',
    'icon',
    'piechart',
    'piechartv2',
    'postcarousel',
    'recentpost',
    'progressbar',
    'process',
    'video',
    'twitter',
    'logo',
    'menu',
    'custombtn',
    'btnplay',
    'videohtml5',
    'social',
    'lists',
    'slidershows',
    'rating',
    'magazine_posts',
	'cartsearch'
);
/**
 * Base
 */
add_action('init', 'add_shortcode_gallery');

function add_shortcode_gallery()
{
    remove_shortcode('gallery');
    include 'base/gallery.php';
}
/**
 * Elements
 */
foreach ($elements as $element) {
    include ($element . '/' . $element . '.php');
}

/**
 * Woocommerce
 */
add_action('init', 'add_shortcode_woocommerce');

function add_shortcode_woocommerce()
{
    if (class_exists('Woocommerce')) {
        $wooshops = array(
            'shopcarousel',
            'woocategories'
        );
        foreach ($wooshops as $wooshop) {
            include ($wooshop . '/' . $wooshop . '.php');
        }
    }
}
/**
 * Booking Table
 */
add_action('init', 'add_shortcode_bookingtable');

function add_shortcode_bookingtable()
{
    if (class_exists('rtbInit')) {
        include_once 'bookingtable/bookingtable.php';
    }
}
/**
 * replace rel on stylesheet (Fix validator link style tag attribute)
 */
function menu_shortcode_change_rel($src) {
    if(strstr($src,'framework/shortcodes/')||strstr($src,'cms_templates') || strstr($src,'js_composer/assets/') || strstr($src,'vc_google_fonts')){
        return str_replace('rel', 'property="stylesheet" rel', $src);
    }
    else{
        return $src;
    }
}
add_filter('style_loader_tag', 'menu_shortcode_change_rel');

/* Button Type. This is for shortcode Button */
$button_type = array(
    __('Button Default', CSCORE_NAME) => 'btn btn-default',
    __('Button Default Alt', CSCORE_NAME) => 'btn btn-default-alt',
    __('Button Default White', CSCORE_NAME) => 'btn btn-white',
    __('Button Border Default', CSCORE_NAME) => 'btn btn-border',
    __('Button Border Primary', CSCORE_NAME) => 'btn btn-border btn-border-primary',
    __('Button Border White', CSCORE_NAME) => 'btn btn-border-white',
    __('Button Primary', CSCORE_NAME) => 'btn btn-primary',
    __('Button Primary Alt', CSCORE_NAME) => 'btn btn-primary-alt',
    __('Button Primary Alt White', CSCORE_NAME) => 'btn btn-primary-alt btn-white',
    __('Button Warning', CSCORE_NAME) => 'btn btn-warning',
    __('Button Danger', CSCORE_NAME) => 'btn btn-danger',
    __('Button Success', CSCORE_NAME) => 'btn btn-success',
    __('Button Info', CSCORE_NAME) => 'btn btn-info',
    __('Button Inverse', CSCORE_NAME) => 'btn btn-inverse',
    __('Not Button', CSCORE_NAME) => 'not-btn' 
);

$button_size = array(
        __('Default', CSCORE_NAME) => 'btn btn-default',
        __('Large', CSCORE_NAME) => 'btn-lg btn-large',
        __('Medium', CSCORE_NAME) => 'btn-md btn-medium',
        __('Small', CSCORE_NAME) => 'btn-sm btn-small',
        __('Mini', CSCORE_NAME) => "btn-xs btn-mini",
        __('Not Button', CSCORE_NAME) => 'not-btn' 
    );

/* Shortcode Button Type */
$shortcode_button_type = array(
    __('Button Default', CSCORE_NAME) => 'btn btn-default',
    __( "Icon" ) => 'icon',
    __( "Icon box" ) => 'icon icon-box',
    __( "Icon Square White" ) => 'icon icon-square icon-square-white',
    __( "Icon Square Black" ) => 'icon icon-square icon-square-black',
    __( "Icon Circle White" ) => 'icon icon-circle icon-circle-white',
    __( "Icon Circle Black" ) => 'icon icon-circle icon-circle-black',
    __('Button Default Alt', CSCORE_NAME) => 'btn btn-default-alt',
    __('Button Default White', CSCORE_NAME) => 'btn btn-white',
    __('Button Border Default', CSCORE_NAME) => 'btn btn-border',
    __('Button Border Primary', CSCORE_NAME) => 'btn btn-border btn-border-primary',
    __('Button Border White', CSCORE_NAME) => 'btn btn-border-white',
    __('Button Primary', CSCORE_NAME) => 'btn btn-primary',
    __('Button Primary Alt', CSCORE_NAME) => 'btn btn-primary-alt',
    __('Button Primary Alt White', CSCORE_NAME) => 'btn btn-primary-alt btn-white',
    __('Button Warning', CSCORE_NAME) => 'btn btn-warning',
    __('Button Danger', CSCORE_NAME) => 'btn btn-danger',
    __('Button Success', CSCORE_NAME) => 'btn btn-success',
    __('Button Info', CSCORE_NAME) => 'btn btn-info',
    __('Button Inverse', CSCORE_NAME) => 'btn btn-inverse' 
);
/* Shortcode Border Style */
$sc_border_style = array('none'=>'None','solid'=>'Solid','dotted'=>'Dotted','dashed'=>'Dashed','double'=>'Double','groove'=>'Groove','inset'=>'Inset','outset'=>'Outset','ridge'=>'Ridge');
/* Short code Font Format */
$font_format = array (
    __("Normal 400", CSCORE_NAME) => '400',
    __("Thin 100", CSCORE_NAME) => '100',
    __("Light 200", CSCORE_NAME) => '200',
    __("Book 300", CSCORE_NAME) => '300',
    __("Semi-Bold 600", CSCORE_NAME) => '600',
    __("Bold 700", CSCORE_NAME) => '700',
    __("Extra-Bold 800", CSCORE_NAME) => '800',
    __("Normal 400 Italic", CSCORE_NAME) => '400italic',
    __("Thin 100 Italic", CSCORE_NAME) => '100italic',
    __("Light 200 Italic", CSCORE_NAME) => '200italic',
    __("Book 300 Italic", CSCORE_NAME) => '300italic',
    __("Normal 400 Italic", CSCORE_NAME) => '400italic',
    __("Simi-Bold 600 Italic", CSCORE_NAME) => '600italic',
    __("Bold 700 Italic", CSCORE_NAME) => '700italic',
    __("Extra-Bold 800 Italic",CSCORE_NAME) => '800italic'
);
/* Shortcode Date Format */
$shortcode_date_format = array (
    __("Dec 05 2014", CSCORE_NAME) => 'M d Y',
    __("05 December 2014", CSCORE_NAME) => 'd F Y',
    __("December 13th 2014", CSCORE_NAME) => 'F jS Y',
    __("13th December 2014", CSCORE_NAME) => 'jS F Y',
    __("05 Dec 2014", CSCORE_NAME) => 'd M Y',
    __("05 December 2014 15:15:15 AM", CSCORE_NAME) => 'd F Y H:i:s A',
    __("05 December 2014 15:15:15 am", CSCORE_NAME) => 'd F Y H:i:s a',
    __("05 Dec 2014 15:15:15 AM", CSCORE_NAME) => 'd M Y H:i:s A',
    __("05 Dec 2014 15:15:15 am", CSCORE_NAME) => 'd M Y H:i:s a',
    __("5 mins ago",CSCORE_NAME) => 'time'
);

/* Overlay Appear Style */
$overlay_appear_style = array(
    "Default" => "",
    "From Top" => "from-top",
    "From Right" => "from-right",
    "From Bottom" => "from-bottom",
    "From Left" => "from-left",
    "From center" => "from-center",
);
/* Navigation type for BX SLider*/
$bxslider_nav_type = array(
    __('Default', CSCORE_NAME) => "default",
    __('Icon', CSCORE_NAME)  => 'icon',
    __('Icon Square Black', CSCORE_NAME) => "square_black",
    __('Icon Square White', CSCORE_NAME) => "square_white",
    __('Icon Square gray', CSCORE_NAME) => "square_gray",
    __('Icon Square Border', CSCORE_NAME) => "square_border",
    __('Icon Rounded Black', CSCORE_NAME) => "rounded_black",
    __('Icon Rounded White', CSCORE_NAME) => "rounded_white",
    __('Icon Circle Black', CSCORE_NAME) => "circle_black",
    __('Icon Circle Black Small', CSCORE_NAME) => "circle_black small",
    __('Icon Circle White', CSCORE_NAME) => "circle_white",
    __('Icon Circle White Small', CSCORE_NAME) => "circle_white small"
);
/* Pager type for BX SLider*/
$bxslider_pager_type = array(
    __('Bullet', CSCORE_NAME) => "default",
    __('Bullet White', CSCORE_NAME)  => 'bullet white',
    __('Bullet Border', CSCORE_NAME)  => 'bullet-o',
    __('Bullet Border White', CSCORE_NAME) => "bullet-o white",
    __('Square', CSCORE_NAME) => "square",
    __('Square White', CSCORE_NAME) => "square white",
    __('Square Border White', CSCORE_NAME) => "square bullet-o white",
    __('Number', CSCORE_NAME) => "number",
);