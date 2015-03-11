<?php

class input_tool {
	var $options;
	var $config;
	var $saved_data;
	var $multi_counter = 0;
	
	function input_tool( $options, $config ) {
		$this->options = $options;
		$this->config = $config;
	}

	function get_saved_theme_option() {
		$groups = get_option( THEME_SLUG . '_options' );
		if( is_array($groups) ) {
			foreach ( $groups as $group_key => $group ) {
				foreach ( $group as $field_key => $field ) {
					$options[ $group_key . '_' . $field_key ] = stripslashes_deep( $field );
				}
			}
			return $options;
		}
		return false;
	}
	
	function get_saved_meta_option() {
		global $post;
		$keys = get_post_custom_keys( $post->ID );
		if( is_array($keys) ) {
			foreach ( $keys as $key ) {
				$metas[ $key ] = get_post_meta( $post->ID, $key, true );
			}
			return $metas;
		}
		return false;
	}
		
	function generate_theme_option() {
		$this->saved_data = $this->get_saved_theme_option();
		
		$pane_active = ( isset($this->config['active_first']) && $this->config['active_first'] ) ? 'active' : '';
		echo '<div class="theme-box-content-pane theme-input ' . $pane_active . '"  id="' . $this->config['group_id'] . '-pane">';
		
		foreach( $this->options as $group ){
			
			
			//echo '<h3 class="section-title">' . $group['title'] . '</h3>';
			echo '<table class="option-table widefat">';
			
			echo '<tbody>';
			echo '<tr class="separator"><td colspan="100"><strong>' . $group['title'] . '</strong></td></tr>';
			foreach( $group['options'] as $option ){
				$toggle_group = ( isset($option['toggle_group']) ) ? ' input-list-toggle ' . $option['toggle_group'] : '';
	
				echo '<tr class="input-list' . $toggle_group . '">';
				echo '<td class="input-detail">';
				echo '<label for="' . $this->id( $option ) . '">' . $option['title'] . '</label>';
				echo '<small>' . $option['description']; 
				
				if( isset($option['tip']) ) echo ' <a class="tips" title="' . $option['tip'] . '">[?]</a>';
				
				echo '</small>';
				echo '</td>';
				echo '<td class="input-field">';
					$this->$option['type']($option);
				echo '</td>';
				echo '</tr>';
			} // end sub foreach
			echo '</tbody>';
			echo '</table>';
			echo '<div class="spacer-20"></div>';
		} // end main foreach
		
		echo '</div>';
	}
	
	function generate_meta_option() {
		$this->saved_data = $this->get_saved_meta_option();
		echo '<table class="option-table theme-input widefat">';
		foreach( $this->options as $option ){
			$toggle_group = ( isset($option['toggle_group']) ) ? ' input-list-toggle ' . $option['toggle_group'] : '';
			
			if( $option['type'] == 'separator' ) {
			
				echo '<tr class="separator"><td colspan="100"><strong>';
				if( isset( $option['title'] ) ) echo $option['title'];
				echo '</strong></td></tr>';
			
			} else {
			
				echo '<tr class="input-list' . $toggle_group . '">';
				echo '<td class="input-detail">';
				echo '<label for="' . $this->id( $option ) . '">' . $option['title'] . '</label>';
				echo '<small>' . $option['description']; 
				
				if( isset($option['tip']) ) echo ' <a class="tips" title="' . $option['tip'] . '">[?]</a>';
				
				echo '</small>';
				echo '</td>';
				echo '<td class="input-field">';
					$this->$option['type']($option);			
				echo '</td>';
				echo '</tr>';
			
			}
			
		}
		echo '</table>';
	}
	
	function generate_meta_option_for_side() {
		$this->saved_data = $this->get_saved_meta_option();
		
		echo '<table class="option-table theme-input widefat sidebar-table">';
		foreach( $this->options as $option ){
			echo '<tr class="input-list">';
			echo '<td class="input-detail input-field">';
			echo '<label for="' . $this->id( $option ) . '">' . $option['title'] . '</label>';
			echo ' <small>' . $option['description']; 
			
			if( isset($option['tip']) ) echo ' <a class="tips" title="' . $option['tip'] . '">[?]</a>';
			
			echo '</small><div class="spacer-10"></div>';
				$this->$option['type']($option);			
			echo '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	
	function generate_meta_list() {
		$this->saved_data = $this->get_saved_meta_option();
		$counter = 1;
		if( isset( $this->saved_data[$this->config['group_id']] ) && is_array( $this->saved_data[$this->config['group_id']] ) ) {
			foreach ( $this->saved_data[$this->config['group_id']] as $list_index => $list ){
				echo '<tr class="meta-row sortable" index="' . $list_index . '" id="row-' . $this->config['group_id'] . '-' . $list_index . '">';
				echo '<td>' . $counter . '</td>';
				foreach ( $this->config['table_content'] as $option_key ){
					if( isset($list[$option_key]) ) echo '<td>' . $list[$option_key] . '</td>';
					else echo '<td></td>';
				}
				
				echo '<td>';
				echo '<ul class="row-tools">';
				echo '<li class="meta-edit-row-bt"><a href="#">Edit</a></li>';
				echo '<li class="meta-delete-row-bt last"><a href="#">Delete</a></li>';
				echo '</ul>';
				echo '</td>';
				
				echo '</tr>';
				
				echo '<tr class="meta-edit-row"  index="' . $list_index . '"  id="edit-' . $this->config['group_id'] . '-' . $list_index . '">';
				echo '<td colspan="100%">';
				
				echo '<div class="post-meta-options">';
					$this->multi_counter = $list_index;
					$this->generate_meta_option();
				echo '</div>';
					
				echo '</td>';
				echo '</tr>';
				$counter++;
			}
		}
	}

	///////////////////////////////////////////////////////////////////////////////
	
	function name( $option ) {
		if( isset($this->config['multi']) )
		if( $this->config['multi'] ) return $this->config['group_id'] . '[' . $this->multi_counter . '][' . $option['id'] . ']';
		
		return $this->config['group_id'] . '[' . $option['id'] . ']';
	}
	
	function id( $option ) {
		if( isset($this->config['multi']) )
		if( $this->config['multi'] ) return $this->config['group_id'] . '-' . $this->multi_counter . '-' . $option['id'];
		
		return $this->config['group_id'] . '-' . $option['id'];
	}

	///////////////////////////////////////////////////////////////////////////////
	
	function text( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		echo '<input type="text" class="input-text" id="' . $this->id( $option ) . '" name="' . $this->name( $option ) . '" value="' . stripslashes(htmlspecialchars($value)) . '">';
	}
	
	function textarea( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		
		// Rows
		$row = isset( $option['row'] ) ? 'rows="' . $option['row'] . '"' : '';

		// Theme Option Export/Import
		if( $option['id'] == 'theme_export_option' ) $value = base64_encode( serialize( theme_options() ) );
		
		echo '<textarea class="input-textarea" id="' . $this->id( $option ) . '" name="' . $this->name( $option ) . '" ' . $row . '>' . $value . '</textarea>';
	}
	
	function radio( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		
		$toggle = ( isset($option['toggle']) ) ? ' toggle="' . $option['toggle'] . '"' : '';
		
		foreach( $option['options'] as $radio_slug => $radio_title ){
			$checked = ( $radio_slug == $value ) ? 'checked="checked"' : '';
			echo '<div class="input-field-row">';
			echo '<input type="radio" name="' . $this->name( $option ) . '" value="' . $radio_slug . '" id="' . $this->id( $option ) . '-' . $radio_slug . '" class="input-radio" ' . $checked . $toggle . ' />';
			echo '<label for="' . $this->id( $option ) . '-' . $radio_slug . '">' . $radio_title . '</label>';
			echo '</div>';
		}
	}
	
	function checkbox( $option ) {
		$classgroup = ( isset($option['classgroup']) ) ? $option['classgroup'] : '';
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		
		$checked = ( 'on' == $value ) ? 'checked="checked"' : '';
		$toggle = ( isset($option['toggle']) ) ? ' toggle="' . $option['toggle'] . '"' : '';
		
		// Sent value even the checkbox is unchecked http://stackoverflow.com/questions/476426/submit-an-html-form-with-empty-checkboxes
		echo '<input type="hidden" name="' . $this->name( $option ) . '" value="off" />';
		
		echo '<input type="checkbox" class="'.$classgroup.'"  name="' . $this->name( $option ) . '" id="' . $this->id( $option ) . '" value="on" ' . $checked . $toggle . ' />';
	}
	
	function select( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		
		// Source : Post Type
		if( isset ( $option['source']['post_type'] ) ) {
			$args = array( 'post_type' => $option['source']['post_type'], 'numberposts' => -1, 'orderby' => 'parent', 'order'=> 'DESC' );
			$posts = get_posts( $args );
			// $source[''] = '';
			foreach( $posts as $post ) {
				/*$source[ $post->ID ] = '';
				$parent = $post->post_parent;
				while( $parent > 0 ) { 
					$page = get_page($parent_id);
					$parent = isset( $page->post_parent ) ? $page->post_parent : '0';
					$source[ $post->ID ] .= '-';
				}*/
				$source[ $post->ID ] = $post->post_title . ' (' . $post->ID . ')';
			}
		}
		
		// Source : Category
		if( isset ( $option['source']['category'] ) ) {
			$args = array( 'type' => $option['source']['category'], 'orderby' => 'term_group' );
			$taxanomies = get_categories( $args );
			foreach( $taxanomies as $taxanomy ) {
				$source[ $taxanomy->term_id ] = $taxanomy->category_nicename;
			}
		}

		// Multiple
		$multiple = ( isset ( $option['multiple'] ) ) ? ' multiple size="'.$option['multiple'].'"' : '';
		//var_dump($value);
		$name = ( isset ( $option['multiple'] ) ) ? 'name="' . $this->name( $option ) . '[]"' : 'name="' . $this->name( $option ) . '"';
		
		echo '<select '.$multiple.' class="input-select" ' . $name . '" id="' . $this->id( $option ) . '">';
		if( isset($option['options']) ) {
			foreach( $option['options'] as $select_slug => $select_title ){
				$selected = ( $select_slug == $value || ( is_array($value) && in_array( $select_slug, $value) ) ) ? 'selected="selected"' : '';
				echo '<option value="' . $select_slug . '" ' . $selected . '>' . $select_title . '</option>';
			}
		}
		if( isset($source) ) {
			foreach( $source as $select_slug => $select_title ){
				$selected = ( $select_slug == $value || ( is_array($value) && in_array( $select_slug, $value) ) ) ? 'selected="selected"' : '';
				echo '<option value="' . $select_slug . '" ' . $selected . '>' . $select_title . '</option>';
			}
		}
		echo '</select>';
				
	}
	
	function input_file( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		
		echo '<input type="hidden" class="dummy-input" name="' . $this->name( $option ) . '" />';
		echo '<div class="file-extensions" value="' . $option['extensions'] . '"></div>';
		echo '<div class="uploaded-file-container">';
		if( $value ) {
			echo '<div class="uploaded-file">';
			echo theme_get_attachment_src( $value );
			echo '<a class="remove" href="#">remove</a>';
			echo '<input type="hidden" name="' . $this->name( $option ) . '" value="' . $value . '" />';
			echo '</div>';
		}
		echo '</div>';
		echo '<div class="clear"></div>';
		echo '<div class="ajax-load-icon upload-image-bt-ajax-load"></div>';
		echo '<div class="upload-file-bt-box"></div>';
	}
	
	function image( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		echo '<input type="hidden" class="dummy-input" name="' . $this->name( $option ) . '" />';
		if( $value ) {
			$resized_image_src = theme_get_image( $value, 100, 80, true);
			echo '<div class="uploaded-image">';
			echo '<img src="' . $resized_image_src . '" />';
			echo '<a class="remove" href="#">remove</a>';
			echo '<input type="hidden" name="' . $this->name( $option ) . '" value="' . $value . '" />';
			echo '</div>';
		}
		echo '</div>';
		echo '<div class="clear"></div>';
		echo '<a class="upload-image button">Select/Upload Image</a>';
	}
	
	function images( $option ) {
		
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		
		echo '<input type="hidden" class="dummy-input" name="' . $this->name( $option ) . '" />';
		echo '<div class="uploaded-images-container">';
		//var_dump($value);
		if( is_array( $value ) )
		foreach ( $value as $image ) {
			$resized_image_src = theme_get_image( $image, 100, 80, true);
			echo '<div class="uploaded-image">';
			echo '<img src="' . $resized_image_src . '" />';
			echo '<a class="remove" href="#">remove</a>';
			echo '<input type="hidden" name="' . $this->name( $option ) . '[]" value="' . $image . '" />';
			echo '</div>';
		}
		echo '</div>';
		echo '<div class="clear"></div>';
		echo '<a class="upload-images button">Select/Upload Images</a>';
	}
	
	function show( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		echo stripslashes(htmlspecialchars($value));
		echo '<input type="hidden" class="input-hidden" id="' . $this->id( $option ) . '" name="' . $this->name( $option ) . '" value="' . stripslashes(htmlspecialchars($value)) . '">';	
	}
	
	
	///////////////////////////////////////////////////////////////////////////////
	
	function color( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		
		echo '<input type="text" class="colorpicker" id="' . $this->id( $option ) . '" name="' . $this->name( $option ) . '" value="' . $value . '" data-hex="true">';
	}
	
	function date( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : '';
		}
	
		$time_string = ($value != '') ? date('d F Y', $value) : '';
		echo '<input type="text" class="input-date" id="' . $this->id( $option ) . '" value="' . $time_string . '" >';
		echo '<input type="hidden" class="input-date-value" id="' . $this->id( $option ) . '" name="' . $this->name( $option ) . '" value="' . $value . '" >';
	}
	
	function time( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		
		echo '<input type="text" class="input-time" id="' . $this->id( $option ) . '" name="' . $this->name( $option ) . '" value="' . $value . '" ><a href="#" class="time-trigger"></a>';
	}
	
	function range( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		
		echo '<input type="text" class="input-range" id="' . $this->id( $option ) . '" name="' . $this->name( $option ) . '" value="' . $value . '" min="' . $option['min'] . '" max="' . $option['max'] . '" step="' . $option['step'] . '">';
		echo '<span class="input-range-unit">' . $option['unit'] . '</span>';
	}
	
	function on_off( $option ) {
		$classgroup = ( isset($option['classgroup']) ) ? $option['classgroup'] : '';
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		
		$checked = ( 'on' == $value ) ? 'checked="checked"' : '';
		$toggle = ( isset($option['toggle']) ) ? ' toggle="' . $option['toggle'] . '"' : '';
		
		// Sent value even the checkbox is unchecked http://stackoverflow.com/questions/476426/submit-an-html-form-with-empty-checkboxes
		echo '<input type="hidden" name="' . $this->name( $option ) . '" value="off" />';
		
		echo '<input type="checkbox" class="input-on-off '.$classgroup.'"  name="' . $this->name( $option ) . '" id="' . $this->id( $option ) . '" value="on" ' . $checked . $toggle . ' />';
	}
	
	function radio_img( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		
		$toggle = ( isset($option['toggle']) ) ? ' toggle="' . $option['toggle'] . '"' : '';
		
		foreach( $option['options'] as $radio_slug => $radio_title ){
			$checked = ( $radio_slug == $value ) ? 'checked="checked"' : '';
			$active = ( $radio_slug == $value ) ? 'active' : '';
			echo '<div class="radio-img-list">';
			echo '<input type="radio" name="' . $this->name( $option ) . '" value="' . $radio_slug . '" id="' . $this->id( $option ) . '-' . $radio_slug . '" class="input-radio" ' . $checked . $toggle . ' />';
			echo '<label for="' . $this->id( $option ) . '-' . $radio_slug . '" class="' . $active . ' '.$radio_slug. ' '.$this->id( $option ). '"></label>';
			echo '<div class="radio-img-list-desc">' . $radio_title . '</div>';
			echo '</div>';
		}	
	}
	
	function checkbox_img( $option ) {
		$default = ( isset($option['default']) ) ? $option['default'] : '';
		if( isset( $this->config['multi'] ) && $this->config['multi'] ) {
			$value = ( isset( $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] ) ) ? $this->saved_data[$this->config['group_id']][$this->multi_counter][$option['id']] : $default;
		} else {
			$value = ( isset( $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] ) ) ? $this->saved_data[ $this->config['group_id'] . '_' . $option['id'] ] : $default;
		}
		
		$toggle = ( isset($option['toggle']) ) ? ' toggle="' . $option['toggle'] . '"' : '';
		
		foreach( $option['options'] as $checkbox_slug => $checkbox_title ){
			$checked = ( is_array( $value ) && in_array( $checkbox_slug, $value ) ) ? 'checked="checked"' : '';
			$active = ( is_array( $value ) && in_array( $checkbox_slug, $value ) ) ? 'active' : '';
			echo '<div class="checkbox-img-list">';
			echo '<input type="checkbox" name="' . $this->name( $option ) . '[]" value="' . $checkbox_slug . '" id="' . $this->id( $option ) . '-' . $checkbox_slug . '" class="input-checkbox" ' . $checked . $toggle . ' />';
			echo '<label for="' . $this->id( $option ) . '-' . $checkbox_slug . '" class="' . $active . '"><img src="' . THEME_CUSTOM_ASSETS_URI . '/images/list-images/' . $option['images'][$checkbox_slug] . '" /></label>';
			echo '<div class="checkbox-img-list-desc">' . $checkbox_title . '</div>';
			echo '</div>';
		}	
	}
	

	
		
}

?>