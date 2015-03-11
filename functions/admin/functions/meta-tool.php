<?php

class metaboxes_tool {
	var $config;
	var $options;
	var $input_tool;
	
	function metaboxes_tool( $config, $options ) {
		$this->config = $config;
		$this->options = $options;
		$this->input_tool = new input_tool( $options, $config );
		
		add_action( 'admin_menu', array( &$this, 'create_metaboxes' ) );
		add_action( 'save_post', array( &$this, 'save_metaboxes' ) );
		// add_action( 'post_edit_form_tag' , array( &$this, 'post_edit_form_tag' ) );
		
		add_action( 'admin_head', array(&$this, 'custom_metabox_css' ) );
	}

	function post_edit_form_tag( ) {
		echo ' enctype="multipart/form-data"';
	}
	
	function create_metaboxes() {
		if ( function_exists( 'add_meta_box' ) ) {
		
			if ( ! empty( $this->config['callback'] ) && method_exists( $this, $this->config['callback'] ) ) {
				$callback = array( &$this, $this->config['callback'] );
			} else {
				$callback = array( &$this, 'metabox_callback' );
			}
			foreach( $this->config['types'] as $type ) {
				add_meta_box( $this->config['group_id'], $this->config['title'], $callback, $type, $this->config['context'], $this->config['priority'] );
			}
		}
	}
	
	function save_metaboxes( $post_id ) {
		
		if (! isset($_POST[$this->config['group_id'] . '_noncename'])) {
			return $post_id;
		}
		
		if ( ! wp_verify_nonce( $_POST[$this->config['group_id'].'_noncename'], $this->config['group_id'] ) ) {
			return $post_id;
		}
		
		// check user permissions
		if ( $_POST['post_type'] == 'page' ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}
				
		if ( isset( $_POST[$this->config['group_id']] ) ) {
			$metas = $_POST[$this->config['group_id']];
		} else {
			$metas = false;
		}
		
		// Multi records
		if ( isset( $this->config['multi'] ) && ( $this->config['multi'] == true ) ) {
			// check that the correct button is clicked
			if ( isset( $_POST['add_record_'.$this->config['group_id']] ) ){
				if ( isset( $_POST['_'.$this->config['group_id']] ) ) {
					$add_value = $_POST['_'.$this->config['group_id']];
					$metas = is_array($metas) ? array_merge($metas, $add_value) : $add_value;
				} else {
					$add_value = false;
				}				
			}
			if( $metas ) {
				update_post_meta( $post_id, $this->config['group_id'], $metas );
			} else {
				delete_post_meta( $post_id, $this->config['group_id'] );
			}
		} else {
			
			if( is_array( $metas ) ) {
				foreach ( $metas as $key => $val ) {
					if ( $val != '' ) {
						update_post_meta( $post_id, $this->config['group_id'] . '_' . $key, $val);
					} else {
						delete_post_meta( $post_id, $this->config['group_id'] . '_' . $key );
					}
				}
			}
		
		}
		
	}
	
	function metabox_callback() {
		global $post;
		if($this->config['context'] == 'side') $this->input_tool->generate_meta_option_for_side();
		else $this->input_tool->generate_meta_option();
		echo '<input type="hidden" name="'.$this->config['group_id'].'_noncename" id="'.$this->config['group_id'].'_noncename" 
			  value="'.wp_create_nonce( $this->config['group_id'] ).'" />';
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	function custom_metabox_gen() {
		include(THEME_ADMIN_FUNCTIONS_DIR.'/meta-group-template.php');
		echo '<input type="hidden" name="'.$this->config['group_id'].'_noncename" id="'.$this->config['group_id'].'_noncename" 
			  value="'.wp_create_nonce( $this->config['group_id'] ).'" />';
	}
	
	function custom_metabox_css() {
		global $post_type;
		if( $this->config['multi'] && in_array($post_type, $this->config['types'] ) ): 
		?>
		<style>
				#<?php echo $this->config['group_id']; ?> {
					background: none;
					background-color: transparent;	
					border: none;
				}
				#<?php echo $this->config['group_id']; ?> .hndle,
				#<?php echo $this->config['group_id']; ?>.postbox .handlediv {
					display: none;
				}
				#<?php echo $this->config['group_id']; ?>.postbox .inside {
					padding: 0;
				}
		</style>	
		<?php 
		endif;
	}
	
}

?>