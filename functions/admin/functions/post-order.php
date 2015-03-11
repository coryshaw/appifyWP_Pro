<?php
/*
Plugin Name: Post Types Order
Plugin URI: http://www.nsp-code.com
Description: Order Posts and Post Types Objects using a Drag and Drop Sortable javascript capability
Author: NSP CODE
Author URI: http://www.nsp-code.com 
Version: 1.5.1
*/

add_filter('posts_orderby', 'Theme_CPTOrderPosts');
function Theme_CPTOrderPosts( $orderBy ) {
    global $wpdb;
    
    $orderBy = "{$wpdb->posts}.menu_order, {$wpdb->posts}.post_date DESC";
    return($orderBy);
}