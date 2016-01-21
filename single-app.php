<?php
	get_header();
	the_post();

	/////////////////
	// Detect Devices

	$detect = new Mobile_Detect();
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$device = '';
	$retina = '';

	// tablets
	if ($deviceType == 'tablet') {

		if ($detect->isiPad()){
			$device = 'ipad';
		} elseif ($detect->isAndroidOS()) {
			$device = 'android_tablet';
		} elseif ($detect->isWindowsMobileOS()) {
			$device = 'windows_tablet';
		}

	// phones
	} elseif ($deviceType == 'phone'){

		if ($detect->isiPhone()){
			$device = 'iphone';
		} elseif ($detect->isAndroidOS()) {
			$device = 'android_phone';
		} elseif ($detect->isWindowsPhoneOS()) {
			$device = 'windows_phone';
		} elseif ($detect->isBlackBerry()) {
			$device = 'blackberry';
		}

	}
	
	
	

	/////////////////
	// Get App Info
	if (get_post_meta($post->ID, 'info_app_icon', true) != ''){
	$app_icon = theme_get_image( get_post_meta($post->ID, 'info_app_icon', true), 80, 80, false, $retina);
	} else {
	$app_icon = '';
	}
	$info_price = get_post_meta($post->ID, 'info_price', true);
	$info_use_image = get_post_meta($post->ID, 'info_use_image', true);
	
	$info_app_logo = theme_get_image( get_post_meta($post->ID, 'info_app_logo', true));
	$info_tagline = get_post_meta($post->ID, 'info_tagline', true);
	$info_description_primary = get_post_meta($post->ID, 'info_description_primary', true);
	$info_description_secondary = get_post_meta($post->ID, 'info_description_secondary', true);
	

	/////////////////
	// Get Appearence

	$appearance_background_image = get_post_meta($post->ID, 'appearance_background_image', true);
	if (get_post_meta($post->ID, 'appearance_custom_background_image', true) != '') :
	$appearance_custom_background_image = theme_get_image(get_post_meta($post->ID, 'appearance_custom_background_image', true));
	else :
		$appearance_custom_background_image = '';
	endif;	
	$appearance_parallax = get_post_meta($post->ID, 'appearance_parallax', true);
	$appearance_sidebar = get_post_meta($post->ID, 'appearance_sidebar', true);
	$appearance_background_color = get_post_meta($post->ID, 'appearance_background_color', true);
	$appearance_background_texture = get_post_meta($post->ID, 'appearance_background_texture', true);
	$appearance_showcase_foreground_contrast = get_post_meta($post->ID, 'appearance_foreground_contrast', true);
	$appearance_showcase_font_color = get_post_meta($post->ID, 'appearance_showcase_font_color', true);
	$appearance_title_image = get_post_meta($post->ID, 'appearance_title_image', true);
//	$appearance_google_web_font_custom = get_post_meta($post->ID, 'appearance_google_web_font_custom', true);


	/////////////////
	// Get Platforms

	$iphone = get_post_meta($post->ID, 'platforms_iphone', true);
	$ipad = get_post_meta($post->ID, 'platforms_ipad', true);
	$desktopmac = get_post_meta($post->ID, 'platforms_desktopmac', true);
	$appletv = get_post_meta($post->ID, 'platforms_appletv', true);
	$applewatch = get_post_meta($post->ID, 'platforms_applewatch', true);
	$androidPhone = get_post_meta($post->ID, 'platforms_android_phone', true);
	$androidTablet = get_post_meta($post->ID, 'platforms_android_tablet', true);
	$windowspPhone = get_post_meta($post->ID, 'platforms_windowsphone', true);
	$windowspTablet = get_post_meta($post->ID, 'platforms_windowstablet', true);
	$blackberry = get_post_meta($post->ID, 'platforms_blackberry', true);
	$desktoppc = get_post_meta($post->ID, 'platforms_desktoppc', true);
	
	$platforms = array(
		"iphone"	=>	array(
			'name'	=>	'iPhone',
			'value'	=>	$iphone
		),
		"ipad"	=> array(
			'name'	=>	'iPad',
			'value'	=>	$ipad
		),
		"applewatch"	=> array(
			'name'	=>	'Apple Watch',
			'value'	=>	$applewatch
		),
		"appletv"	=> array(
			'name'	=>	'Apple TV',
			'value'	=>	$appletv
		),
		"android_phone"	=> array(
			'name'	=>	'Android Phone',
			'value'	=>	$androidPhone
		),
		"android_tablet"=> array(
			'name'	=>	'Android Tablet',
			'value'	=>	$androidTablet
		),
		"windowsphone"=> array(
			'name'	=>	'Windows Phone',
			'value'	=>	$windowspPhone
		),
		"windowstablet"=> array(
			'name'	=>	'Windows Tablet',
			'value'	=>	$windowspTablet
		),
		"blackberry"=> array(
			'name'	=>	'Blackberry',
			'value'	=>	$blackberry
		),
		"desktopmac"=> array(
			'name'	=>	'Mac Desktop',
			'value'	=>	$desktopmac
		),
		"desktoppc"=> array(
			'name'	=>	'Windows Desktop',
			'value'	=>	$desktoppc
		),

	);

	// load vars for enabled platforms
	foreach ($platforms as $platform => $data) {
		if ($data['value'] == 'on') {
			include 'platforms/platform_'.$platform.'_vars.php';
		}
	}

	// Is there match between enabled platforms and user's device?
	$deviceMatch = false;
	foreach ($platforms as $platform => $data) {

		if ($data['value'] == 'on') {
			if ($platform == $device){
				$deviceMatch = true;
			}
		}
	}


	
	
	

	// Slideshow Options
	$img_slideshow_autoplay = theme_options( 'apps', 'img_slideshow_autoplay' );
	$img_slide_effect = theme_options( 'apps', 'img_slide_effect' );
	$img_slide_pause = theme_options( 'apps', 'img_slide_pause' ) * 1000;
	



	
?>

	
	<style type="text/css">
	
	/* Showcase Background */


	.showcase-background {
	
	
		<?php if($appearance_background_image == 'custom' && $appearance_custom_background_image != ''): ?>
		background-image: url(<?php echo $appearance_custom_background_image ?>);
		<?php endif; ?>
		<?php if($appearance_background_color != ''): ?>
		background-color: <?php echo $appearance_background_color ?> ;
		<?php endif; ?>
		<?php if($appearance_showcase_font_color != ''): ?>
		color: <?php echo $appearance_showcase_font_color ?> !important;
		<?php endif; ?>
	}

	<?php if($appearance_showcase_font_color != ''): ?>
	#app-showcase-block a {
		color: <?php echo $appearance_showcase_font_color ?> !important;
	}
	<?php endif; ?>

	<?php if($appearance_showcase_font_color != ''): ?>
	#app-showcase-block, #app-showcase-block h1, #app-showcase-block p {
		color: <?php echo $appearance_showcase_font_color ?> !important;
	}
	<?php endif; ?>

	</style>

    <section id="app-showcase-block" class="app-showcase-block clearfix <?php echo $appearance_showcase_foreground_contrast; ?>">
    	<div class="showcase-background <?php echo $appearance_background_image ?>"></div>
       		
       		<?php if(theme_options('appearance', 'site_bg_texture') != 'none'): ?>
       		  <div class="texture <?php echo theme_options('appearance', 'site_bg_texture'); ?>"></div>
       		<?php endif; ?>

    		<div class="app-title clearfix">
    			<div class="container">
    				<div class="app-title-group">
    				<?php if( $app_icon != '' ): ?>
						<img id="app-icon" src="<?php echo $app_icon; ?>" alt="<?php the_title(); ?> icon" />
            <?php endif; ?>

					    <h1 id="app-title">
					        <?php if( $info_use_image == 'on' && $info_app_logo != '' ): ?>
					            <img src="<?php echo $info_app_logo ?>" alt="<?php the_title(); ?>" />
					        <?php else: ?>
					            <?php the_title(); ?>
					        <?php endif; ?>
					    </h1>
					</div><!-- .app-title-group -->

				    <?php
				    // count the enabled platforms
				    $platformCount = 0;
					foreach($platforms as $platform => $data) {
					    if ($data['value'] == 'on') 
					        $platformCount++;          
					}

				    ?>

				    <?php if($platformCount > 1): ?>
				    <div class="platforms-nav">
				    	<div class="arrow"></div>

				    	<?php 
				    	foreach ($platforms as $platform => $data) {
						if ($data['value'] == 'on'):
						?><a href="#<?php echo $platform ?>" class="<?php echo $platform ?><?php if ($deviceMatch && $device == $platform){ echo ' current';
				    		} else if(!$deviceMatch && ${$platform.'_default'} == 'on'){ echo ' current';}?>"><?php echo $data['name'] ?></a><?php 
				    	endif; 
				    	} // end foreach
				    	?>
				    	
				    </div><!-- end .platforms-nav -->
					<?php endif; // poatformCountd ?>
				</div><!-- end .container -->

			</div><!-- end .app-title -->

	        <div id="app-platforms-container">

	        	<div class="app-showcase">
	        		<div class="showcase-wrapper container">

	        			<!-- Platforms Loop -->

	        	

	        			<?php if ($platformCount != 0){	
  		                	include 'platforms/platform_loop.php';
  		                } else {
  		                	echo 'No Platforms Selected for this App';
  		                }?>

	        		</div><!-- end .showcase-wrapper -->
	        	</div><!-- end .app-showcase -->
	            
	        </div><!-- #app-platforms-container -->
    </section><!-- #app-showcase-block -->
	
	  <?php if($post->post_content != "") : ?>

    <section id="body">
        <div class="container">
        		


        		<?php if( $appearance_sidebar == 'on' ) : ?>
	        	<div class="row">
		        <div class="span8 content">
		        <?php if( have_posts() ) the_post(); the_content(); ?>
		        </div>
		        <?php get_sidebar(); ?>
		        </div><!-- .row -->
		        <?php else : ?>

		        <div class="span12 content">
	        		<?php if( have_posts() ) the_post(); the_content(); ?>
	        	</div>
	        	
	        	<?php endif; ?>

	        	
	        	

        </div><!-- .container -->
    </section><!-- #body -->
  <?php endif ; ?>
<?php include 'includes/app_js.php';?>
<?php get_footer(); ?>