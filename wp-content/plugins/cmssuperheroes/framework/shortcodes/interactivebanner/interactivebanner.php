<?php
add_shortcode('cs-interactive-banner', 'cs_interactive_banner_render');
function cs_interactive_banner_render($atts, $content = null) {
    extract(shortcode_atts(array(
    'icon_title' => '',
    'style' => 'interactive-style-1',
    'interactive_animate_type' => 'none',
    'image' => '',
    'crop_image' => false,
    'width_image' => '',
    'height_image' => '',
    'title' => '',
    'title_color' => '',
    'short_description_color' => '',
    'full_description_color' => '',
    'icon_color' => '',
    'bg_icon_color' => '',
    'icon_size' => '',
    'heading_size' => 'h4',
    'link_show_more' => '',
    'show_more' => '',
    'link_title' => false,
    'link_icon' => false,
    'custom_class' => '',
    'short_description' => '',
    'overlay' => '',
    'overlay_hover' => '',
    'full_description' => ''
            ), $atts));
    $unique_id = uniqid().'_'.time();
    $id  ="interactive_banner_".$unique_id;
    $crop_image=($crop_image=='false')?false:$crop_image;
    if($interactive_animate_type != 'none') {
        $animate_class = array();
        $animate_class[] = $interactive_animate_type;
        $animate_class[] = 'animate-element';
        $animate_class = esc_attr( implode( ' ', $animate_class ) );
    }else {
        $animate_class = '';
    }

    wp_enqueue_script('animate-elements');

    ob_start();
?>

<?php

    switch ($style) {
        case 'interactive-style-4':
        case 'interactive-style-5':
        case 'interactive-style-6': ?>
            <?php
                $image_url = array();
                if (!empty($image)) {
                    $image_url = wp_get_attachment_image_src($image, 'full');
                }
            ?>
			<div  class="column_container">
               <div  id="<?php echo $id;?>" class="cs-interactive-banner wrapper <?php echo esc_attr($style); ?>">
					<style type="text/css" scoped>
						#<?php echo $id;?>.cs-interactive-banner .shortcode-title, .cs-interactive-banner .shortcode-title a {color: <?php echo $title_color; ?>;}
						#<?php echo $id;?>.cs-interactive-banner .cs-interactive-icon i {font-size: <?php echo $icon_size; ?>;color: <?php echo $icon_color; ?>;background: <?php echo $bg_icon_color; ?>;padding: 0 10px;}
						#<?php echo $id;?>.cs-interactive-banner .cs-interactive-content-wrap{color: <?php echo $short_description_color; ?>;}
						#<?php echo $id;?>.cs-interactive-banner .cs-interactive-content-hover-wrap{color: <?php echo $full_description_color; ?>;}
					</style>
                    <?php if (count($image_url) > 0) { ?>
                        <div class="cs-interactive-image">
                            <?php
                            if($crop_image == true || $crop_image == 1){
                                $image_resize = mr_image_resize(  $image_url[0], $width_image, $height_image, true, 'c', false );
                                echo '<img alt="" src="'.$image_resize.'" class="attach_img_cropped" />';
                            }
                            else{
                                ?><img alt=""  src="<?php echo esc_attr($image_url[0]); ?>"/><?php
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <?php if((!empty($icon_title))||($title!='')||($short_description!='')):?>
                        <div class="cs-interactive-content-wrap" style="background: <?php echo $overlay;?>;">
                            <div class="cs-interactive-content-inner">
                                <?php if(!empty($icon_title)) { ?>
                                <div class="cs-interactive-icon">
									<?php if($link_title == false){ ?>
										<i class="<?php echo esc_attr($icon_title . ' ' . $animate_class); ?>"></i>
									<?php }else{ ?>
										<a href="<?php echo $link_show_more; ?>"><i class="<?php echo esc_attr($icon_title . ' ' . $animate_class); ?>"></i></a>
									<?php } ?>
                                </div>
                                <?php } ?>
                                <?php if($title!=''):?>
									<?php if($link_title == false){
										 echo '<'.$heading_size.'  class="shortcode-title"><span>'.$title.'</span></'.$heading_size.'>';
									}else{ 
										echo '<'.$heading_size.'  class="shortcode-title"><a href="'.$link_show_more.'"><span>'.$title.'</span></a></'.$heading_size.'>';	
									} ?>		
                                <?php endif;?>
                                <?php if($short_description!=''):?>
                                    <div class="cs-interactive-short-description">
                                        <p><?php echo $short_description; ?></p>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endif;?>
                    <?php if((!empty($icon_title))||($title!='')||($full_description!='')):?>
                        <div class="cs-interactive-content-hover-wrap" style="background:<?php echo $overlay_hover;?>;">
                            <?php if($title!=''):?>
                                <?php if($link_title == false){
									 echo '<'.$heading_size.'  class="shortcode-title"><span>'.$title.'</span></'.$heading_size.'>';
								}else{ 
									echo '<'.$heading_size.'  class="shortcode-title"><a href="'.$link_show_more.'"><span>'.$title.'</span></a></'.$heading_size.'>';	
								} ?>	
                            <?php endif;?>
                            <?php if(!empty($icon_title)) { ?>
                            <div class="cs-interactive-icon">
									<?php if($link_title == false){ ?>
										<i class="<?php echo esc_attr($icon_title . ' ' . $animate_class); ?>"></i>
									<?php }else{ ?>
										<a href="<?php echo $link_show_more; ?>"><i class="<?php echo esc_attr($icon_title . ' ' . $animate_class); ?>"></i></a>
									<?php } ?>
                            </div>
                            <?php } ?>
                            <?php if($full_description!=''):?>
                                <div class="cs-interactive-short-description">
                                    <p><?php echo $full_description; ?></p>
                                </div>
                            <?php endif;?>
                            <?php if($show_more!=''):?>
                                <div class="cs-interactive-readmore">
                                    <a class="cs-interactive-readmore" href="<?php echo $link_show_more;?>"><?php echo $show_more;?></a>
                                </div>
                            <?php endif;?>
                        </div>
                    <?php endif;?>
              
            </div>
            <?php
            break;
        default: ?>
            <?php
                $image_url = array();
                if (!empty($image)) {
                    $image_url = wp_get_attachment_image_src($image, 'full');
                }
            ?>

            <div class="column_container">
               <div id="<?php echo $id;?>" class="cs-interactive-banner wrapper <?php echo esc_attr($style); ?>">
					<style type="text/css" scoped>
						#<?php echo $id;?>.cs-interactive-banner .shortcode-title, .cs-interactive-banner .shortcode-title a {color: <?php echo $title_color; ?>;}
						#<?php echo $id;?>.cs-interactive-banner .cs-interactive-icon i {font-size: <?php echo $icon_size; ?>;color: <?php echo $icon_color; ?>;background: <?php echo $bg_icon_color; ?>;padding: 0 10px;}
						#<?php echo $id;?>.cs-interactive-banner .cs-interactive-content-wrap{color: <?php echo $short_description_color; ?>;}
						#<?php echo $id;?>.cs-interactive-banner .cs-interactive-content-hover-wrap{color: <?php echo $full_description_color; ?>;}
					</style>
                    <?php if (count($image_url) > 0) { ?>
                        <div class="cs-interactive-image">
                            <?php
                            if($crop_image == true || $crop_image == 1){
                                $image_resize = mr_image_resize(  $image_url[0], $width_image, $height_image, true, 'c', false );
                                echo '<img src="'.$image_resize.'" class="attach_img_cropped" alt=""  />';
                            }
                            else{
                                ?><img src="<?php echo esc_attr($image_url[0]); ?>" alt="" /><?php
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <?php if((!empty($icon_title))||($title!='')||($short_description!='')):?>
                        <div class="cs-interactive-content-wrap" style="background:<?php echo $overlay;?>;">
                            <div class="cs-interactive-content-inner">
                                <?php if(!empty($icon_title)) { ?>
                                <div class="cs-interactive-icon">
                                   <?php if($link_title == false){ ?>
										<i class="<?php echo esc_attr($icon_title . ' ' . $animate_class); ?>"></i>
									<?php }else{ ?>
										<a href="<?php echo $link_show_more; ?>"><i class="<?php echo esc_attr($icon_title . ' ' . $animate_class); ?>"></i></a>
									<?php } ?>
                                </div>
                                <?php } ?>
                                <?php if(($title!='')||($short_description!='')): ?>
                                <div class="cs-interactive-content">
                                    <?php if($link_title == false){
										 echo '<'.$heading_size.'  class="shortcode-title"><span>'.$title.'</span></'.$heading_size.'>';
									}else{ 
										echo '<'.$heading_size.'  class="shortcode-title"><a href="'.$link_show_more.'"><span>'.$title.'</span></a></'.$heading_size.'>';	
									} ?>	
                                    <?php if($short_description!=''):?>
                                        <div class="cs-interactive-short-description">
                                            <p><?php echo $short_description; ?></p>
                                        </div>
                                    <?php endif;?>

                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endif;?>
                    <?php if((!empty($icon_title))||($title!='')||($full_description!='')):?>
                        <div class="cs-interactive-content-hover-wrap" style="background: <?php echo $overlay_hover;?>;">
                            <div class="cs-interactive-content">
                                <?php if($link_title == false){
										 echo '<'.$heading_size.'  class="shortcode-title"><span>'.$title.'</span></'.$heading_size.'>';
									}else{ 
										echo '<'.$heading_size.'  class="shortcode-title"><a href="'.$link_show_more.'"><span>'.$title.'</span></a></'.$heading_size.'>';	
								} ?>	
                            </div>
                            <?php if(!empty($icon_title)) { ?>
                            <div class="cs-interactive-icon">
                               <?php if($link_title == false){ ?>
									<i class="<?php echo esc_attr($icon_title . ' ' . $animate_class); ?>"></i>
								<?php }else{ ?>
									<a href="<?php echo $link_show_more; ?>"><i class="<?php echo esc_attr($icon_title . ' ' . $animate_class); ?>"></i></a>
								<?php } ?>
                            </div>
                            <?php } ?>
                            <?php if($full_description!=''):?>
                                <div class="cs-interactive-short-description">
                                    <p><?php echo $full_description; ?></p>
                                </div>
                            <?php endif;?>
                            <?php if($show_more!=''):?>
                                <div class="cs-interactive-readmore">
                                    <a class="cs-interactive-readmore btn btn-default btn-link " href="<?php echo $link_show_more;?>"><?php echo $show_more;?></a>
                                </div>
                            <?php endif;?>


                        </div>
                    <?php endif;?> 
				</div>
			</div>
		<?php
		}
		return ob_get_clean();
	?>
	<?php
}