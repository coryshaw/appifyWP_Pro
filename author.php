<?php
/**
 * The template for displaying Author Archive pages.
 *
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php
	/* Queue the first post, that way we know
	 * what author we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	the_post();
	?>

	<section id="body">
	<div class="container archive">
		
		<?php
		/* Since we called the_post() above, we need to
		* rewind the loop back to the beginning that way
		* we can run the loop properly, in full.
		*/
		rewind_posts();
		?>
		
		<div class="row">
			
			<div class="span8 content">

				<?php if (function_exists('appifywp_breadcrumbs')) appifywp_breadcrumbs(); ?>
				
				<header class="jumbotron subhead" id="overview">
					<div class="page-title archive-header author"><?php _e('Author Archives', 'appifywp' ); ?></div>
					<h1 class="archive-title"><?php echo get_the_author() ?></h1>
				</header>
				
				<?php while ( have_posts() ) : the_post(); ?>
				<div <?php post_class(); ?>>
					<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a>
					<?php if ( has_post_thumbnail()) : ?>
				      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				      <?php if ( theme_options( 'blog', 'show_feature_image' ) != 'off' && has_post_thumbnail() ) {
				        the_post_thumbnail('featured-image');
				      } ?>
				      </a>
				      <?php endif; ?>
					<p class="meta"><?php echo appifywp_posted_on();?></p>
					
					<?php the_excerpt();?>
				
									    
				</div><!-- /.post_class -->
				<hr/>
				<?php endwhile; ?>
				<?php endif; ?>
			</div><!-- /.span8 -->
			<?php get_sidebar(); ?>
		</div><!-- .row -->
	</div><!-- .container-->
</section>
<?php get_footer(); ?>