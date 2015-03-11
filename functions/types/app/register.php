<?php

add_action('init','register_app_custom_post_type');
function register_app_custom_post_type() {
	register_post_type( 'app',
		array(
			'labels' => array(
				'name' 					=> __('Apps', 'theme_admin' ),
				'singular_name' 		=> __('App', 'theme_admin' ),
				'add_new' 				=> __('Add New', 'theme_admin' ),
				'add_new_item' 			=> __('Add New App', 'theme_admin' ),
				'edit_item' 			=> __('Edit App', 'theme_admin' ),
				'new_item' 				=> __('New App', 'theme_admin' ),
				'view_item' 			=> __('View App', 'theme_admin' ),
				'search_items' 			=> __('Search Apps', 'theme_admin' ),
				'not_found' 			=>  __('No App found', 'theme_admin' ),
				'not_found_in_trash' 	=> __('No App found in Trash', 'theme_admin' ), 
				'parent_item_colon' 	=> '',
			),
			'singular_label' 		=> __('App', 'theme_admin' ),
			'public' 				=> true,
			'exclude_from_search' 	=> false,
			'show_ui' 				=> true,
			'capability_type' 		=> 'post',
			'hierarchical' 			=> false,
			'rewrite' 				=> array( 'with_front' => false, 'slug' => '/app' ),
			'query_var' 			=> 'app',
			'_builtin' 				=> false,
			'supports' 				=> array('title', 'editor', 'thumbnail'),
			'show_in_menu' 			=> true,
			'show_in_nav_menus'		=> true,
			'has_archive'			=> 'apps',
			'menu_position'			=> 28,
			'menu_icon'				=> THEME_ADMIN_ASSETS_URI . '/icons/apps_16.png'
		)
	);
	
	
	
	
}

?>