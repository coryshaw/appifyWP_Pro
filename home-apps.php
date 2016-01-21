<?php

/**
 * Template Name: List of Apps
*/
 
get_header();
$args = array( 'post_type' => 'app', 'posts_per_page' => 100, 'orderby' => 'menu_order', 'order' => 'ASC');
$loop = new WP_Query( $args );
if ($loop->have_posts()):

// Slideshow Options
$img_slideshow_autoplay = theme_options( 'apps', 'img_slideshow_autoplay' );
$img_slide_effect = theme_options( 'apps', 'img_slide_effect' );
$img_slide_pause = theme_options( 'apps', 'img_slide_pause' ) * 1000;


$detect = new Mobile_Detect();
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	
	$device = '';
	$retina = false;

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
	
  
  
	

?>


<section id="body" class="home">

  <div class="app-showcase-wrapper">
    
    
    <?php $apploopcount = 0 ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<?php
		
		  
		  
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
		
			$app_icon = get_post_meta($post->ID, 'info_app_icon', true);
			if($app_icon != ''){
				$app_icon = theme_get_image( get_post_meta($post->ID, 'info_app_icon', true),80,80,$retina);
			}
			$info_price = get_post_meta($post->ID, 'info_price', true);
			$info_use_image = get_post_meta($post->ID, 'info_use_image', true);
			$info_app_logo = theme_get_image( get_post_meta($post->ID, 'info_app_logo', true));
			
			$info_tagline = get_post_meta($post->ID, 'info_tagline', true);
			$info_description_primary = get_post_meta($post->ID, 'info_description_primary', true);
			$info_description_secondary = get_post_meta($post->ID, 'info_description_secondary', true);
  
			$iphone = get_post_meta($post->ID, 'platforms_iphone', true);
			$ipad = get_post_meta($post->ID, 'platforms_ipad', true);
			$androidPhone = get_post_meta($post->ID, 'platforms_android_phone', true);
			$androidTablet = get_post_meta($post->ID, 'platforms_android_tablet', true);
			$windowspPhone = get_post_meta($post->ID, 'platforms_windowsphone', true);
			$windowspTablet = get_post_meta($post->ID, 'platforms_windowstablet', true);
			$blackberry = get_post_meta($post->ID, 'platforms_blackberry', true);
			$desktopmac = get_post_meta($post->ID, 'platforms_desktopmac', true);
			$desktoppc = get_post_meta($post->ID, 'platforms_desktoppc', true);
			$appletv = get_post_meta($post->ID, 'platforms_appletv', true);
			$applewatch = get_post_meta($post->ID, 'platforms_applewatch', true);
			
			$platforms = array(
				"iphone"	=>	array(
					'name'	=>	'iPhone',
					'value'	=>	$iphone
				),
				"ipad"	=> array(
					'name'	=>	'iPad',
					'value'	=>	$ipad
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
				"applewatch"	=> array(
					'name'	=>	'Apple Watch',
					'value'	=>	$applewatch
				),
				"appletv"	=> array(
					'name'	=>	'Apple TV',
					'value'	=>	$appletv
				),

			);
			
			
			
			foreach ($platforms as $platform => $data) {
				if ($data['value'] == 'on') {
					include 'platforms/platform_'.$platform.'_vars.php';
					
				}
			}
			
			// count the enabled platforms
			$platformCount = 0;
			foreach($platforms as $platform => $data) {
			    if ($data['value'] == 'on') 
			    $platformCount++;
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
			
			// reformulate platforms array
			$mainPlatform = '';
			foreach($platforms as $platform => $data) {
			    if ($data['value'] == 'on') {
			      if ($deviceMatch && $device == $platform){ 
			         $mainPlatform = $platform;
			         break;
			      } else if(!$deviceMatch && ${$platform.'_default'} == 'on'){
			         $mainPlatform = $platform;
			         break;
			      }
			    }
			}

			if($mainPlatform == ''){
				foreach($platforms as $platform => $data) {
				    if ($data['value'] == 'on') {
				      $mainPlatform = $platform;
				      break;
				    }
				}

			}
			
		?>
		<div class="app-showcase-block <?php the_slug(); ?> <?php if ($apploopcount == 0){ echo 'current '; }?>clearfix <?php echo $appearance_showcase_foreground_contrast; ?><?php if ($appearance_parallax == 'on'){ echo ' parallax';}?>">
  		    	<div class="showcase-background <?php echo $appearance_background_image ?>" style="<?php if($appearance_background_image == 'custom' && $appearance_custom_background_image != ''): ?>background-image: url(<?php echo $appearance_custom_background_image ?>);<?php endif; ?><?php if($appearance_background_color != ''){echo 'background-color:'.$appearance_background_color.';';}?>"></div>
  		       		
  		       		<?php if(theme_options('appearance', 'site_bg_texture') != 'none'): ?>
  		       		  <div class="texture <?php echo theme_options('appearance', 'site_bg_texture'); ?>"></div>
  		       		<?php endif; ?>
  		
  			      
  		
  			     
  			        		<div class="showcase-wrapper container">
  		
  			        	<?php if ($platformCount != 0){	
  		                	include 'platforms/platform_loop_home.php';
  		                } else {
  		                	echo 'No Platforms Selected for this App';
  		                }?>
  			        			
  		
  			        		</div><!-- end .showcase-wrapper -->
 		</div><!-- #app-showcase-block-->	
 		  <?php $apploopcount++ ?>
			<?php endwhile; ?>
		
		<?php else: ?>
		<div class="documentation">
			
			<div class="container">
				
				<div class="row">
					<div class="span12 content current">
						<a class="appifywplogo" href="http://appifywp.com"></a>
						<section>
							<h2>Getting Started</h2>
							<p>Welcome to AppifyWP Pro! Thank you for purchasing and using AppifyWP themes.</p>
							<div class="alert">This guide will show until you've added your first app, and will be replaced with your apps. Additionally, you can change this default homepage to a page, post, or a blog in AppifyWP Pro Settings > Homepage</div>
						</section>

						
						<?php include 'functions/admin/functions/documentation.php';?>

					</div><!-- .content -->
				</div><!-- .row -->
			</div><!--.container -->
		</div><!-- .documentation -->

		<?php endif ?>
			
	
	</div><!-- end app-showcase-wrapper -->
	
		
	
  </section><!-- section#body -->

<?php if ($loop->have_posts()): 
	include 'includes/home_js.php'; 
	endif;
?>
<?php get_footer(); ?>