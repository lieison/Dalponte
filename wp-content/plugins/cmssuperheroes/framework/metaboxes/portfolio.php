<div id="cs-blog-metabox" class='cs_metabox'>
	<div id="tab-side-container" class='EasyTabs clearfix'>
    	<ul>
    	   <li class='cs-tab'><a href="#tabs-general"><i class="dashicons dashicons-admin-settings"></i> <?php echo _e('GENERAL',CSCORE_NAME);?></a></li>
     	   <?php do_action('portfolio_metabox_tab_title_after'); ?>
     	</ul>
     	<div class='cs-tabs-panel clearfix'>
     		<div id="tabs-general">
     		<?php
     		do_action('portfolio_metabox_general_before');
     		cs_options(array(
         		'id' => 'portfolio_link',
         		'label' => __('Link URL',CSCORE_NAME),
         		'type' => 'text',
         		'placeholder' => __('http://www.website.com',CSCORE_NAME),
     		));
     		do_action('portfolio_metabox_general_after');
        	?>
    	    </div>
    	</div>
    	<?php do_action('portfolio_metabox_tab_content_after'); ?>
	</div>
</div>
<?php
