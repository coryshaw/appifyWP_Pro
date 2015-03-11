<?php 

	// Check if the current page is not blog page
	if( get_queried_object_id() == 0 ) {
		if( theme_options('home', 'home_type') == 'app' ) {
			global $wp_query;
			global $post;
			$wp_query = new WP_Query('post_type=app&p=' . theme_options('home', 'home_app_page') );
			$post->ID = theme_options('home', 'home_app_page');
			return get_template_part('single', 'app');
		}

		else if( theme_options('home', 'home_type') == 'blog' ) {
			include 'archive.php';
		}

		else if( theme_options('home', 'home_type') == 'showcase-list' ) {
			include 'home-apps.php';
		}

//		else if( theme_options('home', 'home_type') == 'app-carousel' ) {
//			include 'home-apps_carousel.php';
//		}

		else {
			include 'home-apps.php';
		}
	}

?>

