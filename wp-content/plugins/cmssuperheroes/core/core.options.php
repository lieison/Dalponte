<?php
/*
 * Author : Fox
 * Name : Options control
 * Ver : 1.0.0
 */
global $core_options;

$core_options = new CsCoreControl();

function cs_options($params = array())
{
    global $pagenow, $core_options;

    wp_enqueue_style('core-options');

    $tem_div = array('div','span','div');
    $tem_table = array('tr','th','td');
    /* Find Type */
    if (is_admin() && !empty($params['id']) && isset($core_options)) {
        /* Taxonomys */
        if($pagenow == 'edit-tags.php'){
            global $tag;

            $t_id = $tag->term_id;
            $cat_meta = get_option("category_$t_id");
            // get value
            if(!empty($cat_meta[$params['id']])){
                $params['value'] = $cat_meta[$params['id']];
            }
            // render id
            $params['id'] = "Cat_meta[".$params['id']."]";

            $core_options->taxonomy($params);
        }
        /* Post or Page */
        elseif ($pagenow=='post-new.php' || $pagenow=='post.php'){
            global $post;
            // render id
            $params['id'] = "cs_".$params['id'];
            // get value
            if(get_post_meta($post->ID, $params['id'], true) != ''){
                $params['value'] = get_post_meta($post->ID, $params['id'], true);
            } else {
                $params['value'] = null;
            }

            $core_options->metabox($params);
        }
        /* Admin */
        elseif ($pagenow == 'admin.php'){
            if(get_option($params['id']) != ''){
                $params['value'] = get_option($params['id']);
            }
            $core_options->admin($params);
        }
        /* Template */
        elseif ($pagenow == 'themes.php'){
            $core_options->widget($params);
        }
    } else {
        _e('Error', CSCORE_NAME);
    }
    wp_enqueue_script('core-options');
}

class CsCoreControl
{

    function __construct()
    {
        add_action('admin_enqueue_scripts', array(
            $this,
            'Scripts'
        ));
        add_action('save_post', array($this, 'save_meta_boxes'));
    }
    /* script */
    function Scripts()
    {
        wp_enqueue_style('thickbox');
        wp_enqueue_media();
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');

        wp_register_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css', array(), '4.1.0');
        wp_register_style('font-ionicons', get_template_directory_uri().'/css/ionicons.min.css', array(), '1.5.2');
        wp_register_style('jquery-datetimepicker', CSCORE_PLUGIN_URL.'core/assets/css/jquery.datetimepicker.css');
        wp_register_style('jquery-minicolors', CSCORE_PLUGIN_URL . 'core/assets/css/jquery.minicolors.css');
        wp_register_style('core-options', CSCORE_PLUGIN_URL . 'core/assets/css/core.options.css');
        wp_register_style('jquery.nouislider', CSCORE_PLUGIN_URL . 'core/assets/css/jquery.nouislider.css');
        wp_register_style('jquery.nouislider.pips', CSCORE_PLUGIN_URL . 'core/assets/css/jquery.nouislider.pips.css');

        wp_register_script('jquery-datetimepicker', CSCORE_PLUGIN_URL . 'core/assets/js/jquery.datetimepicker.js');
        wp_register_script('jquery-minicolors', CSCORE_PLUGIN_URL . 'core/assets/js/jquery.minicolors.js');
        wp_register_script('media-selector', CSCORE_PLUGIN_URL . 'core/assets/js/media.selector.js');
        wp_register_script('jquery.nouislider', CSCORE_PLUGIN_URL . 'core/assets/js/jquery.nouislider.all.js');
        wp_register_script('icons-class', CSCORE_PLUGIN_URL . 'core/assets/js/icons.class.js');
        wp_register_script('upload', CSCORE_PLUGIN_URL.'core/assets/js/upload.js');
        wp_register_script('core-options', CSCORE_PLUGIN_URL . 'core/assets/js/core.options.js');
    }
    private function renderType($params){
        if(isset($params['type'])){
            switch ($params['type']){
                case 'text':
                    return $this->text($params);
                    break;
                case 'color':
                    return $this->color($params);
                    break;
                case 'switch':
                    return $this->xswitch($params);
                    break;
                case 'icon':
                    return $this->icon($params);
                    break;
                case 'image':
                    $params['field'] = 'single';
                    return $this->images($params);
                    break;
                case 'images':
                    $params['field'] = 'multiple';
                    return $this->images($params);
                    break;
                case 'file':
                    return $this->file($params);
                case 'textarea':
                    return $this->textarea($params);
                    break;
                case 'select':
                    return $this->select($params);
                    break;
                case 'multiple':
                    return $this->multiple($params);
                    break;
                case 'slider':
                    return $this->slider($params);
                    break;
                case 'date':
                    $params['field'] = 'date';
                    return $this->datetime($params);
                    break;
                case 'time':
                    $params['field'] = 'time';
                    return $this->datetime($params);
                    break;
                case 'datetime':
                    $params['field'] = '';
                    return $this->datetime($params);
                    break;
                case 'number':
                    return $this->number($params);
                    break;
                case 'editor':
                    return $this->editor($params);
                    break;
            }
        }
    }
    private function text($params)
    {
        ob_start();
        ?>
        <div class="text-field csfield">
        <?php
        $indent = '';
        if(!empty($params['icon'])){
            $indent = 'text-indent';
            echo '<i class="'.$params['icon'].'"></i>';
        }
        ?>
	    <input type="text"
	    name="<?php echo esc_attr($params['id']); ?>"
		id="<?php echo esc_attr($params['id']); ?>"
		class="xvalue <?php echo $indent; ?>"
		value="<?php if(isset($params['value'])){ echo esc_attr($params['value']);} ?>"
		placeholder="<?php if(isset($params['placeholder'])){ echo esc_attr($params['placeholder']);} ?>" />
        </div>
        <?php
        return ob_get_clean();
    }
    private function textarea($params)
    {
        ob_start();
        ?>
        <div class="area-field csfield">
	    <textarea<?php if(isset($params['rows'])){ echo ' rows="'+$params['rows']+'"'; }if(isset($params['cols'])){ echo ' cols="'+$params['cols']+'"'; } ?>
	    name="<?php echo esc_attr($params['id']); ?>"
		id="<?php echo esc_attr($params['id']); ?>"
		placeholder="<?php if(isset($params['placeholder'])){ echo esc_attr($params['placeholder']);} ?>"><?php if(isset($params['value'])){ echo esc_attr($params['value']);} ?></textarea>
        </div>
        <?php
        return ob_get_clean();
    }
    private function select($params)
    {
        ob_start();
        ?>
        <div class="select-field csfield">
        <select name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>">
        	<?php foreach ($params['options'] as $key => $option): ?>
        		<option value="<?php echo $key; ?>" <?php if(isset($params['value']) && ($params['value'] == $key)){ echo "selected"; } ?>><?php echo esc_attr($option); ?></option>
        	<?php endforeach; ?>
        </select>
        </div>
	    <?php
        return ob_get_clean();
    }
    private function multiple($params){
        ob_start();
        $selected = array();
        if(!empty($params['value'])){
            $selected = explode(',', $params['value']);
        }
        ?>
        <div class="multiple-field">
        <select multiple="multiple">
        	<?php foreach ($params['options'] as $key => $option): ?>
        		<option value="<?php echo $key; ?>" <?php if(in_array($key, $selected)){ echo 'selected="selected"'; } ?>><?php echo esc_attr($option); ?></option>
        	<?php endforeach; ?>
        </select>
    	<input type="hidden" name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>" value="<?php echo implode(",", $selected); ?>"/>
	    </div>
        <?php
        return ob_get_clean();
    }
    private function slider($params){
        wp_enqueue_style('jquery.nouislider.pips');
        wp_enqueue_style('jquery.nouislider');
        wp_enqueue_script('jquery.nouislider');
        $value = '';
        if(isset($params['value'])){
            $value = $params['value'];
        }
        if(!isset($params['max'])){
            $params['max'] = 0;
        }
        if(!isset($params['min'])){
            $params['min'] = 100;
        }
        ob_start();
        ?>
            <div class="slider-field xfield">
                <div class="slider-main">
                    <div class="slider-item" data-start="<?php echo $value; ?>" data-max="<?php echo $params['max']; ?>" data-min="<?php echo $params['min']; ?>"></div>
                    <div class="slider-max">
                        <span class="curent"></span>
                        <span class="unit"><?php if(isset($params['unit'])){ echo $params['unit']; } ?></span>
                    </div>
                </div>
                <input type="hidden"
        	    name="<?php echo esc_attr($params['id']); ?>"
        		id="<?php echo esc_attr($params['id']); ?>"
        		class="xvalue"
        		value="<?php echo $value; ?>"/>
            </div>
            <?php
            return ob_get_clean();
    }
    private function color($params){
        wp_enqueue_style('jquery-minicolors');
        wp_enqueue_script('jquery-minicolors');
        $data = '';
        if(isset($params['rgba']) && $params['rgba']){
            if(!empty($params['value'])){
                $params['value'] = $this->hex2rgb($params['value']);
                $data .= 'data-hex="'.$this->rgb2hex($params['value']).'"';
            }
            $data .= ' data-rgba="true"';
        }
        ob_start();
        ?>
        <div class="color-field csfield" <?php echo $data; ?>>
            <input type="text"
            name="<?php echo esc_attr($params['id']); ?>"
            id="<?php echo esc_attr($params['id']); ?>"
            class="xvalue"
            value="<?php if(isset($params['value'])){ echo esc_attr($params['value']);} ?>"
            placeholder="<?php if(isset($params['placeholder'])){ echo esc_attr($params['placeholder']);} ?>" />
        </div>
        <?php
        return ob_get_clean();
    }
    private function xswitch($params){
        $options = array('on' => 'on', 'off' => 'off');
        /** custom values */
        if(!empty($params['options'])){
            $options = $params['options'];
        }
        /** data follow */
        $data = array(' ');
        if(!empty($params['follow'])){
            $data[] = 'data-follow="'.rawurlencode(json_encode($params['follow'])).'"';
        }
        $data[] = 'data-on="'.$options['on'].'"';
        $data[] = 'data-off="'.$options['off'].'"';
        ob_start();
        ?>
        <div class="switch-field csfield<?php if($params['value'] == $options['on']){ echo ' on'; } else { echo ' off'; } ?>"<?php echo implode(' ', $data); ?>>
            <span></span>
            <input type="hidden" name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>" class="xvalue" value="<?php echo $params['value']; ?>"/>
        </div>
        <?php
        return ob_get_clean();
    }
    private function icon($params){
        add_thickbox();
        wp_enqueue_style('font-awesome');
        wp_enqueue_style('font-ionicons');
        wp_enqueue_script('icons-class');
        ob_start();
        ?>
        <div class="icon-field">
            <input type="text" style="width: 170px;" class="thickbox" alt="#TB_inline?amp;inlineId=field_icon" title=""
            name="<?php echo esc_attr($params['id']); ?>"
            id="<?php echo esc_attr($params['id']); ?>"
            value="<?php if(isset($params['value'])){ echo esc_attr($params['value']);} ?>"
            placeholder="<?php if(isset($params['placeholder'])){ echo esc_attr($params['placeholder']);} ?>" />
            <i class="<?php echo esc_attr($params['value']); ?>"></i>
        </div>
        <?php
        return ob_get_clean();
    }
    private function images($params){
        //render type ( single, multiple )
        wp_enqueue_script('media-selector');
        $selected = array();
        if(!empty($params['value'])){
            $selected = explode(',', $params['value']);
        }
        ob_start();
        ?>
        <div class="images-field clearfix">
            <ul data-type="<?php echo esc_attr($params['field']); ?>">
            <?php
            foreach ($selected as $value):
                $attachment_image = wp_get_attachment_image_src($value,'thumbnail');
                if (count($attachment_image) > 0):?>
                <li class="items" data-id="<?php echo $value; ?>" style="background-image:url(<?php echo esc_url($attachment_image[0]);?>);background-size:cover;">
                    <i class="edit dashicons dashicons-plus-alt" title="<?php _e('Replace Image', CSCORE_NAME); ?>"></i>
                    <i class="remove dashicons dashicons-dismiss" title="<?php _e('Remove Image', CSCORE_NAME); ?>"></i>
                </li>
            <?php endif; endforeach; ?>
            <?php if($params['field'] != 'single'): ?>
                <li class="items" data-id=""><i class="add dashicons dashicons-plus-alt" title="<?php _e('Add Image', CSCORE_NAME); ?>"></i></li>
            <?php elseif(count($selected) == 0): ?>
                <li class="items" data-id=""><i class="add dashicons dashicons-plus-alt" title="<?php _e('Add Image', CSCORE_NAME); ?>"></i></li>
            <?php endif; ?>
            </ul>
            <input type="hidden" name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>" value="<?php echo  implode(",", $selected); ?>"/>
        </div>
        <?php
        return ob_get_clean();
    }
    private function file($params){
        wp_enqueue_script('upload');
        ob_start();
        ?>
        <div class="file-field csfield">
    		<input name="<?php echo esc_attr($params['id']); ?>" class="upload_field" id="<?php echo esc_attr($params['id']); ?>" type="text" value="<?php if(!empty($params['value'])){ echo $params['value'];} ?>" placeholder="<?php echo $params['placeholder']; ?>"/>
    		<input class="cshero_upload_button button button-primary" type="button" value="Browse" />
    		<input data-id="<?php echo esc_attr($params['id']); ?>" class="cshero_clear_button button button-danger" type="button" value="Clear" />
        </div>
        <?php
        return ob_get_clean();
    }
    private function datetime($params){
        wp_enqueue_style('jquery-datetimepicker');
        wp_enqueue_script('jquery-datetimepicker');
        if(empty($params['placeholder']) && !empty($params['format'])){
            $params['placeholder'] = $params['format'];
        }
        ob_start();
        ?>
            <div class="date-field" data-type="<?php echo $params['field']; ?>" data-format="<?php if(!empty($params['format'])){ echo $params['format']; } else { echo 'm/d/Y'; } ?>">
                <?php switch ($params['field']){
                    case 'date':
                        echo '<i class="fa fa-calendar-o"></i>';
                        break;
                    case 'time':
                        echo '<i class="fa fa-clock-o"></i>';
                        break;
                    default:
                        echo '<i class="fa fa-calendar"></i>';
                        break;
                } ?>
                <input type="text" name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>" class="text-indent xvalue" value="<?php if(!empty($params['value'])){ echo $params['value'];} ?>" placeholder="<?php echo $params['placeholder']; ?>"/>
            </div>
            <?php
            return ob_get_clean();
    }
    private function number($params){
        ob_start();
        ?>
        <div class="number-field csfield">
            <div>
                <i class="fa fa-caret-up"></i>
                <i class="fa fa-caret-down"></i>
            </div>
            <input type="text" name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>" class="text-indent xvalue" value="<?php echo $params['value']; ?>"/>
            <?php if(!empty($params['format'])): ?>
            <span class="follow-right"><?php echo esc_attr($params['format']); ?></span>
            <?php endif; ?>
        </div>
        <?php
        return ob_get_clean();
    }
    private function editor($params){
        $content = '';
        if(isset($params['value'])){
            $content = $params['value'];
        }
        ob_start();
        ?>
        <div class="editor-field">
           <?php wp_editor(urldecode($content), $params['id'], array()); ?>
        </div>
        <?php
        return ob_get_clean();
    }
    /** Convert HEX to RGB(A) */
    public function hex2rgb( $hex, $opacity = 1 ) {
        if(strpos('#', $hex)){
            $hex = str_replace("#",null, $hex);
            $color = array();
            if(strlen($hex) == 3) {
                $color['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
                $color['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
                $color['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
                $color['a'] = $opacity;
            }
            else if(strlen($hex) == 6) {
                $color['r'] = hexdec(substr($hex, 0, 2));
                $color['g'] = hexdec(substr($hex, 2, 2));
                $color['b'] = hexdec(substr($hex, 4, 2));
                $color['a'] = $opacity;
            }
            if(!empty($color)){
                return 'rgba('.implode(',', $color).')';
            } else {
                return  false;
            }
        } else {
            return $hex;
        }
    }
    /** Convert RGB(A) to HEX */
    public function rgb2hex( $rgba ) {
        $rgba = trim(str_replace(' ', '', $rgba));
        if (stripos($rgba, 'rgba') !== false) {
            $res = sscanf($rgba, "rgba(%d, %d, %d, %f)");
        }
        else {
            $res = sscanf($rgba, "rgb(%d, %d, %d)");
            $res[] = 1;
        }
        $res = array_combine(array('r', 'g', 'b', 'a'), $res);
        if($res){
            if($res['r'] != null && $res['g'] != null && $res['b'] != null){
                return '#'.dechex($res['r']).dechex($res['g']).dechex($res['b']);
            } else {
                return $rgba;
            }
        } else {
            return false;
        }

    }
    /* Template */
    public function metabox($params){
        ob_start();
        ?>
		<div id="cs_metabox_field_<?php echo $params['id']; ?>" class="cs_metabox_field">
		  <?php if(isset($params['label'])): ?>
		    <label class="field-title" for="<?php echo $params['id']; ?>"><?php echo $params['label']; ?></label>
	      <?php endif; ?>
	      <div class="field<?php if(isset($params['class'])){ echo ' class="'.$params['class'].'"'; } ?>">
	          <?php echo $this->renderType($params); ?>
	      </div>
	      <?php if(isset($params['desc'])): ?>
	      <p class="field-desc"><?php echo esc_attr($params['desc']); ?></p>
	      <?php endif; ?>
		</div>
        <?php
        echo ob_get_clean();
    }
    public function taxonomy($params){
        ob_start();
        ?>
        <tr class="form-field">
        	<th scope="row" valign="top">
        	   <label class="field-title" for="<?php echo $params['id']; ?>"><?php if(isset($params['label'])){ echo $params['label'];} ?></label>
        	</th>
        	<td<?php if(isset($params['class'])){ echo ' class="'.$params['class'].'"'; } ?>>
               <?php echo $this->renderType($params); ?>
               <br />
        	   <span class="description"><?php if(isset($params['desc'])){ echo esc_attr($params['desc']);} ?></span>
        	</td>
        </tr>
        <?php
        echo ob_get_clean();
    }
    public function template($params){

    }
    public function admin($params){
        ob_start();
        $title_layout = '';
        $content_layout = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
        if(!empty($params['label'])){
            $title_layout = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
            $content_layout = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
        }
        ?>
        <div id="xfield_<?php echo $params['id']; ?>" class="clearfix">
            <?php if($title_layout != ''): ?>
            <div class="<?php echo $title_layout; ?>">
                <label class="field-title" for="<?php echo $params['id']; ?>"><?php if(isset($params['label'])){ echo $params['label'];} ?></label>
            </div>
            <?php endif; ?>
            <div class="<?php echo $content_layout; ?>">
                <?php echo $this->renderType($params); ?>
                <span class="description"><?php if(isset($params['desc'])){ echo esc_attr($params['desc']);} ?></span>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
    public function widget($params){

    }
    /* Save Meta */
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
}