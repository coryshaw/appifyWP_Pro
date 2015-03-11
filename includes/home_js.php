<script type="text/javascript">
	jQuery(document).ready(function($) {

    var currentappheight = $('.app-showcase-block.current').height();
      
		$('.flexslider').flexslider({
			animation: '<?php echo $img_slide_effect; ?>',
			slideshowSpeed: <?php echo $img_slide_pause; ?>,
			<?php if ($img_slideshow_autoplay != 'on') :?>
			slideshow: false,
			<?php endif ?>
			controlNav: false
		});
		
		<?php foreach ($platforms as $platform => $platformdata) { 

	    	if ($platformdata['value'] == 'on'): ?>
	    	var slider = $('.platform-<?php echo $platform ?> .flexslider').data('flexslider');
	    <?php endif; }  ?>

	    	$('.app-showcase-block').each(function(){
	    		//var appname = $(this).attr('class').split(' ')[1];
	    		if($('.flexslider',this).length != 0 && $('.flexslider .slides li',this).length > 1 ) {
	    			//slider.appname = $('.flexslider',this).data('flexslider');
	    			//console.log(this.appname);
	    		}	
	    	});

		  	
				
		}); // end doc ready

	</script>