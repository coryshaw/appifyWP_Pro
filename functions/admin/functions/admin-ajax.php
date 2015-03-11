<?php

add_action( 'wp_ajax_theme_ajax_action', 'theme_ajax_action' );
function theme_ajax_action() {
	$method = $_REQUEST['method'];
	call_user_func($method);
	die();
}

function upload_file() {
	require_once(THEME_ADMIN_FUNCTIONS_DIR.'/file-uploader.php');
	
	$uploads = wp_upload_dir();


	// Create directory if not exist
	if ( ! file_exists( $uploads['path'] ) ) {	// Check upload folder
		mkdir( $uploads['path'] );	// Make upload folder
	}
	
	// list of valid extensions, ex. array("jpeg", "xml", "bmp")
	$allowedExtensions = $_REQUEST['allowedExtensions'];
	
	// max file size in bytes
	$sizeLimit = 10 * 1024 * 1024;
	
	$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	$result = $uploader->handleUpload($uploads['path'] . '/');

	if( isset( $result['file_path'] ) ) {

		// Insert as WordPress attachment
		$wp_filetype = wp_check_filetype(basename( $result['file_path'] ), null );
		$attachment = array(
		 'post_mime_type' => $wp_filetype['type'],
		 'post_title' => preg_replace('/\.[^.]+$/', '', basename( $result['file_path'] )),
		 'post_content' => '',
		 'post_status' => 'inherit'
		);
		$result['attach_id'] = wp_insert_attachment( $attachment, $uploads['path'] . '/' . basename( $result['file_path'] ), $_REQUEST['post_id'] );
		$result['resized_image_src'] = theme_get_image( $result['attach_id'], null, 100, true );
	}
	
	// to pass data through iframe you will need to encode all html tags
	echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
}

function save_option() {
	parse_str( stripslashes( $_REQUEST['options'] ), $options);

	// Flush Permarlink
	flush_rewrite_rules();
	
	// Import/Export Handle
	if( $options['advanced']['theme_import_option'] != '' ) {
		$options = unserialize( base64_decode( $options['advanced']['theme_import_option'] ) );
	}
	$options['advanced']['theme_export_option'] = '';
	$options['advanced']['theme_import_option'] = '';
	
	// Update Blog Page & Home Page
	if( $options['home']['home_type'] == 'page' ) {
		update_option( 'show_on_front', 'page' );
		if( $options['home']['home_page'] != 0 ) {
			update_option( 'page_on_front', $options['home']['home_page'] );
		} else {
			delete_option( 'page_on_front' );
		}
	} else if ( $options['home']['home_type'] == 'blog' ) {
		update_option( 'show_on_front', 'posts' );
		update_option( 'page_for_posts', '' );
		update_option( 'page_on_front', '' );
	} else if ( $options['home']['home_type'] == 'app' ) {
		update_option( 'show_on_front', 'page' );
		
		update_option( 'page_on_front', '0' );
	}	
	
	update_option(THEME_SLUG . '_options', $options);
	
	// Return result
	$result = array('result' => 'ok', 'encodedOptions' => base64_encode( serialize( $options ) ));
	echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
}

function remove_meta() {
	$meta_tag = $_REQUEST['meta_tag'];
	$meta_index = $_REQUEST['meta_index'];
	$post_id = $_REQUEST['post_id'];
	
	$meta = get_post_meta( $post_id, $meta_tag, true);
	unset($meta[$meta_index]);
	update_post_meta($post_id, $meta_tag, $meta);
	
	// Return result
	$result = array('result' => 'ok');
	echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
}

function update_post_order() {
	
	global $wpdb;
	
	parse_str($_POST['post_order'], $data);
	
	if (is_array($data))
	foreach( $data['post'] as $position => $id ) 
	{
	    $wpdb->update( $wpdb->posts, array('menu_order' => $position), array('ID' => $id) );
	}
    
    // Return result
    $result = array('result' => 'ok', 'data' => $data);
    echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
}