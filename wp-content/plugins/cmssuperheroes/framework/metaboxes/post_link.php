<div id="cs-blog-metabox" class='cs_metabox'>
	<?php
	cs_options(array(
    	'id' => 'post_link',
    	'label' => __('Link URL',CSCORE_NAME),
    	'type' => 'text',
    	'placeholder' => 'http://www.website.com'
	 ));
	cs_options(array(
    	'id' => 'post_link_text',
    	'label' => __('Link Text',CSCORE_NAME),
    	'type' => 'text',
    	'placeholder' => __('Your Text', CSCORE_NAME)
	));
	?>
</div>
	<?php
