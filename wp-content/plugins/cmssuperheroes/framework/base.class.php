<?php

class CSCORE_Base
{

    /**
     * get posts by categorys/tags
     */
    public static function getPostsByCategory($catID, $postTypes = "any", $taxonomies = "category", $pages = array(), $sortBy = 'ID', $direction = 'DESC', $numPosts = -1, $arrAddition = array())
    {   // category
        global $sitepress;
        
        // get post types
        if (strpos($postTypes, ",") !== false) {
            $postTypes = explode(",", $postTypes);
            if (array_search("any", $postTypes) !== false)
                $postTypes = "any";
        }
        
        if (empty($postTypes))
            $postTypes = "any";
        
        if (strpos($catID, ",") !== false)
            $catID = explode(",", $catID);
        else
            $catID = array(
                $catID
            );
        
        $query = array(
            'order' => $direction,
            'posts_per_page' => $numPosts,
            'showposts' => $numPosts,
            'post_status' => 'publish',
            'post_type' => $postTypes
        );
        
        // get taxonomies array
        $arrTax = array();
        if (! empty($taxonomies)) {
            $arrTax = explode(",", $taxonomies);
        }
        
        if (! empty($taxonomies)) {
            
            $taxQuery = array();
            
            // add taxomonies to the query
            if (strpos($taxonomies, ",") !== false) { // multiple taxomonies
                $taxonomies = explode(",", $taxonomies);
                foreach ($taxonomies as $taxomony) {
                    $taxArray = array(
                        'taxonomy' => $taxomony,
                        'field' => 'id',
                        'terms' => $catID
                    );
                    $taxQuery[] = $taxArray;
                }
            } else { // single taxomony
                $taxArray = array(
                    'taxonomy' => $taxonomies,
                    'field' => 'id',
                    'terms' => $catID
                );
                $taxQuery[] = $taxArray;
            }
            
            $taxQuery['relation'] = 'OR';
            
            $query['tax_query'] = $taxQuery;
        } // if exists taxanomies
        
        $query['suppress_filters'] = false;
        
        if (! empty($arrAddition) && is_array($arrAddition)) {
            foreach ($arrAddition as $han => $val) {
                if (strtolower(substr($val, 0, 5)) == 'array') {
                    $val = explode(',', str_replace(array(
                        '(',
                        ')'
                    ), '', substr($val, 5)));
                    $arrAddition[$han] = $val;
                }
            }
            $query = array_merge($query, $arrAddition);
        }
        
        $grid_id = time();
            
            // add wpml transient
        $lang_code = '';
        if (CSCORE_Wpml::is_wpml_exists()) {
            $lang_code = CSCORE_Wpml::get_current_lang_code();
        }
        $objQuery = get_transient('cscore_trans_query_' . $grid_id . $lang_code);
        
        $query_type = 'wp_query';
        
        if ($objQuery === false) {
            
            echo '<!-- CACHE CREATED FOR: ' . $grid_id . ' -->';
            
            $query = apply_filters('cscore_get_posts', $query);
            
            if ($query_type == 'wp_query') {
                $objQuery = new WP_Query($query);
            } else {
                $objQuery = get_posts($query);
            }
            
            // select again the pages
            if (is_array($postTypes) && in_array('page', $postTypes) && count($postTypes) > 1 || $postTypes == 'page') { // Page is selected and also another custom category
                $query['post_type'] = 'page';
                unset($query['tax_query']); // delete category/tag filtering
                
                $query['post__in'] = $pages;
                
                if ($query_type == 'wp_query') {
                    $objQueryPages = new WP_Query($query);
                } else {
                    $objQueryPages = get_posts($query);
                }
                
                if ($query_type == 'wp_query') {
                    if (is_object($objQueryPages) && is_object($objQuery)) {
                        $objQuery->posts = array_merge($objQuery->posts, $objQueryPages->posts);
                    }
                    if (is_object($objQueryPages) && ! is_object($objQuery)) {
                        $objQuery = $objQueryPages;
                    }
                } else {
                    if (is_array($objQueryPages) && is_array($objQuery)) {
                        $objQuery = array_merge($objQuery, $objQueryPages);
                    }
                    if (is_array($objQueryPages) && ! is_array($objQuery)) {
                        $objQuery = $objQueryPages;
                    }
                }
                
                // remove duplicated posts
                if ($query_type == 'wp_query') {
                    if (! empty($objQuery->posts)) {
                        $fIDs = array();
                        foreach ($objQuery->posts as $objID => $objPost) {
                            if (isset($fIDs[$objPost->ID])) {
                                unset($objQuery->posts[$objID]);
                                continue;
                            }
                            $fIDs[$objPost->ID] = true;
                        }
                    }
                } else {
                    if (! empty($objQuery)) {
                        $fIDs = array();
                        foreach ($objQuery as $objID => $objPost) {
                            if (isset($fIDs[$objPost->ID])) {
                                unset($objQuery[$objID]);
                                continue;
                            }
                            $fIDs[$objPost->ID] = true;
                        }
                    }
                }
            }
            
            set_transient('cscore_trans_query_' . $grid_id . $lang_code, $objQuery, 60 * 60 * 24);
        } else {
            echo '<!-- CACHE FOUND FOR: ' . $grid_id . ' -->';
        }
        
        if ($query_type == 'wp_query') {
            $arrPosts = $objQuery->posts;
        } else {
            $arrPosts = $objQuery;
        }
        
        // check if we should rnd the posts
        if ($sortBy == 'rand' && ! empty($arrPosts)) {
            shuffle($arrPosts);
        }
        
        foreach ($arrPosts as $key => $post) {
            
            if (method_exists($post, "to_array"))
                $arrPost = $post->to_array();
            else
                $arrPost = (array) $post;
            
            if ($arrPost['post_type'] == 'page') {
                if (! empty($pages)) { // filter to pages if array is set
                    $delete = true;
                    foreach ($pages as $page) {
                        if (! empty($page)) {
                            if ($arrPost['ID'] == $page) {
                                $delete = false;
                                break;
                            } elseif (isset($sitepress)) { // WPML
                                $current_main_id = icl_object_id($arrPost['ID'], 'page', true, $sitepress->get_default_language());
                                if ($current_main_id == $page) {
                                    $delete = false;
                                    break;
                                }
                            }
                        }
                    }
                    if ($delete) { // if not wanted, go to next
                        unset($arrPosts[$key]);
                        continue;
                    }
                }
            }
            /*
             * $arrPostCats = self::getPostCategories($post, $arrTax);
             * $arrPost["categories"] = $arrPostCats;
             */
            $arrPosts[$key] = $arrPost;
        }
        
        $arrPosts = apply_filters('cscore_modify_posts', $arrPosts);
        
        return ($arrPosts);
    }

    /**
     * minimize CSS styles
     * 
     * @since 1.1.0
     */
    public function compress_css($buffer)
    {
        
        /* remove comments */
        $buffer = preg_replace("!/\*[^*]*\*+([^/][^*]*\*+)*/!", "", $buffer);
        /* remove tabs, spaces, newlines, etc. */
        $buffer = str_replace("	", " ", $buffer); // replace tab with space
        $arr = array(
            "\r\n",
            "\r",
            "\n",
            "\t",
            "  ",
            "    ",
            "    "
        );
        $rep = array(
            "",
            "",
            "",
            "",
            " ",
            " ",
            " "
        );
        $buffer = str_replace($arr, $rep, $buffer);
        /* remove whitespaces around {}:, */
        $buffer = preg_replace("/\s*([\{\}:,])\s*/", "$1", $buffer);
        /* remove last ; */
        $buffer = str_replace(';}', "}", $buffer);
        
        return $buffer;
    }
}