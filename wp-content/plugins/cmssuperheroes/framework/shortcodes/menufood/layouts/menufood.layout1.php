
<article <?php post_class($col); ?>>
    <?php if($image): ?>
        <div class="post-image">
            <?php
            if (has_post_thumbnail() and wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)){
                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                $full_image = $attachment_image[0];
                if($crop_image){
                    $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                    echo '<img alt=""  src="'. $image_resize .'" />';
                }else{
                   echo '<img alt src="'. esc_attr($attachment_image[0]) .'"   />';
                }
            } else {
                $attachment_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                $full_image = $attachment_image;
                if($crop_image == '1'){
                    $image_resize = mr_image_resize( $attachment_image, $width_image, $height_image, true, false );
                    echo '<img alt="" src="'. $image_resize .'"    />';
                }else{
                    echo '<img alt="" src="'. $attachment_image .'"  />';
                }

            } ?>
        </div>
    <?php endif; ?>
    <div class="post-content">
    	<<?php echo $post_heading; ?> class="cshero-post-title"><a href="<?php the_permalink(); ?>"><?php echo esc_attr($post['post_title']); ?></a></<?php echo $post_heading; ?>>
        <?php if($show_price == '1'): ?>
        <div class="price-food">
            <span>
            <?php
            $price = get_post_meta($post['ID'], 'cs_menu_price', true);
            $unit = get_post_meta($post['ID'], 'cs_price_unit', true);
            if($unit){
                echo $unit.' '.$price;
            } else {
                echo $price;
            }
            ?>
            </span>
        </div><!-- .price -->
        <?php endif; ?>
    	<div class="cshero-content">
        	<?php if($excerpt_length != ''){
        	    echo cshero_string_limit_words(strip_tags($post['post_content']), $excerpt_length);
        	} else {
        		echo apply_filters('the_content', $post['post_content']);
            }
            ?>
    	</div><!-- .entry-content -->
    	<div class="cshero-footer table">
        <?php if(get_post_meta($post['ID'], 'cs_menu_special', true)=='yes'): ?>
			<div class="feature-icon table-cell">
               <span><?php _e('CHEFS SPECIAL', CSCORE_NAME); ?></span>
            </div>
		<?php endif; ?>
			<div class="description-icon table-cell cell-bottom">
			<?php for($i = 0 ; $i<5; $i++): ?>
				<?php if(get_post_meta($post['ID'], 'cs_menu_custom_field_'.$i, true)): ?>
                	<span data-rel="tooltip" data-placement="top" data-original-title="<?php echo esc_attr(get_post_meta($post['ID'], 'cs_menu_custom_field_desc_'.$i, true)); ?>">
                	<?php
                	if(get_post_meta($post['ID'], 'cs_menu_custom_field_icon_'.$i, true)){
                	    echo '<i class="'.get_post_meta($post['ID'], 'cs_menu_custom_field_icon_'.$i, true).'"></i>';
                	} elseif (get_post_meta($post['ID'], 'cs_menu_custom_field_'.$i, true)) {
                	    echo esc_attr(get_post_meta($post['ID'], 'cs_menu_custom_field_'.$i, true));
                	}
                	?>
                	</span>
                <?php endif; ?>
            <?php endfor; ?>
			</div>
		</div>
	</div>
</article><!-- #post-## -->
