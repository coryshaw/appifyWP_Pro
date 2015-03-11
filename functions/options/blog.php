<?php 
	
	// Option
	$options = array(
		
		// Blog
		array(
			'title' 	=> __('Blog', 'theme_admin'),
			'options' 	=> array(
				
				
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'show_feature_image',
					'toggle' 		=> 'show_feature_image',
					'title' 		=> __('Show Featured Image', 'theme_admin'),
					'description' 	=> __('Turn on to use a featured image for each blog post', 'theme_admin'),
					'default' 		=> 'on',
				),
				
				array(
					'type' 			=> 'text',
					'id' 			=> 'read_more_text',
					'title' 		=> __('Read More Text', 'theme_admin'),
					'description' 	=> __('string for "read more" link.<br />leave blank to disable "read more" link.', 'theme_admin'),
					'default' 		=> 'Continue Reading &rarr;'
				),
				
			)
		),
		
		
		
		
	);
	
	$config = array(
		'title' 	=> __('Blog', 'theme_admin'),
		'group_id' 	=> 'blog'
	);
	
return array( 'options' => $options, 'config' => $config );

?>