<?php

// Apps List
add_shortcode('portfolio', 'theme_shortcode_portfolio');
function theme_shortcode_portfolio($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'count' => '3',
		'featured'	=> false,
		'cats'		=> false,
		'ids'		=> false
	), $atts));
	global $post;
	$args = array(
		'post_type' => 'portfolio',
		'post__not_in' => array($post->ID)
	);

	// CATs
	if( $cats ) $args['tax_query'] = array(
		array(
			'taxonomy' => 'portfolio_category',
			'field' => 'id',
			'terms' => preg_split( '/,/', $cats )
		)
	);
	
	// Post Count
	$args['posts_per_page'] = $count;

	// Featured
	if( $featured ) {
		$args['meta_key'] = 'info_side_portfolio_featured';
		if( $featured == 'true' ) $args['meta_value'] = 'on';
		elseif( $featured == 'false' ) $args['meta_value'] = 'off';
	}

	// IDs
	if( $ids ) $args['post__in'] = preg_split( '/,/', $ids );

	$portfolios = get_posts( $args );
	$list = '';
	$counter = 0;
	foreach ( $portfolios as $portfolio ) {

		$last = ( ++$counter % 3 == 0 ) ? 'last' : '';
		$clear = ( $counter % 3 == 0 ) ? '<div class="clear"></div>' : '';

		$title = $portfolio->post_title;
		$portfolio_category = wp_get_post_terms( $portfolio->ID, 'portfolio_category', array("fields" => "names" ));
		$link = get_permalink( $portfolio->ID );
		

		$feature_image_id = get_post_thumbnail_id( $portfolio->ID );
		$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
		$feature_image_url = $feature_image_url[0];
		if( $feature_image_url == '' ) $feature_image_url = THEME_URI . '/images/pattern/na.png';
		
		$resized_post_thumb_src = theme_get_image( $feature_image_url, 290, 125, true );

		$list .= '<div class="one_third ' . $last . '">';
		$list .= '<div class="portfolio-frame">';

		$list .= '<div class="photo-frame icon-watch">';
		$list .= '<a href="'.$link.'"><img src="'.$resized_post_thumb_src.'" alt="'.$title.'" title="'.$title.'" rel="tip" /></a>';
		$list .= '<div class="photo-frame-shadow"></div>';
		$list .= '</div>';

		$list .= '<div class="portfolio-info">';
		$list .= '<div class="title">'.$title.'</div>';
		$list .= '<div class="category">'. implode( ' / ', $portfolio_category ) .'</div>';
		$list .= '</div>';

		$list .= '</div>';
		$list .= '</div>';

		$list .= $clear;
	}
	return <<<RET
$list
RET;
}