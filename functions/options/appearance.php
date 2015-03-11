<?php 
	
	// Option
	$options = array(
		
		// Branding
		array(
				'title' 	=> 'Branding',
				'options' 	=> array(
					
					array(
						'type' 			=> 'input_file',
						'id' 			=> 'branding_favicon',
						'extensions' 	=> 'ico',
						'title' 		=> __('Favicon', 'theme_admin'),
						'description' 	=> __('must be "ico" file, you can generate it from <a href="http://tools.dynamicdrive.com/favicon/">here</a>', 'theme_admin')
					),
					array(
						'type' 			=> 'image',
						'id' 			=> 'branding_admin_logo',
						'title' 		=> __('Login Logo', 'theme_admin'),
						'description' 	=> __('Logo to be shown on WP-Admin Login Page instead of the WordPress logo', 'theme_admin')
					)
					
				)
			),
		
		// Background
		array(
			'title' 	=> 'Background',
			'options' 	=> array(
				
				array(
					'type' 			=> 'color',
					'id' 			=> 'site_bg_color',
					'title' 		=> __('Background Color', 'theme_admin'),
					'description' 	=> __('choose color to use as background', 'theme_admin'),
					'default' 		=> '#FFFFFF'
				),

				array(
					'type' 			=> 'radio_img',
					'id' 			=> 'site_bg_texture',
					'title' 		=> __('Background Texture', 'theme_admin'),
					'description' 	=> __('Choose texture to overlay on top of the background color', 'theme_admin'),
					'default' 		=> 'nasty_fabric',
					'options' 		=> array(
						'none' 	=> __('None', 'theme_admin'),
						'nasty_fabric' => __('Nasty Fabric', 'theme_admin'),
						'paper' => __('Paper', 'theme_admin'),
						'rough_diagonal' => __('Rough', 'theme_admin'),
						'horizontal_lines' => __( 'Horizontal', 'theme_admin')
						),
				 ),

				array(
					'type' 			=> 'image',
					'id' 			=> 'site_bg_image',
					'title' 		=> __('Background Image', 'theme_admin'),
					'description' 	=> __('choose image to use as background', 'theme_admin'),
				),
				/*
				array(
					'type' 			=> 'select',
					'id' 			=> 'site_bg_repeat',
					'title' 		=> __('Background Repeat', 'theme_admin'),
					'description' 	=> __('choose the repeat type of site background', 'theme_admin'),
					'default' 		=> 'stretch',
					'options' 		=> array(
						'stretch' 		=> __('Stretch', 'theme_admin'),
						'no-repeat' 	=> __('No Repeat', 'theme_admin'),
						'repeat' 		=> __('Repeat', 'theme_admin'),
						'repeat-x' 		=> __('Repeat X', 'theme_admin'),
						'repeat-y' 		=> __('Repeat Y', 'theme_admin')
					)
				),
				*/		
						
			)
		),	

		// Font
		array(
				'title' 	=> 'Font & Text',
				'options' 	=> array(
					
					array(
					'type' 			=> 'select',
					'id' 			=> 'general_family',
					'title' 		=> __('Font Family', 'theme_admin'),
					'description' 	=> __('site wide font family', 'theme_admin'),
					'default' 		=> 'Arial,Helvetica,Garuda,sans-serif',
					'options' 		=> array(
						"'Arial Black',Gadget,sans-serif"
						=> '"Arial Black",Gadget,sans-serif',
						'Arial,Helvetica,Garuda,sans-serif' 		
						=> 'Arial,Helvetica,Garuda,sans-serif',
						'Verdana,Geneva,Kalimati,sans-serif' 
						=> 'Verdana,Geneva,Kalimati,sans-serif',
						"'Lucida Sans Unicode','Lucida Grande',Garuda,sans-serif" 
						=> '"Lucida Sans Unicode","Lucida Grande",Garuda,sans-serif',
						"'Lucida Sans Unicode','Lucida Grande',Garuda,sans-serif" 
						=> '"Lucida Sans Unicode","Lucida Grande",Garuda,sans-serif',
						"Georgia,'Nimbus Roman No9 L',serif" 
						=> 'Georgia,"Nimbus Roman No9 L",serif',
						"'Palatino Linotype','Book Antiqua',Palatino,FreeSerif,serif" 
						=> '"Palatino Linotype","Book Antiqua",Palatino,FreeSerif,serif',
						'Tahoma,Geneva,Kalimati,sans-serif' 
						=> 'Tahoma,Geneva,Kalimati,sans-serif',
						"'Trebuchet MS',Helvetica,Jamrul,sans-serif" 
						=> '"Trebuchet MS",Helvetica,Jamrul,sans-serif',
						"'Times New Roman',Times,FreeSerif,serif" 
						=> '"Times New Roman",Times,FreeSerif,serif'
					)
				),
				
				array(
					'type' 			=> 'range',
					'id' 			=> 'general_font_size',
					'title' 		=> __('Font Size', 'theme_admin'),
					'description' 	=> __('site wide font size', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '15',
					'min' 			=> '10',
					'max' 			=> '20',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'general_line_height',
					'title' 		=> __('Line Height', 'theme_admin'),
					'description' 	=> __('site wide line height', 'theme_admin'),
					'unit' 			=> 'em',
					'default' 		=> '1.5',
					'min' 			=> '1',
					'max' 			=> '2.5',
					'step' 			=> '0.05'
				),
				array(
					'type' 			=> 'color',
					'id' 			=> 'general_color',
					'title' 		=> __('Font Color', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> '#333333'
				),
				array(
					'type' 			=> 'color',
					'id' 			=> 'general_link_color',
					'title' 		=> __('Link Color', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> '#1589c9'
				),
				array(
					'type' 			=> 'color',
					'id' 			=> 'general_link_hover_color',
					'title' 		=> __('Link Hover Color', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> '#09567e'
				),

				array(
					'type' 			=> 'color',
					'id' 			=> 'header_color',
					'title' 		=> __('Header Color', 'theme_admin'),
					'description' 	=> 'Color for h1, h2, and h3 headers',
					'default' 		=> '#000000'
				),

				array(
					'type' 			=> 'radio_img',
					'id' 			=> 'google_web_font',
					'title' 		=> __('Heading Font Family', 'theme_admin'),
					'description' 	=> __('choose the font face to apply to heading text eg., H1, H2, H3, ...', 'theme_admin'),
					'default' 		=> '',
					'options' 		=> array(
						'' 				=> 'None',
						
						'Amaranth' 		=> 'Amaranth',
						'Arbutus+Slab' 	=> 'Arbutus Slab',
						'Arvo' 			=> 'Arvo',
						'Cabin' 		=> 'Cabin',
						'Copse' 		=> 'Copse',
						'Droid+Sans' 	=> 'Droid Sans',
						'Droid+Serif' 	=> 'Droid Serif',
						'Fjalla+One' 	=> 'Fjalla One',
						'Josefin+Sans' 	=> 'Josefin Sans',
						'Open+Sans' 	=> 'Open Sans',
						'Pacifico' 		=> 'Pacifico',	

					),
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'google_web_font_custom',
					'title' 		=> __('Custom Google Web Fonts', 'theme_admin'),
					'description' 	=> __('Enter a font name if you want to use font that\'s listed above. You can check full font list at <a href="http://www.google.com/webfonts#HomePlace:home">Google Web Fonts</a>.', 'theme_admin'),
					'default' 		=> ''
				),
					
				)
			),
		
		
		
		
		
	);
	
	$config = array(
		'title'			=> __('Appearance', 'theme_admin'),
		'group_id' 		=> 'appearance',
		'active_first' 	=> true
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>