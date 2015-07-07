<?php
/**
 * @package Hero Core.
 */
/*
 * Plugin Name: CmsSuperHeroes
 * Plugin URI: http://www.joomlaman.com
 * Description: Core function for CmsSuperHeroes Theme...
 * Version: 1.0.1
 * Author: CmsSuperHeroes
 * Author URI: http://www.joomlaman.com
 * License: GPLv2 or later
 * Text Domain: cmssuperheroes
 */
define('CSCORE_NAME', 'cmssuperheroes');
define('CSCORE_VERSION', '1.0.0');
define('CSCORE_MINIMUM_WP_VERSION', '3.9');
define('CSCORE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('CSCORE_PLUGIN_DIR', plugin_dir_path(__FILE__));

load_plugin_textdomain(CSCORE_NAME, false, CSCORE_PLUGIN_DIR.'languages');

add_action('wp_enqueue_scripts', 'cscore_register_style');
add_action('wp_enqueue_scripts', 'cscore_register_script');

if (! class_exists('CsCoreControl')) {
    require_once 'core/core.options.php';
}
require_once 'admin/index.php';

require_once 'framework/posttypes.php';
require_once 'framework/metaboxes.php';
require_once 'framework/taxonomys.php';
require_once 'framework/wpml.class.php';
require_once 'framework/base.class.php';
if (! function_exists('mr_image_resize')) {
    require_once 'libs/mr-image-resize.php';
}
require_once 'framework/shortcodes/shortcodes.php';

/**
 * Vc extra Fields
 */
add_action('init', 'cscore_add_vc_extra_fields');
add_action('init', 'cscore_add_vc_extra_shortcodes');
add_action('init', 'cscore_add_vc_extra_param');
function cscore_add_vc_extra_param(){
    if(class_exists('Vc_Manager') && !function_exists('cshero_vc_extra_param')){
        require 'framework/vc_extra/vc_extra_params.php';
       cshero_vc_extra_param();
    }
}
if (get_option('cms_superheroes_megamenu', true)) {
    require_once 'framework/megamenu/mega-menu.php';
}
require_once 'framework/plugins/plugins.php';

function ap_action_init()
{
    // Localization
    load_plugin_textdomain(CSCORE_NAME, false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
// Add actions
add_action('plugins_loaded', 'ap_action_init');

function cscore_add_vc_extra_fields()
{
    if (function_exists("add_shortcode_param")) {
        require_once 'framework/vc_extra/vc_extra_fields.php';
    }
}

function cscore_add_vc_extra_shortcodes()
{
    if (function_exists('vc_map')) {
        require_once 'framework/vc_extra/vc_extra_shorcodes.php';
    }
}

function cscore_register_style()
{
    wp_register_style("jquery-datetimepicker", CSCORE_PLUGIN_URL . "assets/css/jquery.datetimepicker.css", array(), "2.3.1", 'all');
    wp_register_style('colorbox', CSCORE_PLUGIN_URL . 'assets/css/colorbox.css', array(), '1.5.14');
    wp_register_style('gallery', CSCORE_PLUGIN_URL . "assets/css/gallery.css", array(), "2.1.8");
}

function cscore_register_script()
{
    wp_register_script('jquery-isotope', CSCORE_PLUGIN_URL . "assets/js/jquery.isotope.min.js", array(), "2.0.0");
    wp_register_script('waypoints', CSCORE_PLUGIN_URL . "assets/js/waypoints.min.js");
    wp_register_script('jquery-datetimepicker', CSCORE_PLUGIN_URL . "assets/js/jquery.datetimepicker.js", array(), "2.3.1");
    wp_register_script('masonry-pkgd', CSCORE_PLUGIN_URL . 'assets/js/masonry.pkgd.min.js', array(), '3.1.5');
    wp_register_script('colorbox', CSCORE_PLUGIN_URL . 'assets/js/jquery.colorbox.min.js', array(), '1.5.14');
    wp_register_script('bxslider', CSCORE_PLUGIN_URL . 'assets/js/jquery.bxslider.js', 'jquery', '1.0', TRUE);
    wp_register_script('jquery-imagesloaded', CSCORE_PLUGIN_URL . "assets/js/jquery.imagesloaded.js", array(), "2.1.0");
    wp_register_script('animate-elements', CSCORE_PLUGIN_URL . 'assets/js/animate-elements.js', 'jquery', '1.0', TRUE);
    wp_register_script('jm-direction', CSCORE_PLUGIN_URL . 'assets/js/jquery.jm-direction.js', array(), '1.0');
    wp_register_script('jm-bxslider', CSCORE_PLUGIN_URL . 'assets/js/jquery.jm-bxslider.js', 'jquery', '1.0', TRUE);
}

function cscore_get_files_name_array($plugin)
{
    $plugin_name = plugin_dir_path(__FILE__) . "framework/shortcodes/" . $plugin . "/layouts/";
    $layout_name = get_template_directory() . "/cms_templates/" . $plugin . "/layouts/";
    $file_plugin = glob($plugin_name . "*.php");
    $file_layout = glob($layout_name . "*.php");
    if ($file_plugin != false) {
        foreach ($file_plugin as $key => $value)
            $file_array_plugin[str_replace($plugin . ".", "", str_replace(".php", "", basename($value)))] = str_replace(".php", "", basename($value));
    } else
        return false;
    if ($file_layout != false) {
        foreach ($file_layout as $key => $value)
            $file_array_layout[str_replace($plugin . ".", "", str_replace(".php", "", basename($value)))] = str_replace(".php", "", basename($value));
    } else
        return $file_array_plugin;
    if ($file_plugin == false and $file_layout == false)
        return false;
    return array_unique(array_merge($file_array_layout, $file_array_plugin));
}
/**
 * Dissmiss Plugin
 */
if(!function_exists('cscore_plugins_support')){
    function cscore_plugins_support($params = array(), $support = '0') {
        foreach ($params as $param){
            update_option($param, $support);
        }
    }
}
/**
 * Build Style
 */
if(!function_exists('cshero_build_style')){
    function cshero_build_style($arr = array()){
        $return = '';
        if(count($arr) > 0){
            $return = 'style="';
            $return .= implode(' ', $arr);
            $return .= '"';
        }
        return $return;
    }
}
/* Return object category items */
if(!function_exists('get_post_types_with_cats')){
    function get_post_types_with_cats(){
        $arrPostTypes = $this->get_post_types_with_taxomonies();
    
        $arrPostTypesOutput = array();
        foreach($arrPostTypes as $name=>$arrTax){
    
            $arrTaxOutput = array();
            foreach($arrTax as $taxName=>$taxTitle){
                $cats = $this->get_categories_assoc($taxName);
                if(!empty($cats))
                    $arrTaxOutput[] = array(
                        "name"=>$taxName,
                        "title"=>$taxTitle,
                        "cats"=>$cats);
            }
    
            $arrPostTypesOutput[$name] = $arrTaxOutput;
    
        }
    
        return($arrPostTypesOutput);
    }
}
if(!function_exists('get_post_types_with_taxomonies')){
    function get_post_types_with_taxomonies(){
        $arrPostTypes = $this->get_post_types_assoc();
    
        foreach($arrPostTypes as $postType=>$title){
            $arrTaxomonies = $this->get_taxomonies_by_post_type($postType);
            $arrPostTypes[$postType] = $arrTaxomonies;
        }
    
        return($arrPostTypes);
    }
}
if(!function_exists('get_post_types_assoc')){
    function get_post_types_assoc($arrPutToTop = array()){
        $arrBuiltIn = array("post"=>"post", "page"=>"page");
    
        $arrCustomTypes = get_post_types(array('_builtin' => false));
    
        //top items validation - add only items that in the customtypes list
        $arrPutToTopUpdated = array();
        foreach($arrPutToTop as $topItem){
            if(in_array($topItem, $arrCustomTypes) == true){
                $arrPutToTopUpdated[$topItem] = $topItem;
                unset($arrCustomTypes[$topItem]);
            }
        }
    
        $arrPostTypes = array_merge($arrPutToTopUpdated,$arrBuiltIn,$arrCustomTypes);
    
        //update label
        foreach($arrPostTypes as $key=>$type){
            $objType = get_post_type_object($type);
    
            if(empty($objType)){
                $arrPostTypes[$key] = $type;
                continue;
            }
    
            $arrPostTypes[$key] = $objType->labels->singular_name;
        }
    
        return($arrPostTypes);
    }
}
/* get taxomonies by post type */
if(!function_exists('get_taxomonies_by_post_type')){
    function get_taxomonies_by_post_type($postType){
        $arrTaxonomies = get_object_taxonomies(array('post_type' => $postType), 'objects');
    
        $arrNames = array();
        foreach($arrTaxonomies as $key=>$objTax){
            $arrNames[$objTax->name] = $objTax->labels->name;
        }
    
        return($arrNames);
    }
}
/* get post categories list assoc - id / title */
if(!function_exists('get_categories_assoc')){
    function get_categories_assoc($taxonomy = "category"){
    
        if(strpos($taxonomy,",") !== false){
            $arrTax = explode(",", $taxonomy);
            $arrCats = array();
            foreach($arrTax as $tax){
                $cats = $this->get_categories_assoc($tax);
                $arrCats = array_merge($arrCats,$cats);
            }
    
            return($arrCats);
        }
    
        //$cats = get_terms("category");
        $args = array("taxonomy"=>$taxonomy);
    
        //Essential_Grid_Wpml::disable_language_filtering();
    
        $cats = get_categories($args);
    
        //Essential_Grid_Wpml::enable_language_filtering();
    
        $arrCats = array();
        foreach($cats as $cat){
            $numItems = $cat->count;
            $itemsName = "items";
            if($numItems == 1)
                $itemsName = "item";
    
            $title = $cat->name . " ($numItems $itemsName)";
    
            $id = $cat->cat_ID;
    
            $arrCats[$id] = $title;
        }
        return($arrCats);
    }
}