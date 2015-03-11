<?php

add_action('init','register_sidebar_custom_post_type');
function register_sidebar_custom_post_type() {
	register_post_type( 'custom_sidebar',
		array(
			'labels' => array(
				'name' 					=> __('Custom Sidebars', 'theme_admin'),
				'singular_name' 		=> __('Custom Sidebar', 'theme_admin'),
				'add_new' 				=> __('Add New', 'theme_admin'),
				'add_new_item' 			=> __('Add New Sidebar', 'theme_admin'),
				'edit_item' 			=> __('Edit Custom Sidebar', 'theme_admin'),
				'new_item' 				=> __('New Custom Sidebar', 'theme_admin'),
				'view_item' 			=> __('View Custom Sidebar', 'theme_admin'),
				'search_items' 			=> __('Search Custom Sidebars', 'theme_admin'),
				'not_found' 			=> __('No Custom Sidebars found', 'theme_admin'),
				'not_found_in_trash' 	=> __('No Custom Sidebars found in Trash', 'theme_admin'), 
				'parent_item_colon' 	=> '',
			),
			'singular_label' 		=> __('Custom Sidebar', 'theme_admin'),
			'public' 				=> true,
			'exclude_from_search' 	=> true,
			'show_ui' 				=> true,
			'capability_type' 		=> 'post',
			'hierarchical' 			=> false,
			'rewrite' 				=> array( 'with_front' => false ),
			'query_var' 			=> false,
			'show_in_nav_menus'		=> false,
			'supports' 				=> array(''),
			'show_in_menu' 			=> 'theme_setting'
		)
	);
}