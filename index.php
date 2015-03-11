<?php
/**
 * Description: Default Index template to display loop of blog posts
 */

get_header(); ?>


<section id="body">
  <div class="container">

    <div class="row">
      <div class="span8 content">

    <?php
              // Blog post query
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    query_posts( array( 'post_type' => 'post', 'paged'=>$paged, 'showposts'=>0) );
    if (have_posts()) : while ( have_posts() ) : the_post(); ?>
    <div <?php post_class(); ?>>
      <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a>
      <p class="meta"><?php echo appifywp_posted_on();?></p>
      
        
         <?php the_excerpt();?>
   </div><!-- /.post_class -->
 <?php endwhile; endif; ?>
 <?php appifywp_content_nav('nav-below');?>

</div><!-- /.content -->
<?php get_sidebar(); ?>
</div><!-- .row -->
</div><!-- .container -->
</section>
<?php get_footer(); ?>