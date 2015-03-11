<?php 
	
	// Option
	$options = array(
		
		// Type
		array(
			'title' 	=> __('Homepage Type', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'radio',
					'id' 			=> 'home_type',
					'toggle' 		=> 'toggle-home-type',
					'title' 		=> __('Type', 'theme_admin'),
					'description' 	=> __('choose page type to set as home page', 'theme_admin'),
					'default' 		=> 'showcase-list',
					'options' 		=> array(
						'showcase-list' 			=> 'App Showcase List',
						//'app-carousel' 			=> 'App Carousel',
						'page' 			=> 'Page',
						'app' 			=> 'Single Application',
						'blog' 			=> 'Blog'
					),
				),
				array(
					'type' 			=> 'select',
					'id' 			=> 'home_page',
					'toggle_group' 	=> 'toggle-home-type toggle-home-type-page',
					'title' 		=> __('Home Page', 'theme_admin'),
					'description' 	=> __('this page will be displayed as a Home Page', 'theme_admin'),
					'default' 		=> '0',
					'options'		=>	array(
						'0'			=>	'&mdash; Select &mdash;'
					),
					'source' 		=> array(
						'post_type' 	=> 'page'
					)
				),
								
				
				array(
					'type' 			=> 'select',
					'id' 			=> 'home_app_page',
					'toggle_group' 	=> 'toggle-home-type toggle-home-type-app',
					'title' 		=> __('Application', 'theme_admin'),
					'description' 	=> __('this page will be displayed as a Home Page', 'theme_admin'),
					'default' 		=> '',
					'source' 		=> array(
						'post_type' 	=> 'app'
					)
				),
				
			)
		),
		
	
		
	);
	
	$config = array(
		'title' => 'Home',
		'group_id' => 'home',
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>