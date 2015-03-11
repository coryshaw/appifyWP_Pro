<?php

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <section id="body">
  <div class="container">
    <div class="row">

  <div class="span8 content">

    <?php if (function_exists('appifywp_breadcrumbs')) appifywp_breadcrumbs(); ?>
    <header class="post-title">
    <h1><?php the_title();?></h1>
    </header>
    <?php the_content();
    endwhile;
    // end of the loop
    wp_reset_query();
    // resetting the loop
    ?>
    <hr />

    <?php
    // Blog post query
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    query_posts( array( 'post_type' => 'post', 'paged'=>$paged, 'showposts'=>0) );
    if (have_posts()) : while ( have_posts() ) : the_post(); ?>
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

     <hr />
   </div><!-- /.post_class -->
 <?php endwhile; endif; ?>

</div><!-- /.span8 -->
<?php get_sidebar(); ?>
</div><!-- .row-->
</div><!-- .container -->
</section>
<?php get_footer(); ?>