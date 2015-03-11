<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */
get_header(); ?>
   <section id="body"> 
   <div class="container">
   <div class="row">
	<div class="span8 content">

		<?php if (function_exists('appifywp_breadcrumbs')) appifywp_breadcrumbs(); ?>

		<header class="jumbotron subhead" id="overview">
	        <h1><?php _e( 'Page Not Found', 'appifywp' ); ?></h1>
	        <p class="lead"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'appifywp' ); ?></p>
      	</header>		

		<div class="well">
			<?php get_search_form(); ?>
		</div><!--/.well -->

		<div class="row">
			<div class="span4">
				<h2>All Pages</h2>
				<?php wp_page_menu(); ?>
			</div><!--/.span4 -->

			<div class="span4">
				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
				<h2><?php _e( 'Most Used Categories', 'appifywp' ); ?></h2>
							<ul>
							<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
							</ul>
						
			</div><!--/.span4 -->
		</div><!--/.row -->

	</div><!--/.span8 -->
		
		<?php get_sidebar(); ?>

		</div><!--/.row -->
	</div><!-- .container -->
</section>
 

<?php get_footer(); ?>