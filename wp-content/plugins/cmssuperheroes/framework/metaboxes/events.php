<?php global $smof_data; ?>
<div id="cs-blog-metabox" class='cs_metabox'>
	<div id="tab-side-container" class='EasyTabs clearfix'>
	<ul>
	   <li class='cs-tab'><a href="#tabs-price"><i class="dashicons dashicons-admin-network"></i> <?php echo __('WHEN',CSCORE_NAME); ?></a></li>
	   <li class='cs-tab'><a href="#tabs-field"><i class="dashicons dashicons-location-alt"></i> <?php echo __('WHERE',CSCORE_NAME); ?></a></li>
 	</ul>
 	<div class='cs-tabs-panel clearfix'>
	 	<div id="tabs-price">
		<?php
    		cs_options(array(
        		'id' => 'start_date',
        		'label' => __('Event starts date',CSCORE_NAME),
        		'type' => 'datetime',
        		'value' => date('Y-m-d H:i'),
        		'format' => 'Y-m-d H:i',
		    ));
    		cs_options(array(
        		'id' => 'end_date',
        		'label' => __('Event end date',CSCORE_NAME),
        		'type' => 'datetime',
        		'value' => date('Y-m-d H:i'),
        		'format' => 'Y-m-d H:i'
    		));
		?>
		</div>
		<div id="tabs-field">
		<?php
		cs_options(array(
    		'id' => 'event_location_name',
    		'label' => __('Location Name *', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'event_address',
    		'label' => __('Address *', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'event_city',
    		'label' => __('City/Town *', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'event_state',
    		'label' => __('State/County', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'event_postcode',
    		'label' => __('Postcode', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'event_region',
    		'label' => __('Region', CSCORE_NAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'even_country',
    		'label' => __('Country', CSCORE_NAME),
    		'type' => 'text'
		));
		?>
		</div>
	</div>
	</div>
</div>
<div id="field_icon" style="display: none;"></div>