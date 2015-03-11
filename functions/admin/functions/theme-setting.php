<form id="theme-options-form" method="post">
<div id="theme-box" class="wrap">
	
	<div id="theme-box-head">
		<div class="theme-box-head-icon icon-32-setting"></div>
		<h2><?php _e('AppifyWP Pro Settings', 'theme_admin'); ?></h2>
	</div>
	
	<div id="theme-box-body" class="clearfix">
		
		<div id="theme-box-tabs">
			<ul>
				<?php 
				$counter = 0;
				foreach( $sections as $section_slug => $section ): ?>
					<li class="<?php echo ($counter++ == 0) ? 'active' : ''; ?>"><a href="#<?php echo $section_slug; ?>" class="icon-16-default icon-16-<?php echo $section_slug; ?>"><?php echo $section; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		
		<div id="theme-box-content">
		
			<?php
				foreach( $sections as $section_slug => $section ){
					$section = include_once( THEME_OPTIONS_DIR.'/' . $section_slug . '.php' );
					$input_tool = new input_tool( $section['options'], $section['config'] );
					$input_tool->generate_theme_option();
				}
			?>
			
		</div>
		
	</div>
	
	<div id="theme-box-foot">
		<!--
		<input type="button" name="reset" value="Reset Options" class="button" id="theme-options-reset" />
		<input type="button" name="reset-confirm" value="Confirm - Reset Options" class="button" id="theme-options-reset-confirm" />
		-->
		<input type="button" name="save" value="Save Settings" class="button-primary" id="theme-options-save" />
	</div>
	
	<div class="notification-box notification-ok">

		<?php _e('Settings Saved', 'appifywp'); ?>
	</div>
	
</div>

</form>

<?php if( theme_options('advanced', 'show_debug') == 'on' ): ?>
	<section id="debug-section">
		<textarea rows="20" cols="50"><?php var_dump(theme_options()); ?></textarea>
	</section>
<?php endif; ?>

<?php // if( isset( $_GET['reset'] ) ) theme_reset_options(); ?>


<?php 
	// Autosave
	if( isset( $_GET['save'] ) ) : ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#theme-options-save').trigger('click');
		});	
	</script>
<?php endif; ?>