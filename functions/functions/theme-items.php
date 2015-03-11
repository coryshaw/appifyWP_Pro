<?php
	
// Theme Title
function theme_title() {
	global $page, $paged;
	
	$output =  wp_title( '|', false, 'right' );
	$output .=  get_bloginfo( 'name' );
	
	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( !empty($site_description) && is_front_page() )
		$output .=  " | $site_description";
	
	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$output .= ' | ' . sprintf( __( 'Page %s', 'theme_front' ), max( $paged, $page ) );
	
	return $output;
}

// generate breadcrumb
function theme_breadcrumb() {
	return false;
	if( function_exists( 'breadcrumbs_plus' ) &&  theme_options('content', 'breadcrumb_show') != 'off') {
		echo '<section id="breadcrumbs-wrap">';
		breadcrumbs_plus( array('title' => '') );
		echo '</section>';
	}
}

// generate pagination
function theme_pagination() {
	global $wpdb, $wp_query;
	if( intval($wp_query->max_num_pages) > 1 ) {
		echo '<div class="divider-full"></div>';
		wp_pagenavi();
	}
}

// generate post meta infos
function theme_entry_meta() {
?>
	<div class="entry-meta">

		<?php if( theme_options('blog', 'meta_author') != 'off' ) : ?>
		<span class="author">
			<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a>
		</span>
		<?php endif; ?>
		
		<?php if( theme_options('blog', 'meta_date') != 'off' ) : ?>
		<span class="date"><time datetime="<?php echo get_the_time('Y-m-d'); ?>"><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php echo get_the_date(); ?></a></time></span>
		<?php endif; ?>
			
		<?php if( theme_options('blog', 'meta_category') != 'off' && get_the_category_list() != '' ) : ?>
		<span class="categories"><?php echo get_the_category_list(', '); ?></span>
		<?php endif; ?>
		
		<?php if( theme_options('blog', 'meta_comment') != 'off' ) : ?>
		<span class="comments"><?php comments_popup_link(__('No Comments','theme_front'), __('1 Comment','theme_front'), __('% Comments','theme_front'), '', ''); ?></span>
		<?php endif; ?>

		<?php if( theme_options('blog', 'meta_tag') != 'off' && get_the_tag_list() != '' && false ) : ?>
		<span class="tags"><?php echo get_the_tag_list('<span class="tags">'.__('Tags: ', 'theme_front'),', '); ?></span>
		<?php endif; ?>

		

	</div>
<?php
}

// generate post head section
function theme_entry_head() {
	global $post;
	$feature_image_id = get_post_thumbnail_id();
	$title = ( is_single() ) ? '<h2 class="entry-title">'. $post->post_title .'</h2>' : '<h2 class="entry-title"><a href="'. get_permalink() .'">'. $post->post_title .'</a></h2>';
	
	if( theme_options( 'blog', 'show_feature_image' ) == 'off' || $feature_image_id == '' ) :
	?>
			<div class="entry-head clearfix">
				<?php echo $title; ?>
				<?php theme_entry_meta(); ?>
			</div>
			<div class="clear"></div>
	<?php
	else :
		$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
		$feature_image_url = $feature_image_url[0];
		
		if( theme_options( 'blog', 'feature_image_type' ) == 'full-width' ) :
		$feature_image_width = ( theme_options( 'blog', 'blog_layout' ) == 'full-width' || ( is_single() && theme_options( 'blog', 'single_layout' ) == 'full-width' ) ) ? '940' : '665';
			$resized_image_src = theme_get_image( $feature_image_url, $feature_image_width );

	?>
			<div class="entry-head clearfix">
				<?php echo $title; ?>
				<?php theme_entry_meta(); ?>
				<div class="feature-image">
				<div class="photo-frame icon-watch alignnone"><?php if( !is_single() ) : ?><a href="<?php the_permalink(); ?>"><?php endif; ?><img src="<?php echo $resized_image_src; ?>"><?php if( !is_single() ) : ?></a><?php endif; ?>
					<div class="photo-frame-shadow"></div>
				</div>
				</div>
			</div>
			<div class="clear"></div>
	<?php
		else :
		$resized_image_src = theme_get_image( $feature_image_url, 100, 100, true );
	?>
			<div class="entry-head clearfix">
				<div class="feature-image feature-image-left">
				<div class="photo-frame icon-watch alignnone"><?php if( !is_single() ) : ?><a href="<?php the_permalink(); ?>"><?php endif; ?><img src="<?php echo $resized_image_src; ?>"><?php if( !is_single() ) : ?></a><?php endif; ?>
					<div class="photo-frame-shadow"></div>
				</div>
				</div>
				<?php echo $title; ?>
				<?php theme_entry_meta(); ?>
			</div>
			<div class="clear"></div>
	<?php
		endif;
	endif;
}

// generate author box
function theme_author_box() {
?>
	<div class="author-box clearfix">
		<div class="author-img">
			<div class="photo-frame">
				<?php echo get_avatar( get_the_author_meta('user_email'), '80' ); ?>
			</div>
		</div>
		<div class="author-info">
			<div class="author-name"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></div>
			<p class="author-desc"><?php the_author_meta('description'); ?></p>
		</div>
	</div>
<?php
}

// generate board & mat
function theme_board_mat() {
?>
	<!-- Board & Mat -->
	<section id="table-wrap">
		<div id="table-top">
			<div id="table-top-shadow">
		    	<div id="table-mat-top-wrap">
			    	<div id="table-mat-top-texture"></div>
			    	<div id="table-mat-top"></div>
		    	</div>
		    </div>
		</div>
	    <div id="table-border">
	 		<div class="border-bottom-line"></div>
	    	<div id="table-border-shadow">
		    	<div id="table-mat-body-wrap-outer">
			    	<div id="table-mat-body-wrap">
			    		<div class="border-bottom-line"></div>
			    		<div id="table-mat-body"></div>
			    	</div>
		    	</div>
	    	</div>
	    </div>
	    <div id="table-shadow"></div>
	</section><!-- #table-wrap -->
<?php
}

// Navigation Menu Fallback
function primary_nav_fb() {
	if( theme_options('advanced', 'show_helper') != 'off' ):
	?>
		<ul id="primary-menu"><li>
		<a href="<?php echo get_admin_url(null, '/nav-menus.php'); ?>">Please manage menu at WP-Admin > Appearance > Menu</a>
		</li></ul>
	<?php
	endif;
}
function footer_nav_fb() {
	if( theme_options('advanced', 'show_helper') != 'off' ):
	?>
		<ul><li>
		<a href="<?php echo get_admin_url(null, '/nav-menus.php'); ?>">Please manage menu at WP-Admin > Appearance > Menu</a>
		</li></ul>
	<?php
	endif;
	return false;
}