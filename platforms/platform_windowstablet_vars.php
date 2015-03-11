<?php
$windowstablet_orientation = get_post_meta($post->ID, 'platforms_windowstablet_orientation', true);
$windowstablet_default = get_post_meta($post->ID, 'platforms_windowstablet_default', true);
$windowstablet_description = get_post_meta($post->ID, 'platforms_windowstablet_description', true);
$windowstablet_appstore_url = get_post_meta($post->ID, 'platforms_windowstablet_appstore_url', true);
$windowstablet_effect = get_post_meta($post->ID, 'platforms_windowstablet_effect', true);
$windowstablet_effect = get_post_meta($post->ID, 'platforms_windowstablet_effect', true);
$windowstablet_slideshow_images = get_post_meta($post->ID, 'platforms_windowstablet_slideshow_images', true);
$windowstablet_video_id = get_post_meta($post->ID, 'platforms_windowstablet_video_id', true);
$windowstablet_coming_soon = get_post_meta($post->ID, 'platforms_windowstablet_coming_soon', true);
$windowstablet_coming_soon_text = get_post_meta($post->ID, 'platforms_windowstablet_coming_soon_text', true);
$windowstablet_price = get_post_meta($post->ID, 'platforms_windowstablet_price', true);

if ($windowstablet_orientation == 'landscape') :
	$windowstablet_leftcolumn = 'span5';
	$windowstablet_rightcolumn = 'span7';
	$windowstablet_screen_width = '348';
	$windowstablet_screen_height = '236';
else :
	$windowstablet_leftcolumn = 'span8';
	$windowstablet_rightcolumn = 'span4';
	$windowstablet_screen_width = '236';
	$windowstablet_screen_height = '348';
endif;

?>