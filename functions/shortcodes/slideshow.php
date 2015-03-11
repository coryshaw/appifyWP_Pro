<?php

// Slides
add_shortcode('slides', 'theme_shortcode_slide');
function theme_shortcode_slide($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'effect' => 'fade',
		'nav' => 'false',
		'speed' => '1000',
		'pause' => '1000',
		'auto_start' => 'true',
		'crossfade' => 'true'
	), $atts));
	
	$effect = ( $effect == 'fade' ) ? 'true' : 'false';
	
	preg_match_all("/(.?)\[(item)\b(.*?)(?:(\/))?\](?:(.+?)\[\/item\])?(.?)/s", $content, $matches);
	$list = '';
	foreach( $matches[5] as $match ) {
		$list .= '<li>' . do_shortcode($match) . '</li>';
	}
	
	// Generate random ID
	$id = mt_rand(0, 1000);
	
	return <<<EOT
[raw]
<script type="text/javascript">
jQuery(document).ready(function($) {
	$("#slide-$id").sudoSlider({
		autowidth: true,
		autoheight: true,
	    continuous: true,
	    controlsShow: false,
	    numeric: true,
	    speed: '$speed',
	    auto: $auto_start,
	    updateBefore: true,
	    resumePause: 5000,
	    clickableAni: false,
	    crossFade: $crossfade,
	    fade: $effect,
	    prevNext: false
	});
	$('#slide-$id li').each(function(){
		if( $(this).width() != $('#slide-$id').width() ) $(this).css('width', $('#slide-$id').css('width') );
	});
	$('#slide-$id ul').css('margin-left', '-'+$('#slide-$id').width()+'px');
});
</script>
[/raw]
<div class="slide-wrapper clearfix">
	<div class="slide" id="slide-$id">
		<ul>
		$list
		</ul>
	</div>
</div>
EOT;
	
}