<div class="span4 sidebar">
	<div class="well sidebar-nav<?php if (theme_options('advanced', 'sticky_sidebar') != 'off'){ echo ' sticky';} ?>">
		
		<?php
		$sidebar = 'sidebar';
		?>

		<aside id="sidebar">
			<section class="sidebar-list">
				<ul>
					<?php 
					if ( ! dynamic_sidebar( $sidebar ) ) : ?>
						<div class="box-wrap notice-box">
						<div class="box">
							<p><?php printf(__('You can add widget to <strong>"%s"</strong> widget area by going to <strong>Appearance > Widget</strong>', 'theme_front'), $sidebar); ?></p>
							
						</div>
						</div>
					<?php endif;  ?>
				</ul>
			</section>
		</aside><!-- #sidebar -->

	</div><!--/.well .sidebar-nav -->
</div><!-- /.span4 -->

