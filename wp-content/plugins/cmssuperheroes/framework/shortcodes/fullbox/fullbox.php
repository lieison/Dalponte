<?php
add_shortcode('cs-full-box', 'cs_full_box_render');

function cs_full_box_render($atts, $content = null) {
	extract(shortcode_atts(array(
	'style' => 'lily',
	'animate' => '',
	'heading_size' => 'h2',
	'crop_image' => false,
	'width_image'=>'300',
	'height_image'=>'200',
	'image' => '',
	'title' => '',
	'title_color'=>'',
	'link' => '#',
	'width' => '',
	'height' => '',
	'content_color'=>'',
	'content_bg_color'=>'',
	'content_limit'=>'',
	'read_more' => '',
	'custom_class' => ''
			), $atts));
	ob_start();
	$class_rand = uniqid(true);
	$styles = array();
	if($title_color){
		$styles[] = 'color:'.$title_color.';';
	}
	$styles = cshero_build_style($styles);

	$styles_content = array();
	if($content_color){
		$styles_content[] = 'color:'.$content_color.';';
	}
	$styles_content = cshero_build_style($styles_content);

	wp_enqueue_style('full-box-component', CSCORE_PLUGIN_URL . "framework/shortcodes/fullbox/component.css",array(),"1.0.0");

	$image_url = array();
	if (!empty($image)) {
		$image_url = wp_get_attachment_image_src($image, 'full');
	}
    if($crop_image == true && $image_url[0]){
    	$image_resize = mr_image_resize( $image_url[0], $width_image, $height_image, true, 'c', false );
    	$image_url[0] = $image_resize;
    }
	?>
	<s<?php echo "tyle" ?>>
		#cs-coverboxs-<?php echo $class_rand;?> figure.effect-sadie figcaption::before {
			background: -webkit-linear-gradient(top, <?php echo HexToRGB($content_bg_color,0); ?> 0%, <?php echo HexToRGB($content_bg_color,0.8) ?> 85%);
			background: linear-gradient(to bottom, <?php echo HexToRGB($content_bg_color,0) ?> 0%, <?php  echo HexToRGB($content_bg_color,0.8) ?> 85%);
		}
	</s<?php echo "tyle" ?>>
	<div id="cs-coverboxs-<?php echo $class_rand;?>" class="cshero-coverBoxs-grid <?php echo esc_attr($custom_class); ?>">
		<figure class="effect-<?php echo esc_attr($style); ?>">
			<img src="<?php if(count($image_url) > 0 ){ echo esc_url($image_url[0]);} ?>" alt="" />
			<figcaption>
				<div class="cshero-fullBox-main">
					<div class="cshero-fullBox-position">
						<<?php echo $heading_size;?> class="cshero-coverBoxs-title" <?php echo $styles; ?>>
							<?php echo esc_attr($title); ?>
						</<?php echo $heading_size;?>>
						<div class="cshero-coverBoxs-icon">
							<?php if($style == 'zoe'): ?>
								<span><i class="fa fa-heart-o"></i></span>
								<span><i class="fa fa-eye"></i></span>
								<span><i class="fa fa-paperclip"></i></span>
							<?php endif; ?>
						</div>
						<p class="cshero-coverBoxs-content" <?php echo $styles_content; ?>><?php if($content_limit){ echo cshero_string_limit_words($content, $content_limit); } else { echo $content;}; ?></p>
						<a class="cshero-coverBoxs-readmore" href="<?php echo esc_url($link); ?>"></a>
					</div>
				</div>
			</figcaption>
		</figure>
	</div>
	<?php
	return ob_get_clean();
}