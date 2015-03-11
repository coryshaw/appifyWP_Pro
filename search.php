<?php
/**
 *
 * Search Template
 *
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.7
 *
 * Last Revised: January 22, 2012
 */
get_header(); ?>
 
 <section id="body" class="search">
<div class="container">
<div class="row">
<?php if ( have_posts() ) : ?>
  

<div class="span8 content">
	<header>
        <h1><?php printf( __( 'Search Results for: %s', 'appifywp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
       
      </header>
					<?php while ( have_posts() ) : the_post(); ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h2> <?php the_title();?></h2></a>
<p><?php the_excerpt();?></p>
<hr />

				<?php endwhile; ?>
			<?php else : ?>


<div class="span8 content">
	<header class="subhead" id="overview">
	<h1><?php _e( 'No Results Found', 'appifywp' ); ?></h1>
	</header>
      <p class="lead"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps you should try again with a different search term.', 'appifywp' ); ?></p>

<div class="well">
					<?php get_search_form(); ?>

</div><!--/.well -->
<?php endif ;?>
				<?php appifywp_content_nav( 'nav-below' ); ?>

			

		</div><!--/.span8 -->

<?php get_sidebar(); ?>

</div>
</div>
</section>
<?php get_footer(); ?>