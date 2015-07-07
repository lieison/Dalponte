<?php
/*
 * Taxonomy checkbox list field
 */
function pro_taxonomy_settings_field($settings, $value) {
	$dependency = vc_generate_dependencies_attributes($settings);
	$terms_fields = array();
	$value_arr = $value;

	if (!is_array($value_arr)) {
		$value_arr = array_map('trim', explode(',', $value_arr));
	}

	if (!empty($settings['taxonomy'])) {
		$terms = get_terms($settings['taxonomy'], 'orderby=count&hide_empty=0');

		if ($terms && !is_wp_error($terms)) {
			foreach ($terms as $term) {
				$terms_fields[] = sprintf(
						'<label><input id="%s" class="ww-check-taxonomy %s" type="checkbox" name="%s" value="%s" %s/>%s</label>', $settings['param_name'] . '-' . $term->slug, $settings['param_name'] . ' ' . $settings['type'], $settings['param_name'], $term->term_id, checked(in_array($term->term_id, $value_arr), true, false), $term->name
				);
			}
		}
	}
	$script='<sc'.'ri'.'pt type="text/javascript">
	jQuery(document).ready(function($){
	$(".wpb_el_type_pro_taxonomy .pro_taxonomy").click(
		function(e){
			var $this = $(this),
			$input = $this.parents(".wpb_el_type_pro_taxonomy").find(".pro_taxonomy_field"),
			arr = $input.val().split(",");
			if ( $this.is(":checked") ) {
				arr.push($this.val());
				var emptyKey = arr.indexOf("");
				if ( emptyKey > -1 ) {
					arr.splice(emptyKey, 1);
				}
			} else {
				var foundKey = arr.indexOf($this.val());
				if ( foundKey > -1 ) {
					arr.splice(foundKey, 1);
				}
			}
			$input.val(arr.join(","));
		});
	});
	</script>';
	return '<div class="ww-taxonomy-block">'
			. '<input type="hidden" name="' . $settings['param_name'] . '" class="wpb_vc_param_value wpb-checkboxes ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" value="'.$value.'" ' . $dependency . ' />'
					. '<div class="ww-taxonomy-terms">'
							. implode($terms_fields)
							. '</div>'
									. '</div>'.$script;
}
add_shortcode_param('pro_taxonomy', 'pro_taxonomy_settings_field');
/** 
 * @namespace : select category from posttypes
 * @author : fox
 * @version beta 1.0.0
 * @param array('input','posttype','taxonomy')
 */
function cms_posttype_taxonomy_field($settings, $value) {
    if(empty($settings['input'])){
        $settings['input'] = 'checkbox' ;
    }
    $multiple = (isset($settings['multiple']) && $settings['multiple']) ? ' multiple="multiple"' : '' ;
    ob_start();
    ?>
    <div class="cmstaxonomy_param_block" data-ajax="<?php echo admin_url('admin-ajax.php') ?>" data-input="<?php echo $settings['input']; ?>" data-multiple="<?php echo (isset($settings['multiple']) && $settings['multiple']) ? '1' : '0' ; ?>" data-hide="<?php echo (isset($settings['hideempty']) && $settings['hideempty']) ? $settings['hideempty'] : '1' ; ?>">
        <?php if(empty($settings['posttype']) && empty($settings['taxonomy'])): $posttypes = get_post_types_assoc(); ?>
        <div class="cmstaxonomy-post-types">
            <select<?php echo $multiple; ?>>
                <?php foreach ($posttypes as $key => $posttype): ?>
                <option value="<?php echo $key ?>"><?php echo $posttype; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif; ?>
        <div class="cmstaxonomy-taxonomy">
        <?php if(!empty($settings['posttype']) && empty($settings['taxonomy'])): $taxonomy = get_taxomonies_by_post_type($settings['posttype']); ?>
            <select<?php echo $multiple; ?>>
                <?php foreach ($taxonomy as $key => $tax): ?>
                <option value="<?php echo $key ?>"><?php echo $tax; ?></option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>
        </div>
        <div class="cmstaxonomy-categories" style="max-height: 200px; overflow: auto;">
            <ul>
            <?php if(!empty($settings['taxonomy'])): 
            $terms = get_terms($settings['taxonomy'], 'orderby=count&hide_empty=0');
            foreach ($terms as $term):?>
                <li><input type="<?php echo $settings['input']; ?>" value="<?php echo $term->term_id; ?>" /> <?php echo $term->name; ?>(<?php echo $term->count; ?>)</li>
            <?php endforeach; endif; ?>
            </ul>
        </div>
        <input name="<?php echo esc_attr( $settings['param_name'] ); ?>" class="wpb_vc_param_value wpb-textinput <?php echo esc_attr( $settings['param_name'] ); ?> <?php echo esc_attr( $settings['type'] ); ?>_field" type="hidden" value="<?php echo esc_attr( $value );?>" />
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode_param('cmstaxonomy', 'cms_posttype_taxonomy_field', CSCORE_PLUGIN_URL.'framework/vc_extra/vc.extra.fields.js');
add_action('wp_ajax_cms_get_taxonomy_from_posttype', 'cms_get_taxonomy_from_posttype_callback');
function cms_get_taxonomy_from_posttype_callback(){
    $taxonomy = array();
    $posttype = !empty($_REQUEST['type']) ? $_REQUEST['type'] : 'post';
    if(is_array($posttype)){
        foreach ($posttype as $post){
            $taxonomy = array_merge($taxonomy, get_taxomonies_by_post_type($post));
        }
    } else {
        $taxonomy = get_taxomonies_by_post_type($posttype);
    }
    exit(json_encode($taxonomy));
}
add_action('wp_ajax_cms_get_list_category', 'cms_get_list_category_callback');
function cms_get_list_category_callback(){
    $terms = new stdClass();
    $taxonomy = !empty($_REQUEST['tax']) ? $_REQUEST['tax'] : 'category';
    $hideempty = !empty($_REQUEST['hideempty']) ? $_REQUEST['hideempty'] : '1';
    if(is_array($taxonomy)){
        foreach ($taxonomy as $tax){
            $terms =(object)array_merge((array)$terms, (array)get_terms($tax, "orderby=count&hide_empty=$hideempty"));
        }
    } else {
        $terms = get_terms($taxonomy, 'orderby=count&hide_empty=0');
    }
    exit(json_encode($terms));
}
