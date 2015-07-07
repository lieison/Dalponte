<div class="<?php echo $_col.' '.str_replace('.','-',$layout).' '.esc_attr($el_class).''; ?>">
    <div class="cs-categories-woo-wrap">
        <div class="cs-categories-woo-image">
            <img alt="" src="<?php echo $image_resize; ?>">
        </div>
        <div class="cs-categories-woo-inner">
            <div class="cs-categories-woo-meta">
                <<?php echo $title_categories_size; ?> class="cs-categories-woo-title" style="color: <?php echo $title_categories_color; ?>; ">
                    <?php echo $term->name; ?><?php if($number_items){ echo ' ('.$term->count.')';} ?>
                </<?php echo $title_categories_size; ?>>
            </div>
            <div class="cs-categories-woo-button">
                <a class="btn btn-primary btn-white" href="<?php echo get_term_link($term->term_id, 'product_cat'); ?>" ><?php echo _e( "SHOP NOW", CSCORE_NAME );?></a>
            </div>
        </div>
    </div>
</div>