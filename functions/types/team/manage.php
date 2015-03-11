<?php

add_filter( 'manage_edit-team_columns', 'edit_team_columns' );
function edit_team_columns( $columns ) {
	$columns = array(
		'cb' 		=> '<input type="checkbox" />',
		're-order' 	=> __( 'Reorder', 'theme_admin' ),
		'title' 	  => __( 'Name', 'theme_admin' ),
		'role'    => __( 'Title', 'theme_admin' ),   
    'mug'       => __( 'Mug', 'theme_admin' ),
		'date' 		  => __( 'Date', 'theme_admin' ),
	);

	return $columns;
}

add_action( 'manage_posts_custom_column', 'manage_team_columns' );
function manage_team_columns( $column ) {
	global $post;
	$icon = theme_get_attachment_src( get_post_meta($post->ID, 'info_mug', true) );
	
	if ( $post->post_type == "team" ) {
		switch( $column ) {
				
			case 'mug':
				if( $icon != '' ) {
					$resized_icon_src = theme_get_image( $icon, 55, 55, true );
					echo '<img src="' . $resized_icon_src. '" />';
				}
				break;
		
		
		case 'role':
				echo get_post_meta($post->ID, 'info_role', true);
			break;
		
			
			case 're-order':
				echo "<div class='reorder-handle'>handle</div><div class='ajax-load-icon'></div>";
				break;
		}
	}
}



?>