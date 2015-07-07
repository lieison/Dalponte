<?php
/* --------------------------------------------------------------------- */
/* Shortcode Recent Post */
/* --------------------------------------------------------------------- */
vc_map(array(
    "name" => 'Recent Posts',
    "base" => "cs-shortcode-recent-post",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero',CSCORE_NAME),
    "params" => array(
        array (
                "type" => "textfield",
                "heading" => __ ( 'Heading', CSCORE_NAME ),
                "param_name" => "title",
                "holder" => 'div'
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Heading size", CSCORE_NAME),
            "param_name" => "heading_size",
            "value" => array(
                "Heading 1" => "h1",
                "Heading 2" => "h2",
                "Heading 3" => "h3",
                "Heading 4" => "h4",
                "Heading 5" => "h5",
                "Heading 6" => "h6"
            ),
            "description" => 'Select your heading size for title.'
        ),
        array (
            "type" => "dropdown",
            "class" => "",
            "heading" => __ ( "Heading Align", CSCORE_NAME ),
            "param_name" => "title_align",
            "value" => array (
                "Left" => "text-left",
                "Center" => "text-center",
                "Right" => "text-right"
            ),
            "description" => __("Select align for Title", CSCORE_NAME)
        ),
        array(
            "type" => "colorpicker",
            "heading" => __('Heading Color', CSCORE_NAME),
            "param_name" => "title_color",
        ),
        array (
            "type" => "dropdown",
            "class" => "",
            "heading" => __ ( "Heading Style", CSCORE_NAME ),
            "param_name" => "heading_style",
            "value" => array (
                "Default" => "",
                "Border Bottom" => "border-bottom",
                "Overline" => "overline",
                "Underline" => "underline",
                "Line Through" => "line-through",
                "Dotted Bottom" =>"dotted-bottom"
            ),
            "description" => __("Select heading style", CSCORE_NAME)
        ),
        array (
                "type" => "textfield",
                "heading" => __ ( 'Sub Heading', CSCORE_NAME ),
                "param_name" => "subtitle",
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Sub Heading size", CSCORE_NAME),
            "param_name" => "subtitle_heading_size",
            "value" => array(
                "Default"   => "",
                "Heading 1" => "h1",
                "Heading 2" => "h2",
                "Heading 3" => "h3",
                "Heading 4" => "h4",
                "Heading 5" => "h5",
                "Heading 6" => "h6"
            ),
            "description" => 'Select your heading size for sub title.'
        ),
        array (
                "type" => "textfield",
                "heading" => __ ( 'Description', CSCORE_NAME ),
                "param_name" => "description",
        ),
        array (
                "type" => "",
                "heading" => __ ( 'SOURCE OPTION', CSCORE_NAME ),
                "param_name" => "source_option",
        ),
        array(
            "type" => "pro_taxonomy",
            "taxonomy" => "category",
            "heading" => __("Categories",CSCORE_NAME),
            "param_name" => "category",
            "description" => __("Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.",CSCORE_NAME)
        ),
        array (
            "type" => "dropdown",
            "class" => "",
            "heading" => __ ( "Content Align", CSCORE_NAME ),
            "param_name" => "content_align",
            "value" => array (
                "Left" => "text-left",
                "Center" => "text-center",
                "Right" => "text-right"
            ),
            "description" => __("Select align for content", CSCORE_NAME)
        ),
        array(
            "type" => "colorpicker",
            "heading" => __('Content Color', CSCORE_NAME),
            "param_name" => "content_color",
            "description" => __("Choose color for content", CSCORE_NAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Show Title', CSCORE_NAME),
            "param_name" => "show_title",
            "value" => array('Yes'=>'1','No'=>'0'),
            "description" => __('Show or hide the post title.',CSCORE_NAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Item Heading size", CSCORE_NAME),
            "param_name" => "item_heading_size",
            "value" => array(
                "Default"   => "",
                "Heading 1" => "h1",
                "Heading 2" => "h2",
                "Heading 3" => "h3",
                "Heading 4" => "h4",
                "Heading 5" => "h5",
                "Heading 6" => "h6",
                "DIV" => "div"
            ),
            "description" => 'Select your heading size for each item title.'
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Crop image', CSCORE_NAME),
            "param_name" => "crop_image",
            "value" => array('No'=>'0','Yes'=>'1'),
            "description" => __('Crop or not crop image on your Post.', CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Width image', CSCORE_NAME),
            "param_name" => "width_image",
            "description" => __('Enter the width of image. Default: 300.',CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Height image', CSCORE_NAME),
            "param_name" => "height_image",
            "description" => __('Enter the height of image. Default: 200.',CSCORE_NAME)
        ),

        array(
            "type" => "textfield",
            "heading" => __('Excerpt Length', CSCORE_NAME),
            "param_name" => "excerpt_length",
            "value" => '100',
            "description" => __('The length of the excerpt, number of words to display. Set to "-1" for no excerpt.',CSCORE_NAME)
        ),

        array(
            "type" => "dropdown",
            "heading" => __('Show Category', CSCORE_NAME),
            "param_name" => "show_category",
            "value" => array('Yes'=>'1','No'=>'0'),
            "description" => __('Show or hide the post category.',CSCORE_NAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Show Date', CSCORE_NAME),
            "param_name" => "show_date",
            "value" => array('Yes'=>true,'No'=>false),
            "description" => __('Show or hide the post date.',CSCORE_NAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Date Display Format', CSCORE_NAME),
            "param_name" => "date_type",
            "value" => array('Details Date'=>'details','Relative Time'=>'relative'),
        ),
        array(
            "type" => "textfield",
            "heading" => __('Read More', CSCORE_NAME),
            "param_name" => "read_more",
            'value' => '-1',
            "description" => __('Optional link after post excerpts. Enter desired text for the link or for no link, leave blank or set to \"-1\".', CSCORE_NAME)
        ),
        array(
                "type" => "",
                "heading" => __ ( 'LAYOUT OPTION', CSCORE_NAME ),
                "param_name" => "layout_option",
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Type",CSCORE_NAME),
            "param_name" => "type",
            "value" => array(
                "Masonry" => "masonry",
                "Grid" => "grid"
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Layout",CSCORE_NAME),
            "param_name" => "layout",
            "value" =>cscore_get_files_name_array("recentpost"),
            "hover"=>'div'
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "std" => '3',
            "heading" => __("Columns",CSCORE_NAME),
            "param_name" => "columns",
            "value" => array(
                "1 columns" => "1",
                "2 columns" => "2",
                "3 columns" => "3",
                "4 columns" => "4",
                "6 columns" => "6"
            ),
        ),
        array (
                "type" => "",
                "heading" => __ ( 'SORT OPTION', CSCORE_NAME ),
                "param_name" => "sort_option",
        ),

        array(
            "type" => "textfield",
            "heading" => __('Number of posts to show per page', CSCORE_NAME),
            "param_name" => "posts_per_page",
            'value' => '',
            "description" => __('The number of posts to display on each page. Set to "-1" for display all posts on the page.', CSCORE_NAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Order by', CSCORE_NAME),
            "param_name" => "orderby",
            "value" => array( "Title" => "title","Popular"=>"comment_count", "Date" => "date", "ID" => "ID"),
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Order', CSCORE_NAME),
            "param_name" => "order",
            "value" => array("ASC" => "asc", "DESC" => "desc"),
            "description" => __('Order ("Asc", "Desc").')
        ),
        array (
                "type" => "",
                "heading" => __ ( 'EXTRA OPTION', CSCORE_NAME ),
                "param_name" => "extra_option",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Box shadow", CSCORE_NAME),
            "param_name" => "box_shadow",
            "value" => "",
            "description" => __("Box shadow style for each item. Default is : 5px 3px 4px #eee", CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __("View All Text", CSCORE_NAME),
            "param_name" => "view_all",
        ),
        array(
            "type" => "textfield",
            "heading" => __("View All Url", CSCORE_NAME),
            "param_name" => "view_all_url",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", CSCORE_NAME),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", CSCORE_NAME)
        )
    )
));
?>