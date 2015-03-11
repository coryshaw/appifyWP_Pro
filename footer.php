<?php
/**
 * Default Footer
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.1
 *
 * Last Revised: July 16, 2012
 */
?>
    <!-- End Template Content -->
      <footer>
        <?php if ( theme_options('footer', 'footer_widgets') && theme_options('footer', 'footer_widgets') != 'off' ) : ?>
      	<div class="footer-widgets">
      	  <div class="container">
      		<div class="row-fluid">
      		<?php switch( theme_options('footer', 'footer_layout') ):
			
				case 'one-column': ?>
				<div class="span12 well">
				<ul>
				<?php dynamic_sidebar( 'first-footer' ); ?>
				</ul>
				</div>
				<?php break; ?>
				
				<?php case 'two-columns': ?>
				<div class="span6 well">
				<ul>
				<?php if ( dynamic_sidebar( 'first-footer' ) ); ?>
				</ul>
				</div>
				<div class="span6 well">
				<ul>
				<?php if ( dynamic_sidebar( 'second-footer' ) ); ?>
				</ul>
				</div>
				<?php break; ?>
				
				<?php case 'three-columns': ?>
				<div class="span4 well">
				<ul>
				<?php if ( dynamic_sidebar( 'first-footer' ) ); ?>
				</ul>
				</div>
				<div class="span4 well">
				<ul>
				<?php if ( dynamic_sidebar( 'second-footer' ) ); ?>
				</ul>
				</div>
				<div class="span4 well">
				<ul>
				<?php if ( dynamic_sidebar( 'third-footer' ) ); ?>
				</ul>
				</div>
				<?php break; ?>
				
				<?php case 'four-columns': ?>
				<div class="span3 well">
				<ul>
				<?php if ( dynamic_sidebar( 'first-footer' ) ); ?>
				</ul>
				</div>
				<div class="span3 well">
				<ul>
				<?php if ( dynamic_sidebar( 'second-footer' ) ); ?>
				</ul>
				</div>
				<div class="span3 well">
				<ul>
				<?php if ( dynamic_sidebar( 'third-footer' ) ); ?>
				</ul>
				</div>
				<div class="span3 well">
				<ul>
				<?php if ( dynamic_sidebar( 'fourth-footer' ) ); ?>
				</ul>
				</div>
				<?php break; ?>

			<?php endswitch; ?>
      	</div> <!-- .row -->
      	</div><!-- .container -->
      	</div><!-- .footer-widgets -->
      <?php endif ?>
      
      <div class="bottom-footer">
		<div class="container">
		<?php if (theme_options('footer', 'footer_copyright_text') != '') { ?>
		  <p><?php echo theme_options('footer', 'footer_copyright_text') ?></p>
		<?php } ?>
		
		<?php if (theme_options('footer', 'footer_show_poweredby') != 'off') { ?>
		  <p class="poweredby">Created with <a href ="http://wordpress.org">WordPress</a> and <a href="http://appifywp.com<?php if (theme_options('advanced', 'affiliate_id') != '') { echo '?ap_id='. theme_options('advanced', 'affiliate_id'); }?>">AppifyWP Pro</a></p>
		        <?php } ?>


		</div> <!-- /container -->
		</div><!-- .bottom-footer -->
       </footer>
		
		<?php wp_footer(); ?>
	
  </body>
</html>