<?php
$ipad_orientation = get_post_meta($post->ID, 'platforms_ipad_orientation', true);
$ipad_default = get_post_meta($post->ID, 'platforms_ipad_default', true);
$ipad_description = get_post_meta($post->ID, 'platforms_ipad_description', true);
$ipad_appstore_url = get_post_meta($post->ID, 'platforms_ipad_appstore_url', true);
$ipad_effect = get_post_meta($post->ID, 'platforms_ipad_effect', true);
$ipad_effect = get_post_meta($post->ID, 'platforms_ipad_effect', true);
$ipad_slideshow_images = get_post_meta($post->ID, 'platforms_ipad_slideshow_images', true);
$ipad_video_id = get_post_meta($post->ID, 'platforms_ipad_video_id', true);
$ipad_coming_soon = get_post_meta($post->ID, 'platforms_ipad_coming_soon', true);
$ipad_coming_soon_text = get_post_meta($post->ID, 'platforms_ipad_coming_soon_text', true);
$ipad_price = get_post_meta($post->ID, 'platforms_ipad_price', true);

if ($ipad_orientation == 'landscape') :
	$ipad_leftcolumn = 'span5';
	$ipad_rightcolumn = 'span7';
	$ipad_screen_width = '450';
	$ipad_screen_height = '337';
else :
	$ipad_leftcolumn = 'span6';
	$ipad_rightcolumn = 'span6';
	$ipad_screen_width = '347';
	$ipad_screen_height = '463';
endif;

?>