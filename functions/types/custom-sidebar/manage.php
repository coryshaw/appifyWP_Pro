<?php

add_filter( 'manage_edit-custom_sidebar_columns', 'edit_custom_sidebar_columns' );
function edit_custom_sidebar_columns( $columns ) {
	$columns = array(
		'cb' 			=> '<input type="checkbox" />',
		're-order' 		=> __( 'Reorder', 'theme_admin' ),
		'title' 		=> __('Name', 'theme_admin'),
		'short_desc' 	=> __('Description', 'theme_admin'),
	);

	return $columns;
}

add_action( 'manage_posts_custom_column', 'manage_posts_columns' );
function manage_posts_columns( $column ) {
	global $post;
	$name = get_post_meta($post->ID, 'info_name', true);
	$short_desc = get_post_meta($post->ID, 'info_short_desc', true);
	if ( $post->post_type == "custom_sidebar" ) {
		switch( $column ) {
			
			case 'short_desc':
				echo $short_desc;
				break;
			
			case 're-order':
				echo "<div class='reorder-handle'>handle</div><div class='ajax-load-icon'></div>";
				break;
		}
	}
}

function title_save_pre_custom_sidebar($title) {
	if ( isset( $_REQUEST['post_type'] ) && isset( $_REQUEST['action'] ) ) {
		if ( $_REQUEST['post_type'] == 'custom_sidebar' && $_REQUEST['action'] == 'editpost' ) {
			$sidebar_name = $_POST['info']['name'];
			return $sidebar_name;
		}
	}
	return $title;
}
add_filter ('title_save_pre', 'title_save_pre_custom_sidebar');

?>