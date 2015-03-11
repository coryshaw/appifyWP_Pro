<?php

add_filter( 'manage_edit-app_columns', 'edit_app_columns' );
function edit_app_columns( $columns ) {
	$columns = array(
		'cb' 		=> '<input type="checkbox" />',
		're-order' 	=> __( 'Reorder', 'theme_admin' ),
		'icon' 		=> __( 'Icon', 'theme_admin' ),
		'title' 	=> __( 'Title', 'theme_admin' ),
		'date' 		=> __( 'Date', 'theme_admin' ),
	);

	return $columns;
}

add_action( 'manage_posts_custom_column', 'manage_app_columns' );
function manage_app_columns( $column ) {
	global $post;
	$icon = theme_get_attachment_src( get_post_meta($post->ID, 'info_app_icon', true) );
	$featured = get_post_meta($post->ID, 'info_side_app_featured', true);
	$platforms = wp_get_post_terms($post->ID, 'app_platform', array("fields" => "names"));
	
	
	if ( $post->post_type == "app" ) {
		switch( $column ) {

			case 'icon':
				if( $icon != '' ) {
					$resized_icon_src = theme_get_image( $icon, 35, 35, true );
					echo '<img src="' . $resized_icon_src. '" />';
				}
				break;
			
			case 'featured':
				echo ( $featured == 'on' ) ? '<img src="' . THEME_ADMIN_ASSETS_URI . '/images/admin/icons-16/star.png" width="16" />' : '';
				break;
			
			case 're-order':
				echo "<div class='reorder-handle'>handle</div><div class='ajax-load-icon'></div>";
				break;
		}
	}
}



?>