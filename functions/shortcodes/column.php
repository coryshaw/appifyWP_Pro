<?php
function theme_shortcode_column($atts, $content = null, $code) {
	$return = '<div class="'.str_replace('_last', ' last', $code).'">' .  do_shortcode(trim($content)) . '</div>';
	if( strstr($code, '_last') ) $return .= '<div class="clear"></div>';
	
	return $return;
}

// One
add_shortcode('one_half', 'theme_shortcode_column');
add_shortcode('one_third', 'theme_shortcode_column');
add_shortcode('one_fourth', 'theme_shortcode_column');
add_shortcode('one_fifth', 'theme_shortcode_column');
add_shortcode('one_sixth', 'theme_shortcode_column');

add_shortcode('one_half_last', 'theme_shortcode_column');
add_shortcode('one_third_last', 'theme_shortcode_column');
add_shortcode('one_fourth_last', 'theme_shortcode_column');
add_shortcode('one_fifth_last', 'theme_shortcode_column');
add_shortcode('one_sixth_last', 'theme_shortcode_column');

// Two
add_shortcode('two_third', 'theme_shortcode_column');
add_shortcode('two_fifth', 'theme_shortcode_column');

add_shortcode('two_third_last', 'theme_shortcode_column');
add_shortcode('two_fifth_last', 'theme_shortcode_column');

// Three
add_shortcode('three_fourth', 'theme_shortcode_column');
add_shortcode('three_fifth', 'theme_shortcode_column');

add_shortcode('three_fourth_last', 'theme_shortcode_column');
add_shortcode('three_fifth_last', 'theme_shortcode_column');

// Four
add_shortcode('four_fifth', 'theme_shortcode_column');
add_shortcode('four_fifth_last', 'theme_shortcode_column');

// Five
add_shortcode('five_sixth', 'theme_shortcode_column');
add_shortcode('five_sixth_last', 'theme_shortcode_column');