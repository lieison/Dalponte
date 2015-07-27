<?php

/*
Plugin Name: Lieisoft CountDown
Plugin URI: http://lieisoft.com/plugins/Countdown/
Description: Great Countdown PLugin by Lieisoft
Version: 0.2
Author: Lieisoft Company 2015
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
                "ls-count", 
                "ls_count_down"
          );   
        
         add_submenu_page(T_SLUG, 
                "Options Count Down", 
                "Options Count Down", 
                "manage_options", 
                "ls-count-options", 
                "ls_count_down_options"
          );  
        
    }

}

if(!function_exists("ls_count_down")){
    function ls_count_down()
    {

        wp_register_script("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" );
        

       wp_register_script("pdatepicker", 
                LS_PLUGIN_DIR_COUNT . "plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" );

       
        wp_register_script("task", 
                LS_PLUGIN_DIR_COUNT . "plugins/task.js" );
        
        wp_enqueue_script("jquery");
        wp_enqueue_script("task");
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


if(!function_exists("ls_count_down_options")){
    
    function ls_count_down_options(){
        
     
        
        wp_register_script("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" );
        
        
        wp_enqueue_script("jquery");
        wp_enqueue_script("bootstrap");
        
             
        wp_register_style("bt1","//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" );
        wp_register_style("bt2","//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" );
       
        
        wp_enqueue_style("bt1");
        wp_enqueue_style("bt2");
     
        include "ls_options.php";
    
    }
}



if(!function_exists("ls_endtime_product")){
    
    
    function ls_endtime_product($attr ){
        
       $data = shortcode_atts(array(
           "id" => NULL
       ), $attr);

       $product = new LieisoftCountDown();
       $product->get_product_countdown($data['id']);
    }
    
}





class LieisoftCountDown {
    

    public function __construct() {
        
       
            
    }
    
    public function _config(){
        
        
        if(get_option("ls_stock_") == NULL)
        {
            add_option("ls_stock_", "In stock");
        }
        
        if(get_option("ls_outstock_") == NULL)
        {
            add_option("ls_outstock_", "Out Of Stock");
        }
        
        if(get_option("ls_campain_") == NULL)
        {
            add_option("ls_campain_", "End Campain");
        }
        

        add_action("admin_menu", "menu");

    }
    
    public function get_product_countdown($id)
    {
        
        
       wp_register_script("pdatepicker", 
                LS_PLUGIN_DIR_COUNT . 
               "plugins/countdown/jquery.countdown.js" );
        
       wp_enqueue_script("jquery");
       wp_enqueue_script("pdatepicker");

        
        include 'end_time.php';
    }

}




add_shortcode("ls_endtime", 'ls_endtime_product');



$c = new LieisoftCountDown();
$c->_config();
$GLOBALS['count_down'] = $c;


