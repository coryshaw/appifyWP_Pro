<?php
// Map
add_shortcode('map','theme_shortcode_map');
function theme_shortcode_map($atts, $content = null, $code) {
	extract( shortcode_atts( array(
		'latitude' => '',
		'longitude' => '',
		'address' => '',
		'zoom' => '12',
		'maptype' => 'ROADMAP',
		'height' => '400',
		'width' => '',
		'align' => 'none'
	), $atts ) );
	
	if( ! ( $latitude != '' && $longitude != '' ) || $address != '' ) return '<div class="box-wrap notice-box"><div class="box">Please define <strong>"latitude & longitude" or "address"</strong></div></div>';
	
	$address = ( $latitude == '' && $longitude == '' ) ? 'address: ' . $address . ',' : '';

	preg_match_all("/(.?)\[(marker)\b(.*?)(?:(\/))?\](?:(.+?)\[\/marker\])?(.?)/s", $content, $matches);
	$markers = '';
	for($i = 0; $i < count($matches[0]); $i++) {
		$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		if( ( isset ( $matches[3][$i]['latitude'] ) && isset ( $matches[3][$i]['longitude'] ) ) || isset ( $matches[3][$i]['address'] ) ) {
			$markers .= '{';
			if( isset ( $matches[3][$i]['latitude'] ) && isset ( $matches[3][$i]['longitude'] ) ) $markers .= 'latitude: ' . $matches[3][$i]['latitude'] . ',longitude: ' . $matches[3][$i]['longitude'] . ',';
			if( isset ( $matches[3][$i]['address'] ) ) $markers .= 'address: ' . $matches[3][$i]['address'] . ',';
			if( isset ( $matches[3][$i]['title'] ) ) $markers .= 'title: ' . $matches[3][$i]['title'] . ',';
			if( isset ( $matches[3][$i]['html'] ) ) $markers .= 'html: \'' . $matches[3][$i]['html'] . '\',';
			if( isset ( $matches[3][$i]['popup'] ) ) $markers .= 'popup: ' . $matches[3][$i]['popup'] . ',';
			$markers = substr( $markers, 0, -1 );
			$markers .= '},';
		}
	}
	$markers = substr( $markers, 0, -1 );
	
	// Generate random ID
	$id = mt_rand(0, 1000);
	
	// Get Theme Directory
	$template_directory = get_template_directory_uri();
	
	$width = ( $width != '' ) ? 'width:' . $width . 'px;' : '';
	$height = ( $height != '' ) ? 'height:' . $height . 'px;' : '';
	
	return <<<RET
[raw]
<script src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false"
type="text/javascript"></script>
<script src="$template_directory/libs/jquery.gmap.min.js"
type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#map-$id').gMap({
			latitude: $latitude,
			longitude: $longitude, $address
			zoom: $zoom,
			maptype: google.maps.MapTypeId.$maptype,
			mapTypeControl: false,
			markers: [$markers]
		});
	});
</script>
[/raw]
<div class="map align-$align" id="map-$id" style="$height $width"></div>
RET;

}