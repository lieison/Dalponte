<?php
if(get_option('cms_superheroes_favorive',true)){
    require_once 'postfavorite/post_favorite.php';
}
if(get_option('cms_superheroes_sharing',true)){
    require_once 'socialsharing/socialsharing.php';
}
require_once 'tinymce/button.php';