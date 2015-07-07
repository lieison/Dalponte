<?php

function cshero_btnplay($params, $content = null) {
    extract(shortcode_atts(array(
        'icon' => 'fa fa-play',
        'style' => 'circle',
        'el_class' => '',		
        'text' => '',		
    ), $params));
	$class = "exp-videobg-control-btn";
	$class .= " control-btn-".$style;
	if($el_class) $class .= ' '.$el_class;
	ob_start();
    ?>
		<div class="<?php echo $class;?>">
			<?php if($text):?>
			<div class="exp-fonts-giant"><?php echo $text;?></div>
			<?php endif;?>
			<i class="<?php echo $icon;?>"></i>
		</div>
	<?php
    return ob_get_clean();
}

add_shortcode('playbtn', 'cshero_btnplay');
