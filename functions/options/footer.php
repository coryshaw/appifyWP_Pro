<?php 
	
	// Option
	$options = array(
		
		array(
			'title' 	=> __('Footer', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'footer_widgets',
					'toggle' 		=> 'footer-widgets',
					'title' 		=> __('Show Footer Widgets', 'theme_admin'),
					'description' 	=> __('If you dont want to add any awesome widgets to your footer, set this to "off".', 'theme_admin'),
					'default' 		=> 'off'
				),
				
				array(
					'type' 			=> 'radio_img',
					'toggle_group' 	=> 'footer-widgets',
					'id' 			=> 'footer_layout',
					'title' 		=> __('Footer Widget Layout', 'theme_admin'),
					'description' 	=> __('Choose how many widgets you want to appear in your footer. You can modify the content of these widgets under Appearance > Widgets', 'theme_admin'),
					'default' 		=> 'three-columns',
					'options' 		=> array(
						'one-column' 		=> __('1 Col', 'theme_admin'),
						'two-columns' 	=> __('2 Cols', 'theme_admin'),
						'three-columns' 	=> __('3 Cols', 'theme_admin'),
						'four-columns' 	=> __('4 Cols', 'theme_admin')
					),
				),

				array(
					'type' 			=> 'color',
					'id' 			=> 'footer_bg_color',
					'title' 		=> __('Footer Background Color', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> ''
				),

				array(
					'type' 			=> 'color',
					'id' 			=> 'footer_text_color',
					'title' 		=> __('Footer Text Color', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> ''
				),

				array(
					'type' 			=> 'textarea',
					'id' 			=> 'footer_copyright_text',
					'title' 		=> __('Copyright Text', 'theme_admin'),
					'description' 	=> __('copyright text you\'d like to display in footer', 'theme_admin'),
					'default' 		=> 'Copyright &copy; 2012 MySite.com. All Rights Reserved'
				),
				
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'footer_show_poweredby',
					'title' 		=> __('Show Powered By Link', 'theme_admin'),
					'description' 	=> __('Help support hard work and love put into this theme by displaying a subtle link back to AppifyWP in your footer', 'theme_admin'),
					'default' 		=> 'on'
				),
				
			)
		)
	);
	
	$config = array(
		'title' 		=> __('Footer', 'theme_admin'),
		'group_id' 		=> 'footer',
		'active_first' 	=> false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>