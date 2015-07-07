<div id="<?php echo $counter_id ?>" class="cshero-counter-wrap <?php echo str_replace(".","-",$layout); ?>" <?php echo $wrap_style; ?>>
	<?php if ($border_color_hover || $background_color_hover) : ?>
		<style type="text/css" scoped>
			#<?php echo $counter_id ?>:hover {
				<?php if ($border_color_hover) : ?>
					border-color: <?php echo $border_color_hover; ?> !important;
				<?php endif; ?>
				<?php if ($background_color_hover) : ?>
					background-color: <?php echo $background_color_hover; ?> !important;
				<?php endif; ?>
			}
		</style>
	<?php endif; ?>
	<?php if ( $heading ) : ?>
		<div class="cs-header default <?php echo $heading_align; ?>">
			<<?php echo $heading_size; ?> class="cs-title" <?php echo $heading_style; ?>>
				<span class="line"><?php echo $heading; ?></span>
			</<?php echo $heading_size; ?>>
		</div>
	<?php endif; ?>
	<div class="cshero-counter-inner <?php echo $align; ?>">
		<?php if( $icon ): ?>
			<span class="icon" <?php echo $icon_style; ?>><i class="fa <?php echo $icon; ?>"></i></span>
		<?php endif; ?>

		<<?php echo $digit_heading_size;?> id="counter_<?php echo $callback;?>" class="counter <?php echo $type;?>" <?php echo $counter_styles;?> <?php echo implode(' ', $data_render); ?>></<?php echo $digit_heading_size;?>>
		
		<?php echo $content; ?>
		<?php if($text != "") : ?>
			<p class="counter_text" <?php echo $text_styles; ?>>
				<?php echo esc_attr($text);?>
			</p>
		<?php endif; ?>
	</div>
</div>