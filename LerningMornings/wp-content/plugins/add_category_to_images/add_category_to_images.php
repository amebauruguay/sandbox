<?php
/*
Plugin Name: Add categories to images
Plugin URI: 
Description: This plugin add categories to images
Version: 1.0
Author: Lucía y Ligia
Author URI: 
*/


function wptp_add_image_taxonomy() {
    $labels = array(
        'name'              => 'Image-category',
        'singular_name'     => 'Image-category',
        'search_items'      => 'Search Image-category',
        'all_items'         => 'All Image-category',
        'parent_item'       => 'Parent Image-category',
        'parent_item_colon' => 'Parent Image-category:',
        'edit_item'         => 'Edit Image-category',
        'update_item'       => 'Update Image-category',
        'add_new_item'      => 'Add New Image-category',
        'new_item_name'     => 'New Image-category Name',
        'menu_name'         => 'Image-category',
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => 'true',
        'rewrite' => 'true',
        'show_admin_column' => 'true',
    );
 
    register_taxonomy( 'image-category', 'attachment', $args );
}
add_action( 'init', 'wptp_add_image_taxonomy' );

?>