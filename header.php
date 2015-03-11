<?php
/**
 *
 * Default Page Header
 */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
  
   <title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'appifywp' ), max( $paged, $page ) );

  ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    
    <?php if( theme_options('advanced', 'enable_responsive') != 'off' ) { ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php } ?>

    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>  data-spy="scroll" data-target=".bs-docs-sidebar" data-offset="10">
    
    <?php if(theme_options('appearance', 'site_bg_texture') != 'none'): ?>
      <div class="texture <?php echo theme_options('appearance', 'site_bg_texture'); ?>"></div>
    <?php endif; ?>

    <div class="navbar navbar navbar-relative-top">
    
           <div class="navbar-inner">
              <?php if(theme_options('appearance', 'site_bg_texture') != 'none'): ?>
                <div class="texture <?php echo theme_options('appearance', 'site_bg_texture'); ?>"></div>
              <?php endif; ?>
             
             <div class="container">

              
    
              <div id="branding">
                <div id="site-title">
                    <a class="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                      <?php if( theme_options( 'header', 'branding_type' ) == 'image' && theme_options( 'header', 'branding_image' ) != '') {
                        echo '<img src="'. theme_get_image( theme_options( 'header', 'branding_image' ) ) .'" alt="'.get_bloginfo( 'name' ).'" />';
                      } else { 
                        echo get_bloginfo( 'name' ); 
                      } ?>
                    </a>
                <?php if ( theme_options( 'header', 'branding_desc' ) == 'on') { ?>
                  <div id="site-description"><?php bloginfo( 'description' ); ?></div>
                <?php } ?>

                </div><!-- #site-title -->

              </div><!-- #branding -->
              
              <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <?php
               /** Loading WordPress Custom Menu  **/
               wp_nav_menu( array(
                  'menu'            => 'main-menu',
                  'container_class' => 'nav-collapse collapse',
                  'menu_class'      => 'nav',
                  'fallback_cb'     => '',
                  'menu_id' => 'main-menu',
                  'walker' => new appifywp_Walker_Nav_Menu()
              ) ); ?>

            </div><!-- .container -->

          </div><!-- .navbar-inner -->
    </div><!-- .navbar -->
    <!-- End Header -->
              <!-- Begin Template Content -->