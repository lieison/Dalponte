<?php
vc_map(array(
    "name" => 'Booking Table',
    "base" => "cs-booking-form",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero', CSCORE_NAME),
    "description" => __('Booking Table', CSCORE_NAME),
    "params" => array(
        array(
            "type" => "checkbox",
            "heading" => __('Phone Number', CSCORE_NAME),
            "param_name" => "phone",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Message', CSCORE_NAME),
            "param_name" => "message",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            )
        ),
    )
));