<?php
/**
 * The template for displaying all posts.
 *
 * Default Post Template
 *
 * Page template with a fixed 940px container and right sidebar layout
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */

get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>
 
  <section id="body">
  <div class="container post">
    <div class="row">
    <div class="span8 content">
      <?php if (function_exists('appifywp_breadcrumbs')) appifywp_breadcrumbs(); ?>
      
      <header class="post-title">
          <h1><?php the_title();?></h1>
      </header>
      
      <?php
      if ( theme_options( 'blog', 'show_feature_image' ) != 'off' && has_post_thumbnail() ) {
        the_post_thumbnail('featured-image');
      } ?>

      <p class="meta"><?php echo appifywp_posted_on();?></p>
            <?php the_content();?>
            <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
<?php endwhile; // end of the loop. ?>
 <?php comments_template(); ?>

    </div><!-- /.span8 -->
          <?php get_sidebar(); ?>
</div><!-- .container-->
</div>
</section>

<?php get_footer(); ?>