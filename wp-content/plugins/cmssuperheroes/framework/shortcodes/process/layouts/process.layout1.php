<style type="text/css" scoped>
   .cs-process-default .cshero-process-holder li.item-last .cshero-process-inner:after {
        border-bottom-color: <?php echo esc_attr($icon_background);?>;
   }
</style>
<div class="cshero-process-content <?php echo $process_column;?>">
    <ul class="cshero-process-holder clearfix">
        <?php if($icon1): ?>
        <li class="cshero-process-outer">
            <<?php echo $title_heading_size;?> class="cshero-process-title">
                <span style="margin: <?php $title_margin; ?>; color: <?php echo $title_color; ?>;"><?php echo esc_attr($title1); ?></span>
            </<?php echo $title_heading_size;?>>
            <span class="cshero-process-inner">
                <i class="fa <?php echo esc_attr($icon1); ?>" style="background: <?php echo $icon_background; ?>;font-size: <?php echo $icon_font_size; ?>;color: <?php echo $icon_color; ?>;width: <?php echo $icon_width; ?>;height: <?php echo $icon_height; ?>;line-height: <?php echo $icon_height; ?>;border-style: <?php echo $icon_border_style; ?>;border-width: <?php echo $icon_border_width; ?>;border-color: <?php echo $icon_border_color; ?>;border-radius: <?php echo $icon_border_radius; ?>;-webkit-border-radius: <?php echo $icon_border_radius; ?>;-moz-border-radius: <?php echo $icon_border_radius; ?>;"></i>
            </span>
            <div class="cshero-process-text-holder">
                <div class="cshero-process-text"><?php echo esc_attr($desc1); ?></div>
            </div>
        </li>
        <?php endif; ?>
        <?php if($icon2): ?>
        <li class="cshero-process-outer">
            <<?php echo $title_heading_size;?> class="cshero-process-title">
                <span style="margin: <?php $title_margin; ?>; color: <?php echo $title_color; ?>;"><?php echo esc_attr($title2); ?></span>
            </<?php echo $title_heading_size;?>>
            <span class="cshero-process-inner">
                <i class="fa <?php echo esc_attr($icon2); ?>" style="background: <?php echo $icon_background; ?>;font-size: <?php echo $icon_font_size; ?>;color: <?php echo $icon_color; ?>;width: <?php echo $icon_width; ?>;height: <?php echo $icon_height; ?>;line-height: <?php echo $icon_height; ?>;border-style: <?php echo $icon_border_style; ?>;border-width: <?php echo $icon_border_width; ?>;border-color: <?php echo $icon_border_color; ?>;border-radius: <?php echo $icon_border_radius; ?>;-webkit-border-radius: <?php echo $icon_border_radius; ?>;-moz-border-radius: <?php echo $icon_border_radius; ?>;"></i>
            </span>
            <div class="cshero-process-text-holder">
                <div class="cshero-process-text"><?php echo esc_attr($desc2); ?></div>
            </div>
        </li>
        <?php endif; ?>
        <?php if($icon3): ?>
        <li class="cshero-process-outer">
            <<?php echo $title_heading_size;?> class="cshero-process-title">
                <span style="margin: <?php $title_margin; ?>; color: <?php echo $title_color; ?>;"><?php echo esc_attr($title3); ?></span>
            </<?php echo $title_heading_size;?>>
            <span class="cshero-process-inner">
                <i class="fa <?php echo esc_attr($icon3); ?>" style="background: <?php echo $icon_background; ?>;font-size: <?php echo $icon_font_size; ?>;color: <?php echo $icon_color; ?>;width: <?php echo $icon_width; ?>;height: <?php echo $icon_height; ?>;line-height: <?php echo $icon_height; ?>;border-style: <?php echo $icon_border_style; ?>;border-width: <?php echo $icon_border_width; ?>;border-color: <?php echo $icon_border_color; ?>;border-radius: <?php echo $icon_border_radius; ?>;-webkit-border-radius: <?php echo $icon_border_radius; ?>;-moz-border-radius: <?php echo $icon_border_radius; ?>;"></i>
            </span>
            <div class="cshero-process-text-holder">
                <div class="cshero-process-text"><?php echo esc_attr($desc3); ?></div>
            </div>
        </li>
        <?php endif; ?>
        <?php if($icon4): ?>
        <li class="cshero-process-outer item-last">
            <<?php echo $title_heading_size;?> class="cshero-process-title">
                <span style="margin: <?php $title_margin; ?>; color: <?php echo $title_color; ?>;"><?php echo esc_attr($title4); ?></span>
            </<?php echo $title_heading_size;?>>
            <span class="cshero-process-inner">
                <i class="fa <?php echo esc_attr($icon4); ?>" style="background: <?php echo $icon_background; ?>;font-size: <?php echo $icon_font_size; ?>;color: <?php echo $icon_color; ?>;width: <?php echo $icon_width; ?>;height: <?php echo $icon_height; ?>;line-height: <?php echo $icon_height; ?>;border-style: <?php echo $icon_border_style; ?>;border-width: <?php echo $icon_border_width; ?>;border-color: <?php echo $icon_border_color; ?>;border-radius: <?php echo $icon_border_radius; ?>;-webkit-border-radius: <?php echo $icon_border_radius; ?>;-moz-border-radius: <?php echo $icon_border_radius; ?>;"></i>
            </span>
            <div class="cshero-process-text-holder">
                <div class="cshero-process-text"><?php echo esc_attr($desc4); ?></div>
            </div>
        </li>
        <?php endif; ?>
        <div class="cshero-process-separator" style="background: <?php echo $icon_border_color; ?>; margin: <?php echo (int)$icon_height/2; ?>px auto auto;"></div>
    </ul>
</div>