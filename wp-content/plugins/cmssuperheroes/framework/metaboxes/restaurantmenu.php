<?php global $smof_data; ?>
<div id="cs-blog-metabox" class='cs_metabox'>
	<div id="tab-side-container" class='EasyTabs clearfix'>
	<ul>
	   <li class='cs-tab'><a href="#tabs-price"><i class="dashicons dashicons dashicons-cart"></i> <?php echo __('PRICE',CSCORE_NAME); ?></a></li>
	   <li class='cs-tab'><a href="#tabs-field"><i class="dashicons dashicons dashicons-awards"></i> <?php echo __('TAGS',CSCORE_NAME); ?></a></li>
 	</ul>
 	<div class='cs-tabs-panel clearfix'>
	 	<div id="tabs-price">
		<?php
    		cs_options(array(
        		'id' => 'menu_price',
        		'label' => __('Price',CSCORE_NAME),
        		'type' => 'text'
		    ));
    		cs_options(array(
        		'id' => 'price_unit',
        		'label' => __('Unit ($)',CSCORE_NAME),
        		'value' => $smof_data['restaurant_menu_price'],
        		'type' => 'text'
    		));
    		cs_options(array(
        		'id' => 'menu_special',
        		'label' => __('CHEFS SPECIAL',CSCORE_NAME),
        		'type' => 'switch',
        		'options' => array('on'=>'yes','off'=>'no'),
        		'value' => 'no',
    		));
		?>
		</div>
		<div id="tabs-field">
		<?php
		cs_options(array(
    		'id' => 'menu_custom_field_1',
    		'label' => __('Field 1', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_icon_1',
    		'label' => __('Icon 1', CSCORE_NAME),
    		'type' => 'icon'
		 ));
		cs_options(array(
    		'id' => 'menu_custom_field_desc_1',
    		'label' => __('Desc Field 1', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_2',
    		'label' => __('Field 2', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_icon_2',
    		'label' => __('Icon 2', CSCORE_NAME),
    		'type' => 'icon'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_desc_2',
    		'label' => __('Desc Field 2', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_3',
    		'label' => __('Field 3', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_icon_3',
    		'label' => __('Icon 3', CSCORE_NAME),
    		'type' => 'icon'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_desc_3',
    		'label' => __('Desc Field 3', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_4',
    		'label' => __('Field 4', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_icon_4',
    		'label' => __('Icon 4', CSCORE_NAME),
    		'type' => 'icon'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_desc_4',
    		'label' => __('Desc Field 4', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_5',
    		'label' => __('Field 5', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_icon_5',
    		'label' => __('Icon 5', CSCORE_NAME),
    		'type' => 'icon'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_desc_5',
    		'label' => __('Desc Field 5', CSCORE_NAME),
    		'type' => 'text'
		));
		?>
		</div>
	</div>
	</div>
</div>
<div id="field_icon" style="display: none;"></div>