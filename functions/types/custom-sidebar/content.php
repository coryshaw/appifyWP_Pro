<?php

$config = array(
	'title' 		=> __('Sidebar Info', 'theme_admin'),
	'group_id' 		=> 'info',
	'callback' 		=> '',
	'context' 		=> 'normal',
	'priority' 		=> 'high',
	'types' 		=> array( 'custom_sidebar' ),
	'multi' 		=> false
);
$options = array(
	
	array(
		'type' => 'text',
		'id' => 'name',
		'title' => __('Name', 'theme_admin'),
		'description' => __('Sidebar\'s name', 'theme_admin'),
	),
	
	array(
		'type' => 'text',
		'id' => 'short_desc',
		'title' => __('Description', 'theme_admin'),
		'description' => __('Sidebar\'s short description', 'theme_admin')
	),
	
);
new metaboxes_tool($config,$options);

?>