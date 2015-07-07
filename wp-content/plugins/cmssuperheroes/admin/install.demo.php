<?php
add_action('admin_menu', 'cms_superheroes_register_demo_menu_page');
add_action('admin_init', 'cms_superheroes_register_options' );

function cms_superheroes_register_demo_menu_page()
{
    add_submenu_page( 'cms-superheroes', 'Install Demo', 'Install Demo', 'manage_options', 'cms-superheroes-demo', 'cms_superheroes_demo_menu_page');
}

function cms_superheroes_demo_menu_page()
{
    $demo_part = get_template_directory().'/admin/sample/';
    $demo_url = get_template_directory_uri().'/admin/sample/';
    ob_start();
    ?>
    <div class="demo-content">
    <?php
    if(is_dir($demo_part)){
        if(file_exists($demo_part.'demo.info.php')){
            require_once $demo_part.'demo.info.php';
            if(!empty($demo_data)){
                foreach ($demo_data as $item ){
                    ?>
                    <div class="demo-item">
                        <h3><?php esc_attr_e($item['title']); ?></h3>
                        <img alt="<?php esc_attr_e($item['title']); ?>" src="<?php echo esc_url($demo_url.$item['id'].'/screenshot.png'); ?>">
                        <span><?php esc_attr_e($item['desc']); ?></span>
                        <button id="<?php esc_attr_e($item['id']); ?>" class="demo-install"><?php _e('INSTALL', CSCORE_NAME); ?></button>
                    </div>
                    <?php
                }
            }
        } else {
             ?>
            <div><?php _e('Info Data Do Not Exits', CSCORE_NAME); ?></div>
            <?php
        }
    } else {
        ?>
        <div><?php _e('Active CMS SuperHeroes Theme', CSCORE_NAME); ?></div>
        <?php
    }
    ?>
    </div>
    <?php
    echo ob_get_clean();
}