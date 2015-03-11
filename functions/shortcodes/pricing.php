<?php

// Market Badge
add_shortcode('price_box', 'theme_shortcode_price_box');
function theme_shortcode_price_box($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'package' => 'Package Name',
		'price' => false,
		'per' => '',
		'featured' => false
	), $atts));
	
	$package = '<h4>' . $package . '</h4>';
	
	$per = ( $per ) ? ' <small>/ ' . $per . '</small>' : '';
	$price = ( $price ) ? '<h1>' . $price . $per . '</h1>' : '';
	
	$featured = ( $featured ) ? '<div class="best-ribbon"></div>' : '';
	
	$content = do_shortcode( $content );
	
	return <<<RET
[raw]
<div class="pricing-box">
<div class="pricing-box-header">
$package
$price
</div>
<div class="pricing-box-content">
$content
</div>
$featured
</div>
[/raw]
RET;
}