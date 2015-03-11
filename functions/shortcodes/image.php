<?php

// Photos Elastic
add_shortcode('photos_wall', 'theme_shortcode_photos_bar');
add_shortcode('photos_bar', 'theme_shortcode_photos_bar');
function theme_shortcode_photos_bar($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'grid_width' => 200,
		'grid_height' => 150,
		'fx_bw' => 'false'
	), $atts));
	$id = mt_rand(0, 9999);
	
	global $post;
	$photos = get_post_meta($post->ID, 'shortcode_photos_wall_images', true);
	if( !is_array($photos) ) return '<div class="box-wrap notice-box"><div class="box">No images specified.</div></div>';
	
	$wall = '';
	foreach( $photos as $photo ) {

		$original_image_src = theme_get_attachment_src( $photo );
		$resized_image_src = theme_get_image( $original_image_src, 200, 150, true );

		$wall .= '<li>';
		$wall .= '<a class="modal" href="' . $original_image_src . '" ><img class="ss-image" src="' . $resized_image_src . '" /></a>';
		$wall .= '</li>';
	}

	return <<<RET
[raw]
<div id="carousel" class="es-carousel-wrapper">
<div class="es-carousel">
<ul class="photos-bar-list" id="photos-bar-$id">
$wall
</ul>
</div>
</div>
<div class="clear"></div>
[/raw]
RET;
}

// Banner List
add_shortcode('banner_list', 'theme_shortcode_banner_list');
function theme_shortcode_banner_list($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'align' => 'left',
		'grid_height' => 100,
		'grid_width' => 200,
		'fx_bw' => false
	), $atts));
	$id = mt_rand(0, 9999);


	$class = 'banner-list banner-list-' . $align;
	$list = '';
	if (!preg_match_all("/(.?)\[(img)\b(.*?)(?:(\/))?\](?:(.+?)\[\/img\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);

			$original_image_src = $matches[5][$i];
			$resized_image_src = theme_get_image( $original_image_src, $grid_width, $grid_height );
			$img = '<img src="' . $resized_image_src . '" />';

			$greyscale = ( $fx_bw ) ? 'class="greyscale"' : '';

			if( isset( $matches[3][$i]['link'] ) ) {
				$list .= '<li ' . $greyscale . '><a href="'.$matches[3][$i]['link'].'">'.$img.'</a></li>';
			} else {
				$list .= '<li ' . $greyscale . '>'.$img.'</li>';
			}
		}
	}
	
	return <<<RET
<ul class="$class">
$list
</ul>
RET;
}

// Photo Frame
add_shortcode('photo', 'theme_shortcode_photo');
function theme_shortcode_photo($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'size' => '',
		'width' => null,
		'height' => null,
		'frame' => 'true',
		'title' => false,
		'link' => false,
		'lightbox' => 'image',
		'align' => 'none',
		'icon' => 'zoom'
	), $atts));

	if( $width == null )
	switch( $size ) {
		case 'small' : $width = 200;
			break;
		case 'medium' : $width = 400;
			break;
		case 'big' : $width = 675;
			break;
	}

	$original_image_src = $content;
	$resized_image_src = theme_get_image( $original_image_src, $width, $height, true );

	$lightbox = $lightbox ? 'modal-' . $lightbox : '';
	$align = 'align-' . $align;
	$frame = ( $frame != 'true' ) ? 'photo-glass-frame' : '';
	$title_box = $title ? '<div class="photo-title">'. $title .'</div>' : '';
	$title = $title ? 'title="' . $title . '"' : '';
	$play_mask = ( $icon == 'play' ) ? '<span class="play-mask"></span>' : '';
	$icon = 'icon-' . $icon;
	
	$img_tag = '<img src="'. $resized_image_src .'" />';
	if( $link ) $img_tag = '<a href="'.$link.'" class="'. $lightbox . '" ' . $title .'>' . $img_tag . $play_mask . '</a>';
	
	return <<<RET
[raw]
<div class="photo-frame-wrap $align" style="width:{$width}px;">
<div class="photo-frame $frame $icon">
$img_tag
</div>
$title_box
</div>
[/raw]
RET;
}
