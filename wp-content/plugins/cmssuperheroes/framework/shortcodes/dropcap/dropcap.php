<?php
add_shortcode('cs-dropcap', 'cs_dropcap_render');
function cs_dropcap_render($params, $content = '') {
	extract(shortcode_atts(array(
	'text'  => '',
	'icon'  => '',
	'color_first_text'=>'',
	'background_buttom'=>'',
	'content_color'=>'',
	'border_radius'=>'',
	'border_color'=>'',
    'layout' =>''
			), $params));
	$styles = array();
	if($color_first_text){
		$styles[] = "color: $color_first_text;";
	}
	if($background_buttom){
		$styles[] = "background: $background_buttom;";
	}
	if($border_color){
		$styles[] = "border-color: $border_color;";
	}

	$date = time() . '_' . uniqid(true);

	$styles = cshero_build_style($styles);
	$output = "<div>";
	$output .='<style type="text/css" scoped>
        		#cs-dropcap-'.$date.' {
        			color: '.$content_color.';
        		}
        	    #cs-dropcap-'.$date.' .cs-dropcap-firstText::first-letter {
        		    color: '.$color_first_text.' !important;
        		    background: '.$background_buttom.';
        		    border-color: '.$border_color.';
        		    border-radius: '.$border_radius.';
        		}
        		#cs-dropcap-'.$date.' .cs-icon i {
					border-radius: '.$border_radius.';
        		}
        	   </style>';
    $file_layout= "cms_templates/dropcap/layouts/$layout.php";
    $file_css   = "cms_templates/dropcap/css/$layout.css";
    if(locate_template($file_layout)){
        if(locate_template($file_css))
            wp_enqueue_style("dropcap-$layout",get_template_directory_uri()."/".$file_css);    
        require locate_template($file_layout);
    }else{
        wp_enqueue_style("dropcap-$layout", CSCORE_PLUGIN_URL . "framework/shortcodes/dropcap/css/$layout.css");
        require  "layouts/$layout.php";
    }
    $output .="</div>";
	return $output;
}
