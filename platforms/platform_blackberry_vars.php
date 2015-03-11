<?php
$blackberry_orientation = get_post_meta($post->ID, 'platforms_blackberry_orientation', true);
$blackberry_default = get_post_meta($post->ID, 'platforms_blackberry_default', true);
$blackberry_description = get_post_meta($post->ID, 'platforms_blackberry_description', true);
$blackberry_appstore_url = get_post_meta($post->ID, 'platforms_blackberry_appstore_url', true);
$blackberry_effect = get_post_meta($post->ID, 'platforms_blackberry_effect', true);
$blackberry_effect = get_post_meta($post->ID, 'platforms_blackberry_effect', true);
$blackberry_slideshow_images = get_post_meta($post->ID, 'platforms_blackberry_slideshow_images', true);
$blackberry_video_id = get_post_meta($post->ID, 'platforms_blackberry_video_id', true);
$blackberry_coming_soon = get_post_meta($post->ID, 'platforms_blackberry_coming_soon', true);
$blackberry_coming_soon_text = get_post_meta($post->ID, 'platforms_blackberry_coming_soon_text', true);
$blackberry_price = get_post_meta($post->ID, 'platforms_blackberry_price', true);

if ($blackberry_orientation == 'landscape') :
	$blackberry_leftcolumn = 'span5';
	$blackberry_rightcolumn = 'span7';
	$blackberry_screen_width = '358';
	$blackberry_screen_height = '215';
else :
	$blackberry_leftcolumn = 'span8';
	$blackberry_rightcolumn = 'span4';
	$blackberry_screen_width = '215';
	$blackberry_screen_height = '358';
endif;

?>