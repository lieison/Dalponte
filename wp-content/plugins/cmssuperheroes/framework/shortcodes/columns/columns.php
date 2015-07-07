<?php
/* * *********************************************************
 * Row
 * ********************************************************* */
function cshero_row($params, $content = null) {
    extract(shortcode_atts(array(
        'class' => ''
    ), $params));
    $result = '<div class="row ' . $class .'">';
    $content = str_replace("]<br />", ']', $content);
    $content = str_replace("<br />\n[", '[', $content);
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('row', 'cshero_row');
/* * *********************************************************
 * TWO
 * ********************************************************* */
function cshero_column($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'lg' => '',
        'mdoff' => '',
        'smoff' => '',
        'xsoff' => '',
        'lgoff' => '',
        'mdhide' => '',
        'smhide' => '',
        'xshide' => '',
        'lghide' => '',
        'mdclear' => '',
        'smclear' => '',
        'xsclear' => '',
        'lgclear' => '',
        'off'=>''
    ), $params));
    $arr = array('md', 'xs', 'sm');
    $classes = array();
    foreach ($arr as $k => $aa) {
        if (${$aa} == 12 || ${$aa} == '') {
            $classes[] = 'col-' . $aa . '-12';
        } else {
            $classes[] = 'col-' . $aa . '-' . ${$aa};
        }
    }
    $arr2 = array('mdoff', 'smoff', 'xsoff', 'lgoff');
    foreach ($arr2 as $k => $aa) {
        $nn = str_replace('off', '', $aa);
        if (${$aa} == 0 || ${$aa} == '') {
        } else {
            $classes[] = 'col-' . $nn . '-offset-' . ${$aa};
        }
    }
    $arr2 = array('mdhide', 'smhide', 'xshide', 'lghide');
    foreach ($arr2 as $k => $aa) {
        $nn = str_replace('hide', '', $aa);
        if (${$aa} == 'yes') {
            $classes[] = 'hidden-' . $nn;
        }
    }
    $arr2 = array('mdclear', 'smclear', 'xsclear', 'lgclear');
    foreach ($arr2 as $k => $aa) {
        $nn = str_replace('clear', '', $aa);
        if (${$aa} == 'yes') {
            $classes[] = 'clear-' . $nn;
        }
    }
    if ($off != '') {
        $classes[] = 'col-lg-offset-'.$off;
    }
    if ($off != '') {
        $classes[] = 'col-lg-offset-'.$off;
    }
    $result = '<div class="col-lg-' . $lg . ' ' . implode(' ', $classes) .'">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('column', 'cshero_column');
function cshero_one_half($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-6 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . '  one-half">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('one_half', 'cshero_one_half');
function cshero_one_half_last($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-6 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-half-last">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('one_half_last', 'cshero_one_half_last');
/* * *********************************************************
 * THIRD
 * ********************************************************* */
function cshero_one_third($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="sc-column col-lg-4 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' ">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('one_third', 'cshero_one_third');
function cshero_one_third_last($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-4 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . '  column-last">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('one_third_last', 'cshero_one_third_last');
function cshero_two_third($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class=" col-lg-8 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' ">'; //two-third
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('two_third', 'cshero_two_third');
function cshero_two_third_last($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-8 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . '  column-last ">'; //two-third-last
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('two_third_last', 'cshero_two_third_last');
/* * *********************************************************
 * FOURTH
 * ********************************************************* */
function cshero_one_fourth($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-3 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-fourth">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('one_fourth', 'cshero_one_fourth');
function cshero_one_fourth_last($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-3 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' column-last one-fourth-last">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('one_fourth_last', 'cshero_one_fourth_last');
function cshero_three_fourth($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-3 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . '  three-fourth">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('three_fourth', 'cshero_three_fourth');
function cshero_three_fourth_last($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-6  ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' column-last three-fourth-last">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('three_fourth_last', 'cshero_three_fourth_last');
function cshero_one_fourth_second($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-3  ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-fourth-second">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('one_fourth_second', 'cshero_one_fourth_second');
function cshero_one_fourth_third($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-3  ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-fourth-third">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('one_fourth_third', 'cshero_one_fourth_third');
function cshero_one_half_second($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-6  ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-half-second">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('one_half_second', 'cshero_one_half_second');
function cshero_one_third_second($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-4  ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-third-second">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('one_third_second', 'cshero_one_third_second');
function cshero_one_column($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'xs' => '',
        'off' => ''
    ), $params));
    if ($md == 12) {
        $mds = '';
    } else {
        $mds = 'col-md-' . $md;
    }
    if ($sm == 12) {
        $sms = '';
    } else {
        $sms = 'col-sm-' . $sm;
    }
    if ($xs == 12) {
        $xss = '';
    } else {
        $xss = 'col-xs-' . $xs;
    }
    $result = '<div class="col-lg-12  ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . ' one-column">';
    $result .= do_shortcode($content);
    $result .= '</div>';
    return $result;
}
add_shortcode('one_column', 'cshero_one_column');