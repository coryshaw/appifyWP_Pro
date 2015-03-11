<?php
// Contact Info Widget Class
class Theme_Widget_Contact_Info extends WP_Widget {

	function Theme_Widget_Contact_Info() {
		$widget_ops = array('classname' => 'widget_contact_info', 'description' => __( 'Displays contact infos.', 'theme_admin') );
		$this->WP_Widget('contact-info', THEME_NAME . ' - ' . __('Contact Info', 'theme_admin'), $widget_ops);
		
		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_print_scripts', array(&$this, 'add_script') );
		}
	}
	
	function add_script(){
		// wp_enqueue_script( 'jquery-metadata', THEME_ADMIN_ASSETS_URI . '/libs/jquery.metadata.js');
		// wp_enqueue_script( 'jquery-validate', THEME_ADMIN_ASSETS_URI . '/libs/jquery.validate.min.js');
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Email Us', 'theme_front') : $instance['title'], $instance, $this->id_base);
		
		$info = ( $instance['info'] != '' ) ? 'info=\''. $instance['info'] .'\' ' : '';
		$location = ( $instance['location'] != '' ) ? 'location=\''. $instance['location'] .'\' ' : '';
		$email = ( $instance['email'] != '' ) ? 'email=\''. $instance['email'] .'\' ' : '';
		$telephone = ( $instance['telephone'] != '' ) ? 'telephone=\''. $instance['telephone'] .'\' ' : '';
		$mobile = ( $instance['mobile'] != '' ) ? 'mobile=\''. $instance['mobile'] .'\' ' : '';
		$fax = ( $instance['fax'] != '' ) ? 'fax=\''. $instance['fax'] .'\' ' : '';
		
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title;
		echo theme_formatter( do_shortcode( '[contact_info '.$info.$location.$email.$telephone.$mobile.$fax.']' ) );
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['info'] = strip_tags($new_instance['info']);
		$instance['location'] = strip_tags($new_instance['location']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['telephone'] = strip_tags($new_instance['telephone']);
		$instance['mobile'] = strip_tags($new_instance['mobile']);
		$instance['fax'] = strip_tags($new_instance['fax']);
		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		
		$info = isset($instance['info']) ? esc_attr($instance['info']) : '';
		$location = isset($instance['location']) ? esc_attr($instance['location']) : '';
		$email = isset($instance['email']) ? esc_attr($instance['email']) : '';
		$telephone = isset($instance['telephone']) ? esc_attr($instance['telephone']) : '';
		$mobile = isset($instance['mobile']) ? esc_attr($instance['mobile']) : '';
		$fax = isset($instance['fax']) ? esc_attr($instance['fax']) : '';
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'theme_admin'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
	
		<p><label for="<?php echo $this->get_field_id('info'); ?>"><?php _e('Info', 'theme_admin'); ?>:</label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('info'); ?>" name="<?php echo $this->get_field_name('info'); ?>"><?php echo $info; ?></textarea></p>

		<p><label for="<?php echo $this->get_field_id('location'); ?>"><?php _e('Location', 'theme_admin'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('location'); ?>" name="<?php echo $this->get_field_name('location'); ?>" type="text" value="<?php echo $location; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email', 'theme_admin'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('telephone'); ?>"><?php _e('Telephone', 'theme_admin'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('telephone'); ?>" name="<?php echo $this->get_field_name('telephone'); ?>" type="text" value="<?php echo $telephone; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('mobile'); ?>"><?php _e('Mobile', 'theme_admin'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('mobile'); ?>" name="<?php echo $this->get_field_name('mobile'); ?>" type="text" value="<?php echo $mobile; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('fax'); ?>"><?php _e('Fax', 'theme_admin'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" type="text" value="<?php echo $fax; ?>" /></p>
			
<?php
	}
}
register_widget('Theme_Widget_Contact_Info');