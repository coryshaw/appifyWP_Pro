<?php
$android_tablet_orientation = get_post_meta($post->ID, 'platforms_android_tablet_orientation', true);
$android_tablet_default = get_post_meta($post->ID, 'platforms_android_tablet_default', true);
$android_tablet_description = get_post_meta($post->ID, 'platforms_android_tablet_description', true);
$android_tablet_appstore_url = get_post_meta($post->ID, 'platforms_android_tablet_google_play_appstore_url', true);
$android_tablet_appstore_url_amazon = get_post_meta($post->ID, 'platforms_android_tablet_kindle_appstore_url', true);
$android_tablet_effect = get_post_meta($post->ID, 'platforms_android_tablet_effect', true);
$android_tablet_effect = get_post_meta($post->ID, 'platforms_android_tablet_effect', true);
$android_tablet_slideshow_images = get_post_meta($post->ID, 'platforms_android_tablet_slideshow_images', true);
$android_tablet_video_id = get_post_meta($post->ID, 'platforms_android_tablet_video_id', true);
$android_tablet_coming_soon = get_post_meta($post->ID, 'platforms_android_tablet_coming_soon', true);
$android_tablet_coming_soon_text = get_post_meta($post->ID, 'platforms_android_tablet_coming_soon_text', true);
$android_tablet_price = get_post_meta($post->ID, 'platforms_android_tablet_price', true);

if ($android_tablet_orientation == 'landscape') :
	$android_tablet_leftcolumn = 'span5';
	$android_tablet_rightcolumn = 'span7';
	$android_tablet_screen_width = '348';
	$android_tablet_screen_height = '195';
else :
	$android_tablet_leftcolumn = 'span7';
	$android_tablet_rightcolumn = 'span5';
	$android_tablet_screen_width = '273';
	$android_tablet_screen_height = '401';
endif;

?>