<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: Default Page
 * Description: Page template with a content container and right sidebar
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section id="body">
  <div class="container">
    <div class="row">
      <div class="span8 content">
        <?php if ( function_exists( 'appifywp_breadcrumbs' ) ) appifywp_breadcrumbs(); ?>
        <header class="post-title">
          <h1><?php the_title();?></h1>
        </header>
        <?php
        if ( theme_options( 'blog', 'show_feature_image' ) != 'off' && has_post_thumbnail() ) {
        the_post_thumbnail('featured-image');
        } ?>
        <?php the_content();?>
<?php endwhile; // end of the loop. ?>
      </div><!-- .span8 -->
  <?php get_sidebar(); ?>
    </div><!-- .container-->
</div>
</section>
<?php get_footer(); ?>
