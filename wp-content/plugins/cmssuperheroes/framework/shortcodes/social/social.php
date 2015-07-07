<?php
add_shortcode('cs-social', 'cs_social_render');

function cs_social_render($atts, $content = null) {
        global $post, $wp_query,$layout;
        extract(shortcode_atts(array(
                    'title' => '',
                    'heading_size' => '',
                    'title_color' => '',
                    'title_align' => '',
                    'heading_style' => 'linethought',
                    'description' => '',
                    'layout' => 'social.layout1',
                    'el_class' => '',
                    'icon_size'=>'',
                    'icon_color'=>'',
                    'icon_hover_color'=>'',
                    'icon_height'=>'',
                    'icon_width'=>'',
                    'border_color'=>'',
                    'border_hover_color'=>'',
                    'border_width'=>'',
                    'border_style'=>'',
                    'border_radius'=>'',
                    'icon_bg_color'=>'',
                    'icon_bg_hover_color'=>'',
                    'social_item_margin'=>'',
                    'icon1'=>'',
                    'icon1_link'=>'',
                    'icon2'=>'',
                    'icon2_link'=>'',
                    'icon3'=>'',
                    'icon3_link'=>'',
                    'icon4'=>'',
                    'icon4_link'=>'',
                    'icon5'=>'',
                    'icon5_link'=>'',
                    'icon6'=>'',
                    'icon6_link'=>'',
                    'icon7'=>'',
                    'icon7_link'=>'',
                    'icon8'=>'',
                    'icon8_link'=>'',
                    'icon9'=>'',
                    'icon9_link'=>'',
                    'icon10'=>'',
                    'icon10_link'=>'',
                    'icon11'=>'',
                    'icon11_link'=>'',
                    'icon12'=>'',
                    'icon12_link'=>'',
                    'icon13'=>'',
                    'icon13_link'=>'',
                        ), $atts));

        $date = time() . '_' . uniqid(true);

        wp_enqueue_style('cs-social', CSCORE_PLUGIN_URL.'framework/shortcodes/social/css/social.css', array(), '1.0.0');

        // make style for icon
        $style = array();
        $style[] = ($icon_size) ? "font-size: $icon_size;" : '';
        $style[] = ($icon_color) ? "color: $icon_color;" : '';
        $style[] = ($icon_bg_color) ? "background-color: $icon_bg_color;" : '';
        $style[] = ($icon_width) ? "width: $icon_width;" : '';
        $style[] = ($icon_height) ? "height: $icon_height;" : '';
        $style[] = ($icon_height) ? "line-height: $icon_height;" : '';
        $style[] = ($border_style) ? "border-style: $border_style;" : '';
        $style[] = ($border_width) ? "border-width: $border_width;" : '';
        $style[] = ($border_color) ? "border-color: $border_color;" : '';
        $style[] = ($social_item_margin) ? "margin: $social_item_margin;" : '';
        if ( $border_radius ) {
            $style[] = "border-radius: $border_radius; 
                        -webkit-border-radius: $border_radius;
                        -moz-border-radius: $border_radius;
                        -ms-border-radius: $border_radius;
                        -o-border-radius: $border_radius;";
        }
        $style = cshero_build_style( $style );

        ob_start();
        ?>
        <div  id="cs_social<?php echo esc_attr($date); ?>" class="cshero-social cs-<?php echo str_replace('.','-',$layout);?> <?php echo esc_attr($el_class); ?>">
            <style type="text/css" scoped>
               .cshero_content_<?php echo $date;?>.cshero-social-list a:hover i {
                    background-color: <?php echo esc_attr($icon_bg_hover_color);?> !important;
                    border-color: <?php echo esc_attr($border_hover_color);?> !important;
                    color: <?php echo esc_attr($icon_hover_color);?> !important;
                    white-space: inherit;
               }
            </style>
            <?php 
                $file_layout= "cms_templates/social/layouts/$layout.php";
                $file_css   = "cms_templates/social/css/$layout.css";
                if(locate_template($file_layout)){
                    if(locate_template($file_css))
                        wp_enqueue_style(''.str_replace('.','-',$layout).'',get_template_directory_uri()."/".$file_css);
                    require locate_template($file_layout);
                }else{
                        wp_enqueue_style(''.str_replace('.','-',$layout).'', CSCORE_PLUGIN_URL . "framework/shortcodes/social/css/$layout.css");
                        require  "layouts/$layout.php";
                    }
            ?>
               
        </div>
        <?php
        return ob_get_clean();
    }
?>