<?php
global $up_event;
add_shortcode('cs-up-event', 'cs_shortcode_up_event_render');
function cs_shortcode_up_event_render($params)
{
    global $wpdb, $up_event;

    $up_event = $params;
    extract(shortcode_atts(array(
        'title' => '',
        'heading_size' =>'h2',
        'title_align' =>'',
        'title_color' =>'',
        'heading_style' =>'',
        'subtitle' => '',
        'subtitle_heading_size'=>'h4',
        'description' => '',

        'item_heading_size'=>'h3',

        'page_start' => '0',
        'page_more' => '5',
        ), $params));

    wp_enqueue_style('coursecarousel', CSCORE_PLUGIN_URL.'framework/shortcodes/upcomingevents/css/upcomingevents.css', array(), '1.0.0');
    wp_register_script('upcoming.events', CSCORE_PLUGIN_URL.'framework/shortcodes/upcomingevents/js/upcoming.events.js');
    wp_localize_script('upcoming.events', 'upevent', array('ajaxurl'=>admin_url('admin-ajax.php')));
    wp_enqueue_script('upcoming.events');

    $querystr = "
        SELECT e.*,p.post_title, p.post_content
        FROM {$wpdb->prefix}posts as p,{$wpdb->prefix}events as e
        WHERE p.ID = e.post_id
        AND e.start_date > NOW()
        AND p.post_status = 'publish'
        ORDER BY e.start_date ASC
        LIMIT {$page_start},{$page_more}
    ";
    $results = $wpdb->get_results($querystr, OBJECT);

    ob_start();

    ?>
    <?php if ($title != "" || $description != "") { ?>
    <div class="cs-header <?php echo $heading_style;?>">
        <?php if ($title != "") { ?>
            <<?php echo $heading_size; ?> class="cs-title <?php echo $title_align;?>" <?php if($title_color){ echo 'style="color:'.$title_color.';"'; }; ?>><span class="line"><?php echo esc_attr($title); ?></span></<?php echo $heading_size; ?>>
        <?php } ?>
        <?php if ($subtitle !=""){ ?>
            <<?php echo $subtitle_heading_size; ?> class="cs-subtitle <?php echo $title_align;?>"><?php echo esc_attr($subtitle); ?></<?php echo $subtitle_heading_size; ?>>
        <?php }?>
        <?php if ($description != "") { ?>
            <p class="cs-desc <?php echo $title_align;?>"><?php echo esc_attr($description); ?></p>
        <?php } ?>
    </div>
    <?php } ?>
    <div class="up-event">
        <div class="up-event-main">
            <?php echo cs_shortcode_up_event_loadmore_render($results); ?>
        </div>
        <div class="event-loadmore"><button id="event-loadmore" type="button" data-start="<?php echo $page_more; ?>" data-more="<?php echo $page_more; ?>"><i></i> <?php _e('LOAD MORE', CSCORE_NAME); ?></button></div>
    </div>
    <?php
	return ob_get_clean();
}

add_action('wp_ajax_up_events_intialize', 'cs_ajax_up_events_intialize');

function cs_ajax_up_events_intialize(){
    global $wpdb, $up_event;

    header('Content-type: application/json');

    $start = $_REQUEST['start'];
    $next = $_REQUEST['next'];

    $querystr = "
        SELECT e.*,p.post_title, p.post_content
        FROM {$wpdb->prefix}posts as p,{$wpdb->prefix}events as e
        WHERE p.ID = e.post_id
        AND e.start_date > NOW()
        AND p.post_status = 'publish'
        ORDER BY e.start_date ASC
        LIMIT {$start},{$next}
    ";
    $results = $wpdb->get_results($querystr, OBJECT);
    if(!empty($results)){
        die(json_encode(array(
            'content' => cs_shortcode_up_event_loadmore_render($results),
            'more' => count($results)
        )));
    }
    die(json_encode(array(
        'content' => null,
        'more' => 0
    )));
}

function cs_shortcode_up_event_loadmore_render($results)
{
    global $up_event;
    extract(shortcode_atts(array(
        'crop_image' => '',
        'width_image' => '570',
        'height_image' => '219',
        'item_heading_size'=>'h3',
        ), $up_event));

    ob_start();
    if(!empty($results)){
        ?>
        <?php foreach ($results as $item): ?>
        <div class="row cs-event-item">
			<?php
			if(has_post_thumbnail($item->post_id)){
			    $image = array();
			    $image = wp_get_attachment_image_src(get_post_thumbnail_id($item->post_id), 'full', false);
    			$image_resize = '';
    			if(!empty($image[0])){
    			    if($crop_image){
    			        $image_resize = mr_image_resize( $image[0], $width_image, $height_image, true, 'c', false );
    			    } else {
    			        $image_resize = $image[0];
    			    }
    			    echo '<div class="up-event-image col-xs-12 col-sm-12 col-md-6 col-lg-6">';
    			    echo '<img alt="'.$item->post_title.'" src="'.$image_resize.'"/>';
    			    echo '</div>';
    			}
			}
		    ?>
            <div class="up-event-content<?php if(!empty($image_resize)){ echo ' col-xs-12 col-sm-12 col-md-6 col-lg-6'; } else { echo ' col-xs-12 col-sm-12 col-md-12 col-lg-12'; } ?>">
			    <?php
    			    $event_start = get_post_meta($item->post_id, 'cs_start_date', true);
    			    if($event_start){
    			        $event_start = strtotime($event_start);
                        echo '<div class="event-date-time primary-color">';
    			        echo '<span class="date"><i class="fa fa-calendar-o"></i>';
    			        echo date('d M Y', $event_start).'</span>';
    			        echo '<span class="time"><i class="fa fa-clock-o"></i>';
    			        echo date('h:i A', $event_start).'</span>';
                        echo '</div>';
    			    }
			    ?>

                <<?php echo $item_heading_size;?> class="cs-event-title">
                    <a href="<?php echo get_the_permalink($item->post_id); ?>"><?php echo $item->post_title; ?></a>
                </<?php echo $item_heading_size;?>>
			    <?php
                    $event_location_name = get_post_meta($item->post_id, 'cs_event_location_name', true);
                    $event_address = get_post_meta($item->post_id, 'cs_event_address', true);
                    $event_city = get_post_meta($item->post_id, 'cs_event_city', true);
                    if($event_location_name && $event_address && $event_city){
                        $event_state = get_post_meta($item->post_id, 'cs_event_state', true);
                        $event_postcode = get_post_meta($item->post_id, 'cs_event_postcode', true);
                        $event_region = get_post_meta($item->post_id, 'cs_event_region', true);
                        $even_country = get_post_meta($item->post_id, 'cs_even_country', true);
                        echo '<div class="event-where">';
                        echo $event_location_name.', '.$event_address.','.$event_city;
                        if($event_state){ echo ', '.$event_state; }
                        if($event_postcode){ echo ', '.$event_postcode; }
                        if($event_region){ echo ', '.$event_region; }
                        if($even_country){ echo ', '.$even_country; }
                        echo '</div>';
                    }
            	?>
			    <div class="event-readmore"><a class="btn btn-default" href="<?php echo get_the_permalink($item->post_id); ?>"><?php _e('VIEW DETAILS', CSCORE_NAME); ?></a></div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php
    }
    return ob_get_clean();
}