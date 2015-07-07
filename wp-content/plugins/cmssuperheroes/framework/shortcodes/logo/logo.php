<?php
function cs_shortcode_logo_render($atts) {
    global $smof_data;
    extract(shortcode_atts(array(
                'el_class' => '',
                'logo_height' => $smof_data['logo_width'],
                'logo' => ''
                    ), $atts));

    ob_start();
    $_logo = esc_url($smof_data['logo']['url']);
    if($logo != ''){
        $_logos = wp_get_attachment_image_src($logo, 'full');
        if(count($_logos) > 0){
            $_logo = $_logos[0];
        }
    }
    ?>
    <div class="cs-logo logo">
        <a href="<?php echo esc_url(home_url()); ?>" style="display:block;">
            <img src="<?php echo esc_url($_logo); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"
                 style="height: <?php echo esc_attr($logo_height); ?>" class="normal-logo logo-custom"/>
        </a>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('cs-shortcode-logo', 'cs_shortcode_logo_render');
?>