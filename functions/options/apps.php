<?php 
	
	// Option
	$options = array(
		
		
		// Slide
		array(
			'title' 	=> __('Slideshow', 'theme_admin'),
			'options' 	=> array(
				
				
				// IMGs Slide
				
				array(
					'type' 			=> 'select',
					'id' 			=> 'img_slide_effect',
					'title' 		=> __('Slideshow Type', 'theme_admin'),
					'description' 	=> __('Choose slide effect', 'theme_admin'),
					'default' 		=> 'slide',
					'options' 		=> array(
						'fade' 				=> __('Fade', 'theme_admin'),
						'slide' 			=> __('Slide', 'theme_admin')
					)
				),
				
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'img_slideshow_autoplay',
					'toggle'  =>  'autoplay',
					'title' 		=> __('Auto Play Slideshows', 'theme_admin'),
					'description' 	=> __('Animate slide shows automatically when the page loads', 'theme_admin'),
					'default' 		=> 'on'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'img_slide_pause',
					'toggle_group' 	=> 'autoplay',
					'title' 		=> __('Pause Time', 'theme_admin'),
					'description' 	=> __('0.5 - 10 sec', 'theme_admin'),
					'unit' 			=> 'sec',
					'default' 		=> '3',
					'min' 			=> '0.5',
					'max' 			=> '10',
					'step' 			=> '0.5'
				),
				
				
						
			)
		),		

	);
	
	$config = array(
		'title'	 	=> __('Apps', 'theme_admin'),
		'group_id' 	=> 'apps',
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>