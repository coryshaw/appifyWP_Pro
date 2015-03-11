<?php
$iphone_orientation = get_post_meta($post->ID, 'platforms_iphone_orientation', true);
$iphone_default = get_post_meta($post->ID, 'platforms_iphone_default', true);
$iphone_description = get_post_meta($post->ID, 'platforms_iphone_description', true);
$iphone_appstore_url = get_post_meta($post->ID, 'platforms_iphone_appstore_url', true);
$iphone_effect = get_post_meta($post->ID, 'platforms_iphone_effect', true);
$iphone_slideshow_images = get_post_meta($post->ID, 'platforms_iphone_slideshow_images', true);
$iphone_video_id = get_post_meta($post->ID, 'platforms_iphone_video_id', true);
$iphone_coming_soon = get_post_meta($post->ID, 'platforms_iphone_coming_soon', true);
$iphone_coming_soon_text = get_post_meta($post->ID, 'platforms_iphone_coming_soon_text', true);
$iphone_price = get_post_meta($post->ID, 'platforms_iphone_price', true);

if ($iphone_orientation == 'landscape') :
	$iphone_leftcolumn = 'span5';
	$iphone_rightcolumn = 'span7';
	$iphone_screen_width = '435';
	$iphone_screen_height = '245';
else :
	$iphone_leftcolumn = 'span8';
	$iphone_rightcolumn = 'span4';
	$iphone_screen_width = '245';
	$iphone_screen_height = '435';
endif;
?>