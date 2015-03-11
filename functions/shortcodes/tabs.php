<?php
function theme_shortcode_tabs($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => 'normal',
		'initial_tab' => 1
	), $atts));
	
	$initial_tab -= 1;
	$initial_tab = 'initial-tab="'. $initial_tab .'"';
	
	$type = $code . '-' . $type;
	
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
	
		$output = '<ul class="'.$code.'" '. $initial_tab .'>';
		for($i = 0; $i < count($matches[0]); $i++) {
			$href = '#';
			$output .= '<li><a href="'.$href.'">' . $matches[3][$i]['title'] . '</a></li>';
		}
		$output .= '</ul>';
			
		$output .= '<div class="panes">';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="pane">' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}
		$output .= '</div>';
		
		return '<div class="'. $code .'-wrap '. $type .'">' . $output . '</div>';
	}
}
add_shortcode('tabs', 'theme_shortcode_tabs');

function theme_shortcode_accordions($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'initial_tab' => 1
	), $atts));
	
	$initial_tab -= 1;
	$initial_tab = 'initial-tab="'. $initial_tab .'"';
	
	if (!preg_match_all("/(.?)\[(accordion)\b(.*?)(?:(\/))?\](?:(.+?)\[\/accordion\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$href = '#';
			$output .= '<div class="tab">'. $matches[3][$i]['title'] .'</div>';
			$output .= '<div class="pane clearfix">'. do_shortcode(trim($matches[5][$i])) .'</div>';
		}
		
		return '<div class="'. $code .'-wrap" '. $initial_tab .'>' . $output . '</div>';
	}
}
add_shortcode('accordions', 'theme_shortcode_accordions');

function theme_shortcode_toggle($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => 'normal',
		'title' => 'Toggle'
	), $atts));
	$type = 'toggle-' . $type;
	return '<div class="toggle-wrap '. $type .'"><div class="tab">'. $title .'</div><div class="pane clearfix">' . do_shortcode(trim($content)) . '</div></div>';
}
add_shortcode('toggle', 'theme_shortcode_toggle');
