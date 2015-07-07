<?php
class CsheroFrameworkMetaboxes {
	public function __construct(){
		global $smof_data;
		$this->data = $smof_data;
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}
	function admin_script_loader() {
		global $pagenow;
		if (is_admin() && ($pagenow=='post-new.php' || $pagenow=='post.php')) {
			wp_enqueue_style('cs-metabox', CSCORE_PLUGIN_URL.'framework/assets/css/metabox.css');
			wp_enqueue_style('tabs', CSCORE_PLUGIN_URL.'framework/assets/css/tabs.css');
			wp_enqueue_media();
			wp_enqueue_script('jquery-easytabs', CSCORE_PLUGIN_URL.'framework/assets/js/jquery.easytabs.min.js');
			wp_enqueue_script('meta-box', CSCORE_PLUGIN_URL.'framework/assets/js/meta.box.js');
		}
	}
	public function add_meta_boxes()
	{
	    global $smof_data;
		$post_types = get_post_types( array( 'public' => true ) );

		$this->add_meta_box('post_options', __('Page Options',CSCORE_NAME), 'page');
		$this->add_meta_box('post_video', __('Video Settings',CSCORE_NAME), 'post');
		$this->add_meta_box('post_audio', __('Audio Settings',CSCORE_NAME), 'post');
		$this->add_meta_box('post_quote', __('Quote Settings',CSCORE_NAME), 'post');
		$this->add_meta_box('post_link', __('Link Settings',CSCORE_NAME), 'post');
		if(get_option('cms_superheroes_client')){
		  $this->add_meta_box('client', __('Client Url',CSCORE_NAME), 'myclients');
		}
		if(get_option('cms_superheroes_portfolio')){
		  $this->add_meta_box('portfolio', __('Portfolio Setting',CSCORE_NAME), 'portfolio');
		}
		if(get_option('cms_superheroes_restaurant')){
		  $this->add_meta_box('restaurantmenu', __('Menu Setting',CSCORE_NAME), 'restaurantmenu');
		}
		if(get_option('cms_superheroes_events')){
		  $this->add_meta_box('events', __('Date Time',CSCORE_NAME), 'events');
		}
		if(get_option('cms_superheroes_pricing')){
		    $this->add_meta_box('pricing', __('Pricing Video',CSCORE_NAME), 'pricing');
		}
	}
	public function save_meta_boxes($post_id)
	{
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		foreach($_POST as $key => $value) {
			if(strstr($key, 'cs_')) {
				update_post_meta($post_id, $key, $value);
			}
		}
	}
	public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default')
	{
		add_meta_box(
		'cs_' . $id,
		$label,
		array($this, $id),
		$post_type,
		$context,
		$priority
		);
	}
	/* post */
	public function post_options()
	{
		include 'metaboxes/blog_options.php';
	}
	public function post_video()
	{
		include 'metaboxes/post_video.php';
	}
	public function post_audio()
	{
		include 'metaboxes/post_audio.php';
	}
	public function post_quote()
	{
		include 'metaboxes/post_quote.php';
	}
	public function post_link()
	{
		include 'metaboxes/post_link.php';
	}
	/* team */
	public function team(){
		include 'metaboxes/team.php';
	}
	/* client */
	public function client(){
		include 'metaboxes/client.php';
	}
	public function portfolio(){
		include 'metaboxes/portfolio.php';
	}
	public function restaurantmenu(){
	    include 'metaboxes/restaurantmenu.php';
	}
	public function events(){
	    include_once 'metaboxes/events.php';
	}
	public function pricing(){
	    include_once 'metaboxes/pricing.php';
	}
}
$metaboxes = new CsheroFrameworkMetaboxes;