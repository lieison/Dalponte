<div class="main-menu-content cshero-menu-dropdown clearfix nav-menu cshero-mobile">
	<?php
		$menus = wp_get_nav_menus();
		 if ($nav_menu){
            echo '<ul class="cshero-dropdown main-menu left">';
                if(($smof_data['header_content_widgets'] && get_post_meta(get_the_ID(),'cs_header_content_widgets',true)=='' ) || get_post_meta(get_the_ID(),'cs_header_content_widgets',true)=='1'){
                    if(is_active_sidebar('cshero-header-content-widget-1') && get_post_meta(get_the_ID(),'cs_header_content_widgets1',true)){
                        ?>
                        <li class="cshero-header-content-widget cshero-header-content-widget1 <?php echo esc_attr($widget_position);?>">
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Content Widget 1")): endif;?>
                        </li>
                        <?php
                    }
                }
                ?>
                <!-- <li class="cshero-header-content-widget cshero-hidden-sidebar">
                    <a class="btn-navbar" data-toggle="collapse" data-target="#cshero-main-menu-mobile" href="" ><i class="fa fa-bars"></i></a>
                </li> -->
                <?php 
                if(isset($smof_data['enable_hidden_sidebar']) && $smof_data['enable_hidden_sidebar']){
                    ?>
                    <li class="cshero-header-content-widget cshero-hidden-sidebar">
                        <a href="#"><i class="fa fa-navicon cs_open"></i></a>
                    </li>
                    <?php
                }

            echo '</ul>';

            if(($smof_data['header_content_widgets'] && get_post_meta(get_the_ID(),'cs_header_content_widgets',true)=='' ) || get_post_meta(get_the_ID(),'cs_header_content_widgets',true)=='1'){
                echo '<ul class="cshero-dropdown main-menu right">';
                if(is_active_sidebar('cshero-header-content-widget-2')&& get_post_meta(get_the_ID(),'cs_header_content_widgets2',true)){
                    ?>
                    <li class="cshero-header-content-widget cshero-header-content-widget2 <?php echo esc_attr($widget_position);?>">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Content Widget 2")): endif;?>
                    </li>
                    <?php
                }
                echo '</ul>';
            }
            $menu_position =  get_post_meta(get_the_ID(), 'cs_menu_position', true);
            if($menu_position != ''){ $smof_data['menu_position'] = $menu_position; }
		    echo '<ul class="cshero-dropdown main-menu '.$smof_data['menu_position'].'">';
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