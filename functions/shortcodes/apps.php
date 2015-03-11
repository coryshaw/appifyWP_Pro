<?php

// Market Badge
add_shortcode('market_badge', 'theme_shortcode_market_badge');
function theme_shortcode_market_badge($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'market' => 'appstore',
		'url' => false
	), $atts));
	global $post;
	
	$badge_path = '';
	switch( $market ){
		case 'appstore' : $badge_path = THEME_URI . '/images/badge/app-store-badge-big.png';
		break;
		case 'android' : $badge_path = THEME_URI . '/images/badge/android-market-badge-black-big.png';
		break;
	}
	
	$alt = __('Available on', 'theme_front') . ' ' . ucfirst($market);
	
	return <<<RET
[raw]
<div class="market-badge">
	<a href="$url">
	<img class="store-badge" title="$alt" alt="$alt" src="$badge_path">
	</a>
</div>
[/raw]
RET;
}

// Apps List
add_shortcode('apps_list', 'theme_shortcode_app');
add_shortcode('app', 'theme_shortcode_app');
function theme_shortcode_app($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'count' 	=> '3',
		'featured'	=> false,
		'cats'		=> false,
		'ids'		=> false
	), $atts));
	global $post;
	$args = array(
		'post_type' => 'app',
		'post__not_in' => array($post->ID)
	);

	// CATs
	if( $cats ) $args['tax_query'] = array(
		array(
			'taxonomy' => 'app_platform',
			'field' => 'id',
			'terms' => preg_split( '/,/', $cats )
		)
	);
	
	// Post Count
	$args['posts_per_page'] = $count;

	// Featured
	if( $featured ) {
		$args['meta_key'] = 'info_side_app_featured';
		if( $featured == 'true' ) $args['meta_value'] = 'on';
		elseif( $featured == 'false' ) $args['meta_value'] = 'off';
	}

	// IDs
	if( $ids ) $args['post__in'] = preg_split( '/,/', $ids );

	$apps = get_posts( $args );
	$list = '';
	$counter = 0;
	foreach ( $apps as $app ) {

		$last = ( ++$counter % 3 == 0 ) ? 'last' : '';
		$clear = ( $counter % 3 == 0 ) ? '<div class="clear"></div>' : '';

		$feature_image_id = get_post_thumbnail_id( $app->ID );
		$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
		$feature_image_url = $feature_image_url[0];
		if( $feature_image_url == '' ) $feature_image_url = THEME_URI . '/images/pattern/na.png';
		$resized_post_thumb_src = theme_get_image( $feature_image_url, 290, 125, true );

		$title = $app->post_title;
		$link = get_permalink( $app->ID );
		$resized_icon_src = theme_get_image( get_post_meta($app->ID, 'info_icon', true), 56, 56, true );

		$app_category = wp_get_post_terms($app->ID, 'app_platform', array("fields" => "names"));

		$list .= '<div class="one_third ' . $last . '">';
		$list .= '<div class="app-frame">';

		$list .= '<div class="photo-frame icon-watch">';
		$list .= '<a href="' . $link . '"><img src="'.$resized_post_thumb_src.'" alt="'.$title.'" title="'.$title.'" rel="tip" /></a>';
		$list .= '<div class="photo-frame-shadow"></div>';
		$list .= '</div>';

		$list .= '<div class="app-info">';
		$list .= '<img src="' . $resized_icon_src . '" />';
		$list .= '<div class="title">'.$title.'</div>';
		$list .= '<div class="category">'. implode( ' / ', $app_category ) .'</div>';
		$list .= '</div>';
		
		$list .= '</div>';
		$list .= '</div>';

		$list .= $clear;

	}
	return <<<RET
$list
RET;
}

// Rating
add_shortcode('rating', 'theme_shortcode_rating');
function theme_shortcode_rating($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'score' => '5',
		'source' => ''
	), $atts));
	
	$fill_width = ceil( $score / 5 * 226 );
	$source = ( $source != '' ) ? __('on', 'theme_front') . ' <em>' . $source . '</em>' : '';
	$display_text = sprintf('<em>%s %s</em> %s', $score, __('stars', 'theme_front'), $source);
	
	return <<<RET
<div class="rating-wrap">
<div class="rating-fill" style="width:{$fill_width}px;"></div>
$display_text
</div>
RET;
}

// Feedback
add_shortcode('feedback', 'theme_shortcode_feedback');
function theme_shortcode_feedback($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'mail_to' => '',
		'topic' => '',
	), $atts));
	
	global $post;
	$app_title = $post->post_title;
	
	$mail_to = str_replace('@','[at]',$mail_to);
	$ajax_url = admin_url('admin-ajax.php');
	
	$comment_alt = __('Comment', 'theme_front');
	$request_alt = __('Request', 'theme_front');
	$bug_alt = __('Report Bug', 'theme_front');
	
	return <<<RET
[raw]
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('.feedback-form input:button').click(function(){
		$('.feedback-form input[name="type"]').val( $(this).attr('name') );
		$('.feedback-form').submit();
	});
});
</script>
<div class="feedback-form-wrapper">
<form class="feedback-form ajax-form validate-form" method="post" action="$ajax_url">
		<div class="feedback-box">
			<input type="text" class="input-text" name="contact-name-h" id="contact-form-contact-name-h">
			<div class="feedback-text-wrap form-input-item clearfix">
				<textarea name="feedback" class="feedback-text"></textarea>
				<div class="form-error-box"></div>
			</div>
			<input type="button" name="Comment" value=" " class="feedback-comment feedback-bt tip-left" title="$comment_alt" />
			<input type="button" name="Request" value=" " class="feedback-request feedback-bt tip-left"  title="$request_alt" />
			<input type="button" name="Bug" value=" " class="feedback-bug feedback-bt tip-left"  title="$bug_alt" />
		</div>
		<input type="hidden" name="action" value="do_feedback" />
		<input type="hidden" name="app_title" value="$app_title" />
		<input type="hidden" name="mail_to" value="$mail_to" />
		<input type="hidden" name="type" value="" />
		
		<div class="form-response"></div>

</form>
<div class="feedback-response"></div>
</div>
[/raw]
RET;
}
