<?php

class Theme {
	
	var $types;
	var $settings;
	var $sidebars;
	var $widgets;
	var $menus;
	var $options;
	var $documents;
	var $shortcodes;
	
	// Initialize theme.
	function init( $options ) {
	
		// Define theme's constants.
		$this->theme_config( $options );
		
		// Language support.
		add_action( 'init', array( &$this, 'theme_language' ) );
		
		// Theme support.
		add_action( 'after_setup_theme', array( &$this, 'theme_support' ) );
		
		// Load theme's core.
		$this->theme_functions();
		
		// Theme's plugins.
		$this->theme_plugins();
		
		// Theme's shortcodes.
		$this->theme_shortcodes();
		
		// Theme's widgets.
		add_action( 'widgets_init', array( &$this, 'theme_widgets' ) );
		
		// Theme's sidebars
		$this->theme_sidebars();
		
		// Theme's types
		$this->theme_types();
		
		// Theme's AJAX.
		require_once( THEME_FUNCTIONS_DIR . '/theme-ajax.php' );

		// Mobile Detect
		require_once( THEME_FUNCTIONS_DIR . '/mobile-detect.php' );

		// Theme's scripts & CSS
		add_action( 'wp_print_scripts', array( &$this, 'theme_scripts' ) );
		add_action( 'wp_print_styles', array( &$this, 'theme_styles' ) );
		add_action(	'wp_head', array(&$this, 'theme_custom_header'));

		// Custom
		$this->theme_custom_hook();

		// Theme's admin.
		$this->theme_admin();
	}
	
	function theme_config( $options ) {
	
		$this->types = $options['theme_types'];
		$this->metas = $options['theme_custom_metas'];
		$this->menus = $options['theme_menus'];
		$this->sidebars = $options['theme_sidebars'];
		$this->options = $options['theme_options'];
		$this->documents = $options['theme_documents'];
		$this->shortcodes = $options['theme_shortcodes'];
		
		// Core
		define( 'THEME_NAME', $options['theme_name'] );
		define( 'THEME_SLUG', $options['theme_slug'] );
		define( 'THEME_VERSION', $options['theme_version'] );

		define( 'THEME_URI', get_template_directory_uri() );
		define( 'THEME_FRAMEWORK_URI', THEME_URI.'/functions/' );
		
		define( 'THEME_DIR', get_template_directory() );
		define( 'THEME_FRAMEWORK_DIR', THEME_DIR.'/functions' );
		
		define( 'THEME_TYPES_DIR', THEME_FRAMEWORK_DIR.'/types' );
		define( 'THEME_OPTIONS_DIR', THEME_FRAMEWORK_DIR.'/options' );
		define( 'THEME_DOCUMENTS_DIR', THEME_FRAMEWORK_DIR.'/documents' );
		define( 'THEME_FUNCTIONS_DIR', THEME_FRAMEWORK_DIR.'/functions' );
		define( 'THEME_LANGUAGES_DIR', THEME_FRAMEWORK_DIR.'/languages' );
		define( 'THEME_PLUGINS_DIR', THEME_FRAMEWORK_DIR.'/plugins' );
		define( 'THEME_SHORTCODES_DIR', THEME_FRAMEWORK_DIR.'/shortcodes' );
		define( 'THEME_WIDGETS_DIR', THEME_FRAMEWORK_DIR.'/widgets' );
		
		// Admin
		define( 'THEME_ADMIN_DIR', THEME_FRAMEWORK_DIR.'/admin' );
		define( 'THEME_ADMIN_FUNCTIONS_DIR', THEME_ADMIN_DIR.'/functions' );

		define( 'THEME_ADMIN_ASSETS_DIR', THEME_FRAMEWORK_DIR.'/assets' );
		define( 'THEME_ADMIN_ASSETS_URI', THEME_FRAMEWORK_URI.'/assets' );
		
		// Custom
		define( 'THEME_CUSTOM_DIR', THEME_FRAMEWORK_DIR.'/custom' );
		define( 'THEME_CUSTOM_URI', THEME_FRAMEWORK_URI.'/custom' );
		define( 'THEME_CUSTOM_ASSETS_URI', THEME_FRAMEWORK_URI.'/custom/assets' );
	}
	
	function theme_language() {
		$locale = get_locale();
		if (is_admin()) {
			load_theme_textdomain( 'theme_admin', THEME_FRAMEWORK_DIR . '/languages' );
			$locale_file = THEME_FRAMEWORK_DIR . "/languages/$locale.php";
		}else{
			load_theme_textdomain( 'theme_front', THEME_DIR . '/languages' );
			$locale_file = THEME_DIR . "/languages/$locale.php";
		}
		if ( is_readable( $locale_file ) ){
			require_once( $locale_file );
		}
	}
	
	function theme_support() {
		if( function_exists( 'add_theme_support' ) ) {
			// Editor style
			add_editor_style();

			// Post Thumbnail
			add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

			// Add default posts and comments RSS feed links to head
			add_theme_support( 'automatic-feed-links' );
			
			// WordPress Navigation Menu
			register_nav_menus( $this->menus );
		}
	}
	
	function theme_functions() {
		require_once( THEME_FUNCTIONS_DIR . '/resize.php' );
		require_once( THEME_FUNCTIONS_DIR . '/general.php' );
		require_once( THEME_FUNCTIONS_DIR . '/theme-items.php' );
	}
	
	function theme_plugins() {
		require_once( THEME_PLUGINS_DIR . '/wp-pagenavi/wp-pagenavi.php' );
	}
	
	function theme_shortcodes() {
		require_once( THEME_SHORTCODES_DIR . '/fix.php' );			// Fix
		
		// Enable Shortcode in Text Widget
		add_filter('widget_text', 'do_shortcode');
		//add_filter( 'widget_text', 'theme_formatter', 99 );
		
		foreach ( $this->shortcodes as $shortcode ) {
			require_once( THEME_SHORTCODES_DIR . '/' . $shortcode . '.php' );
		}
	}
	
	function theme_widgets() {

		// Contact Form
		//require_once( THEME_WIDGETS_DIR . '/contact-form.php' );
		//require_once( THEME_WIDGETS_DIR . '/twitter.php' );
		
	}
	
	function theme_sidebars() {
		foreach( $this->sidebars as $theme_sidebar ){
			register_sidebar($theme_sidebar);
		}
		
		$custom_sidebars = get_posts('post_type=custom_sidebar&orderby=date');
		foreach ($custom_sidebars as $sidebar){
			$sidebar_name = get_post_meta($sidebar->ID, 'info_name', true);
			$sidebar_desc = get_post_meta($sidebar->ID, 'info_short_desc', true);
			register_sidebar(array(
				'id' => str_replace( ' ', '-', strtolower( $sidebar_name ) ),
				'name' =>  $sidebar_name . ' (custom)',
				'description' => $sidebar_desc,
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
		}	
	}
	
	function theme_types() {
		foreach( $this->types as $type ) {
			require_once( THEME_TYPES_DIR . '/' . $type . '/register.php' );
		}
	}
	
	function theme_scripts() {
		
		if ( !is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ){
		
			/////////// JS Libs
			
			// Modernizr
			wp_enqueue_script( 'theme-modernizr', THEME_URI . '/libs/modernizr.custom.js' );
						
			// Comment
			wp_enqueue_script( 'comment' );
			wp_enqueue_script( 'comment-reply' );

			// Plugins
			wp_enqueue_script( 'plugins', THEME_URI . '/libs/plugins.min.js', false, THEME_VERSION, true );
			
			// Custom Global Logic
			wp_enqueue_script( 'custom-logic', THEME_URI . '/js/global_logic.min.js', false, THEME_VERSION, true );

		}
	}

	function theme_styles() {
		
		if ( !is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ){
		
			// Flex Slider
			wp_enqueue_style( 'style-flexslider', THEME_URI . '/libs/flexslider/flexslider.css', false, THEME_VERSION );
			
			// Elastic Slide
			wp_enqueue_style( 'style-elastic', THEME_URI . '/libs/elastic-slide/elastislide.css', false, THEME_VERSION );
			
			// Fancybox
			wp_enqueue_style( 'style-fancybox', THEME_URI . '/libs/fancybox/jquery.fancybox.css', false, THEME_VERSION );

			wp_enqueue_style('bootstrap', THEME_URI . '/css/bootstrap.min.css', false ,'2.3.0', 'all' );

			wp_enqueue_style('font-awesome', THEME_URI . '/css/font-awesome.min.css', false ,'1.0', 'all' );
      
      		wp_enqueue_style('appifywp', THEME_URI . '/css/appifywp_styles.css', false , THEME_VERSION );


      
			// Responsive
			if( theme_options('advanced', 'enable_responsive') != 'off' ) {
				wp_enqueue_style('bootstrap-responsive', THEME_URI . '/css/bootstrap-responsive.min.css', false ,'2.3.0', 'all' );
				wp_enqueue_style('appifywp-responsive', THEME_URI . '/css/appifywp_responsive_styles.css', false ,'1.0', 'all' );
			}
			
			// Standard style.css
			wp_enqueue_style( 'theme-style', get_stylesheet_uri(), false, THEME_VERSION );
		}
	}
	
	function theme_custom_header() {
		include( THEME_CUSTOM_DIR . '/custom-header.php' );
	}
	
	function theme_custom_hook() {
		include( THEME_CUSTOM_DIR . '/custom-hook.php' );
	}
	
	function theme_admin() {
		if ( is_admin() || ( in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) ) {
			require_once( THEME_ADMIN_DIR . '/admin.php' );
			$admin = new Theme_admin();
			$admin->init( $this );
		}
	}

}

?>