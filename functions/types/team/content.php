<?php

$config = array(
	'title' 	=> __('Team Member Info', 'theme_admin'),
	'group_id' 	=> 'info',
	'context'	=> 'normal',
	'priority' 	=> 'high',
	'types' 	=> array( 'team' ),
	'multi' 	=> false
);
$options = array(
	
	array(
		'type' 			=> 'image',
		'id' 			=> 'mug',
		'title' 		=> __('Mug Shot', 'theme_admin'),
		'description' 	=> __("Upload an image of this team member.", 'theme_admin'),
		'default' 		=> ''
	),
	
	array(
		'type' 			=> 'text',
		'id' 			=> 'role',
		'title' 		=> __('Title', 'theme_admin'),
		'description' 	=> __("What is this team member's job title?", 'theme_admin'),
		'default' 		=> ''
	),
	
	array(
		'type' 			=> 'text',
		'id' 			=> 'location',
		'title' 		=> __('Location', 'theme_admin'),
		'description' 	=> __('Be as broad or specific as you want.', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'textarea',
		'id' 			=> 'short_bio',
		'title' 		=> __('Short Bio', 'theme_admin'),
		'description' 	=> __('List what this person does or has done in a sentence or two. This text will display on the team member list page.', 'theme_admin'),
		'default' 		=> ''
	),
	
	array(
		'type' 	=> 'separator',
		'title' => 'Contact Info'
	),
	
	array(
		'type' 			=> 'text',
		'id' 			=> 'email',
		'title' 		=> __('Email Address', 'theme_admin'),
		'description' 	=> __('Entering an email address will display it publicly on the site.', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'phone',
		'title' 		=> __('Phone Number', 'theme_admin'),
		'description' 	=> __('Entering a phone number will display it publicly on the site.', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'website',
		'title' 		=> __('Personal Website', 'theme_admin'),
		'description' 	=> __('Add a URL to a personal website for this team member', 'theme_admin'),
		'default' 		=> ''
	),
	
	array(
		'type' 	=> 'separator',
		'title' => 'Social Links'
	),
	
	array(
		'type' 			=> 'text',
		'id' 			=> 'twitter',
		'title' 		=> __('Twitter Profile URL', 'theme_admin'),
		'description' 	=> __('This will add a link to their twitter profile (include http://).', 'theme_admin'),
		'default' 		=> ''
	),
	
	array(
		'type' 			=> 'text',
		'id' 			=> 'facebook',
		'title' 		=> __('Facebook Profile URL', 'theme_admin'),
		'description' 	=> __('This will add a link to their Facebook profile (include http://).', 'theme_admin'),
		'default' 		=> ''
	),
	
	array(
		'type' 			=> 'text',
		'id' 			=> 'linkedin',
		'title' 		=> __('LinkedIn Profile URL', 'theme_admin'),
		'description' 	=> __('This will add a link to their LinkedIn profile (include http://).', 'theme_admin'),
		'default' 		=> ''
	),

	
);

new metaboxes_tool($config,$options);

?>