<?php

// Newsletter
add_shortcode('newsletter', 'theme_shortcode_newsletter');
function theme_shortcode_newsletter($atts, $content) {
	extract(shortcode_atts(array(
		'align' => 'left',
		'list_id' => ''
	), $atts));
	
	if( $list_id == '' ) return '<div class="box-wrap notice-box"><div class="box">Please define <strong>"list_id"</strong></div></div>';
	
	$ajaxurl = admin_url('admin-ajax.php');
	
	$email_text = __('Email Address', 'theme_front');
	
	$id = $list_id . '-' . mt_rand(0, 9999);
	return <<<EOT
[raw]
<div class="subscribe-form-wrap subscribe-form-wrap-$align" id="subscribe-form-$id">
<div class="subscribe-form">
	<form method="post" action="$ajaxurl" class="ajax-form validate-form">
		<div class="subscribe-box">
			<input type="text" id="email" name="email" value="$email_text" class="input-email waterfall" />
			<input type="submit" class="input-submit" value="" />
		</div>
		<div class="clear"></div>
		<div class="form-response"></div>
		<input type="hidden" name="list_id" value="$list_id" />
		<input type="hidden" name="action" value="mailchimp_subscribe" />
	</form>
</div>
<div class="subscribe-response"></div>
</div>
<div class="clear"></div>
[/raw]
EOT;
}

// Share Buttons
add_shortcode('share_buttons', 'theme_shortcode_share_buttons');
function theme_shortcode_share_buttons($atts, $content) {
	extract(shortcode_atts(array(
		'align' => 'left'
	), $atts));
	
	return <<<EOT
[raw]
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
<div class="addthis-wrap-$align addthis-wrap">
<div class="addthis_toolbox addthis_default_style">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
</div></div><div class="clear"></div>
[/raw]
EOT;
}

// Social Links
add_shortcode('social_icons', 'theme_shortcode_social_icons');
function theme_shortcode_social_icons($atts, $content) {
	extract(shortcode_atts(array(
		'size' => 'big',
		'align' => 'left'
	), $atts));
	$folder = ( $size == 'big' ) ? 'komodomedia_32' : 'komodomedia_16';
	$icons = '';
	foreach ( $atts as $att_key => $att ) {
		if ( $att_key != 'size' && $att_key != 'align' ) {
			$icons .= '<a href="' . $att . '" rel="nofollow" target="_blank"><img src="' . THEME_ADMIN_ASSETS_URI . '/images/social-icon/' . $folder . '/' . $att_key . '.png" alt="' . ucfirst($att_key) . '" title="' . ucfirst($att_key) . '" class="tip" /></a>';
		}
	}
	
	return <<<EOT
<div class="social-icons-box social-icons-box-$align social-icons-box-$size">
$icons
</div>
EOT;
}

// Twitter Feeds
add_shortcode('twitter_feeds', 'theme_shortcode_twitter_feeds');
function theme_shortcode_twitter_feeds($atts) {
	extract(shortcode_atts(array(
		'user' => '',
		'count' => 1
	), $atts));
	
	if( $user == '' ) return '<div class="box-wrap notice-box"><div class="box">Please define <strong>"user"</strong></div></div>';
	$id = $user . '-' . mt_rand(0, 9999);
	
	$seconds_ago_text = __('about %d seconds ago', 'theme_front');
	$a_minutes_ago_text = __('about a minute ago', 'theme_front');
	$minutes_ago_text = __('about %d minutes ago', 'theme_front');
	$a_hours_ago_text = __('about an hour ago', 'theme_front');
	$hours_ago_text = __('about %d hours ago', 'theme_front');
	$a_day_ago_text = __('about a day ago', 'theme_front');
	$days_ago_text = __('about %d days ago', 'theme_front');
	$view_text = __('view tweet on twitter', 'theme_front');
	$loading_text = __('loading tweets ...', 'theme_front');
	
	return <<<EOT
[raw]
<script type="text/javascript">
jQuery(document).ready(function($) {
	$("#twitter-feed-$id").tweet({
		username: ['$user'],
		count: $count,
		avatar_size: 0,
		refresh_interval: 60,
		template: "{text} {time}",
		seconds_ago_text: '$seconds_ago_text',
		a_minutes_ago_text: '$a_minutes_ago_text',
		minutes_ago_text: '$minutes_ago_text',
		a_hours_ago_text: '$a_hours_ago_text',
		hours_ago_text: '$hours_ago_text',
		a_day_ago_text: '$a_day_ago_text',
		days_ago_text: '$days_ago_text',
		view_text: '$view_text',
		loading_text: '$loading_text'
	});
});
</script>
<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
[/raw]
<div class="twitter-feeds-box">
	<div class="twitter-feed" id="twitter-feed-$id"></div>
	<a href="https://twitter.com/$user" class="twitter-follow-button">Follow @$user</a>
</div>
EOT;
}