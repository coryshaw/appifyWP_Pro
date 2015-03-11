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


<section id="body">

<div class="container archive">
	
<div class="row">
	<div class="span8 content">

		<?php if (function_exists('appifywp_breadcrumbs')) appifywp_breadcrumbs(); ?>

		<header class="subhead" id="overview">
		<div class="page-title archive-header"><?php _e('Archives', 'appifywp'); ?></div>
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
			_e( 'Archives', 'appifywp' );
		}
		?></h1>

		<hr/>
		<?php while ( have_posts() ) : the_post(); ?>
		<div <?php post_class(); ?>>
			<h3 class="archive-post-header"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
			<?php if ( theme_options( 'blog', 'show_feature_image' ) != 'off' && has_post_thumbnail() ) : ?>
		      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
		      <?php if ( theme_options( 'blog', 'show_feature_image' ) != 'off' && has_post_thumbnail() ) {
		        the_post_thumbnail('featured-image');
		      } ?>
		      </a>
		      <?php endif; ?>
			<p class="meta"><?php echo appifywp_posted_on();?></p>
		
				<?php the_excerpt();?>
				       
				    
				</div><!-- /.post_class -->
				
			<?php endwhile; ?>
			<?php appifywp_content_nav('nav-below');?>

		</div><!-- /.span8 -->
		<?php get_sidebar(); ?>
</div><!-- .row-->
</div><!-- .container -->
</section>
<?php get_footer(); ?>