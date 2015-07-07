<div id="cs-blog-metabox" class='cs_metabox'>
	<div style="max-height: 200px; overflow: auto;">
	<?php
	cs_options(array(
    	'id' => 'client_link',
    	'label' => __('Link URL',CSCORE_NAME),
    	'type' => 'text',
    	'placeholder' => __('http://www.website.com',CSCORE_NAME),
	));
	?>
	</div>
</div>
<?php
