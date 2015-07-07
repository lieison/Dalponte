<?php
/**
 * @package Helix Framework
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2014 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
*/
add_shortcode( 'cs-g-gallery', 'cs_greyscale_gallery_render' );
$cs_gallery = array();
$active = 0;
//[Gallery]
$galleryArray = array();
function cs_greyscale_gallery_render( $atts, $content="" ){
		global $galleryArray,$cs_gallery,$active;

		$cs_gallery[] = $active++;
		$tags = array();

		extract(shortcode_atts(array(
			'columns' => 3,
			'modal' => 'yes',
			'filter' => 'no'
		), $atts));

		do_shortcode( $content );

		//Add gallery.css file
		wp_enqueue_style('gallery');

		wp_enqueue_style('gray', CSCORE_PLUGIN_URL . "framework/shortcodes/greyscale/gray.css",array(),"1.3.2");
		wp_enqueue_script('jquery-gray', CSCORE_PLUGIN_URL . "framework/shortcodes/greyscale/jquery.gray.min.js",array(),"1.3.2");

		//isotope
		if($filter=='yes'){
			wp_enqueue_script('jquery-isotope');
			wp_register_script('greyscale', CSCORE_PLUGIN_URL . "framework/shortcodes/greyscale/greyscale.js",array(),"1.3.2");
			$translation_array = array( 'id' => implode(",",$cs_gallery));
			wp_localize_script( 'greyscale', 'cs_gallery', $translation_array );
			wp_enqueue_script( 'greyscale' );
		}

		$tags = '';

		foreach ($galleryArray as $key=>$item) $tags .= ',' . $item['tag'];

		$tags = ltrim($tags, ',');
		$tags = explode(',', $tags);
		$newtags = array();
		foreach($tags as $tag) $newtags[] = trim($tag);
		$tags = array_unique($newtags);

		ob_start();
		if($filter=='yes') {
		?>

		<div class="gallery-filters btn-group">
			<a class="active" href="#" data-filter="*"><?php echo _e('Show All',CSCORE_NAME); ?></a>
			<?php foreach ($tags as $tag) { ?>
				<a class="" href="#" data-filter=".<?php echo trim($tag) ?>"><?php echo ucfirst(trim($tag)) ?></a>
			<?php } ?>
		</div>
		<?php } ?>

		<ul id="gallery_<?php echo $active; ?>" class="gallery">
			<?php foreach ($galleryArray as $key=>$item) { ?>
				<li style="width:<?php echo round(100/$columns); ?>%" class="<?php echo str_replace(',', ' ', $item['tag']) ?>">
					<a class="img-polaroid" data-toggle="modal" data-target="<?php echo ($modal=='yes')? '#modal-' . $key . '':'#' ?>">
						<?php
							echo '<img class="grayscale grayscale-fade" alt=" " src="' . esc_url($item['src']) . '" />';
						?>
						<?php if($item['content'] !='') { ?>
							<div>
								<div>
									<?php echo do_shortcode($item['content']); ?>
								</div>
							</div>
						<?php } ?>
					</a>
				</li>

				<?php if($modal=='yes') { ?>
				<div id="modal-<?php echo $key; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
					<div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					      </div>
					      <div class="modal-body">
							<?php echo '<img src="' . esc_url($item['src']) . '" alt=" " width="100%" style="max-height:400px" />';?>
					      </div>
					    </div>
					  </div>
				</div>
				<?php } ?>

			<?php } ?>
		</ul>
		<?php
		$galleryArray = array();
		//return $html;
		return ob_get_clean();
}
add_shortcode( 'cs-g-gallery-item', 'cs_greyscale_gallery_item_render' );
function cs_greyscale_gallery_item_render( $atts, $content="" ){
		global $galleryArray;
		$galleryArray[] = array(
			'src'=>(isset($atts['src'])?$atts['src']:''),
			'tag'=>(isset($atts['tag']) && $atts['tag'] !='')?$atts['tag']:'',
			'content'=>$content
		);
	}