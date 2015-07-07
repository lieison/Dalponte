<?php
	$span = ($wp_query->post_count==1 || !$show_feature)?'col-xs-12 col-lg-12 col-md-12 col-sm-12':'col-xs-12 col-lg-6 col-md-6 col-sm-6';
?>
<div class="row">
<div class="<?php echo str_replace('.','-',$layout); ?>">
	<?php
	if($wp_query->have_posts()){
		$start = ($show_feature)?0:-1;
		$count = 0;
		while($wp_query->have_posts()): $wp_query->the_post();
			if($count==$start){
				?>
				<div class="magazine-post-featured <?php echo $span;?>">
					<article <?php post_class(' post-list-feature'); ?>>
	                    <header class="cs-blog-header">
	                        <?php if($show_image):?>
	                            <?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() and  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)){
	                                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
	                            }
	                            else{
	                                $attachment_image[0] = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
	                            }
	                             ?>
	                            <div class="cs-blog-media">
	                                <div class="cs-blog-thumbnail">
	                                    <?php
	                                    if($crop_image){
	                                        $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
	                                        echo '<img alt="" src="'. esc_url($image_resize) .'" />';
	                                    }else{
	                                        echo '<img alt="" src="'. esc_attr($attachment_image[0]) .'" />';
	                                    }
	                                    ?>
	                                    <div class="overlay from-center">
						                    <div class="overlay-content">
						                        <a class="" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" ><i class="fa fa-link"></i></a>
						                    </div>
						                </div>
	                                </div><!-- .entry-thumbnail -->
	                            </div>
	                        <?php endif;?>
	                        <div class="cs-blog-meta cs-itemBlog-meta">
	                            <?php
	                            
	                            if($show_date):
	                            	$date = ($date_format!='time')?get_the_date($date_format):tp_relative_time(get_the_date('Y-m-d H:i'));
	                                echo '<div class="release-date clearfix">'.$date.'</div>';
	                            endif;
	                            echo cshero_title_render();
	                            ?>
	                        </div>
	                    </header><!-- .entry-header -->
	                    <?php
	                    if($show_description){
	                    	?>
	                    	<div class="cs-blog-content">
	                    		<?php //echo the_excerpt();?>
	                    		<p><?php echo cshero_content_max_charlength(strip_tags(get_the_content()), $excerpt_length); ?></p>
	                    	</div>
	                    	<?php
	                    }
	                    ?>
	                </article><!-- #post-## -->
				</div>
				<?php
			}else{
				if($count==$start+1){
					echo '<div class="magazine-post-lists '.$span.'">';
				}
				?>
						<article <?php post_class(' post-list-item clearfix'); ?>>
							<?php if($show_list_image):
								$padding = $width_list_image+20;
							?>
	                            <?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() and wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false) ){
	                                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
	                            }
	                            else{
	                                $attachment_image[0] = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
	                            }
	                             ?>
	                            <div class="cs-blog-media left">
	                                <div class="cs-blog-thumbnail">
	                                    <?php
	                                    if($crop_list_image){
	                                        $image_resize = mr_image_resize( $attachment_image[0], $width_list_image, $height_list_image, true, 'c', false );
	                                        echo '<img alt="" src="'. esc_url($image_resize) .'" />';
	                                    }else{
	                                        echo '<img alt="" src="'. esc_attr($attachment_image[0]) .'" />';
	                                    }
	                                    ?>
	                                    <div class="overlay from-center">
						                    <div class="overlay-content">
						                        <a class="" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" ><i class="fa fa-link"></i></a>
						                    </div>
						                </div>
	                                </div><!-- .entry-thumbnail -->
	                            </div>
	                        <?php endif;?>
	                        <div class="post-list-content <?php echo $show_list_image?'show-image':'hide-image';?>" <?php echo $show_list_image?'style="padding-left:'.$padding.'px;"':'';?>>
			                    <header class="cs-blog-header">
			                        <div class="cs-blog-meta cs-itemBlog-meta">
			                            <?php
			                            echo cshero_title_render();
			                            if($show_list_date):
			                            	$date = ($date_format!='time')?get_the_date($date_format):tp_relative_time(get_the_date('Y-m-d H:i'));
			                                echo '<div class="release-date">'.$date.'</div>';
			                            endif;
			                            
			                            ?>
			                        </div>
			                    </header><!-- .entry-header -->
			                    <?php
			                    if($show_list_description){
			                    	?>
			                    	<div class="cs-blog-content">
			                    		<?php //echo the_excerpt();?>
			                    		<p><?php echo cshero_content_max_charlength(strip_tags(get_the_content()), $excerpt_length); ?></p>
			                    	</div>
			                    	<?php
			                    }
			                    ?>
			                </div>
		                </article><!-- #post-## -->
				<?php
				if($count==$wp_query->post_count-1){
					echo '</div>';
				}
			}
			$count++;
		endwhile;
	}
	?>
</div>
</div>