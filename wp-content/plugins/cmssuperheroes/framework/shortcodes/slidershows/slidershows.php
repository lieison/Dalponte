<?php
add_shortcode('cs-shortcode-slideshows', 'cs_shortcode_slideshows_render');
function cs_shortcode_slideshows_render($atts) {
    extract(shortcode_atts(array(
                'el_class' => '',
                'show_page' =>'',
                'show_shadow' =>0,
                'slideshows_images' => ''
                    ), $atts));
    wp_enqueue_style('slidershows', CSCORE_PLUGIN_URL . "framework/shortcodes/slidershows/css/slidershows.css");
    ob_start();

    $image=(get_image_url($slideshows_images));
    slidershow_template($image,$show_page,$show_shadow);
    return ob_get_clean();
}

function get_image_url($agrs){
    $images=explode(',',$agrs);
    $images_values = array();
    foreach($images as $image=>$value){
        $images_values[$image] =  wp_get_attachment_image_src($value,array(566,328));
    }
    return $images_values;
}
/**********************************Template*****************************/
function slidershow_template($agrs,$show_page,$show_shadow){
    ?>
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <?php if($show_page==1):?>
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <?php endif;?>
         <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php foreach($agrs as $image=>$value):?>
            <?php ($image==0) ? $active="active" : $active="";?>
            <div class="item <?php echo $active;?>">
                <img src="<?php echo esc_url($value[0]);?>" alt="image2"/>
                <div class="carousel-caption">
                </div>
            </div>
            <?php endforeach;?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
            <span class="fa fa-chevron-left" aria-hidden="true"></span>
            <span class="sr-only"><?php _e('Previous', CSCORE_NAME ); ?></span>
        </a>
        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
            <span class="fa fa-chevron-right" aria-hidden="true"></span>
            <span class="sr-only"><?php _e('Next', CSCORE_NAME ); ?></span>
        </a>
        
    </div>
    <?php if($show_shadow==1):?>
        <div class="shadow">
            <img src="<?php echo CSCORE_PLUGIN_URL.'framework/shortcodes/slidershows/img/shadow.png';?>" alt="shadow" />
        </div>
    <?php endif;?>
    <?php
}

?>