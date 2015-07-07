<?php
global $font_format;
/* Custom Heading element
----------------------------------------------------------- */
vc_map( array(
    'name' => __( 'CS Custom Heading', 'js_composer' ), 
    'base' => 'cs_custom_heading',
    'icon' => 'cs_icon_for_vc',
    'show_settings_on_create' => true,
    'category' => __('CS Hero', CSCORE_NAME),
    'description' => __( 'Add custom heading text with google fonts', 'js_composer' ),
    'params' => array(
        array(
            'type' => 'textarea',
            'heading' => __( 'Text', 'js_composer' ),
            'param_name' => 'text',
            'admin_label' => true,
            'value'=> __( 'This is custom heading element with Google Fonts', 'js_composer' ),
            'description' => __( 'Enter your content. If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'js_composer' ),
        ),
        array(
            'type' => 'font_container',
            'param_name' => 'font_container',
            'value'=>'',
            'settings'=>array(
                'fields'=>array(
                    'tag'=>'h2', // default value h2
                    'text_align',
                    'font_size',
                    'line_height',
                    'color',
                    'font-weight',
                    //'font_style_italic'
                    //'font_style_bold'
                    //'font_family'

                    'tag_description' => __('Select element tag.','js_composer'),
                    'text_align_description' => __('Select text alignment.','js_composer'),
                    'font_size_description' => __('Enter font size. In px,%....','js_composer'),
                    'line_height_description' => __('Enter line height. In px,%....','js_composer'),
                    'color_description' => __('Select color for your element.','js_composer'),
                    //'font_style_description' => __('Put your description here','js_composer'),
                    //'font_family_description' => __('Put your description here','js_composer'),
                ),
            ),
           // 'description' => __( '', 'js_composer' ),
        ),
        array (
                "type" => "dropdown",
                "heading" => __ ( 'Font format', CSCORE_NAME ),
                "param_name" => "font_format",
                "value" => $font_format,
                "description" => __ ( 'Choose font format', CSCORE_NAME ),
            ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Style", CSCORE_NAME),
            "param_name" => "style",
            "value" => array(
                'None' => 'style-none',
                'Title Primary Color'=> 'title-primary-color',
                'Title Secondary Color'=> 'title-secondary-color',
                'Title Top Line'=> 'title-top-line',
                'Title Bottom Line'=> 'title-bottom-line',
                'Title Bottom dotted'=> 'title-bottom-dotted',
                'Title Dotted'=> 'title-dotted',
                'Title Vertical Center Border'=> 'title-vertical-center'
                ),
            "description" => ""
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("Title Top Line width", CSCORE_NAME),
            "param_name" => "title_top_line_width",
            "value" => "",
            "description" => __('in px,%....', CSCORE_NAME)
        ),
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("Title Top Line,dotted top height", CSCORE_NAME),
            "param_name" => "title_top_line_height",
            "value" => "",
            "description" => __('in px,%....', CSCORE_NAME)
        ),  
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Title Top Line,dotted top color", CSCORE_NAME),
            "param_name" => "title_top_line_color",
            "value" => "",
            "description" => ""
        ),  
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("Title Top Line,dotted top margin bottom", CSCORE_NAME),
            "param_name" => "title_top_line_margin_bottom",
            "value" => "",
            "description" => __('in px,%....', CSCORE_NAME)
        ),    
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("Title Bottom Line width", CSCORE_NAME),
            "param_name" => "title_bottom_line_width",
            "value" => "",
            "description" => __('in px,%....', CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("Title Bottom Line,dotted bottom height", CSCORE_NAME),
            "param_name" => "title_bottom_line_height",
            "value" => "",
            "description" => __('in px,%....', CSCORE_NAME)
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Title Bottom Line,dotted bottom color", CSCORE_NAME),
            "param_name" => "title_bottom_line_color",
            "value" => "",
            "description" => ""
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("Title Bottom Line,,dotted bottom margin bottom", CSCORE_NAME),
            "param_name" => "title_bottom_line_margin_bottom",
            "value" => "",
            "description" => __('in px,%....', CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("Title Icon", CSCORE_NAME),
            "param_name" => "title_icon",
            "value" => "",
            "description" => __('You can find icon class at here: <a target="_blank" href="http://fontawesome.io/icons/">"http://fontawesome.io/icons/</a>. For example, fa fa-heart', CSCORE_NAME)
        ),
        array(
            'type' => 'textarea',
            'heading' => __( 'Heading description', 'js_composer' ),
            'param_name' => 'cs_heading_desc',
            'description' => '',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'js_composer' ),
            'param_name' => 'el_class',
            'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
        ),
        array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'js_composer' ),
            'param_name' => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
            'group' => __( 'Design options', 'js_composer' )
        )
    ),
) );

class WPBakeryShortCode_CS_Custom_heading extends WPBakeryShortCode {
    public function getAttributes( $atts ) {
        $text = $google_fonts = $font_container = $el_class = $css = '';
        /**
         * Get default values from VC_MAP.
         **/
        $font_container_field = WPBMap::getParam( 'cs_custom_heading', 'font_container' );
        $el_class_field       = WPBMap::getParam( 'cs_custom_heading', 'el_class' );
        $css_field            = WPBMap::getParam( 'cs_custom_heading', 'css' );
        $text_field           = WPBMap::getParam( 'cs_custom_heading', 'text' );

        extract( shortcode_atts( array(
            'text'           => isset( $text_field['value'] ) ? $text_field['value'] : '',
            'font_container' => isset( $font_container_field['value'] ) ? $font_container_field['value']: '',
            'el_class'       => isset( $el_class_field['value'] ) ? $el_class_field['value'] : '',
            'css'            => isset( $css_field['value'] ) ? $css_field['value'] : ''
        ), $atts ) );

        $el_class                      = $this->getExtraClass( $el_class );
        $font_container_obj            = new Vc_Font_Container();
        $font_container_field_settings = isset( $font_container_field['settings'], $font_container_field['settings']['fields'] ) ? $font_container_field['settings']['fields'] : array();
        $google_fonts_field_settings   = isset( $google_fonts_field['settings'], $google_fonts_field['settings']['fields'] ) ? $google_fonts_field['settings']['fields'] : array();
        $font_container_data           = $font_container_obj->_vc_font_container_parse_attributes( $font_container_field_settings, $font_container );
		
        return array(
            'text'                => $text,
            'google_fonts'        => $google_fonts,
            'font_container'      => $font_container,
            'el_class'            => $el_class,
            'css'                 => $css,
            'font_container_data' => $font_container_data
        );
    }

    public function getStyles( $el_class, $css, $google_fonts_data, $font_container_data, $atts ) {
        $styles = array();
        if ( ! empty( $font_container_data ) && isset( $font_container_data['values'] ) ) {
            foreach ( $font_container_data['values'] as $key => $value ) {
                if ( $key != 'tag' && strlen( $value ) > 0 ) {
                    if ( preg_match( '/description/', $key ) ) {
                        continue;
                    }
                    if ( $key == 'font_size' || $key == 'line_height' ) {
                        $value = preg_replace( '/\s+/', '', $value );
                    }
                    if ( $key == 'font_size' ) {
                        $pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
                        // allowed metrics: http://www.w3schools.com/cssref/css_units.asp
                        $regexr = preg_match( $pattern, $value, $matches );
                        $value  = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
                        $unit   = isset( $matches[2] ) ? $matches[2] : 'px';
                        $value  = $value . $unit;
                    }
                    if ( strlen( $value ) > 0 ) {
                        $styles[] = str_replace( '_', '-', $key ) . ': ' . $value."!important";
                    }
                }
            }
        }
        if ( ! empty( $google_fonts_data ) && isset( $google_fonts_data['values'], $google_fonts_data['values']['font_family'], $google_fonts_data['values']['font_style'] ) ) {
            $google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
            $styles[]            = "font-family:" . $google_fonts_family[0];
            $google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
            $styles[]            = "font-weight:" . $google_fonts_styles[1];
            $styles[]            = "font-style:" . $google_fonts_styles[2];
        }

        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'cs_custom_heading wpb_content_element' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

        return array(
            'css_class' => $css_class,
            'styles'    => $styles
        );
    }
}
?>