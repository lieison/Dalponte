<?php

/*
Plugin Name: Lieisoft CountDown
Plugin URI: http://soft.lieison.com/plugins/
Description: Plugin woocommerce
Version: 0.2
Author: Lieison Company 2015
Author URI: http://lieison.com/
License: EULA
*/

defined("LS_NAME_COUNTDOWN") or define("LS_NAME_COUNTDOWN", "LieisoftCountDown");
defined("T_NAME") or define("T_NAME", "Lieisoft ");
defined("T_SLUG") or define("T_SLUG", "ls-menu");
defined("T_ICON") or define("T_ICON",   
        get_site_url() . "/wp-content/plugins/" 
        . LS_NAME_COUNTDOWN . "/img/kiwi.png");
defined("LS_PLUGIN_DIR_COUNT") or define("LS_PLUGIN_DIR_COUNT", 
        plugins_url("/" . LS_NAME_COUNTDOWN .  "/"));


if(!function_exists("menu"))
{
    
    function menu(){
        
          add_menu_page(
             T_NAME, 
             T_NAME,
             "manage_options", 
             T_SLUG, 
             "ls_options",
             T_ICON
        );
          
        add_submenu_page(T_SLUG, 
                "Count Down", 
                "Count Down", 
                "manage_options", 
                "ls-count-options", 
                "ls_count_down");   
        
    }

}

if(!function_exists("ls_count_down")){
    function ls_count_down()
    {
      /*  wp_register_script("count", 
                LS_PLUGIN_DIR_COUNT
                . "plugins/countdown/jquery.countdown.js" );*/
        
        wp_register_script("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" );
        
        
           
        
       wp_register_script("pdatepicker", 
                LS_PLUGIN_DIR_COUNT . "plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" );


        
        wp_enqueue_script("jquery");
        wp_enqueue_script("bootstrap");
        wp_enqueue_script("pdatepicker");

          
        wp_register_style("bt1","//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" );
        wp_register_style("bt2","//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" );
       
        
        wp_enqueue_style("bt1");
        wp_enqueue_style("bt2");
        
        include 'plus/Class.Paginacion.php';
        include 'plus/Class.BasePaginacion.php';
        include 'wc_countdown.php';
    }
}




class LieisoftCountDown {
    

    public function __construct() {
        
            
    }
    
    
    public function _config(){

        add_action("admin_menu", "menu");

    }

}

$c = new LieisoftCountDown();
$c->_config();
$GLOBALS['count_down'] = $c;


