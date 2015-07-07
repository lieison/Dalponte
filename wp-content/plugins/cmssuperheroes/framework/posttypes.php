<?php
require_once 'posttypes/header.php';
if(get_option('cms_superheroes_client')){
    require_once 'posttypes/client.php';
}
if(get_option('cms_superheroes_portfolio')){
    require_once 'posttypes/portfolio.php';
}
if(get_option('cms_superheroes_pricing')){
    require_once 'posttypes/pricing.php';
}
if(get_option('cms_superheroes_team')){
    require_once 'posttypes/team.php';
}
if(get_option('cms_superheroes_testimonials')){
    require_once 'posttypes/testimonial.php';
}
if(get_option('cms_superheroes_restaurant')){
    require_once 'posttypes/restaurantmenu.php';
}