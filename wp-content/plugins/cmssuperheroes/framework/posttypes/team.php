<?php
#-----------------------------------------------------------------#
# Create admin team section
#-----------------------------------------------------------------#
function cs_add_post_type_team() {
    $team_labels = array(
        'name' => __('Team', 'taxonomy general name', CSCORE_NAME),
        'singular_name' => __('Team Item', CSCORE_NAME),
        'search_items' => __('Search Team Items', CSCORE_NAME),
        'all_items' => __('Team', CSCORE_NAME),
        'parent_item' => __('Parent Team Item', CSCORE_NAME),
        'edit_item' => __('Edit Team Item', CSCORE_NAME),
        'update_item' => __('Update Team Item', CSCORE_NAME),
        'add_new_item' => __('Add New Team Item', CSCORE_NAME),
        'not_found' => __('No team found', CSCORE_NAME)
    );
    $options = get_option('cshero');
    $custom_slug = null;
    if (!empty($options['team_rewrite_slug']))
        $custom_slug = $options['team_rewrite_slug'];
    $args = array(
        'labels' => $team_labels,
        'rewrite' => array('slug' => $custom_slug, 'with_front' => false),
        'singular_label' => __('Project', CSCORE_NAME),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'hierarchical' => false,
        'menu_position' => 9,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail', 'comments')
    );
    register_post_type('team', $args);
    register_taxonomy("team_category", array("team"), array("hierarchical" => true, "label" => __('Team Categories', CSCORE_NAME), 'query_var' => true, 'rewrite' => true));
}
add_action('init', 'cs_add_post_type_team');
function save_cs_team() {
    global $post;
    if (isset($_POST) && isset($post)) {
        update_post_meta($post->ID, "team_position", isset($_POST["team_position"]) ? $_POST["team_position"] : '');
        update_post_meta($post->ID, "team_qualification", isset($_POST["team_qualification"]) ? $_POST["team_qualification"] : '');
        update_post_meta($post->ID, "team_experience", isset($_POST["team_experience"]) ? $_POST["team_experience"] : '');
        update_post_meta($post->ID, "team_contact_info", isset($_POST["team_contact_info"]) ? $_POST["team_contact_info"] : '');
        update_post_meta($post->ID, "team_email", isset($_POST["team_email"]) ? $_POST["team_email"] : '');
        update_post_meta($post->ID, "team_facebook", isset($_POST["team_facebook"]) ? $_POST["team_facebook"] : '');
        update_post_meta($post->ID, "team_twitter", isset($_POST["team_twitter"]) ? $_POST["team_twitter"] : '');
        update_post_meta($post->ID, "team_google_plus", isset($_POST["team_google_plus"]) ? $_POST["team_google_plus"] : '');
        update_post_meta($post->ID, "team_dribbble", isset($_POST["team_dribbble"]) ? $_POST["team_dribbble"] : '');
        update_post_meta($post->ID, "team_youtube", isset($_POST["team_youtube"]) ? $_POST["team_youtube"] : '');
        update_post_meta($post->ID, "team_rss", isset($_POST["team_rss"]) ? $_POST["team_rss"] : '');
        update_post_meta($post->ID, "team_flickr", isset($_POST["team_flickr"]) ? $_POST["team_flickr"] : '');
        update_post_meta($post->ID, "team_linkedin", isset($_POST["team_linkedin"]) ? $_POST["team_linkedin"] : '');
        update_post_meta($post->ID, "team_vimeo", isset($_POST["team_vimeo"]) ? $_POST["team_vimeo"] : '');
        update_post_meta($post->ID, "team_tumblr", isset($_POST["team_tumblr"]) ? $_POST["team_tumblr"] : '');
        update_post_meta($post->ID, "team_pinterest", isset($_POST["team_pinterest"]) ? $_POST["team_pinterest"] : '');
        update_post_meta($post->ID, "team_sky", isset($_POST["team_sky"]) ? $_POST["team_sky"] : '');
        update_post_meta($post->ID, "team_github", isset($_POST["team_github"]) ? $_POST["team_github"] : '');
        update_post_meta($post->ID, "team_instagram", isset($_POST["team_instagram"]) ? $_POST["team_instagram"] : '');
    }
}
add_action('save_post', 'save_cs_team');
function admin_cs_team_init() {
    add_meta_box("team-option-meta", "Options", "cs_team_option", "team", "side", "low");
}
function cs_team_option() {
    global $post;
    $custom = get_post_custom($post->ID);
    $team_position = isset($custom["team_position"][0]) ? $custom["team_position"][0] : '';
    $team_qualification = isset($custom["team_qualification"][0]) ? $custom["team_qualification"][0] : '';
    $team_experience = isset($custom["team_experience"][0]) ? $custom["team_experience"][0] : '';
    $team_contact_info = isset($custom["team_contact_info"][0]) ? $custom["team_contact_info"][0] : '';
    $team_email = isset($custom["team_email"][0]) ? $custom["team_email"][0] : '';
    $team_facebook = isset($custom["team_facebook"][0]) ? $custom["team_facebook"][0] : '';
    $team_twitter = isset($custom["team_twitter"][0]) ? $custom["team_twitter"][0] : '';
    $team_google_plus = isset($custom["team_google_plus"][0]) ? $custom["team_google_plus"][0] : '';
    $team_dribbble = isset($custom["team_dribbble"][0]) ? $custom["team_dribbble"][0] : '';
    $team_youtube = isset($custom["team_youtube"][0]) ? $custom["team_youtube"][0] : '';
    $team_rss = isset($custom["team_rss"][0]) ? $custom["team_rss"][0] : '';
    $team_delicious = isset($custom["team_delicious"][0]) ? $custom["team_delicious"][0] : '';
    $team_flickr = isset($custom["team_flickr"][0]) ? $custom["team_flickr"][0] : '';
    $team_forrst = isset($custom["team_forrst"][0]) ? $custom["team_forrst"][0] : '';
    $team_linkedin = isset($custom["team_linkedin"][0]) ? $custom["team_linkedin"][0] : '';
    $team_vimeo = isset($custom["team_vimeo"][0]) ? $custom["team_vimeo"][0] : '';
    $team_tumblr = isset($custom["team_tumblr"][0]) ? $custom["team_tumblr"][0] : '';
    $team_pinterest = isset($custom["team_pinterest"][0]) ? $custom["team_pinterest"][0] : '';
    $team_sky = isset($custom["team_sky"][0]) ? $custom["team_sky"][0] : '';
    $team_github = isset($custom["team_github"][0]) ? $custom["team_github"][0] : '';
    $team_instagram = isset($custom["team_instagram"][0]) ? $custom["team_instagram"][0] : '';
    $team_behance = isset($custom["team_behance"][0]) ? $custom["team_behance"][0] : '';
    ?>
    <div>
        <div><label for="team_position">Team Position</label></div>
        <textarea name="team_position" /><?php echo $team_position; ?></textarea>
    </div>
    <div>
        <div><label for="team_qualification">Team Qualification</label></div>
        <textarea name="team_qualification" /><?php echo $team_qualification; ?></textarea>
    </div>
    <div>
        <div><label for="team_experience">Team Experience</label></div>
        <textarea name="team_experience" /><?php echo $team_experience; ?></textarea>
    </div>
    <div>
        <div><label for="team_contact_info">Team Contact Info</label></div>
        <textarea name="team_contact_info" /><?php echo $team_contact_info; ?></textarea>
    </div>
    <div>
        <div><label for="team_email">E-mail</label></div>
        <input name="team_email" value="<?php echo $team_email; ?>" />
    </div>
    <div>
        <div><label for="team_facebook">Facebook</label></div>
        <input name="team_facebook" value="<?php echo $team_facebook; ?>" />
    </div>
    <div>
        <div><label for="team_twitter">Twitter</label></div>
        <input name="team_twitter" value="<?php echo $team_twitter; ?>" />
    </div>
    <div>
        <div><label for="team_google_plus">Google+</label></div>
        <input name="team_google_plus" value="<?php echo $team_google_plus; ?>" />
    </div>
    <div>
        <div><label for="team_dribbble">Dribbble</label></div>
        <input name="team_dribbble" value="<?php echo $team_dribbble; ?>" />
    </div>
    <div>
        <div><label for="team_youtube">YouTube</label></div>
        <input name="team_youtube" value="<?php echo $team_youtube; ?>" />
    </div>
    <div>
        <div><label for="team_rss">Rss</label></div>
        <input name="team_rss" value="<?php echo $team_rss; ?>" />
    </div>
    <div>
        <div><label for="team_flickr">Flickr</label></div>
        <input name="team_flickr" value="<?php echo $team_flickr; ?>" />
    </div>
    <div>
        <div><label for="team_linkedin">Linkedin</label></div>
        <input name="team_linkedin" value="<?php echo $team_linkedin; ?>" />
    </div>
    <div>
        <div><label for="team_vimeo">Vimeo</label></div>
        <input name="team_vimeo" value="<?php echo $team_vimeo; ?>" />
    </div>
    <div>
        <div><label for="team_tumblr">Tumblr</label></div>
        <input name="team_tumblr" value="<?php echo $team_tumblr; ?>" />
    </div>
    <div>
        <div><label for="team_pinterest">Pinterest</label></div>
        <input name="team_pinterest" value="<?php echo $team_pinterest; ?>" />
    </div>
    <div>
        <div><label for="team_sky">Skype</label></div>
        <input name="team_sky" value="<?php echo $team_sky; ?>" />
    </div>
    <div>
        <div><label for="team_github">Github</label></div>
        <input name="team_github" value="<?php echo $team_github; ?>" />
    </div>
    <div>
        <div><label for="team_instagram">Instagram</label></div>
        <input name="team_instagram" value="<?php echo $team_instagram; ?>" />
    </div>
    <?php
}
add_action("admin_init", "admin_cs_team_init");
function cs_team_edit_columns($columns) {
    $columns = array(
        "cb" => "<input type='checkbox' />",
        "title" => "Team Title",
        "description" => "Description",
        "team_categories" => "Categories"
    );
    return $columns;
}
add_filter("manage_edit-team_columns", "cs_team_edit_columns");
function cs_team_custom_columns($column) {
    global $post;
    switch ($column) {
        case "description":
            the_excerpt();
            break;
        case "team_categories":
            echo get_the_term_list($post->ID, 'team_category', '', ', ', '');
            break;
    }
}
add_action("manage_posts_custom_column", "cs_team_custom_columns");