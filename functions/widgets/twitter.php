<?php
// Twitter Widget Class
class Theme_Widget_Twitter extends WP_Widget {

	function Theme_Widget_Twitter() {
		$widget_ops = array('classname' => 'widget_twitter', 'description' => __( 'Displays a list of twitter feeds', 'theme_admin' ) );
		$this->WP_Widget('grizzly-twitter', THEME_NAME . ' - '.__('Twitter', 'theme_admin'), $widget_ops);
		
		/*
		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_print_scripts', array(&$this, 'add_tweet_script') );
		}
		*/
	}

	function add_tweet_script(){
		// wp_enqueue_script('jquery-tweet', THEME_ADMIN_ASSETS_URI . '/libs/jquery.tweet.js');
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Tweets', 'theme_front') : $instance['title'], $instance, $this->id_base);
		$username= $instance['username'];
		$count = $instance['count'];
		
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title;
		echo theme_formatter( do_shortcode( '[twitter_feeds user="'.$username.'" count="'.$count.'"]' ) );
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['username'] = strip_tags($new_instance['username']);
		$instance['count'] = (int) $new_instance['count'];
		return $instance;
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$username = isset($instance['username']) ? esc_attr($instance['username']) : '';
		$count = isset($instance['count']) ? absint($instance['count']) : 3;
		$display = isset( $instance['display'] ) ? $instance['display'] : 'latest';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'theme_admin'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username', 'theme_admin'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('How many tweets to display?', 'theme_admin'); ?></label>
		<input id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" size="3" /></p>
		
<?php
	}
}
register_widget('Theme_Widget_Twitter');