<?php
add_shortcode('cshero-cover-boxes', 'cshero_cover_boxes_render');

function cshero_cover_boxes_render($atts, $content = null)
{
    $args = array(
        "title" => "",
        "title_size" => "h2",
        "title_color" => "",
        "title_align" => "",
        "description" => "",
        "item_default" => "1",
        "item_title_size" => "h3",
        "item_title_color" => "",
        "item_description_color" => "",
        "item_link_label" => "",
        "item_link_target" => "_self",
        "image_size" => '',
        "item_image1" => "",
        "item_title1" => "",
        "item_sub_title1" => "",
        "item_description1" => "",
        "item_link1" => "",
        "item_image2" => "",
        "item_title2" => "",
        "item_sub_title2" => "",
        "item_description2" => "",
        "item_link2" => "",
        "item_image3" => "",
        "item_title3" => "",
        "item_sub_title3" => "",
        "item_description3" => "",
        "item_link3" => "",
        "item_image4" => "",
        "item_title4" => "",
        "item_sub_title4" => "",
        "item_description4" => "",
        "item_link4" => "",
        "read_more_button_style" => "",
        "cover_button_type" => "",
        "cover_button_size" => "",
        "extra_class" => ""
    );
    extract(shortcode_atts($args, $atts));
    $unique_id = uniqid().'_'.time();
    $count = 0;
    for($i=1;$i<5;$i++){
        if(${"item_image".$i}!=''){
            $count++;
        }
    }
    wp_enqueue_style('coverbox', CSCORE_PLUGIN_URL . "framework/shortcodes/coverbox/coverbox.css", array(), "1.1.0");
    wp_enqueue_script('coverbox', CSCORE_PLUGIN_URL . "framework/shortcodes/coverbox/cs-coverbox.js", array(), "1.1.0", true);

    $html = "";
    $html .= "<div id='cover_boxes_$unique_id' class='cover_boxes ".$extra_class." cshero-col".$count."' data-active-element='" . $item_default . "'>";
    if($title!=""){
        $title_color = ($title_color!='')?' style="color:'.$title_color.';text-align:'.$title_align.';"':'';
        $html .= "<".$title_size." ".$title_color.">".$title."</".$title_size.">";
    }
    if($description!=''){
        $html .= "<div class='cshero-description' style='text-align:".$title_align."'>".$description."</div>";
    }
    $img_class = '';
    if ( $image_size != 0 ) {
        $img_class = 'img-full-wrap';
    }
    else {
        $img_class = 'img-thumbnail-wrap';
    } 
    $html .= '<ul class="clearfix '.$img_class.'">';
    /*init value*/
    $item_title_color = ($item_title_color!='')?' style="color:'.$item_title_color.';"':'';
    $item_description_color = ($item_description_color!='')?' style="color:'.$item_description_color.';"':'';
    for($i=1;$i<5;$i++){
        /*init value for item*/
        $image = ${"item_image".$i};
        $link = ${"item_link".$i};
        $title = ${"item_title".$i};
        $sub_title = ${"item_sub_title".$i};
        $description = ${"item_description".$i};
        if($image!=''){
            /*end init for item*/
            if (is_numeric($image)) {
                if ( $image_size != 0 ) {
                    $image_src = '<img src="'.wp_get_attachment_url($image).'" alt="'.$title.'">';
                }
                else {
                    //$image_src = wp_get_attachment_image( $image, array(300,300) );
                    $image_src = mr_image_resize( wp_get_attachment_url($image), 400, 400, true, 'c', false );
                    $image_src = '<img src="'.$image_src.'" alt="'.$title.'">';
                }
                
            } else {
                $image_src = $image;
            }
            /*html for each item*/
            $html.='<li';
            if($i==(int)$item_default){
                $html .= ' class="active"';
            }
            $html .=' >';
                $html .= "<div class='box'>";
                    $html .= "<a class='thumb' href='" . $link . "' target='" . $item_link_target . "'>" . $image_src . "</a>";
                    $html .= "<div class='box_content'><div class='heading-item-wrap'><" . $item_title_size . " " . $item_title_color . " class='cover_box_title'>" . $title . "</" . $item_title_size . "><span>".$sub_title."</span></div>";
                        $html .= "<p " . $item_description_color . ">" . $description . "</p>";
                        $button_class = "";
                        $button_class_wrapper_open = "";
                        $button_class_wrapper_close = "";
                        if ($read_more_button_style != "no") {
                            $button_class = "qbutton small";
                        } else {
                            $button_class = "cover_boxes_read_more";
                            $button_class_wrapper_open = "<h5>";
                            $button_class_wrapper_close = "</h5>";
                        }

                        if ($item_link_label != "") {
                            $html .= $button_class_wrapper_open . "<a class='btn " . $cover_button_type . " ". $cover_button_size ." " . $button_class . "' href='" . $link . "' target='" . $item_link_target . "'>" . $item_link_label . "</a>" . $button_class_wrapper_close;
                        }
                    $html .= "</div>";
                $html .= "</div>";
            $html.='</li>';
            /*end html for each item*/
        }
    }
    $html .= "</ul></div>";
    return $html;
}