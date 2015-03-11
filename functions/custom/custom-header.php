<style type="text/css">

	/* Font */
	body {
		font-family: <?php echo theme_options( 'appearance', 'general_family' ); ?>;
		<?php if( theme_options( 'appearance', 'h1_font_size' ) ) : ?>
		
		<?php endif; ?>
		font-size: <?php echo theme_options( 'appearance', 'general_font_size' ); ?>px !important;
		line-height: <?php echo theme_options( 'appearance', 'general_line_height' ); ?>em;
		color: <?php echo theme_options( 'appearance', 'general_color' ); ?>;
	}
  	
  	a, .navbar .nav > li > a, .well.sidebar-nav ul li a {
		color: <?php echo theme_options( 'appearance', 'general_link_color' ); ?>;
	}
	
	p, li p, li {
	  line-height: <?php echo theme_options( 'appearance', 'general_line_height' ); ?>em;
	}
	
	a:hover, .navbar .nav > li > a:hover, .well.sidebar-nav ul li a:hover {
		color: <?php echo theme_options( 'appearance', 'general_link_hover_color' ); ?>;
	}

	h1, h2, h3 {
		color: <?php echo theme_options( 'appearance', 'header_color' ); ?>;
	}

	
	/* Header */

	#branding .logo {
		font-size: <?php echo theme_options('header', 'branding_font_size'); ?>px;
		color: <?php echo theme_options('header', 'branding_font_color'); ?>;
	}
		
	<?php if( theme_options('header', 'branding_desc') == 'on' ): ?>
		#site-description {
			display: block;
			color: <?php echo theme_options('header', 'branding_font_color'); ?>;
		}
	<?php endif; ?>


	/* Header Nav */
	#main-menu a { 
		font-size: <?php echo theme_options('header', 'menu_font_size'); ?>px;
		color: <?php echo theme_options('header', 'primary_nav_font_color'); ?>;
	}
	
	<?php if (theme_options('header', 'header_bg_color') !== ''){ ?>
	.navbar-inner {
	  background-color: <?php echo theme_options('header', 'header_bg_color') ?>!important;
	  background-repeat: repeat;
	}
	<?php } ?>
	


	/* Background */
	body {
		background-color: <?php echo theme_options('appearance', 'site_bg_color'); ?>;
		<?php if(theme_options('appearance', 'site_bg_image') != ''){ ?>
		background-image: url(<?php echo theme_get_attachment_src( theme_options('appearance', 'site_bg_image') ); ?>);
		<?php } ?>
	}

	<?php if(theme_options('appearance', 'site_bg_texture') != 'None'){ ?>
	#pattern {
		background-image: url(<?php echo THEME_URI; ?>/img/textures/<?php echo theme_options('appearance', 'site_bg_texture'); ?>);
	}
	<?php } ?>
			
	/* Footer */
	footer { 
		<?php if(theme_options('footer', 'footer_bg_color') != ''){ ?>
		background-color: <?php echo theme_options('footer', 'footer_bg_color'); ?>; 
		<?php } ?>
		<?php if(theme_options('footer', 'footer_text_color') != ''){ ?>
		color: <?php echo theme_options('footer', 'footer_text_color'); ?>;
		<?php } ?> 
	}

	<?php if(theme_options('footer', 'footer_text_color') != ''){ ?>
	footer, footer a, footer a:hover, footer h1, footer h2, footer h3 {
		color: <?php echo theme_options('footer', 'footer_text_color'); ?>;
	}
	<?php } ?>
	
	/* Custom CSS */
	<?php echo theme_options('advanced', 'custom_css'); ?>
	
</style>

<?php 

// Font to Apply
$site_wide_font = str_replace( '+', ' ', theme_options('appearance', 'google_web_font'));
$site_wide_custom_font = str_replace( '+', ' ', theme_options('appearance', 'google_web_font_custom'));
$site_wide_font = ( $site_wide_custom_font != '' ) ? $site_wide_custom_font : $site_wide_font;

$single_page_font = str_replace( '+', ' ', $appearance_google_web_font_custom = get_post_meta(get_queried_object_id(), 'appearance_google_web_font_custom', true));

if( $site_wide_font != '' || $single_page_font != '' ): 
	
	// Choose one font to load
	$gfont = ($single_page_font != '') ? $single_page_font : $site_wide_font;
	
	// Apply List
	// $apply_lists = theme_options('font', 'google_web_font_apply');
	$apply_lists = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.primary   ');
	$site_wide_active_selector = '';	
	$site_wide_loading_selector = '';
	$site_wide_inactive_selector = '';
	foreach( $apply_lists as $apply_list ) {
		$site_wide_active_selector .= '.wf-active ' . $apply_list . ',';
		$site_wide_loading_selector .= '.wf-loading ' . $apply_list . ', ';
		$site_wide_inactive_selector .= '.wf-inactive ' . $apply_list . ', ';
	}
	$site_wide_active_selector = substr( $site_wide_active_selector, 0, -2 );
	$site_wide_loading_selector = substr( $site_wide_loading_selector, 0, -2 );
	$site_wide_inactive_selector = substr( $site_wide_loading_selector, 0, -2 );
?>

<script type="text/javascript">
  WebFontConfig = {
    google: { families: [ '<?php echo str_replace( ' ', '+', $gfont ); ?>' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();
</script>

<style type="text/css">
	/* Google Web Font */
	<?php echo $site_wide_active_selector; ?> {
	  font-family: "<?php echo $gfont; ?>";
	  visibility: visible;
	}
	<?php echo $site_wide_loading_selector; ?> { visibility: hidden; }
	<?php echo $site_wide_inactive_selector; ?> { visibility: visible; }
</style>

<?php endif; ?>