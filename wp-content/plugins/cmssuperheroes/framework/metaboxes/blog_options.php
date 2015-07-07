<?php global $smof_data;
    $css_repeat = array(''=>'Default', 'no-repeat' => 'No-Repeat', 'repeat' => 'Repeat', 'repeat-x' => 'Repeat-X','repeat-y' => 'Repeat-Y');
    $css_size = array(''=>'Default', 'auto' => 'Auto', 'cover' => 'Cover', 'contain' => 'Contain','initial' => 'Initial');
    $css_attachment = array(''=>'Default', 'scroll' => 'Scroll', 'fixed' => 'Fixed', 'local' => 'Local','initial' => 'Initial','inherit' => 'Inherit');
    $css_position = array(
        ''=>'Default',
        'left top' => 'Left top',
        'left center' => 'Left center',
        'left bottom' => 'Left bottom',
        'right top' => 'Right top',
        'right center' => 'Right center',
        'right bottom' => 'Right bottom',
        'center top' => 'Center top',
        'center center' => 'Center center',
        'center bottom' => 'Center bottom',
        'initial' => 'Initial',
    );
    $border_style = array('none'=>'None','solid'=>'Solid','dotted'=>'Dotted','dashed'=>'Dashed','double'=>'Double','groove'=>'Groove','inset'=>'Inset','outset'=>'Outset','ridge'=>'Ridge');
?>
<div id="cs-blog-metabox" class='cs_metabox'>
    <div id="tab-side-container" class='EasyTabs clearfix'>
    <ul>
       <?php do_action('page_metabox_add_title_tab_before'); ?>
       <li class='cs-tab'><a href="#tabs-general"><i class="dashicons dashicons-admin-settings" title="<?php echo _e('GENERAL',CSCORE_NAME);?>"></i> <span><?php echo _e('GENERAL',CSCORE_NAME);?></span></a></li>
       <li class='cs-tab'><a href="#tabs-body"><i class="dashicons dashicons-welcome-write-blog" title="<?php echo _e('BODY',CSCORE_NAME);?>"></i> <span><?php echo _e('BODY',CSCORE_NAME);?></span></a></li>
       <li class='cs-tab'><a href="#tabs-header"><i class="dashicons dashicons-menu" title="<?php echo _e('HEADER',CSCORE_NAME);?>"></i> <span><?php echo _e('HEADER',CSCORE_NAME);?></span></a></li>
       <li class='cs-tab'><a href="#tabs-menu"><i class="dashicons dashicons-editor-ul" title="<?php echo _e('MENU',CSCORE_NAME);?>"></i> <span><?php echo _e('MENU',CSCORE_NAME);?></span></a></li>
       <li class='cs-tab'><a href="#tabs-page-title"><i class="dashicons dashicons-admin-home" title="<?php echo _e('PAGE TITLE',CSCORE_NAME);?>"></i> <span><?php echo _e('PAGE TITLE',CSCORE_NAME);?></span></a></li>
       <li class='cs-tab'><a href="#tabs-footer"><i class="dashicons dashicons-archive" title="<?php echo _e('FOOTER',CSCORE_NAME);?>"></i> <span><?php echo _e('FOOTER',CSCORE_NAME);?></span></a></li>
       <li class='cs-tab'><a href="#tabs-page-template"><i class="dashicons dashicons-admin-settings" title="<?php echo _e('TEMPLATE',CSCORE_NAME);?>"></i><span><?php echo _e(' TEMPLATE',CSCORE_NAME);?></span></a></li>
       <?php do_action('page_metabox_add_title_tab_after'); ?>
    </ul>
    <div class='cs-tabs-panel clearfix'>
        <?php do_action('page_metabox_add_tab_content_before'); ?>
        <div id="tabs-general" class="tab-content">
            <?php
            do_action('page_metabox_tabs_general_before');
            global $wp_registered_sidebars;
            $widget = array(''=>'Default','none'=>'None');
            foreach ($wp_registered_sidebars as $widget_id){
                $widget[$widget_id['id']] = $widget_id['name'];
            }
            cs_options(array(
                'id' => 'layout',
                'label' => __('Full Width',CSCORE_NAME),
                'type' => 'switch',
                'options' => array('on'=>'1','off'=>'0'),
                'value' => '1',
                'follow' => array('0'=>array('#page_custom_layout'))
            ));
            ?>
            <div id="page_custom_layout">
            <?php
            cs_options(array(
                'id' => 'page_layout',
                'label' => __('Layout',CSCORE_NAME),
                'type' => 'select',
                'options' => array(''=>'Default','full-fixed'=>'Full Fixed','right-fixed'=>'Right-Fixed','left-fixed'=>'Left-Fixed')
            ));
            cs_options(array(
                'id' => 'sidebar_left',
                'label' => __('Sidebar Left',CSCORE_NAME),
                'type' => 'select',
                'options' => $widget
            ));
            cs_options(array(
                'id' => 'sidebar_right',
                'label' => __('Sidebar Right',CSCORE_NAME),
                'type' => 'select',
                'options' => $widget
            ));
            cs_options(array(
                'id' => 'onepage',
                'label' => __('One Page',CSCORE_NAME),
                'type' => 'switch',
                'options' => array('on'=>'1','off'=>'0'),
                'value' => '0',
                'follow' => array('1'=>array('#onepage_setting'))
            ));
            ?>
            <div id="onepage_setting">
            <?php
            cs_options(array(
                'id' => 'onepage_speed',
                'label' => __('Speed',CSCORE_NAME),
                'type' => 'number',
                'value' => '',
            ));
            cs_options(array(
                'id' => 'onepage_offset',
                'label' => __('Offset',CSCORE_NAME),
                'type' => 'number',
                'value' => '',
            ));
            cs_options(array(
                'id' => 'onepage_easing',
                'label' => __('Easing',CSCORE_NAME),
                'type' => 'select',
                'options' => array(
                    'jswing' => 'jswing',
                    'def' => 'def',
                    'easeInQuad' => 'easeInQuad',
                    'easeOutQuad' => 'easeOutQuad',
                    'easeInOutQuad' => 'easeInOutQuad',
                    'easeInCubic' => 'easeInCubic',
                    'easeOutCubic' => 'easeOutCubic',
                    'easeInOutCubic' => 'easeInOutCubic',
                    'easeInQuart' => 'easeInQuart',
                    'easeOutQuart' => 'easeOutQuart',
                    'easeInOutQuart' => 'easeInOutQuart',
                    'easeInQuint' => 'easeInQuint',
                    'easeOutQuint' => 'easeOutQuint',
                    'easeInOutQuint' => 'easeInOutQuint',
                    'easeInSine' => 'easeInSine',
                    'easeOutSine' => 'easeOutSine',
                    'easeInOutSine' => 'easeInOutSine',
                    'easeInExpo' => 'easeInExpo',
                    'easeOutExpo' => 'easeOutExpo',
                    'easeInOutExpo' => 'easeInOutExpo',
                    'easeInCirc' => 'easeInCirc',
                    'easeOutCirc' => 'easeOutCirc',
                    'easeInOutCirc' => 'easeInOutCirc',
                    'easeInElastic' => 'easeInElastic',
                    'easeOutElastic' => 'easeOutElastic',
                    'easeInOutElastic' => 'easeInOutElastic',
                    'easeInBack' => 'easeInBack',
                    'easeOutBack' => 'easeOutBack',
                    'easeInOutBack' => 'easeInOutBack',
                    'easeInBounce' => 'easeInBounce',
                    'easeOutBounce' => 'easeOutBounce',
                    'easeInOutBounce' => 'easeInOutBounce'
                )
            ));
            ?>
            </div>
            </div>
            <?php do_action('page_metabox_tabs_general_after'); ?>
        </div>
        <div id="tabs-body" class="tab-content">
            <?php
            do_action('page_metabox_tabs_body_before');
            cs_options(array(
                'id' => 'body_bg_color',
                'label' => __('Color',CSCORE_NAME),
                'type' => 'color',
                'rgba' => true,
            ));
            cs_options(array(
                'id' => 'body_bg_image',
                'label' => __('Image',CSCORE_NAME),
                'type' => 'images',
                'field' => 'single'
            ));
            cs_options(array(
                'id' => 'body_bg_repeat',
                'label' => __('Repeat',CSCORE_NAME),
                'type' => 'select',
                'options' => $css_repeat
            ));
            cs_options(array(
                'id' => 'body_bg_size',
                'label' => __('Size',CSCORE_NAME),
                'type' => 'select',
                'options' => $css_size
            ));
            cs_options(array(
                'id' => 'body_bg_attachment',
                'label' => __('Attachment',CSCORE_NAME),
                'type' => 'select',
                'options' => $css_attachment
            ));
            cs_options(array(
                'id' => 'body_bg_position',
                'label' => __('Position',CSCORE_NAME),
                'type' => 'select',
                'options' => $css_position
            ));
            cs_options(array(
                'id' => 'body_custom_class',
                'label' => __('Custom Class',CSCORE_NAME),
                'type' => 'text',
                'placeholder' => __('your_class',CSCORE_NAME),
            ));
            do_action('page_metabox_tabs_body_after');
            ?>
        </div>
        <div id="tabs-header" class="tab-content">
            <?php
            do_action('page_metabox_tabs_header_before');
            /* header custom */
            $args = array('posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title', 'post_type' => 'header');
            $header_layout = get_posts($args);
            $custom_header = array();
            foreach ($header_layout as $header) {
                $custom_header["cs-header-".$header->ID] = $header->post_title;
            }
            /* header from option */
            global $header_layout;
            $headers_default = array('' => 'Theme Option');
            if(!empty($header_layout)){
                foreach ($header_layout as $key => $header){
                    $headers_default[$key] = "Header {$key}";
                }
            }
            /* merge header custom + option */
            $headers = array_merge($headers_default,$custom_header);
            cs_options(array(
                'id' => 'page_header',
                'label' => __('Select Header',CSCORE_NAME),
                'type' => 'select',
                'options' => $headers
            ));
            cs_options(array(
                'id' => 'header_setting',
                'label' => __('Header Setting',CSCORE_NAME),
                'type' => 'switch',
                'options'=> array('on'=>'1','off'=>'0'),
                'value' => '0',
                'follow' => array('1'=>array('#header_position','#header_setting','#header_top_setting','#header_content_setting','#sidebar_setting','#menu_position_setting'))
            ));
            ?>
            <div id="header_position" class="tab-content">
            <p class="cs_info"><i class="dashicons dashicons-admin-post"></i><?php echo _e(' Header Setting',CSCORE_NAME);?></p>
            <?php
            cs_options(array(
                'id' => 'header_full_width',
                'label' => 'Header Full Width',
                'type' => 'select',
                'options' => array(
                    ''    => 'Default',
                    '1' => 'Yes',
                    '0' => 'No'
                ),
                
            ));
            cs_options(array(
                'id' => 'header_position',
                'label' => 'Header Left/Right Position',
                'type' => 'select',
                'options' => array(
                    ''    => 'Default',
                    'top' => 'Top',
                    'left' => 'Left',
                    'right' => 'Right'
                ),
                
            ));
            cs_options(array(
                'id' => 'header_top_widgets',
                'label' => __('Header Top',CSCORE_NAME),
                'type' => 'select',
                'options' => array('' => 'Default','1' => 'Show', '0' => 'Hide'),
            ));
            cs_options(array(
                'id' => 'enable_hidden_sidebar',
                'label' => __('Show/Hide Sidebar',CSCORE_NAME),
                'type' => 'select',
                'options' => array('' => 'Default','1' => 'Show', '0' => 'Hide'),
            ));
            cs_options(array(
                'id' => 'header_logo_image',
                'label' => __('Logo',CSCORE_NAME),
                'type' => 'images',
                'field' => 'single'
            ));
            ?>
            </div>
            <div id="header_setting" class="tab-content">
            <p class="cs_info"><i class="dashicons dashicons-admin-post"></i><?php echo _e(' Header Setting:',CSCORE_NAME);?></p>
                <?php
                cs_options(array(
                    'id' => 'header_fixed_menu_color',
                    'label' => __('Menu Font Color',CSCORE_NAME),
                    'type' => 'color',
                    'rgba' => true,
                ));
                cs_options(array(
                    'id' => 'header_fixed_menu_color_hover',
                    'label' => __('Menu Font Hover Color',CSCORE_NAME),
                    'type' => 'color',
                    'rgba' => true,
                ));
                cs_options(array(
                    'id' => 'header_fixed_menu_color_active',
                    'label' => __('Menu Font Active Color',CSCORE_NAME),
                    'type' => 'color',
                    'rgba' => true,
                ));
                
                cs_options(array(
                    'id' => 'header_fixed_top',
                    'label' => __('Enable Header Fixed',CSCORE_NAME),
                    'type' => 'switch',
                    'options'=> array('on'=>'1','off'=>'0'),
                    'value' => '0'
                ));
                ?>
                <div id="header_border_bottom_wrap">
                <?php
                cs_options(array(
                    'id' => 'header_border_bottom',
                    'label' => __('Header Border Bottom',CSCORE_NAME),
                    'type' => 'switch',
                    'options'=> array('on'=>'1','off'=>'0'),
                    'value' => '1',
                    'follow' => array('1'=>array('#cs_metabox_field_cs_header_border_bottom_height','#cs_metabox_field_cs_header_border_bottom_color','#cs_metabox_field_cs_header_border_bottom_style'))
                ));
                cs_options(array(
                    'id' => 'header_border_bottom_style',
                    'label' => __('Borde Bottom Style',CSCORE_NAME),
                    'type' => 'select',
                    'options'=> $border_style
                ));
                cs_options(array(
                    'id' => 'header_border_bottom_height',
                    'label' => __('Border Bottom Width',CSCORE_NAME),
                    'type' => 'text',
                    'placeholder'=> '1px'
                ));
                cs_options(array(
                    'id' => 'header_border_bottom_color',
                    'label' => __('Border Bottom Color',CSCORE_NAME),
                    'type' => 'color',
                    'rgba' => true,
                ));
                ?>
                </div>
                <div id="header_bg_color_wrap">
                <p class="cs_info"><i class="dashicons dashicons-format-image"></i><?php echo _e(' Background Setting:',CSCORE_NAME);?></p>
                <?php
                cs_options(array(
                    'id' => 'header_bg_color',
                    'label' => __('Color',CSCORE_NAME),
                    'type' => 'color',
                    'rgba' => true,
                ));
                cs_options(array(
                    'id' => 'header_bg_image',
                    'label' => __('Image',CSCORE_NAME),
                    'type' => 'images',
                    'field' => 'single'
                ));
                cs_options(array(
                    'id' => 'header_bg_repeat',
                    'label' => __('Repeat',CSCORE_NAME),
                    'type' => 'select',
                    'options' => $css_repeat
                ));
                cs_options(array(
                    'id' => 'header_bg_size',
                    'label' => __('Size',CSCORE_NAME),
                    'type' => 'select',
                    'options' => $css_size
                ));
                cs_options(array(
                    'id' => 'header_bg_attachment',
                    'label' => __('Attachment',CSCORE_NAME),
                    'type' => 'select',
                    'options' => $css_attachment
                ));
                cs_options(array(
                    'id' => 'header_bg_position',
                    'label' => __('Position',CSCORE_NAME),
                    'type' => 'select',
                    'options' => $css_position
                ));
                cs_options(array(
                    'id' => 'header_bg_parallax',
                    'label' => __('Parallax Background',CSCORE_NAME),
                    'type' => 'select',
                    'options' => array(''=>'Default','yes'=>'Yes','no'=>'No')
                ));
                ?>
                </div>
            </div>
            <p class="cs_info"><i class="dashicons dashicons-lightbulb"></i><?php echo _e(' Sticky Header',CSCORE_NAME); ?></p>
            <?php
            cs_options(array(
                'id' => 'show_sticky_header',
                'label' => __('Sticky Header',CSCORE_NAME),
                'type' => 'select',
                'options' => array('' => 'Default','1' => 'Show', '0' => 'Hide'),
            ));
            cs_options(array(
                'id' => 'sticky_header_full_width',
                'label' => 'Sticky Header Full Width',
                'type' => 'select',
                'options' => array(
                    ''    => 'Default',
                    '1' => 'Yes',
                    '0' => 'No'
                ),
                
            ));
            do_action('page_metabox_tabs_header_after');
            ?>
        </div>
        <div id="tabs-menu" class="tab-content">
            <?php
            do_action('page_metabox_tabs_menu_before');
            cs_options(array(
                'id' => 'nav_height',
                'label' => __('Main Nav Height',CSCORE_NAME),
                'type' => 'text',
                'placeholder' => __('100px',CSCORE_NAME),
            ));
            cs_options(array(
                'id' => 'menu_item_button',
                'label' => __('Make menu item as button',CSCORE_NAME),
                'type' => 'select',
                'options' => array('' => 'Default','1' => 'Yes', '0' => 'No'),
            ));
            cs_options(array(
                'id' => 'menu_position',
                'label' => __('Menu Position',CSCORE_NAME),
                'type' => 'select',
                'options' => array('' => 'Default','left' => 'Left', 'center' => 'Center', 'right' => 'Right'),
            ));
            ?>

            <p class="cs_info"><i class="dashicons dashicons-megaphone"></i><?php echo _e(' Manage Locations',CSCORE_NAME); ?></p>
            <?php
            $menus = array();
            $menus[''] = 'Default';
            $obj_menus = wp_get_nav_menus();
            foreach ($obj_menus as $obj_menu){
                $menus[$obj_menu->term_id] = $obj_menu->name;
            }
            $navs = get_registered_nav_menus();
            foreach ($navs as $key => $mav){
                cs_options(array(
                    'id' => $key,
                    'label' => $mav,
                    'type' => 'select',
                    'options' => $menus
                ));
            }
            ?>
            <?php do_action('page_metabox_tabs_menu_after'); ?>
        </div>
        <div id="tabs-page-title">
            <?php
            do_action('page_metabox_tabs_page_title_before');
            cs_options(array(
                'id' => 'page_title_setting',
                'label' => __('Custom Setting',CSCORE_NAME),
                'type' => 'switch',
                'options' => array('on'=>'1','off'=>'0'),
                'value' => '0',
                'follow' => array('1'=>array('#page_title'))
            ));
            ?>
            <div id="page_title">
            <p class="cs_info"><i class="dashicons dashicons-format-image"></i><?php echo _e(' Page Title Setting:',CSCORE_NAME);?></p>
            <?php
            cs_options(array(
                'id' => 'page_title_enable',
                'label' => __('Show Page Title',CSCORE_NAME),
                'type' => 'switch',
                'options' => array('on'=>'1','off'=>'0'),
                'value' => '1',
                'follow' => array('1'=>array('#page_title_enable'))
            ));
            ?>
            <div id="page_title_enable">
            <?php
            cs_options(array(
                'id' => 'title_bar_align',
                'label' => __('Title Align',CSCORE_NAME),
                'type' => 'select',
                'options' => array(''=>'Default','left' => 'Left', 'center' => 'Center', 'right' => 'Right'),
                'value' => 'center'
            ));
            cs_options(array(
                'id' => 'title_bar_color',
                'label' => __('Title Color',CSCORE_NAME),
                'type' => 'color',
                'rgba' => true,
            ));
            cs_options(array(
                'id' => 'page_title_custom_size',
                'label' => __('Custom Size',CSCORE_NAME),
                'type' => 'text',
                'placeholder' => __('36px',CSCORE_NAME),
            ));
            cs_options(array(
                'id' => 'page_title_custom_text',
                'label' => __('Custom Text',CSCORE_NAME),
                'type' => 'textarea',
                'placeholder' => __('add custom text for page title',CSCORE_NAME),
            ));
            cs_options(array(
                'id' => 'page_title_custom_subheader_text',
                'label' => __('Subheader Text',CSCORE_NAME),
                'type' => 'textarea',
                'placeholder' => __('add sub text for page title',CSCORE_NAME),
            ));
            cs_options(array(
                'id' => 'page_title_custom_subheader_text_color',
                'label' => __('Subheader Color',CSCORE_NAME),
                'type' => 'color',
                'rgba' => true,
            ));
            ?>
            </div>
            <p class="cs_info"><i class="dashicons dashicons-format-image"></i><?php echo _e(' Background setting:',CSCORE_NAME);?></p>
            <?php
            do_action('page_title_background_metabox_before');
            cs_options(array(
                'id' => 'page_title_background_color',
                'label' => __('Color',CSCORE_NAME),
                'type' => 'color',
                'rgba' => true,
            ));
            cs_options(array(
                'id' => 'page_title_bg',
                'label' => __('Image',CSCORE_NAME),
                'type' => 'images',
                'field' => 'single'
            ));
            do_action('page_title_background_bg_metabox_after');
            cs_options(array(
                'id' => 'page_title_bg_repeat',
                'label' => __('Repeat',CSCORE_NAME),
                'type' => 'select',
                'options' => $css_repeat
            ));
            cs_options(array(
                'id' => 'page_title_bg_size',
                'label' => __('Size',CSCORE_NAME),
                'type' => 'select',
                'options' => $css_size
            ));
            cs_options(array(
                'id' => 'page_title_bg_attachment',
                'label' => __('Attachment',CSCORE_NAME),
                'type' => 'select',
                'options' => $css_attachment
            ));
            cs_options(array(
                'id' => 'page_title_bg_position',
                'label' => __('Position',CSCORE_NAME),
                'type' => 'select',
                'options' => $css_position
            ));
            cs_options(array(
                'id' => 'page_title_bg_parallax',
                'label' => __('Parallax Background',CSCORE_NAME),
                'type' => 'select',
                'options' => array(''=>'Default','1' => 'Yes', '0' => 'No')
            ));
            cs_options(array(
                'id' => 'page_title_padding',
                'label' => __('Padding',CSCORE_NAME),
                'type' => 'text',
                'placeholder' => __('0px 0px 0px 0px',CSCORE_NAME),
            ));
            cs_options(array(
                'id' => 'page_title_margin',
                'label' => __('Margin',CSCORE_NAME),
                'type' => 'text',
                'placeholder' => __('0px 0px 0px 0px',CSCORE_NAME),
            ));
            cs_options(array(
                'id' => 'page_title_class',
                'label' => __('Custom Class',CSCORE_NAME),
                'type' => 'text',
                'placeholder' => 'Your Class'
             ));
            do_action('page_title_background_metabox_after');
            ?>
            <p class="cs_info"><i class="dashicons dashicons-flag"></i><?php echo _e(' Breadcrumb',CSCORE_NAME); ?></p>
            <?php
            cs_options(array(
                'id' => 'breadcrumb',
                'label' => __('Breadcrumbs',CSCORE_NAME),
                'type' => 'select',
                'options' => array('' => 'Default','1' => 'Custom', '0' => 'Hide'),
            ));
            ?>
            <div id="custom_breadcrumb">
            <?php
            cs_options(array(
                'id' => 'breadcrumb_text_align',
                'label' => __('Text Align',CSCORE_NAME),
                'type' => 'select',
                'options' => array(''=>'Default','left'=>'Left','center'=>'Center','right'=>'right'),
            ));
            cs_options(array(
                'id' => 'breadcrumb_color',
                'label' => __('Text Color',CSCORE_NAME),
                'type' => 'color',
                'rgba' => true,
            ));
            cs_options(array(
                'id' => 'breadcrumb_text',
                'label' => __('Custom Text',CSCORE_NAME),
                'type' => 'text'
            ));
            ?>
            </div>
            </div>
            <?php do_action('page_metabox_tabs_page_title_after'); ?>
        </div>
        <div id="tabs-footer" class="tab-content">
            <?php
            do_action('page_metabox_tabs_footer_before');
            cs_options(array(
                'id' => 'footer_top_widgets',
                'label' => __('Footer top widgets',CSCORE_NAME),
                'type' => 'select',
                'options' => array(''=>'Default', '1' => 'Yes', '0' => 'No')
            ));
            cs_options(array(
                'id' => 'footer_top_bg_color',
                'label' => __('Color',CSCORE_NAME),
                'type' => 'color',
                'rgba' => true,
            ));
            cs_options(array(
                'id' => 'footer_top_bg_image',
                'label' => __('Image',CSCORE_NAME),
                'type' => 'images',
                'field' => 'single'
            ));
            cs_options(array(
                'id' => 'footer_top_bg_repeat',
                'label' => __('Repeat',CSCORE_NAME),
                'type' => 'select',
                'options' => $css_repeat
            ));
            cs_options(array(
                'id' => 'footer_top_bg_size',
                'label' => __('Size',CSCORE_NAME),
                'type' => 'select',
                'options' => $css_size
            ));
            cs_options(array(
                'id' => 'footer_top_bg_attachment',
                'label' => __('Attachment',CSCORE_NAME),
                'type' => 'select',
                'options' => $css_attachment
            ));
            cs_options(array(
                'id' => 'footer_top_bg_position',
                'label' => __('Position',CSCORE_NAME),
                'type' => 'select',
                'options' => $css_position
            ));
            cs_options(array(
                'id' => 'footer_top_bg_parallax',
                'label' => __('Parallax',CSCORE_NAME),
                'type' => 'select',
                'options' => array(''=>'Default', '1' => 'Yes', '0' => 'No')
            ));
            ?>
            <p class="cs_info"><i class="dashicons dashicons-menu"></i><?php echo _e(' Footer Bottom',CSCORE_NAME); ?></p>
            <?php
            cs_options(array(
                'id' => 'footer_bottom_enable',
                'label' => __('Enable',CSCORE_NAME),
                'type' => 'select',
                'options' => array(''=>'Default', '1' => 'Yes', '0' => 'No')
            ));
            ?>
            <?php do_action('page_metabox_tabs_footer_after'); ?>
        </div>
        <div id="tabs-page-template" class="tab-content">
            <?php
            do_action('page_metabox_tabs_template_before');
            $cat_options = array();
            $categories = get_categories();
            foreach($categories as $category){
                $cat_options[$category->term_id] = $category->name;
            }
            $portfolio_options = array();
            $portfolio_categories = get_terms('portfolio_category');
            foreach($portfolio_categories as $category){
                $portfolio_options[$category->term_id] = $category->name;
            }
            cs_options(array(
                'id' => 'page_category',
                'label' => __('Select Categories',CSCORE_NAME),
                'type' => 'multiple',
                'options' => $cat_options
            ));
            cs_options(array(
                'id' => 'portfolio_category',
                'label' => __('Select Portfolio Categories',CSCORE_NAME),
                'type' => 'multiple',
                'options' => $portfolio_options
            ));
            cs_options(array(
                'id' => 'page_limit',
                'label' => __('Posts Per Page',CSCORE_NAME),
                'type' => 'number',
                'value' => 5
            ));
            cs_options(array(
                'id' => 'page_masonry_columns',
                'label' => __('Select Columns',CSCORE_NAME),
                'type' => 'select',
                'value' => '3',
                'options' => array('1' => '1','2' => '2', '3' => '3','4' => '4','6'=>'6')
            ));
            
            cs_options(array(
                'id' => 'page_masonry_loadmore',
                'label' => __('Show LoadMore',CSCORE_NAME),
                'type' => 'switch',
                'options' => array('on'=>'yes','off'=>'no'),
                'value' => 'no'
            ));
            ?>
            <p class="cs_info"><i class="dashicons dashicons-menu"></i><?php echo _e(' Masonry Template Setting',CSCORE_NAME); ?></p>
            <?php
            cs_options(array(
                'id' => 'page_masonry_filter',
                'label' => __('Show Filter',CSCORE_NAME),
                'type' => 'switch',
                'options' => array('on'=>'yes','off'=>'no'),
                'value' => 'yes'
            ));
            ?>
            <?php do_action('page_metabox_tabs_template_after'); ?>
        </div>
        <?php do_action('page_metabox_add_tab_content_after'); ?>
    </div>
    </div>
</div>