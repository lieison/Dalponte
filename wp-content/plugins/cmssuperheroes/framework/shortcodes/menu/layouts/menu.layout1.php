<div class="cshero-header-content-widget cshero-menu-mobile hidden-lg right">                            
    <div class="cshero-header-content-widget-inner">                                
        <a class="btn-navbar" data-toggle="collapse" data-target="#cshero-main-menu-mobile" href="" ><i class="fa fa-bars"></i></a>
    </div>                        
</div>                        
<?php if($smof_data['enable_hidden_sidebar'] =='1'){ ?>
<div class="cshero-header-content-widget cshero-hidden-sidebar right">                               
    <div class="cshero-hidden-sidebar-btn">                                    
        <a href="#"><i class="fa fa-sign-out cs_open"></i></a>                                
    </div>
</div>                        
<?php } ?>                        
<?php if($smof_data['header_content_widgets'] =='1' && $smof_data['header_content_widgets1'] =='1' && is_active_sidebar('cshero-header-content-widget-1')){ ?>                            
<div class="cshero-header-content-widget cshero-header-content-widget1 right">                                
    <div class="cshero-header-content-widget-inner">                                    
        <?php   if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Content Widget 1")): endif;?>                                
    </div>                            
</div>                        
<?php } ?>                         
<?php if($smof_data['header_content_widgets'] =='1' && $smof_data['header_content_widgets2'] =='1' && is_active_sidebar('cshero-header-content-widget-2')){ ?>                            
<div class="cshero-header-content-widget cshero-header-content-widget-2 right">                                
    <div class="cshero-header-content-widget-inner">                                    
    <?php   if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Content Widget 2")): endif;?>                                
    </div>                            
</div>                        
<?php } ?> 
<div class="cs_mega_menu main-menu-content cshero-menu-dropdown <?php echo esc_attr($smof_data["menu_position"]); ?>">
	<?php
		$menus = wp_get_nav_menus();
		if ($nav_menu){            
            echo '<ul class="cshero-dropdown main-menu">';
            wp_nav_menu(array('theme_location' => 'main_navigation','menu'=>$nav_menu, 'depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s', 'walker'=>new HeroMenuWalker()));
            echo '</ul>';
		} elseif (empty($menus)) {
		     echo '<div class="menu-pages">';
			 wp_nav_menu(array('depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s'));
			 echo '</div>';
		} else {
		     echo '<ul class="cshero-dropdown main-menu">';
		     wp_nav_menu(array('depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s', 'walker'=>new HeroMenuWalker()));
            echo '</ul>';
		}
		?>
</div>