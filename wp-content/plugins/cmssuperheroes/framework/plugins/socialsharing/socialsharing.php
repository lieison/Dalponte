<?php
$cs_social = 0;
function cshero_social_sharing_render( $text = 'Share', $icon = true, $count = false ) {
	global $post,$cs_social;
	wp_enqueue_script ( 'social-sharing', CSCORE_PLUGIN_URL . "/framework/plugins/socialsharing/socialsharing.js", array (), "1.0.0" );

	ob_start ();
	?>
	<div id="cs_social_<?php echo $cs_social; ?>" class="cs_social" data-id="<?php echo $cs_social; ?>" data-url="<?php the_permalink($post->ID); ?>" >
		<a data-toggle="popover"><?php if($icon){ echo '<i class="fa fa-share-alt"></i>';} ?><?php echo '<span></span> '; ?><?php _e('Share',CSCORE_NAME); ?></a>
		<div id="cs_social_content_<?php echo $cs_social; ?>" style="display: none;">
			<ul class="cs_social_items_show">
				<li class="facebook-share cs_social_item" onclick="<?php echo esc_js('facebookShare("'.$cs_social.'")'); ?>"><a><i class="fa fa-facebook"></i>Facebook</a></li>
				<li class="google-plus-share cs_social_item" onclick="<?php echo esc_js('googlePlusShare("'.$cs_social.'")'); ?>"><a><i class="fa fa-google-plus"></i>Google+</a></li>
				<li class="twitter-share cs_social_item" onclick="<?php echo esc_js('twitterShare("'.$cs_social.'")'); ?>"><a><i class="fa fa-twitter"></i>Twitter</a></li>
				<li class="linkedin-share cs_social_item" onclick="<?php echo esc_js('linkedInShare("'.$cs_social.'")'); ?>"><a><i class="fa fa-pinterest"></i>Pinterest</a></li>
				<li class="pinterest-share cs_social_item" onclick="<?php echo esc_js('pinterestShare("'.$cs_social.'")'); ?>"><a><i class="fa fa-linkedin"></i>LinkedIn</a></li>
			</ul>
		</div>
	</div>
	<?php
	$cs_social++;
	echo ob_get_clean();
}