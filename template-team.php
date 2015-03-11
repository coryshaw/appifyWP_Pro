<?php
/**
 * Template Name: Team Members
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


<section id="body" class="team-archive">

<div class="container">
	
<div class="row">
	<div class="span8 content">

		<header class="subhead" id="overview">
		<h1><?php the_title();?></h1>
		<?php the_post(); the_content(); ?>
		<hr/>
		<?php
	    $args = array( 'post_type' => 'team', 'posts_per_page' => 10, 'orderby' => 'menu_order', 'order' => 'ASC' );
		$loop = new WP_Query( $args );
		?>

		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<?php
			$name = get_the_title();
			$title = get_post_meta($post->ID, 'info_role', true);
			$mug = theme_get_image( get_post_meta($post->ID, 'info_mug', true), 170, 170, true, $retina );
			$shortbio = get_post_meta($post->ID, 'info_short_bio', true);
		?>
		<div <?php post_class(); ?>>
			<div class="row-fluid">
				<div class="span4">
					 <?php if ($mug != ''){ ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><img id="mugshot" src="<?php echo $mug; ?>" alt="<?php the_title(); ?> icon" width="170" height="170" /></a>
					<?php } ?>
				</div>
				<div class="span8">
					<h2 class="archive-post-header">
						<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
					</h2>

					<?php if ($title != ''){ ?>
					<p class="title"><?php echo $title ?></p>
					<?php } ?>

					<?php if ($shortbio != ''){ ?>
					<p class="shortbio"><?php echo $shortbio ?></p>
					<?php } ?>

					<p class="moreinfo"><a href="<?php the_permalink(); ?>"><?php _e( 'More Info', 'appifywp' );?></a></p>
				</div>
			</div>
		
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