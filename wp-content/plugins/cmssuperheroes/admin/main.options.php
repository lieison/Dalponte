<?php
global $pagenow;
add_action('admin_menu', 'cms_superheroes_register_menu_page');
add_action('admin_init', 'cms_superheroes_register_options' );
//add_action( 'admin_enqueue_scripts', 'cms_superheroes_admin_scripts' );

function cms_superheroes_register_menu_page()
{
    add_menu_page('CMS Heroes', 'CMS Heroes', 'manage_options', 'cms-superheroes', 'cms_superheroes_menu_page', 'dashicons-cloud');
}

function cms_superheroes_register_options() {
    register_setting( 'cms-superheroes', 'cms_superheroes_portfolio' );
    register_setting( 'cms-superheroes', 'cms_superheroes_pricing' );
    register_setting( 'cms-superheroes', 'cms_superheroes_team' );
    register_setting( 'cms-superheroes', 'cms_superheroes_client' );
    register_setting( 'cms-superheroes', 'cms_superheroes_testimonials' );
    register_setting( 'cms-superheroes', 'cms_superheroes_restaurant' );

    register_setting( 'cms-superheroes', 'cms_superheroes_megamenu' );
    register_setting( 'cms-superheroes', 'cms_superheroes_favorive' );
    register_setting( 'cms-superheroes', 'cms_superheroes_sharing' );
}

function cms_superheroes_admin_scripts(){
}

function cms_superheroes_menu_page()
{
    ob_start();
    ?>
    <div class="wrap">
	<form method="post" action="options.php">
	<?php
        settings_fields( 'cms-superheroes' );
        do_settings_sections( 'cms-superheroes' );
    ?>
    <div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder">
            <div id="postbox-container-1" class="postbox-container">
                <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                    <div id="dashboard_right_now" class="postbox ">
                        <div class="handlediv" title="Click to toggle"><br></div>
                        <h3 class="hndle"><span><?php _e('Post Types', CSCORE_NAME); ?></span></h3>
                        <div class="inside">
                        <div class="main">
                        <?php
                        cs_options(array(
                 			'id' => 'cms_superheroes_portfolio',
                 			'label' => __('Portfolio',CSCORE_NAME),
                 			'type' => 'switch',
                 			'options' => array('on'=>'1','off'=>'0'),
                 			'value' => '1'
                		));
                        cs_options(array(
                            'id' => 'cms_superheroes_pricing',
                            'label' => __('Pricing & Service',CSCORE_NAME),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>'0'),
                            'value' => '1'
                        ));
                        cs_options(array(
                            'id' => 'cms_superheroes_team',
                            'label' => __('Team',CSCORE_NAME),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>'0'),
                            'value' => '1'
                        ));
                        cs_options(array(
                            'id' => 'cms_superheroes_client',
                            'label' => __('Client',CSCORE_NAME),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>'0'),
                            'value' => '1'
                        ));
                        cs_options(array(
                            'id' => 'cms_superheroes_testimonials',
                            'label' => __('Testimonials',CSCORE_NAME),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>'0'),
                            'value' => '1'
                        ));
                        cs_options(array(
                            'id' => 'cms_superheroes_restaurant',
                            'label' => __('Restaurant Menu',CSCORE_NAME),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>'0'),
                            'value' => '0'
                        ));
                        ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="postbox-container-2" class="postbox-container">
                <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                    <div id="dashboard_right_now" class="postbox ">
                        <div class="handlediv" title="Click to toggle"><br></div>
                        <h3 class="hndle"><span><?php _e('Plugins', CSCORE_NAME); ?></span></h3>
                        <div class="inside">
                        <div class="main">
                        <?php
                        cs_options(array(
                 			'id' => 'cms_superheroes_megamenu',
                 			'label' => __('Mega Menu',CSCORE_NAME),
                 			'type' => 'switch',
                 			'options' => array('on'=>'1','off'=>'0'),
                 			'value' => '1'
                		  ));
                        cs_options(array(
                            'id' => 'cms_superheroes_favorive',
                            'label' => __('Post Favorive',CSCORE_NAME),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>'0'),
                            'value' => '1'
                            ));
                        cs_options(array(
                            'id' => 'cms_superheroes_sharing',
                            'label' => __('Post Sharing',CSCORE_NAME),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>'0'),
                            'value' => '1'
                            ));
                        ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php submit_button(); ?>
    </form>
    </div>
    <?php
    echo '<div id="field_icon" style="display: none;"></div>';
    echo ob_get_clean();
}