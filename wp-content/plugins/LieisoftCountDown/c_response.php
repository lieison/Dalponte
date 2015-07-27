<?php

require_once( $_REQUEST['path'] . "wp-config.php" ); 


$i          = $_REQUEST['i'];
$date       = $_REQUEST['date'];

$d          = new DateTime($date);


update_post_meta($i, "deadline_", $d->format(("Y-m-d H:i:s")));


wp_update_post(array(
    "ID"                => $i,
    'post_excerpt'      => "[ls_endtime id='$i']"
));


exit();