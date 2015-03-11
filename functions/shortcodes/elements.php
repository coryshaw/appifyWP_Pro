<?php

// Icon
add_shortcode('icon', 'theme_shortcode_icon');
function theme_shortcode_icon($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'set' => '1',
		'id' => '',
		'align' => 'left',
		'title' => '',
		'link' => false
	), $atts));
	
	$required_param = array( $set, $id );
	if( in_array( '', $required_param ) ) return '<div class="box-wrap notice-box"><div class="box">Please define:  <strong>set & id</strong></div></div>';
	
	$image_url = THEME_FRAMEWORK_URI . 'assets/icons/' . $set . '/' . $id . '.png';
	$title = ( $link ) ? '<a href="' . $link . '">' . $title . '</a>' : $title;
	$title = ( $title != '' ) ? '<div class="icon-title">'.$title.'</div><div class="clear"></div>' : '';
	
	
	return <<<RET
[raw]
<div class="icon-item icon-set-$set">
<img src="$image_url" class="align-$align" />
$title
</div>
[/raw]
RET;
}

// Icon Set
add_shortcode('icon_set', 'theme_shortcode_icon_set');
function theme_shortcode_icon_set($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'set' => '1'
	), $atts));
	$set_quantity = array(179);
	$icon_list = '';
	for( $i=1; $i<=$set_quantity[$set-1]; $i++ ) {
		$icon_list .= '<div class="sample-icon-list icon-set-' . $set . '">';
		$icon_list .= '<img src="' . THEME_FRAMEWORK_URI . 'assets/icons/' . $set . '/' . $i . '.png" />';
		$icon_list .= '<div class="sample-icon-id">' . $i . '</div>';
		$icon_list .= '</div>';
	}
	return $icon_list;
}

// Title
add_shortcode('title', 'theme_shortcode_title');
function theme_shortcode_title($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'align' => '',
		'size' => 'medium'
	), $atts));
	$size = ($size != '') ? 'section-title-' . $size : '';
	$align = ($align != '') ? 'section-title-' . $align : '';
	return <<<RET
[raw]
<h2 class="section-title $align $size section-lined"><span>$content</span></h2>
<div class="clear"></div>
[/raw]
RET;
}

// Box
add_shortcode('box', 'theme_shortcode_box');
function theme_shortcode_box($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => false
	), $atts));
	$type = $type ? $type . '-box' : '';
	$content = do_shortcode( trim( $content ) );
	return <<<RET
<div class="box-wrap $type">
<div class="box">
$content
</div>
</div>
RET;
}

// Button
add_shortcode('button', 'theme_shortcode_button');
function theme_shortcode_button($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'color' => 'black',
		'size' => 'medium',
		'link' => '#',
		'link_type' => 'image',
		'lightbox' => false,
		'target' => false
	), $atts));
	
	if( $lightbox ) $lightbox = 'fancy-' . $link_type;
	$target = $target ? 'target="_'. $target .'"' : '';
	
	return '<a href="'. $link .'" '. $target .' class="button ' . $color . ' ' . $size . ' ' . $lightbox . '"><span>' . trim($content) . '</span></a>';
}

// Table
add_shortcode('table', 'theme_shortcode_table');
function theme_shortcode_table($atts, $content = null, $code) {
	return '<div class="table-wrap">' .  do_shortcode(trim($content)) . '</div>';
}

// List
add_shortcode('list', 'theme_shortcode_list');
function theme_shortcode_list($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => '1',
		'color' => 'black'
	), $atts));
	$type = $type ? 'type-'. $type : '';
	$color = $color ? ' list-'. $color : '';
	return '<div class="list-set ' . $type . $color . '">' .  trim($content) . '</div>';
}

// Quote
add_shortcode('quote', 'theme_shortcode_quote');
function theme_shortcode_quote($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'author' => false,
		'rating' => false
	), $atts));
	$author = $author ? '<p class="cite"><cite>'. $author .'</cite></p>' : '';
	if( $rating ) {
		$scale = $rating * 112 / 5;
		$rating = '<div class="rating-small-wrap"><div class="rating-small-fill" style="width:'.$scale.'px;"></div></div>';
	}
	return <<<EOT
<blockquote class="clearfix"><p>$content</p>$rating$author</blockquote>
EOT;
}

// Callout
add_shortcode('callout', 'theme_shortcode_callout');
function theme_shortcode_callout($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'border' => false
	), $atts));

	$style = ( $border ) ? 'style="border: 4px solid ' . $border . ';"' : '';

	$content = do_shortcode( $content );
	return <<<EOT
<div class="callout" $style>$content</div>
EOT;
}

