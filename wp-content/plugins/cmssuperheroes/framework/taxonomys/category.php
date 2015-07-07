<?php
global $smof_data;
cs_options(array(
    'id' => 'category_type',
    'label' => __('Category Type', CSCORE_NAME),
    'type' => 'select',
    'options' => array(
        'One Column' => __('One Column', CSCORE_NAME),
        'Two Column' => __('Two Column', CSCORE_NAME),
        'Three Column' => __('Three Column', CSCORE_NAME)
    ),
    'desc' => __('Select Column for current Category', CSCORE_NAME)
));
cs_options(array(
    'id' => 'category_layout',
    'label' => __('Category Layout', CSCORE_NAME),
    'type' => 'select',
    'options' => array(
        '' => __('Default', CSCORE_NAME),
        'full-fixed' => __('Full Width', CSCORE_NAME),
        'left-fixed' => __('Sidebar Left', CSCORE_NAME),
        'right-fixed' => __('Sidebar Right', CSCORE_NAME)
    ),
    'desc' => __('Select Layout for current Category', CSCORE_NAME)
));
?>