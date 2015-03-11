<?php

class Theme_admin {
	
	var $theme;
	
	function init( $theme ) {
		
		$this->theme = $theme;
		
		// Add admin functions
		$this->functions();
			
		// Add setting menu
		add_action('admin_menu', array(&$this,'add_option_menu'), 18 );
		
		// Update Notifier
		require_once( THEME_FUNCTIONS_DIR . '/update-notifier.php' );
		
		// Add custom post types
		$this->theme_types();
		
		// Support Ajax call
		$this->ajax_call();
		
		// Custom Login Logo
		add_action('login_head', array(&$this, 'custom_login_logo') );
		
		// Theme Activate
		add_action('admin_init', array(&$this,'theme_activate'));
	}
	
	// Admin functions
	// =================================== //
	
	function functions() {
		require_once(THEME_ADMIN_FUNCTIONS_DIR .'/general.php');
		
		// Include JS & CSS for Admin
		require_once(THEME_ADMIN_FUNCTIONS_DIR .'/admin-head.php');
		
		// Input generator tool
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/input-tool.php' );
		
		// Metabox generator tool
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/meta-tool.php' );
		
		// Post Order
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/post-order.php' );
	}
	
	// Theme options menu
	// =================================== //
	
	function add_option_menu() {
		// Admin theme main menu
		$update_bubble = ( is_theme_update() ) ? '<span class="update-plugins count-1"><span class="update-count">Updates</span></span>' : '';
		add_admin_menu_separator(26);
		add_menu_page( THEME_NAME, THEME_NAME . $update_bubble, 'edit_theme_options', 'theme_setting', array( &$this, 'load_option_menu' ), THEME_ADMIN_ASSETS_URI . '/images/admin/icons-16/appifyWP_logo.png', 27 );
		
		
		// Admin theme sub menu
		add_submenu_page('theme_setting', THEME_NAME. ' ' . __('Settings', 'theme_admin'), __('Settings', 'theme_admin'), 'edit_theme_options', 'theme_setting', array(&$this,'load_option_menu'));
		add_submenu_page('theme_setting', THEME_NAME . ' ' . __('Documentation', 'theme_admin'), __('Documentation', 'theme_admin'), 'edit_theme_options', 'theme_document', array(&$this,'load_option_menu'));

	}
	
	function load_option_menu() {
		// Setting page
		$sections = $this->theme->options;
		
		// Documentation page
		$docs = $this->theme->documents;
		
		if( $_GET['page'] == 'theme_document' || $_GET['page'] == 'theme_setting' )
		include_once( THEME_ADMIN_FUNCTIONS_DIR.'/' . str_replace('_', '-', $_GET['page']) . '.php' );
	}
	
	// Custom Post Types
	// =================================== //
	function theme_types() {
		foreach( $this->theme->types as $type ) {
			require_once( THEME_TYPES_DIR.'/'.$type.'/register.php' );
			require_once( THEME_TYPES_DIR.'/'.$type.'/manage.php' );
			require_once( THEME_TYPES_DIR.'/'.$type.'/content.php' );
		}
	}
	
	
	// Theme Activate
	// =================================== //
	function theme_activate(){
		if ('themes.php' == basename($_SERVER['PHP_SELF']) && isset($_GET['activated']) && $_GET['activated']=='true' ) {
			// update_option(THEME_SLUG.'_version', THEME_VERSION);
			wp_redirect( admin_url('admin.php?page=theme_setting') );
		}
	}
	
	// Admin AJAX handlerer
	// =================================== //
	function ajax_call() {
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/admin-ajax.php' );
	}
	
	// Custom WP-Admin Logo
	// =================================== //
	function custom_login_logo() {
		if( theme_options('appearance', 'branding_admin_logo') != '' ) {
			$logo_size = getimagesize( theme_get_attachment_src( theme_options('appearance', 'branding_admin_logo') ) );
			echo '<style type="text/css">#login h1 a { background-image:url('. theme_get_attachment_src( theme_options("appearance", "branding_admin_logo") ) .') !important; margin: 0 auto; background-size: auto; } </style>';
		}
	}
	
}

?>