<?php

add_action('init','register_team_custom_post_type');
function register_team_custom_post_type() {
	register_post_type( 'team',
		array(
			'labels' => array(
				'name' 					=> __( 'Team', 'theme_admin' ),
				'singular_name' 		=> __('Team Member', 'theme_admin' ),
				'add_new' 				=> __('Add New', 'theme_admin' ),
				'add_new_item' 			=> __('Add New Team Member', 'theme_admin' ),
				'edit_item' 			=> __('Edit Team Member', 'theme_admin' ),
				'new_item' 				=> __('New Team Member', 'theme_admin' ),
				'view_item' 			=> __('View Team Member', 'theme_admin' ),
				'search_items' 			=> __('Search Team', 'theme_admin' ),
				'not_found' 			=>  __('No Team Member Found', 'theme_admin' ),
				'not_found_in_trash' 	=> __('No team member found in Trash', 'theme_admin' ), 
				'parent_item_colon' 	=> '',
			),
			'singular_label' 		=> __('Team Member', 'theme_admin' ),
			'public' 				=> true,
			'exclude_from_search' 	=> false,
			'show_ui' 				=> true,
			'capability_type' 		=> 'post',
			'hierarchical' 			=> false,
			'rewrite' 				=> array( 'with_front' => false, 'slug' => '/team' ),
			'query_var' 			=> 'team',
			'_builtin' 				=> false,
			'supports' 				=> array('title', 'editor', 'thumbnail'),
			'show_in_menu' 			=> true,
			'has_archive'			=> 'team',
			'menu_position'			=> 29,
			'menu_icon'				=> THEME_ADMIN_ASSETS_URI . '/icons/team_16.png'
		)
	);
	
	
	
	
}

?>