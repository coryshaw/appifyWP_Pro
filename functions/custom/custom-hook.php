<?php
// Add specific CSS class by filter
add_filter('body_class','theme_class');
function theme_class($classes) {
	global $post;

	if( ( is_singular('app') || is_singular('portfolio') ) && get_post_meta($post->ID, 'appearance_layout_override', true) == 'on' ) {
		$classes[] = 'mat-' . get_post_meta($post->ID, 'appearance_mat_show', true);
		$classes[] = 'table-' . get_post_meta($post->ID, 'appearance_table_show', true);
	}elseif( ( is_singular('app') || is_singular('portfolio') ) && get_post_meta($post->ID, 'appearance_layout_override', true) == 'off' ) {
		$classes[] = 'mat-' . theme_options('appearance', 'mat_show');
		$classes[] = 'table-' . theme_options('appearance', 'table_show');
	}
	
	if( is_front_page() || is_page_template('template-slides.php') || is_page_template('template-framed-slides.php') || is_page_template('template-apps-dock.php') ) {
		$classes[] = 'mat-' . theme_options('appearance', 'mat_show');
		$classes[] = 'table-' . theme_options('appearance', 'table_show');
	}
	
	// Header
	$classes[] = 'header-' . getDarkLightYIQ( theme_options('header', 'header_bg_color') );
	
	// Footer
	$classes[] = 'footer-' . getDarkLightYIQ( theme_options('footer', 'footer_bg_color') );
	
	// Show Space
	if( isset( $post->ID ) ) {
		
		

		if( is_singular('app') || is_singular('portfolio') ) {
			$appearance_background_override = get_post_meta($post->ID, 'appearance_background_override', true);
			$appearance_site_bg_color = get_post_meta($post->ID, 'appearance_site_bg_color', true);
		} else {
			$appearance_background_override = get_post_meta($post->ID, 'general_page_bg_override', true);
			$appearance_site_bg_color = get_post_meta($post->ID, 'general_page_bg_color', true);
		}
		


		if( $appearance_background_override == 'on' && $appearance_site_bg_color != '' ) {
			$showcase_bg_color = $appearance_site_bg_color;
		} else {
			$showcase_bg_color = theme_options( 'appearance' ,'site_bg_color' );
		}

		$classes[] = 'show-space-' . getDarkLightYIQ( $showcase_bg_color );

	}
	
	return $classes;
}

// Favicon
add_action('wp_head', 'favicon', 1);
add_action('admin_head', 'favicon', 1);
function favicon() {
	$favicon = theme_get_attachment_src( theme_options('appearance', 'branding_favicon') );
	if( $favicon != '' ){
		echo '<link rel="shortcut icon" type="image/x-icon" href="'.$favicon.'" />';
	}
	
}

// Hide Image in Blog Page
// add_filter('the_content','blog_content_filter');
function blog_content_filter($content){

    if ( is_home() ){
      $content = preg_replace("/<img[^>]+\>/i", "", $content);
    }

    return $content;
}

// Change Excerpt "More" text
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more( $more ) {
	global $post;
	return '<p><a href="'. get_permalink($post->ID) .'">' . theme_options('blog', 'read_more_text') . '</a></p>';
}


// Custom Password Required Template
add_filter('the_password_form', 'base_password_form');
function base_password_form() {
    global $post;

    $label = 'pwbox-'.(empty($post->ID) ? rand() : $post->ID);
    $output = '<form action="' . get_option('siteurl') . '/wp-pass.php" method="post" class="validate-form">
    <p>' . __('This post is password protected. Please fill the password:', 'theme_front') . '</p>
    <div class="form-input-item protected-password-input-item clearfix">
    <input name="post_password" class="input-text {required:true}" id="' . $label . '" type="password" size="20" value="" autocomplete="off" /><label for="' . $label . '">' . __('Password', 'theme_front') . ' <span class="required-star">*</span></label>
	</div>
	<div class="form-input-item clearfix">
	<button type="submit" name="Submit" class="button medium"><span>' . esc_attr__('Submit', 'theme_front') . '</span></button>
	</div>
    </form>';

    return $output;
}
