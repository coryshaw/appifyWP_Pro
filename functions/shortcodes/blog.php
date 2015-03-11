<?php

// Blog
add_shortcode('blog','theme_shortcode_blog');
function theme_shortcode_blog($atts, $content = null, $code) {
	extract( shortcode_atts( array(
		'count' 	=> '3',
		'cat' 		=> '',
		'tag' 		=> '',
		'thumb' 	=> true,
		'author' 	=> true,
		'date'		=> true,	
		'type'		=> 'grid' 	// list, grid
	), $atts ) );
	
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $count,
		'ignore_sticky_posts' => true
	);
	if( $cat != '' ) $args['cat'] = $cat;
	if( $tag != '' ) $args['tag__in'] = split( ',', $tag );
	$list = '';
	
	wp_reset_query();
	query_posts( $args );
	
	// List Type
	if( $type == 'list' )
	while( have_posts() ) {
		the_post();
		$feature_image_id = get_post_thumbnail_id();
		$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
		$feature_image_url = $feature_image_url[0];
		if( $feature_image_url == '' ) $feature_image_url = THEME_URI . '/images/pattern/na.png';
		
		$resized_post_thumb_src = theme_get_image( $feature_image_url, 50, 50, true );

		
		$list .= '<div class="post-list clearfix">';
		
		if( $thumb == 'thumb' )
		$list .= '<div class="feature-image icon-link feature-image-left"><div class="photo-frame alignnone"><a href="' . get_permalink() . '"><img src="' . $resized_post_thumb_src . '"></a></div></div>';
		
		$list .= '<div class="post-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
		
		$list .= '<div class="post-meta">';
		
		// Author
		if( $author === true )
		$list .= '<span class="author"><a href="' . get_author_posts_url(get_the_author_meta( 'ID' )) . '">' . get_the_author_meta('display_name') .'</a></span> ';

		if( $author === true && $date === true ) $list .= '<span class="post-separator"> / </span>';

		// Date
		if( $date === true )
		$list .= '<span><time datetime="' . get_the_time('Y-m-d') . '"><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) .'">' . get_the_date() .'</a></time></span>';

		$list .= '</div>';
		
		$list .= '</div>';
		$list .= '<div class="clear"></div>';
	}

	// Grid
	$counter = 0;
	if( $type == 'grid' )
	while( have_posts() ) {
		the_post();
		
		$last = ( ++$counter % 3 == 0 ) ? 'last' : '';

		$feature_image_id = get_post_thumbnail_id();
		$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
		$feature_image_url = $feature_image_url[0];
		if( $feature_image_url == '' ) $feature_image_url = THEME_URI . '/images/pattern/na.png';
		
		$resized_post_thumb_src = theme_get_image( $feature_image_url, 290, 100, true );

		
		$list .= '<div class="one_third ' . $last . '"><div class="post-grid clearfix">';
		
		if( $thumb == 'thumb' )
		
		$list .= '<div class="photo-frame icon-watch alignnone">';
		$list .= '<a href="' . get_permalink() . '"><img src="' . $resized_post_thumb_src . '"></a>';
		$list .= '<div class="photo-frame-shadow"></div>';
		$list .= '</div>';

			$list .= '<div class="post-grid-info">';

			// Title
			$list .= '<div class="post-title">' . get_the_title() . '</div>';

			$list .= '<div class="post-meta">';
			
			// Author
			if( $author === true )
			$list .= '<span class="author">' . get_the_author_meta('display_name') .'</span> ';

			if( $author === true && $date === true ) $list .= '<span class="post-separator"> / </span>';

			// Date
			if( $date === true )
			$list .= '<span><time datetime="' . get_the_time('Y-m-d') . '">' . get_the_date() .'</time></span>';

			$list .= '</div>';

			$list .= '</div>';

		$list .= '</div></div>';
	}

	wp_reset_query();
	return <<<RET
$list
RET;

}