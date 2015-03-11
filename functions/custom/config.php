<?php

if ( ! isset( $content_width ) ) $content_width = 885;

$theme_config = array(
	'theme_name' 	=> __('AppifyWP Pro', 'theme_admin'), 
	'theme_slug' 	=> 'appifywppro',
	'theme_version'		=> '1.0',
	
	// Theme Types
	'theme_types' => array('app','team'),
	
	// Theme Custom Meta
	'theme_custom_metas' => array( 'page' ),
	
	// Theme Menus
	'theme_menus' => array(
	//		'footer' => __('Footer Navigation', 'theme_admin')
	),
	
	// Theme Sidebar
	'theme_sidebars' => array(
		array(
			'id' => 'sidebar',
			'name' => __('Sidebar Widget Area', 'theme_admin'),
			'description' => __('Sidebar Widget Area', 'theme_admin'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		),
		
		array(
			'id' => 'first-footer',
			'name' => __('Footer 1st Column', 'theme_admin'),
			'description' => __('1st Footer Widget Area', 'theme_admin'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		),
		array(
			'id' => 'second-footer',
			'name' => __('Footer 2nd Column', 'theme_admin'),
			'description' => __('2nd Footer Widget Area', 'theme_admin'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		),
		array(
			'id' => 'third-footer',
			'name' => __('Footer 3rd Column', 'theme_admin'),
			'description' => __('3rd Footer Widget Area', 'theme_admin'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		),
		array(
			'id' => 'fourth-footer',
			'name' => __('Footer 4th Column', 'theme_admin'),
			'description' => __('4th Footer Widget Area', 'theme_admin'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	),
	
	// Theme Shortcode
	'theme_shortcodes' => array(
		'utility',
		'elements',
		'image',
		'tabs',
		'apps',
		'social',
		'slideshow',
		'map',
		'blog',
		'contact'
	),
	
	// Theme Options
	'theme_options' => array(
		'appearance' 	=> __('Appearance', 'theme_admin'),
		'header' 		=> __('Header', 'theme_admin'),
		'footer' 		=> __('Footer', 'theme_admin'),
		'home' 			=> __('Homepage', 'theme_admin'),
		'apps' 			=> __('Slideshow', 'theme_admin'),
		'blog' 			=> __('Blog', 'theme_admin'),
		'advanced' 		=> __('Advanced', 'theme_admin'),
	),
	
	// Theme Documents
	'theme_documents' => array(
		'changes-log' 	=> __('Update', 'theme_admin'),
		'credit' 		=> __('Credits', 'theme_admin'),
		'support' 		=> __('Support', 'theme_admin')
	),
	
);