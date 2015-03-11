<?php 
	
	// Option
	$options = array(
		array(
			'title' 	=> __('Page', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'radio_img',
					'id' 			=> 'default_layout',
					'title' 		=> __('Default Layout', 'theme_admin'),
					'description' 	=> __('choose page default layout', 'theme_admin'),
					'default' 		=> 'sidebar-right',
					'options' 		=> array(
						'full-width' 	=> __('Full Width', 'theme_admin'),
						'sidebar-left' 	=> __('Sidebar Left', 'theme_admin'),
						'sidebar-right' => __('Sidebar Right', 'theme_admin')
					)
				),
				/*
				array(
					'type' => 'on_off',
					'id' => 'breadcrumb_show',
					'default' => 'off',
					'title' => 'Show Breadcrumb',
					'description' => '',
				),
				*/
				
			)
		),

	);
	
	$config = array(
		'title' 		=> __('Content', 'theme_admin'),
		'group_id' 		=> 'content',
		'active_first' 	=> false
	);
	
return array( 'options' => $options, 'config' => $config );

?>