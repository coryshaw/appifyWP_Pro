<?php
$windowsphone_orientation = get_post_meta($post->ID, 'platforms_windowsphone_orientation', true);
$windowsphone_default = get_post_meta($post->ID, 'platforms_windowsphone_default', true);
$windowsphone_description = get_post_meta($post->ID, 'platforms_windowsphone_description', true);
$windowsphone_appstore_url = get_post_meta($post->ID, 'platforms_windowsphone_appstore_url', true);
$windowsphone_effect = get_post_meta($post->ID, 'platforms_windowsphone_effect', true);
$windowsphone_effect = get_post_meta($post->ID, 'platforms_windowsphone_effect', true);
$windowsphone_slideshow_images = get_post_meta($post->ID, 'platforms_windowsphone_slideshow_images', true);
$windowsphone_video_id = get_post_meta($post->ID, 'platforms_windowsphone_video_id', true);
$windowsphone_coming_soon = get_post_meta($post->ID, 'platforms_windowsphone_coming_soon', true);
$windowsphone_coming_soon_text = get_post_meta($post->ID, 'platforms_windowsphone_coming_soon_text', true);
$windowsphone_price = get_post_meta($post->ID, 'platforms_windowsphone_price', true);

if ($windowsphone_orientation == 'landscape') :
	$windowsphone_leftcolumn = 'span5';
	$windowsphone_rightcolumn = 'span7';
	$windowsphone_screen_width = '390';
	$windowsphone_screen_height = '236';
else :
	$windowsphone_leftcolumn = 'span8';
	$windowsphone_rightcolumn = 'span4';
	$windowsphone_screen_width = '234';
	$windowsphone_screen_height = '390';
endif;

?>