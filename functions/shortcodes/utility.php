<?php

// Code & Pre
add_shortcode('code', 'theme_shortcode_utility');
add_shortcode('pre', 'theme_shortcode_utility');
function theme_shortcode_code_pre($atts, $content = null, $code) {
	return '<' . $code . ' class="' . $code . '">' . trim($content) . '</code>';
}

// Divider
add_shortcode('divider', 'theme_shortcode_divider');
add_shortcode('divider_full', 'theme_shortcode_divider');
add_shortcode('divider_big', 'theme_shortcode_divider');
function theme_shortcode_divider($atts, $content = null, $code) {
	return '<div class="clear"></div><div class="'. str_replace('_', '-', $code) .'"></div>';
}

// Spacer
add_shortcode('space', 'theme_shortcode_space');
function theme_shortcode_space($atts, $content = null, $code) {
	return '<div class="clear"></div><div class="' . $code . '"></div>';
}

// Clear
add_shortcode('clear', 'theme_shortcode_clear');
function theme_shortcode_clear($atts, $content = null, $code) {
	return '<div class="clear"></div>';
}

// Heading
add_shortcode('h2', 'theme_shortcode_heading');
add_shortcode('h3', 'theme_shortcode_heading');
add_shortcode('h4', 'theme_shortcode_heading');
add_shortcode('h5', 'theme_shortcode_heading');
add_shortcode('h6', 'theme_shortcode_heading');
function theme_shortcode_heading($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'align' => false,
		'line' => true
	), $atts));
	$line = ($line === true) ? 'section-lined' : '';
	$align = ($align) ? 'section-title-' . $align : '';
	return '<' . $code . ' class="section-title ' . $align . ' ' . $line . '"><span>' . $content . '</span></' . $code . '>';
}