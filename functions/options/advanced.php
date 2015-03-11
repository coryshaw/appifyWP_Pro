<?php 
	
	// Option
	$options = array(
		
		// MailChimp
		// array(
		// 	'title' 	=> __('MailChimp', 'theme_admin'),
		// 	'options' 	=> array(
		// 		array(
		// 			'type' 			=> 'text',
		// 			'id' 			=> 'mailchimp_api_key',
		// 			'title' 		=> __('MailChimp API Key', 'theme_admin'),
		// 			'description' 	=> __('Find your API Key from <a href="http://admin.mailchimp.com/account/api/" target="_blank">http://admin.mailchimp.com/account/api/</a>', 'theme_admin'),
		// 			'default' 		=> ''
		// 		),
		// 	)
		// ),

		// Responsive
		array(
			'title' 	=> __('Responsive', 'theme_admin'),
			'options' 	=> array(
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'enable_responsive',
					'title' 		=> __('Responsive Layout', 'theme_admin'),
					'description' 	=> __('Turn off to disable responsive layout (your site will look identical on all devices)', 'theme_admin'),
					'default' 		=> 'on'
				),
			)
		),

		
		// Misc
		array(
			'title' 	=> __('Misc', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'sticky_sidebar',
					'title' 		=> __('Sticky Sidebar', 'theme_admin'),
					'description' 	=> __('Turn on and the sidebar on your posts, pages, and apps will scroll with your visitors'),
					'default' 		=> 'on'
				),
						
				
				array(
					'type' 			=> 'text',
					'id' 			=> 'affiliate_id',
					'title' 		=> __('AppifyWP Affiliate ID', 'theme_admin'),
					'description' 	=> __('Make money by refering people to AppifyWP. Earn 30% of all sales referred by links containing your AppifyWP Affiliate ID<br><a target="_blank" href="http://appifywp.com/affiliate-program">Affiliate Program Signup</a>', 'theme_admin'),
					'default' 		=> ''
				),
				
				
				
				
				
				
				array(
					'type' 			=> 'textarea',
					'id' 			=> 'custom_css',
					'row'			=> 10,
					'title' 		=> __('Custom CSS', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> ''
				),
			)
		),
		
		// Save & Load Configuration
		array(
			'title' 	=> 'Save & Load AppifyWP Pro Settings',
			'options'	=> array(
				array(
					'type' 			=> 'textarea',
					'id' 			=> 'theme_export_option',
					'title' 		=> __('Export Options', 'theme_admin'),
					'description' 	=> __('copy/paste these string into blank .txt file and save it', 'theme_admin'),
					'default' 		=> ''
				),
				array(
					'type' 			=> 'textarea',
					'id' 			=> 'theme_import_option',
					'title' 		=> __('Import Options', 'theme_admin'),
					'description' 	=> __('copy string that you had saved from "Export Option" and paste it here', 'theme_admin'),
					'default' 		=> ''
				),	
			)
		),
		

	);
	
	$config = array(
		'title' => __('Advanced', 'theme_admin'),
		'group_id' => 'advanced',
		'active_first' => false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>