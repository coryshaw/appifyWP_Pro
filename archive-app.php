<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header();
if (have_posts() ) ;?>


<section id="body" class="app-archive">

<div class="container">
	
<div class="row">
	<div class="span8 content">

		<header class="subhead" id="overview">
		<h1><?php
		if ( is_day() ) {
			get_the_date();
		} elseif ( is_month() ) {
			printf( get_the_date( _x( 'F Y', 'monthly archives date format', 'appifywp' ) ) );
		} elseif ( is_year() ) {
			printf(  get_the_date( _x( 'Y', 'yearly archives date format', 'appifywp' ) ) );
		} elseif ( is_tag() ) {
			printf( single_tag_title( '', false ) );
					// Show an optional tag description
			$tag_description = tag_description();
			if ( $tag_description )
				echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
		} elseif ( is_category() ) {
			printf( single_cat_title( '', false ) );
					// Show an optional category description
			$category_description = category_description();
			if ( $category_description )
				echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
		} else {
			_e( 'Apps', 'appifywp' );
		}
		?></h1>
		</header>

		<hr/>

		<?php 
		$args = array( 'post_type' => 'app', 'posts_per_page' => 10, 'orderby' => 'menu_order', 'order' => 'ASC');
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<?php

			
			$info_price = get_post_meta($post->ID, 'info_price', true);
			$info_use_image = get_post_meta($post->ID, 'info_use_image', true);
			$info_app_logo = get_post_meta($post->ID, 'info_app_logo', true);
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
						<a href="<?php echo the_permalink() . '#' . $platform ?>" class="<?php echo $platform ?> platform"><?php _e( $data['name'], 'appifywp' ) ?>		</a><?php 
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

		</div><!-- /.span8 -->
		<?php get_sidebar(); ?>
</div><!-- .row-->
</div><!-- .container -->
</section>
<?php get_footer(); ?>