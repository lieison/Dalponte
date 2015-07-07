<?php

add_shortcode('gallery', 'cshero_base_gallery');

$gallery = 0;
function cshero_base_gallery($atts, $content = null) {
    global $gallery;
    $post = get_post();
    extract(shortcode_atts(array(
                'order'      => 'ASC',
                'orderby'    => 'menu_order ID',
                'columns' => '3',
                'link' => 'post',
                'ids' => '',
                'id' => $post ? $post->ID : 0,
                'size' => 'full',
                'include'    => '',
                'exclude'    => '',
                    ), $atts));

    $gallery_ids = array();

    if(empty($ids)){
        if ( !empty($exclude) ) {
            $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
        } else {
            $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
        }
        if($attachments){
            $a_ids = array();
            foreach ($attachments as $id => $attachment){
                $a_ids[] = $id;
            }
            $gallery_ids = $a_ids;
        }
    } else {
        $gallery_ids = explode(',', $ids);
    }

    /* Caculator */
    $gallery_ns = ( 1 / $columns ) * 100;

    // Get size
    if($columns <= 2){
        $size = 'full';
    } elseif ($columns >= 3 && $columns < 6){
        $size = 'medium';
    } else {
        $size = 'thumbnail';
    }
    // link
    $colorbox = '';
    if($link == 'none'){
        $colorbox = 'colorbox';
    }

    /* Load scripts */
    wp_enqueue_style('colorbox');
    wp_enqueue_script('colorbox');
    wp_enqueue_script( 'masonry-pkgd');
    wp_register_script( 'cs-gallery', CSCORE_PLUGIN_URL.'framework/shortcodes/base/cs-gallery.js',array(),'1.0.0');
    wp_localize_script( 'cs-gallery', 'gallery', array('ns'=>$gallery_ns));
    wp_enqueue_script( 'cs-gallery' );

    /* Main return */
    ob_start();
    ?>
    <div id="cs-gallery-<?php echo $gallery;?>" class="cs-gallery columns-<?php echo $columns; ?>" data-columns="<?php echo $columns; ?>">
    <?php foreach ($gallery_ids as $image_id): ?>
			<?php
            $attachment_image = wp_get_attachment_image_src($image_id, $size, false);
            $attachment_image_full = wp_get_attachment_image_src($image_id, 'full', false);

            $attachment_link = '';
            $attach_meta = get_post($image_id);
            //echo "<pre>";
            //var_dump($attach_meta);
            if($attachment_image[0] != '' && $attachment_image_full[0] != ''):?>
            <div class="item" style="<?php if($gallery_ns < 100){ echo "float: left; width: $gallery_ns%;"; } ?>">
            	<?php
                	if($link == 'post'){
                	    $attachment_link = get_attachment_link($image_id);
                	} else {
                	    $attachment_link = $attachment_image_full[0];
                	}
            	?>
            	<a href="<?php echo $attachment_link; ?>" class="<?php echo $colorbox; ?>">
            	   <img <?php if($gallery_ns == 100){ echo 'width="'.$gallery_ns.'%";'; } ?> title="<?php echo $attach_meta->post_title; ?>" alt="<?php echo $attach_meta->post_title; ?>" src="<?php echo esc_url($attachment_image[0]);?>"/>
            	</a>
            	<?php if($attach_meta->post_excerpt): ?>
            	<div class="item-content">
                	<span class="image-excerpt"><?php echo $attach_meta->post_excerpt; ?></span>
            	</div>
            	<?php endif; ?>
            </div>
            <?php endif; ?>
   	<?php endforeach; ?>
   	</div>
    <?php
    $gallery++;
    return ob_get_clean();
}