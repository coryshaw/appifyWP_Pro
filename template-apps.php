<?php
/**
 * Template Name: Apps
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.7
 *
 * Last Revised: September 9, 2012
 *
 *
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.6
 */

get_header();
if (have_posts() ) ;?>


<section id="body" class="app-archive">

<div class="container">
	
<div class="row">
	<div class="span8 content">

		<header class="subhead" id="overview">
		<h1><?php the_title();?></h1>
		</header>
		<?php the_post(); the_content(); ?>
		<hr/>
		<?php
	    $args = array( 'post_type' => 'app', 'posts_per_page' => 10, 'orderby' => 'menu_order', 'order' => 'ASC');
		$loop = new WP_Query( $args );
		?>

		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<?php
			$app_icon = theme_get_image( get_post_meta($post->ID, 'info_app_icon', true));
			$info_price = get_post_meta($post->ID, 'info_price', true);
			$info_use_image = get_post_meta($post->ID, 'info_use_image', true);
			$info_app_logo = get_post_meta($post->ID, 'info_app_logo', true);
			$info_tagline = get_post_meta($post->ID, 'info_tagline', true);
			$info_description_primary = get_post_meta($post->ID, 'info_description_primary', true);
			$info_description_secondary = get_post_meta($post->ID, 'info_description_secondary', true);


			$iphone = get_post_meta($post->ID, 'platforms_iphone', true);
			$ipad = get_post_meta($post->ID, 'platforms_ipad', true);
			$appletv = get_post_meta($post->ID, 'platforms_appletv', true);
			$applewatch = get_post_meta($post->ID, 'platforms_applewatch', true);
			$androidPhone = get_post_meta($post->ID, 'platforms_android_phone', true);
			$androidTablet = get_post_meta($post->ID, 'platforms_android_tablet', true);
			$windowspPhone = get_post_meta($post->ID, 'platforms_windowsphone', true);
			$windowspTablet = get_post_meta($post->ID, 'platforms_windowstablet', true);
			$blackberry = get_post_meta($post->ID, 'platforms_blackberry', true);
			$desktopmac = get_post_meta($post->ID, 'platforms_desktopmac', true);
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
		?>
		<div <?php post_class(); ?>>
			
			<div class="row-fluid">
				<div class="span3">
					 <?php if ($app_icon != ''){ ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><img id="app-icon" src="<?php echo $app_icon; ?>" alt="<?php the_title(); ?> icon" /></a>
					<?php } ?>
				</div><!-- .span2 -->
				<div class="span9">

					<h2 class="archive-post-header">
						<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
					</h2>

					<?php if ($info_description_primary != ''){ ?>
					<p class="primary"><?php echo $info_description_primary ?></p>
					<?php } ?>

					<?php if ($info_description_secondary != ''){ ?>
					<p class="secondary"><?php echo $info_description_secondary ?></p>
					<?php } ?>

					<div class="platforms">

					<?php 
				    	foreach ($platforms as $platform => $data) {
						if ($data['value'] == 'on'):
						?>
						<a href="<?php echo the_permalink() . '#' . $platform ?>" class="<?php echo $platform ?> platform"><?php echo $data['name'] ?></a><?php 
				    	endif; 
				    	} // end foreach
				    ?>
					</div><!-- .platforms -->

					<p class="moreinfo"><a href="<?php the_permalink(); ?>"><?php _e( 'More Info', 'appifywp' );?></a></p>

				</div><!-- .span10 -->
			</div><!-- .row -->
				    
		</div><!-- /.post_class -->
				<hr/>
			<?php endwhile; ?>
			<?php appifywp_content_nav('nav-below');?>

		</div><!-- /.span8 -->
		<?php get_sidebar(); ?>
</div><!-- .row-->
</div><!-- .container -->
</section>
<?php get_footer(); ?>