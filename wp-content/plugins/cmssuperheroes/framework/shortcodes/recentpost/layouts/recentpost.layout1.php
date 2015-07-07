<?php
if ( file_exists(CSCORE_PLUGIN_DIR . 'framework/shortcodes/recentpost/layouts/blogs/blog-' . get_post_format().'.php')) {
    require 'blog/blog-' . get_post_format().'.php';
} else {
    require 'blog/blog.php';
}
?>