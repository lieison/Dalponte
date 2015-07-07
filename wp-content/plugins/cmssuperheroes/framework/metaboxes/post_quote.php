<div id="cs-blog-metabox" class='cs_metabox'>
	<?php
    cs_options(array(
        'id' => 'post_quote_type',
        'label' => __('Quote Content', CSCORE_NAME),
        'type' => 'select',
        'options' => array(
            '' => 'From Post',
            'custom' => 'Custom'
        )
    ));
    ?>
    	<div id="post_quote_custom">
    	<?php
    cs_options(array(
        'id' => 'post_quote',
        'label' => __('Content', CSCORE_NAME),
        'type' => 'textarea',
        'placeholder' => __('Please type the text for your quote here.', CSCORE_NAME)
    ));
    cs_options(array(
        'id' => 'post_author',
        'label' => __('Author', CSCORE_NAME),
        'type' => 'text',
        'placeholder' => __('Please type the text for author quote here.', CSCORE_NAME)
    ));
    ?>
	</div>
</div>
<?php
