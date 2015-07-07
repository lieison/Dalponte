<?php
/* --------------------------------------------------------------------- */
/* Shortcode Lstest Twitter */
/* --------------------------------------------------------------------- */
add_shortcode('cs-latest-twitter', 'cs_latest_twitter_render');

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
    $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return $connection;
}

function cs_latest_twitter_render($instance) {
    extract(shortcode_atts(array(
                'twittertitle' => '',
                'heading_size'=>'h4',
                'title_color'=>'',
                'consumerkey' => '2Jd4h7mTLRi7XHlWMpX4w',
                'consumersecret' => 'M3n1cMi3HPSmpKUJNgdPFmzjlDkXIDRTf1oHZIkM',
                'accesstoken' => '1406608410-6TbCsgWzjqWD2aagTslnPd4ShxbWP9ZoFyXbiEN',
                'accesstokensecret' => 'bnd86DE8Rm8A93MlwnylOGlWc8dvmQHrjzQT8BaI',
                'tweetstoshow' => '3',
                'showavatar' => 'Yes',
                'excludereplies' => 'true',
                'transition' => 'vertical',
                'extra_class' => '',
                'username' => 'realjoomlaman',
                'auto' => 'true',
                'pause' => '1',
                'touch' => 'false',
                'tweetscroll' => '4000',
                'timeout' => '4000',
                'showcontrol' => 'false'
                    ), $instance));

    $title_style = array();
    if($title_color){
        $title_style[] = "color:$title_color;";
    }
    $title_style = cshero_build_style($title_style);

    $output = array();

    wp_enqueue_script('jm-bxslider');
    wp_enqueue_script('bxslider');
    $id_widget=md5(rand(1,100));
    $output[] = '<div id="cs-latest-twitter'.$id_widget.'" class="cs-latest-twitter '.$extra_class. ' '.$transition .'">';
    $output[] = '<div class="cs-header"><'.$heading_size.' '.$title_style.'>'.$twittertitle.'</'.$heading_size.'></div>';
    if (empty($consumerkey) || empty($consumersecret) || empty($accesstoken) || empty($accesstokensecret) || empty($username)) {
            return '<strong>Please fill all widget settings!</strong>';

    }

        if (!require_once(TEMPLATEPATH . '/framework/includes/twitteroauth/twitteroauth.php')) {
            return '<strong>Couldn\'t find twitteroauth.php!</strong>';

        }

    $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
    $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $username . "&count=".$tweetstoshow."&exclude_replies=" . $excludereplies) or die('Couldn\'t retrieve tweets! Wrong username?');

    if (!empty($tweets->errors)) {
        if ($tweets->errors[0]->message == 'Invalid or expired token') {
            return '<strong>' . $tweets->errors[0]->message . '!</strong><br />You\'ll need to regenerate it <a href="dev.twitter.com/apps" target="_blank">here</a>!';
        } else {
            return '<strong>' . $tweets->errors[0]->message . '</strong>';
        }
    }

    $output[] = '<!-- twitter cache has been updated! -->';
    $minslide=($transition=='vertical')?$tweetstoshow:'1';
    if (!empty($tweets)) {
        $output[] = '
                <div class="tp_recent_tweets slider jm-bxslider" data-moveslides="1" data-mode="'.$transition.'" data-auto="'.esc_attr($auto).'" data-touchenabled="'.$touch.'" data-controls="'.$showcontrol.'" data-pager="false" data-pause="'.$timeout.'" data-infiniteloop="true" data-adaptiveheight="true" data-speed="'.$tweetscroll.'" data-autohover="'.$pause.'" data-slidemargin="5" data-minslides="'.$minslide.'" data-maxslides="'.$minslide.'" data-slideselector="" data-slideWidth="200" data-easing="swing" data-usecss="" data-resize="1">
                    ';
        foreach ($tweets as $tweet) {
            $checkavt=(esc_attr($showavatar) == 'No')?'no-avatar':'';
            $output[] = '<div class="cs-latest-twitter-item '.$checkavt.'">';
            if (!empty($tweet->text)) {
                if (empty($tweet->status_id)) {
                    $tweet->status_id = '';
                }
                if (empty($tweet->created_at)) {
                    $tweet->created_at = '';
                }
                if (!empty($showavatar) && esc_attr($showavatar) == 'Yes') {
                    $output[] =  '<div class="avatar"><img class="avatar avatar-65 photo" src="' . esc_url($tweet->user->profile_image_url) . '" width="65" height="65" alt="Twitter" /></div>';
                }
                else{
                    $output[] =  '<div class="avatar"><i class="fa fa-twitter"></i></div>';
                }
                $output[] =  '<div class="cs-desc">'.tp_convert_links($tweet->text) . '</div><a class="twitter_time" target="_blank" href="http://twitter.com/' . $username . '/statuses/' . $tweet->status_id . '">' . tp_relative_time($tweet->created_at) . '</a>';
            }
            $output[] = '</div>';
        }

        $output[] =  '</div>';
    }
    $output[] = '</div>';
    return implode("\n", $output);
}
if (!function_exists('tp_convert_links')) {

    function tp_convert_links($status, $targetBlank=true, $linkMaxLen=250) {

        // the target
        $target = $targetBlank ? " target=\"_blank\" " : "";

        // convert link to url
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        preg_match($reg_exUrl, $status, $url);
        $status = isset($url[0])?(!empty($url[0])?str_replace($url[0],'<a '.$target.' href="'.esc_url($url[0]).'">'.$url[0].'</a>',$status):$status):$status;

        // return the status
        return $status;
    }

}
//convert dates to readable format
if (!function_exists('tp_relative_time')) {

    function tp_relative_time($a) {
        //get current timestampt
        $b = strtotime("now");
        //get timestamp when tweet created
        $c = strtotime($a);
        //get difference
        $d = $b - $c;
        //calculate different time values
        $minute = 60;
        $hour = $minute * 60;
        $day = $hour * 24;
        $week = $day * 7;

        if (is_numeric($d) && $d > 0) {
            //if less then 3 seconds
            if ($d < 3)
                return "right now";
            //if less then minute
            if ($d < $minute)
                return floor($d) . " seconds ago";
            //if less then 2 minutes
            if ($d < $minute * 2)
                return "about 1 minute ago";
            //if less then hour
            if ($d < $hour)
                return floor($d / $minute) . " minutes ago";
            //if less then 2 hours
            if ($d < $hour * 2)
                return "about 1 hour ago";
            //if less then day
            if ($d < $day)
                return floor($d / $hour) . " hours ago";
            //if more then day, but less then 2 days
            if ($d > $day && $d < $day * 2)
                return "yesterday";
            //if less then year
            if ($d < $day * 365)
                return floor($d / $day) . " days ago";
            //else return more than a year
            return "over a year ago";
        }
    }

}
?>