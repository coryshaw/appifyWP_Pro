<?php
// Contact Form Widget Class
class Theme_Widget_Contact_Form extends WP_Widget {

	function Theme_Widget_Contact_Form() {
		$widget_ops = array('classname' => 'widget_contact_form', 'description' => __( 'Displays a email contact form.', 'theme_admin') );
		$this->WP_Widget('contact-form', THEME_NAME . ' - ' . __('Contact Form', 'theme_admin'), $widget_ops);
		
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
		$email= $instance['email'];
		$button_color = $instance['button_color'];
		
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title;
		echo theme_formatter( do_shortcode( '[contact_form mail_to="'.$email.'" button_color="'.$button_color.'"]' ) );
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['button_color'] = strip_tags($new_instance['button_color']);

		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$email = isset($instance['email']) ? esc_attr($instance['email']) : get_bloginfo('admin_email');
		$button_color = isset($instance['button_color']) ? esc_attr($instance['button_color']) : '';
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'theme_admin'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Your Email', 'theme_admin'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('button_color'); ?>"><?php _e('Button Color', 'theme_admin'); ?>:</label>
		<select class="widefat" id="<?php echo $this->get_field_id('button_color'); ?>" name="<?php echo $this->get_field_name('button_color'); ?>">
			<?php 
				$color_set = array( 'black', 'blue', 'magenta', 'red', 'orange', 'yellow' ); 
				foreach( $color_set as $color ) {
					$select = ( $color == $button_color ) ? 'selected' : '';
					echo '<option value="'.$color.'" '.$select.'>'.ucfirst( $color ).'</option>';
				}
			?>
		</select>
		</p>		
<?php
	}
}
register_widget('Theme_Widget_Contact_Form');