<?php
function cshero_icon($params, $content = null) {
    extract(shortcode_atts(array(
        'type' => '',
        'tag' => 'div',
        'background'=>'',
        'link' => '',
        'class' => '',
        'style' => '',
        'fontsize'=>'',
        'icon'=>'',
        'iconsize'=>'',
        'color' => ''
    ), $params));

    if($background!=''){
        $background='background:'.$background.';';
    }
    if($color!=''){
        $color='color:'.$color.';';
    }
    if($fontsize!=''){
        $fontsize=' font-size:'.$fontsize.';';
    }
    if($iconsize!=''){
        $iconsize=' font-size:'.$iconsize.';';
    }
    if($content){
    	$content = '<span class="cs_content" style="padding-left:10px;'.esc_attr($color).esc_attr($fontsize).'"> '.esc_attr($content).'</span>';
    }
    ob_start();
    ?>
    <?php if($link): ?>
        <<?php echo $tag;?> class="cshero-icon-item">
    	<a class="cs_icons" target="_blank" href="<?php echo esc_url($link); ?>">
    		<i class=" <?php echo esc_attr($type). ' ' . esc_attr($icon) . ' ' . esc_attr($class);?>" style="<?php echo esc_attr($style).esc_attr($color).esc_attr($iconsize).esc_attr($background);?>"></i>  <?php echo $content; ?>
    	</a>
        </<?php echo $tag;?>>
    <?php else : ?>
        <<?php echo $tag;?> class="cshero-icon-item">
		<i class="cs_icons <?php echo esc_attr($type). ' ' . esc_attr($icon) . ' ' . esc_attr($class);?>" style="<?php echo esc_attr($style).esc_attr($color).esc_attr($iconsize);?>"></i>  <?php echo $content; ?></<?php echo $tag;?>>
    <?php endif; ?>
    <?php
    return ob_get_clean();
}

add_shortcode('icon', 'cshero_icon');