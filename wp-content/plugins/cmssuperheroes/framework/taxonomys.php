<?php
/*
 * Author : Fox
 * Process : Back end -> Edit Taxonomy
 * Desc : Taxonomy Extra Fields Framework
 */
class CsheroFrameworkTaxonomyExtraFields
{

    public function __construct()
    {
        add_action('admin_init', array(
            $this,
            'AddTaxonomysFields'
        ));
        add_action('admin_init', array(
            $this,
            'SaveTaxonomysFields'
        ));
    }
    /* add custom fileds */
    public function AddTaxonomysFields()
    {
        add_action('restaurantmenu_category_edit_form_fields', array(
            $this,
            'extra_restaurantmenu_category_fields'
        ), 10, 2);
        add_action('edit_category_form_fields', array(
            $this,
            'extra_category_fields'
        ), 10, 2);
    }

    public function SaveTaxonomysFields()
    {
        add_action('edited_restaurantmenu_category', array(
            $this,
            'save_extra_category_fileds'
        ), 10, 2);
        add_action('edited_category', array(
            $this,
            'save_extra_category_fileds'
        ), 10, 2);
    }

    /* template */
    public function extra_restaurantmenu_category_fields($tag)
    {
        $t_id = $tag->term_id;
        $cat_meta = get_option("category_$t_id");
        require_once 'taxonomys/restaurantmenu.php';
    }

    public function extra_category_fields($tag)
    {
        $t_id = $tag->term_id;
        $cat_meta = get_option("category_$t_id");
        require_once 'taxonomys/category.php';
    }

    /* save custom fileds */
    public function save_extra_category_fileds($term_id)
    {
        if (isset($_POST['Cat_meta'])) {
            $t_id = $term_id;
            $cat_meta = get_option("category_$t_id");
            $cat_keys = array_keys($_POST['Cat_meta']);
            foreach ($cat_keys as $key) {
                if (isset($_POST['Cat_meta'][$key])) {
                    $cat_meta[$key] = $_POST['Cat_meta'][$key];
                }
            }
            // save the option array
            update_option("category_$t_id", $cat_meta);
        }
    }
}
$cs_taxonomy_extrafields = new CsheroFrameworkTaxonomyExtraFields();