<?php
$android_phone_orientation = get_post_meta($post->ID, 'platforms_android_phone_orientation', true);
$android_phone_default = get_post_meta($post->ID, 'platforms_android_phone_default', true);
$android_phone_description = get_post_meta($post->ID, 'platforms_android_phone_description', true);
$android_phone_appstore_url = get_post_meta($post->ID, 'platforms_android_phone_google_play_appstore_url', true);
$android_phone_appstore_url_amazon = get_post_meta($post->ID, 'platforms_android_phone_kindle_appstore_url', true);
$android_phone_effect = get_post_meta($post->ID, 'platforms_android_phone_effect', true);
$android_phone_effect = get_post_meta($post->ID, 'platforms_android_phone_effect', true);
$android_phone_slideshow_images = get_post_meta($post->ID, 'platforms_android_phone_slideshow_images', true);
$android_phone_video_id = get_post_meta($post->ID, 'platforms_android_phone_video_id', true);
$android_phone_coming_soon = get_post_meta($post->ID, 'platforms_android_phone_coming_soon', true);
$android_phone_coming_soon_text = get_post_meta($post->ID, 'platforms_android_phone_coming_soon_text', true);
$android_phone_price = get_post_meta($post->ID, 'platforms_android_phone_price', true);

if ($android_phone_orientation == 'landscape') :
	$android_phone_leftcolumn = 'span5';
	$android_phone_rightcolumn = 'span7';
	$android_phone_screen_width = '348';
	$android_phone_screen_height = '236';
else :
	$android_phone_leftcolumn = 'span8';
	$android_phone_rightcolumn = 'span4';
	$android_phone_screen_width = '236';
	$android_phone_screen_height = '348';
endif;

?>